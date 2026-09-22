# Quipuy — separar tráfico de la app del sitio público en GA4 (`login_status`)

**Para:** equipo de desarrollo de Quipuy
**De:** Creative Web · 2026-09-21
**Objetivo:** que las métricas de marketing (visitas al sitio público) no se mezclen con el uso
del facturador por clientes logueados. Hoy la app (`/dashboard/*`) es ~50 % de las sesiones.

## Contexto de su montaje actual (ya verificado en producción)

- GA4 cargado con **gtag.js directo**, measurement ID **`G-P3HWKBL7JH`**.
- El `config` tiene **`send_page_view: false`**, así que ya envían el `page_view` manualmente
  en cada cambio de ruta (SPA). Solo hay que añadirle un dato: `login_status`.

La idea: marcar cada evento con si el usuario estaba **`logged_in`** o **`anonymous`**, para
poder filtrar/segmentar en GA4. Lo mandamos como **parámetro de evento** (preciso por sesión)
y también como **user property** (para audiencias).

---

## 1. Helper de analytics

```ts
// lib/analytics.ts
export const GA_ID = 'G-P3HWKBL7JH';

export type LoginStatus = 'logged_in' | 'anonymous';

// Estado actual, para que los page_view lo incluyan aunque cambie la ruta.
let currentStatus: LoginStatus = 'anonymous';

declare global {
  interface Window { gtag?: (...args: any[]) => void }
}

/** Llamar al arrancar la app y en cada login/logout. */
export function setLoginStatus(status: LoginStatus) {
  currentStatus = status;
  if (typeof window === 'undefined' || !window.gtag) return;
  // user property (user-scoped, para audiencias/segmentos de usuario)
  window.gtag('set', 'user_properties', { login_status: status });
  // parámetro por defecto en TODOS los eventos siguientes (event-scoped)
  window.gtag('set', { login_status: status });
}

/** page_view manual (ya lo hacen; solo se añade login_status). */
export function pageview(url: string) {
  if (typeof window === 'undefined' || !window.gtag) return;
  window.gtag('event', 'page_view', {
    page_path: url,
    login_status: currentStatus,
  });
}
```

> Como `setLoginStatus` hace `gtag('set', { login_status })`, ese valor queda pegado a todos
> los eventos siguientes automáticamente. Igual lo pasamos explícito en `pageview` por si el
> orden de ejecución varía.

---

## 2. Fijar el estado según la sesión (App Router)

Determina el estado **una vez, al montar**, y actualízalo en login/logout. Ubícalo donde ya
sepan si hay sesión (su AuthProvider / hook de sesión / Supabase, etc.).

```tsx
// app/providers.tsx  (o donde vivan sus providers de cliente)
'use client';
import { useEffect } from 'react';
import { setLoginStatus } from '@/lib/analytics';

export function AnalyticsIdentity({ isLoggedIn }: { isLoggedIn: boolean }) {
  useEffect(() => {
    setLoginStatus(isLoggedIn ? 'logged_in' : 'anonymous');
  }, [isLoggedIn]);
  return null;
}
```

- En **login exitoso** → `setLoginStatus('logged_in')`.
- En **logout** → `setLoginStatus('anonymous')`.
- **Importante:** llamar a `setLoginStatus` **antes** del primer `page_view`, para que ese
  primer evento ya lleve el valor correcto.

---

## 3. Incluirlo en el tracking de ruta que ya tienen

Donde hoy disparan el `page_view` por cambio de ruta, usar el helper:

```tsx
// components/GAListener.tsx
'use client';
import { useEffect } from 'react';
import { usePathname, useSearchParams } from 'next/navigation';
import { pageview } from '@/lib/analytics';

export default function GAListener() {
  const pathname = usePathname();
  const search = useSearchParams();
  useEffect(() => {
    const url = pathname + (search?.toString() ? `?${search}` : '');
    pageview(url);
  }, [pathname, search]);
  return null;
}
```

(Si ya tienen un componente equivalente, solo cámbienle la llamada de `gtag('event','page_view',…)`
por `pageview(url)`.)

---

## 4. Registrar las definiciones en GA4 (una sola vez)

Sin esto, el dato llega pero no aparece en informes/segmentos.

**Admin → Definiciones personalizadas → Crear dimensión personalizada:**
- Nombre: `Login status`
- **Alcance: Evento**
- Parámetro de evento: `login_status`

(Opcional, para audiencias de usuario) crear otra con **Alcance: Usuario** y propiedad de
usuario `login_status`.

Los datos empiezan a contarse **desde que se marca**; el histórico no se recalcula.

---

## 5. Cómo se usa después en GA4

En **Explorar**, crear un segmento de sesión:
- **Sitio público (marketing):** incluir sesiones donde `Login status` = `anonymous`.
- **App / facturador:** incluir sesiones donde `Login status` = `logged_in`.

Con eso, todos los informes de visitas quedan limpios sin depender de rutas.

---

## Verificación (cuando esté desplegado)

1. GA4 → **Tiempo real** → abrir el sitio sin sesión: los eventos deben traer
   `login_status = anonymous`. Iniciar sesión y navegar el `/dashboard`: deben traer
   `login_status = logged_in`.
2. En DebugView (o con la extensión GA Debugger) confirmar el parámetro en `page_view`.

---

## Nota

Mientras esto se despliega, para reportes ya se puede separar por ruta (la app está toda bajo
`/dashboard` y `/login`) con un segmento de Exploración que excluya esas rutas de la página de
destino. Este `login_status` es la versión limpia y permanente que no depende de las rutas.
