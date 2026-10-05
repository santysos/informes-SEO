#!/usr/bin/env python3
"""CTA temprano en los 48 posts restantes con bloque de taller (2026-10-05).

Mismo recuadro que aplicar.py (los 5 primeros). Cada post lleva un gancho propio
y un mensaje de WhatsApp «vengo del artículo de…» para atribuir el clic en GA4.
Los posts de compra (REEV, e-POWER, carrocerías, pendientes) llevan un botón de
prueba de manejo o cotización, no de taller.

    python3 aplicar_resto.py          # simulación
    python3 aplicar_resto.py --ya     # aplica

Idempotente (marcador cta-temprano-v1). Respaldo previo en antes/.
"""
import re, sys, time
from aplicar import API, MARCA, RESERVA, bloque, wa, pedir, palabras

CIUDADES = "en nuestro taller de Ibarra, Cayambe o Tulcán"


def taller(gancho, boton, tema, accion="agendar un mantenimiento"):
    return bloque(f"<strong>{gancho}</strong> {{resto}}", boton,
                  wa(f"Hola, vengo del artículo de {tema}. Quiero {accion}. Modelo: ___ Año: ___ Km: ___"),
                  ("reserve en línea", RESERVA))


def repuesto(gancho, resto, tema):
    return bloque(f"<strong>{gancho}</strong> {resto}", "Consultar repuesto por WhatsApp",
                  wa(f"Hola, vengo del artículo de {tema}. Necesito un repuesto. Modelo: ___ Año: ___ Repuesto: ___"),
                  ("agende la instalación en línea", RESERVA))


def venta(gancho, resto, boton, mensaje):
    return bloque(f"<strong>{gancho}</strong> {resto}", boton, wa(mensaje))


def T(gancho, resto, boton, tema, accion="agendar un mantenimiento"):
    return taller(gancho, boton, tema, accion).replace("{resto}", resto)


# (id, inicio del H2 antes del cual se inserta, bloque)
PLAN = [
    (12438, "Un ejemplo de cómo se acumula", T(
        "¿Le toca la próxima revisión a su Renault?",
        f"Díganos el modelo y el kilometraje y le confirmamos qué incluye y cuánto cuesta, {CIUDADES}.",
        "Agendar revisión por WhatsApp", "mantenimiento Renault", "agendar una revisión")),
    (12437, "Cómo distinguir un repuesto original", repuesto(
        "¿Busca un repuesto original para su Renault?",
        "Consulte disponibilidad y precio; si lo necesita, se lo instalamos en el taller.",
        "repuestos Renault")),
    (12145, "Otras señales que acompañan al ruido", T(
        "¿Sus frenos ya hacen alguno de estos ruidos?",
        f"Una revisión a tiempo cuesta mucho menos que cambiar discos. Los revisamos {CIUDADES}.",
        "Agendar revisión de frenos", "frenos que chirrían", "agendar una revisión de frenos")),
    (11819, "Las cifras que sí están publicadas", T(
        "¿Su híbrido ya tiene una revisión pendiente?",
        f"Lo atendemos con técnicos capacitados en sistemas híbridos, {CIUDADES}.",
        "Agendar mantenimiento por WhatsApp", "mantenimiento de híbridos")),
    (11820, "Cuánto cuesta reemplazarla", T(
        "¿Quiere saber en qué estado está la batería de su híbrido?",
        f"La revisamos con el diagnóstico del fabricante, {CIUDADES}.",
        "Agendar revisión por WhatsApp", "batería de híbridos", "revisar la batería")),
    (11807, "Por qué esta tecnología encaja tan bien en Ecuador", venta(
        "¿Quiere manejar un REEV antes de decidir?",
        "Le contamos versiones, precio y disponibilidad del CS55 R-EV y la Hunter en Ibarra, Cayambe o Tulcán.",
        "Consultar por WhatsApp",
        "Hola, vengo del artículo de REEV Changan. Quisiera información y una prueba de manejo.")),
    (11379, "Tipos de fallas que detecta", T(
        "¿Se encendió una luz en el tablero?",
        f"No espere a que empeore: hacemos el diagnóstico computarizado {CIUDADES}.",
        "Agendar diagnóstico por WhatsApp", "diagnóstico computarizado", "agendar un diagnóstico")),
    (11359, "Modelos Renault más comunes", repuesto(
        "¿Necesita alguno de estos repuestos?",
        "Consulte disponibilidad y precio para su Renault; la instalación la hacemos en el taller.",
        "repuestos Renault en Ibarra")),
    (11354, "Marcas que atendemos en el taller", T(
        "Agende en nuestro taller de Tulcán.",
        "Díganos el modelo, el año y el kilometraje, y le confirmamos turno y costo.",
        "Agendar en Tulcán por WhatsApp", "taller en Tulcán")),
    (11344, "¿Cada cuánto cambiar componentes de freno?", T(
        "¿Reconoce alguna de estas señales en sus frenos?",
        f"Revíselos antes de que el arreglo salga más caro, {CIUDADES}.",
        "Agendar revisión de frenos", "frenos en Ibarra", "agendar una revisión de frenos")),
    (9645, "¿Cómo Hacer Válida la Garantía", T(
        "Para no perder la garantía, los mantenimientos deben hacerse a tiempo.",
        f"Agende el suyo {CIUDADES} y quedará registrado en su historial.",
        "Agendar mantenimiento por WhatsApp", "garantía de fábrica")),
    (9623, "Ventajas de realizar mantenimiento preventivo", T(
        "¿Le toca el mantenimiento preventivo a su auto?",
        f"Díganos el modelo y el kilometraje, y le confirmamos turno y costo {CIUDADES}.",
        "Agendar mantenimiento por WhatsApp", "mantenimiento preventivo")),
    (9614, "Aprovecha la tecnología del vehículo", T(
        "¿Su auto gasta más combustible que antes?",
        f"Filtros, bujías o llantas mal calibradas suben el consumo sin que se note. Lo revisamos {CIUDADES}.",
        "Agendar revisión por WhatsApp", "ahorro de combustible", "agendar una revisión")),
    (9568, "Diferencia entre Car Play", T(
        "¿Su auto está al día con el mantenimiento?",
        f"Agende su revisión {CIUDADES}; le confirmamos turno y costo por WhatsApp.",
        "Agendar mantenimiento por WhatsApp", "Apple CarPlay")),
    (9561, "Diferencias entre mantenimiento preventivo", T(
        "¿Quiere saber en qué estado está su auto?",
        f"Con un diagnóstico computarizado detectamos fallas antes de que salgan caras, {CIUDADES}.",
        "Agendar diagnóstico por WhatsApp", "mantenimiento predictivo", "agendar un diagnóstico")),
    (9556, "Mantenimiento del motor de combustión", T(
        "¿Su híbrido ya tiene un mantenimiento pendiente?",
        f"Lo atendemos con técnicos capacitados en sistemas híbridos, {CIUDADES}.",
        "Agendar mantenimiento por WhatsApp", "mantenimiento de híbridos")),
    (9373, "Beneficios de los repuestos originales", T(
        "¿Tiene un Toyota, Mazda o Jeep?",
        f"Agende su servicio con técnicos capacitados y repuestos originales, {CIUDADES}.",
        "Agendar servicio por WhatsApp", "postventa Toyota, Mazda y Jeep", "agendar un servicio")),
    (9342, "Exclusiones de la garantía", T(
        "Para mantener la garantía de su Chery, no se salte ningún mantenimiento.",
        f"Agende el suyo {CIUDADES} y quedará registrado en su historial.",
        "Agendar mantenimiento por WhatsApp", "garantía Chery")),
    (9306, "Comparación con otras tecnologías", venta(
        "¿Quiere conocer el X-Trail e-POWER de cerca?",
        "Le contamos versiones, precio y disponibilidad en Ibarra, Cayambe o Tulcán.",
        "Consultar por WhatsApp",
        "Hola, vengo del artículo de Nissan e-POWER. Quisiera información del X-Trail e-POWER.")),
    (9301, "Repuestos Fiat en Ecuador", T(
        "¿Le toca mantenimiento a su Fiat?",
        f"Atendemos Cronos, Pulse y toda la línea Fiat {CIUDADES}.",
        "Agendar mantenimiento por WhatsApp", "taller Fiat")),
    (9258, "Costos a largo plazo", T(
        "¿Le toca mantenimiento a su Nissan?",
        f"Lo atendemos con repuestos originales y técnicos capacitados, {CIUDADES}.",
        "Agendar mantenimiento por WhatsApp", "taller Nissan")),
    (9233, "Repuestos clave en el mantenimiento", T(
        "¿Le toca mantenimiento a su Stepway?",
        f"Díganos el kilometraje y le confirmamos qué incluye y cuánto cuesta, {CIUDADES}.",
        "Agendar mantenimiento por WhatsApp", "mantenimiento Renault Stepway")),
    (9152, "Rendimiento de autos en Cuenca", T(
        "¿Su auto pierde fuerza en la altura?",
        f"Casi siempre se corrige con filtros, bujías o una limpieza de inyectores. Lo revisamos {CIUDADES}.",
        "Agendar revisión por WhatsApp", "autos y altitud", "agendar una revisión")),
    (8966, "Ventajas de realizar el mantenimiento", T(
        "¿Le toca mantenimiento a su Renault?",
        f"Díganos el modelo y el kilometraje, y le confirmamos turno y costo {CIUDADES}.",
        "Agendar mantenimiento por WhatsApp", "mantenimiento Renault")),
    (9017, "Diferencia frente a otras marcas", T(
        "Para mantener la garantía de su DongFeng, no se salte ningún mantenimiento.",
        f"Agende el suyo {CIUDADES} y quedará registrado en su historial.",
        "Agendar mantenimiento por WhatsApp", "garantía DongFeng")),
    (8949, "Repuestos Nissan Comercial Hidrobo", repuesto(
        "¿Busca un repuesto original para su Nissan?",
        "Consulte disponibilidad y precio; si lo necesita, se lo instalamos en el taller.",
        "repuestos Nissan")),
    (8951, "Garantía y respaldo de marca", T(
        "¿Le toca mantenimiento a su auto?",
        f"Atendemos todas las marcas que vendemos {CIUDADES}.",
        "Agendar mantenimiento por WhatsApp", "servicio postventa")),
    (8581, "3. Usa el combustible adecuado", T(
        "El mantenimiento a tiempo es lo que más alarga la vida del motor.",
        f"Agende el suyo {CIUDADES}; le confirmamos turno y costo por WhatsApp.",
        "Agendar mantenimiento por WhatsApp", "vida útil del motor")),
    (8589, "3. No hacer mantenimiento del auto", T(
        "¿Su auto lleva tiempo sin mantenimiento?",
        f"Ponerse al día cuesta menos que la reparación que viene después. Agende {CIUDADES}.",
        "Agendar mantenimiento por WhatsApp", "consecuencias de no hacer mantenimiento")),
    (8587, "3. Protege el motor de la suciedad", T(
        "¿Su auto circula por caminos de tierra?",
        f"El polvo acelera el desgaste de filtros y suspensión. Lo revisamos {CIUDADES}.",
        "Agendar revisión por WhatsApp", "mantenimiento en zonas rurales", "agendar una revisión")),
    (8585, "5. No dejar que el motor", T(
        "¿Cometió alguno de estos errores con su auto?",
        f"Una revisión a tiempo evita que se conviertan en daños. Agende {CIUDADES}.",
        "Agendar revisión por WhatsApp", "errores que dañan el auto", "agendar una revisión")),
    (8583, "3. Inspección del sistema de frenos", T(
        "¿Su auto ya llegó a los 30.000 km?",
        f"Hacemos el servicio completo {CIUDADES}; le confirmamos turno y costo por WhatsApp.",
        "Agendar mantenimiento de 30.000 km", "mantenimiento de 30.000 km")),
    (8579, "3. Mantén los neumáticos", T(
        "¿Su auto gasta más combustible que antes?",
        f"Bujías, filtros o inyectores sucios suben el consumo. Lo revisamos {CIUDADES}.",
        "Agendar revisión por WhatsApp", "ahorrar combustible", "agendar una revisión")),
    (8282, "¿Qué no cubre la garantía de fábrica?", T(
        "La garantía se mantiene solo si los mantenimientos se hacen a tiempo.",
        f"Agende el suyo {CIUDADES} y quedará registrado en su historial.",
        "Agendar mantenimiento por WhatsApp", "qué cubre la garantía")),
    (8259, "¿Por qué es importante la asistencia en pendientes?", venta(
        "¿Quiere probar la asistencia en pendientes?",
        "Le decimos qué modelos la incluyen y agendamos una prueba de manejo en Ibarra, Cayambe o Tulcán.",
        "Consultar por WhatsApp",
        "Hola, vengo del artículo de asistencia en pendientes. Quisiera saber qué modelos la tienen y agendar una prueba de manejo.")),
    (8244, "¿Qué carrocería es la mejor opción", venta(
        "¿Ya sabe qué tipo de auto busca?",
        "Le ayudamos a elegir entre los modelos disponibles y agendamos una prueba de manejo en Ibarra, Cayambe o Tulcán.",
        "Consultar por WhatsApp",
        "Hola, vengo del artículo de tipos de carrocería. Quisiera ayuda para elegir un auto.")),
    (8213, "Consejos adicionales para el mantenimiento del Renault Logan", T(
        "¿Le toca mantenimiento a su Logan?",
        f"Hacemos todo este checklist {CIUDADES}; le confirmamos turno y costo por WhatsApp.",
        "Agendar mantenimiento por WhatsApp", "mantenimiento Renault Logan")),
    (8177, "Consejos adicionales para el mantenimiento de tu vehículo", T(
        "¿Su auto ya llegó a los 20.000 km?",
        f"Hacemos todo este checklist {CIUDADES}; le confirmamos turno y costo por WhatsApp.",
        "Agendar mantenimiento de 20.000 km", "mantenimiento de 20.000 km")),
    (8162, "Consejos para reducir los costos", T(
        "¿Quiere saber cuánto le costaría el mantenimiento de su auto?",
        f"Díganos el modelo y el kilometraje, y le damos el valor exacto {CIUDADES}.",
        "Consultar costo por WhatsApp", "costos de mantenimiento", "saber el costo del mantenimiento")),
    (8145, "¿Qué vehículos cuentan con frenos ABS?", T(
        "¿Se encendió la luz del ABS en el tablero?",
        f"Revisamos sensores y sistema de frenos {CIUDADES}.",
        "Agendar revisión de frenos", "frenos ABS", "agendar una revisión de frenos")),
    (8136, "Beneficios de un servicio postventa", T(
        "¿Le toca mantenimiento a su auto?",
        f"Agende su servicio {CIUDADES}; le confirmamos turno y costo por WhatsApp.",
        "Agendar servicio por WhatsApp", "servicio postventa", "agendar un servicio")),
    (8120, "Consejos adicionales", T(
        "¿Su auto está al día con el mantenimiento?",
        f"Agende su revisión {CIUDADES}; le confirmamos turno y costo por WhatsApp.",
        "Agendar mantenimiento por WhatsApp", "protección contra robos")),
    (8115, "Modelos recomendados en altitud", T(
        "¿Su auto pierde fuerza en la altura?",
        f"Casi siempre se corrige con filtros, bujías o una limpieza de inyectores. Lo revisamos {CIUDADES}.",
        "Agendar revisión por WhatsApp", "altitud y rendimiento del motor", "agendar una revisión")),
    (8092, "Garantía extendida", T(
        "No pierda la garantía por un mantenimiento atrasado.",
        f"Agende el suyo {CIUDADES} y quedará registrado en su historial.",
        "Agendar mantenimiento por WhatsApp", "garantía de fábrica")),
    (8086, "Cómo activar el modo ECO", T(
        "¿Su auto gasta más combustible que antes?",
        f"El modo ECO ayuda, pero un filtro o una bujía gastados anulan el ahorro. Lo revisamos {CIUDADES}.",
        "Agendar revisión por WhatsApp", "modo ECO", "agendar una revisión")),
    (8126, "Factores que afectan la frecuencia", T(
        "¿Ya le toca el cambio de aceite?",
        f"Lo hacemos con el aceite que pide el fabricante de su auto, {CIUDADES}.",
        "Agendar cambio de aceite", "cambio de aceite", "agendar un cambio de aceite")),
    (8112, "Por qué es importante no saltarse", T(
        "¿Ya le toca el primer mantenimiento a su auto nuevo?",
        f"Agéndelo {CIUDADES} y cuide la garantía desde el primer servicio.",
        "Agendar primer mantenimiento", "primer mantenimiento", "agendar el primer mantenimiento")),
    (8018, "¿Por qué es importante al comprar", T(
        "Para no perder la garantía, los mantenimientos deben hacerse a tiempo.",
        f"Agende el suyo {CIUDADES} y quedará registrado en su historial.",
        "Agendar mantenimiento por WhatsApp", "garantía de fábrica")),
]


def norm(t):
    return re.sub(r"\s+", " ", re.sub(r"<[^>]+>", "", t)).strip()


def main():
    aplicar = "--ya" in sys.argv
    assert len(PLAN) == len({p[0] for p in PLAN}) == 48
    ok = err = 0
    for pid, h2, cta in PLAN:
        try:
            r = pedir(f"{API}/posts/{pid}?context=edit")
            raw = r["content"]["raw"]
            if MARCA in raw:
                print(f"{pid}: ya tiene el CTA, salto"); continue
            m = [m for m in re.finditer(r"<h2[^>]*>(.*?)</h2>", raw, re.S) if norm(m.group(1)).startswith(h2)]
            assert len(m) == 1, f"H2 «{h2}» aparece {len(m)} veces"
            i = m[0].start()
            j = raw.rfind("<!-- wp:heading", 0, i)
            assert 0 < j < i and i - j < 200, "comentario de bloque raro"
            nuevo = raw[:j] + cta + raw[j:]
            print(f"{pid} {r['slug'][:55]}: palabra {palabras(raw[:j])}/{palabras(raw)}")
            if aplicar:
                res = pedir(f"{API}/posts/{pid}", {"content": nuevo}, "POST")
                assert MARCA in res["content"]["raw"], "no quedó guardado"
                print("   → OK")
            ok += 1
        except Exception as e:
            err += 1
            print(f"{pid}: ERROR {e}")
        time.sleep(8 if aplicar else 2)
    print(f"\n{ok} ok · {err} errores")


if __name__ == "__main__":
    main()
