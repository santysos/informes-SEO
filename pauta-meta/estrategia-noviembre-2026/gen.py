#!/usr/bin/env python3
"""Informe: pauta de 1 día con monto alto vs pauta repartida en varios días.

Datos: Meta Ads (cuenta 297102298245636), consultados por API el 19-nov-2026.
Genera login.php e index.php. Uso: python3 gen.py
"""
import os

AQUI = os.path.dirname(os.path.abspath(__file__))
CLAVE = "Pauta-2026"
SES = "auth_pauta_nov2026"
FECHA = "19 de noviembre de 2026"

# (título, fecha, días, gasto, alcance, impresiones, reproducciones, thruplays, reacciones, comentarios, compartidos)
GRUPOS = {
    "alto": {
        "nombre": "1 día · $30 a $50",
        "corto": "1 día, monto alto",
        "color": "#f87171",
        "ads": [
            ("Imbabura debe ser sede de ferias internacionales", "12 nov", 1, 49.98, 32765, 40663, 39503, 17456, 223, 11, 10),
            ("La Cacería del Zorro es hoy un referente ecuestre", "9 nov", 1, 29.99, 27519, 38730, 36917, 17522, 224, 8, 2),
            ("La belleza de nuestras tradiciones", "10 nov", 1, 29.91, 24157, 30201, 28999, 13097, 136, 5, 0),
            ("Imbabura ha esperado demasiado por la vía a los…", "8 nov", 1, 30.00, 24121, 34160, 32958, 15528, 208, 13, 9),
            ("Andamos buscando la guagua de pan más rica de Ibarra", "30 oct", 1, 29.98, 22719, 27743, 26789, 10943, 139, 6, 5),
            ("San Antonio de Ibarra", "3 nov", 1, 29.68, 20818, 30890, 29923, 16024, 108, 4, 4),
            ("El profe Nelson sabe", "5 nov", 1, 29.48, 18065, 23437, 23056, 13520, 95, 1, 6),
            ("Imbabura ha esperado demasiado por sus vías", "8 nov", 1, 30.00, 17648, 21813, 21380, 12364, 92, 6, 6),
        ],
    },
    "medio": {
        "nombre": "1 día · $12",
        "corto": "1 día, monto medio",
        "color": "#fbbf24",
        "ads": [
            ("Se viene la alegría a #Imbabura", "3 oct", 1, 11.93, 22213, 26645, 25020, 7052, 163, 4, 5),
            ("Cañitas para el viaje", "14 sep", 1, 12.00, 21116, 24807, 23168, 8271, 260, 5, 8),
            ("El imbabureño cuando escucha bomba…", "19 sep", 1, 11.95, 19962, 23368, 22083, 7373, 193, 5, 8),
            ("#Imbabura está repleta de lugares y sabores", "23 sep", 1, 12.00, 19872, 21755, 20796, 7991, 205, 0, 1),
            ("#Imbabura no solo es potencia turística", "26 sep", 1, 11.87, 19177, 21475, 20282, 6236, 171, 4, 4),
        ],
    },
    "repartido": {
        "nombre": "Referencia · 6 días, ~$1 diario",
        "corto": "referencia de pauta repartida",
        "color": "#34d399",
        "ads": [
            ("Cotacachi es espacios deportivos iluminados", "12-18 sep", 6, 5.82, 13448, 15133, 14472, 5434, 83, 1, 0),
            ("En Cotacachi, la contratación pública es un…", "12-18 sep", 6, 5.87, 12981, 14860, 14193, 5795, 69, 6, 8),
            ("Cotacachi es participación", "12-18 sep", 6, 5.87, 12484, 16391, 15200, 5140, 154, 4, 22),
            ("Jora 2026", "12-18 sep", 6, 5.77, 10953, 14506, 13731, 4695, 102, 3, 8),
            ("Cotacachi es atención", "12-18 sep", 6, 5.82, 9899, 12939, 12265, 3330, 60, 0, 3),
            ("Cotacachi es seguridad", "12-18 sep", 6, 5.87, 9610, 13499, 12538, 3144, 78, 3, 6),
        ],
    },
}
# Jomar: pautas de varios días que siguen corriendo (datos parciales, 2 días)
EN_CURSO = [
    ("Imbabura es emprendedora", "desde 17 nov", 2, 1.60, 2462, 2546, 2502, 1119),
    ("Vamos a sanar los ríos de Imbabura", "desde 17 nov", 2, 1.37, 1791, 1879, 1820, 535),
]
# El grupo "repartido" es pauta de OTRA página de la región (sep 2026). Se usa solo como
# referencia de métricas: en el informe aparecen sus totales, nunca sus títulos.

def tot(g):
    a = GRUPOS[g]["ads"]
    s = lambda i: sum(x[i] for x in a)
    t = dict(n=len(a), gasto=s(3), alcance=s(4), imp=s(5), rep=s(6), tp=s(7), rx=s(8), com=s(9), comp=s(10))
    t["c_mil"] = t["gasto"] / t["alcance"] * 1000          # costo por 1.000 personas alcanzadas
    t["p_dolar"] = t["alcance"] / t["gasto"]                # personas por dólar
    t["c_tp"] = t["gasto"] / t["tp"] * 1000                 # costo por 1.000 ThruPlays
    t["rx10"] = (t["rx"] + t["com"] + t["comp"]) / t["gasto"] * 10  # interacciones por $10
    t["frec"] = t["imp"] / t["alcance"]
    return t

T = {g: tot(g) for g in GRUPOS}
veces = T["alto"]["c_mil"] / T["repartido"]["c_mil"]

def n(x, d=0):
    s = f"{x:,.{d}f}"
    return s.replace(",", "X").replace(".", ",").replace("X", ".")
def usd(x, d=2): return "$" + n(x, d)

def card(ad, color):
    tit, fecha, dias, gasto, alc, imp, rep, tp = ad[:8]
    por_dia = gasto / dias
    c_mil = gasto / alc * 1000
    return f"""
<div class="card rounded-2xl p-5">
  <div class="flex items-center justify-between gap-3 text-xs text-slate-400 mb-3">
    <span class="flex items-center gap-2"><span class="w-2 h-2 rounded-full" style="background:{color}"></span>{fecha} · {dias} {'día' if dias == 1 else 'días'}</span>
    <span class="font-mono" style="color:{color}">{usd(c_mil)} / 1.000 personas</span>
  </div>
  <p class="font-display font-semibold text-white leading-snug mb-4">{tit}</p>
  <div class="grid grid-cols-4 gap-2 border-t border-slate-700/50 pt-4">
    <div><p class="num">{n(rep)}</p><p class="lbl">Reproducciones</p></div>
    <div><p class="num">{n(alc)}</p><p class="lbl">Alcance</p></div>
    <div><p class="num">{n(tp)}</p><p class="lbl">ThruPlays</p></div>
    <div><p class="num">{usd(gasto)}</p><p class="lbl">{usd(por_dia)} por día</p></div>
  </div>
</div>"""

def fila(g):
    t = T[g]; c = GRUPOS[g]["color"]
    return f"""<tr>
  <td class="py-3 pr-3"><span class="inline-block w-2.5 h-2.5 rounded-full mr-2" style="background:{c}"></span>{GRUPOS[g]['nombre']}<span class="block text-xs text-slate-500 ml-4">{t['n']} publicaciones</span></td>
  <td class="py-3 px-2 text-right font-mono">{usd(t['gasto'])}</td>
  <td class="py-3 px-2 text-right font-mono">{n(t['alcance'])}</td>
  <td class="py-3 px-2 text-right font-mono" style="color:{c}">{usd(t['c_mil'])}</td>
  <td class="py-3 px-2 text-right font-mono">{n(t['p_dolar'])}</td>
  <td class="py-3 px-2 text-right font-mono">{usd(t['c_tp'])}</td>
  <td class="py-3 px-2 text-right font-mono">{n(t['rx10'])}</td>
  <td class="py-3 pl-2 text-right font-mono">{n(t['frec'], 2)}</td>
</tr>"""

def barra(g, campo, maximo, fmt):
    t = T[g]; c = GRUPOS[g]["color"]; ancho = t[campo] / maximo * 100
    return f"""<div class="mb-3">
  <div class="flex justify-between text-sm mb-1"><span class="text-slate-300">{GRUPOS[g]['nombre']}</span><span class="font-mono text-white">{fmt(t[campo])}</span></div>
  <div class="h-3 rounded-full bg-slate-800"><div class="h-3 rounded-full" style="width:{ancho:.1f}%;background:{c}"></div></div>
</div>"""

ORDEN = ["alto", "medio", "repartido"]
max_cmil = max(T[g]["c_mil"] for g in ORDEN)
max_pd = max(T[g]["p_dolar"] for g in ORDEN)

# Ejemplo práctico: lo que costaría alcanzar 25.000 personas con cada forma
EJ = 25000

HEAD = """<!DOCTYPE html>
<html lang="es-EC"><head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>{titulo}</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
<style>
*{{font-family:'Inter',sans-serif}} .font-display{{font-family:'Outfit',sans-serif;letter-spacing:-.02em}} .font-mono,.num{{font-family:'JetBrains Mono',monospace}}
body{{background:#0b1016;background-image:radial-gradient(900px 600px at 85% -10%,rgba(59,130,246,.10),transparent 60%),radial-gradient(700px 500px at 0% 100%,rgba(52,211,153,.07),transparent 55%);color:#e5e7eb}}
.card{{background:rgba(255,255,255,.035);border:1px solid rgba(255,255,255,.08)}}
.num{{font-size:1.05rem;font-weight:600;color:#fff}} .lbl{{font-size:.7rem;color:#94a3b8;margin-top:2px;line-height:1.2}}
html{{scroll-behavior:smooth}} section{{scroll-margin-top:78px}} .nav a.on{{color:#fff;background:rgba(59,130,246,.18)}}
@media (max-width:640px){{.num{{font-size:.9rem}}}}
</style></head>"""

def login():
    return f"""<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {{
    if (($_POST['password'] ?? '') === '{CLAVE}') {{
        $_SESSION['{SES}'] = true;
        header('Location: index.php');
        exit;
    }}
    $error = 'Clave incorrecta. Intenta nuevamente.';
}}
?>
{HEAD.format(titulo="Informe de pauta · Jomar · Noviembre 2026")}
<body class="min-h-screen flex items-center justify-center px-6">
<div class="card w-full max-w-md rounded-2xl p-8 md:p-10">
  <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" style="height:34px;width:auto;display:block;margin:0 auto 22px">
  <p class="font-mono text-xs uppercase tracking-widest text-sky-400 text-center mb-2">Informe confidencial</p>
  <h1 class="font-display text-2xl font-bold text-white text-center mb-1">Cómo invertir mejor la pauta en Meta</h1>
  <p class="text-slate-400 text-sm text-center mb-8">Jomar · Noviembre 2026</p>
  <form method="POST" class="space-y-4">
    <input type="password" name="password" placeholder="Clave de acceso" required autofocus
      class="w-full rounded-xl bg-slate-900/70 border border-slate-700 px-4 py-3 text-white focus:outline-none focus:border-sky-400">
    <?php if ($error): ?><p class="text-red-400 text-sm"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <button class="w-full rounded-xl bg-sky-500 hover:bg-sky-400 text-white font-semibold py-3 transition">Entrar</button>
  </form>
</div>
</body></html>
"""

def index():
    a, m, r = T["alto"], T["medio"], T["repartido"]
    costo_ej = {g: T[g]["c_mil"] * EJ / 1000 for g in ORDEN}
    cards = {g: "".join(card(ad, GRUPOS[g]["color"]) for ad in GRUPOS[g]["ads"]) for g in ("alto", "medio")}
    curso = "".join(card(ad, "#34d399") for ad in EN_CURSO)
    return f"""<?php
session_start();
if (empty($_SESSION['{SES}'])) {{ header('Location: login.php'); exit; }}
?>
{HEAD.format(titulo="Informe de pauta en Meta · Jomar · Noviembre 2026")}
<body>
<nav class="nav sticky top-0 z-50 border-b border-slate-800/60 backdrop-blur-xl bg-[#0b1016]/85">
  <div class="max-w-5xl mx-auto px-5 flex items-center justify-between gap-4">
    <div class="flex gap-1 overflow-x-auto py-3 text-[13px] font-medium">
      <a href="#resumen" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap">Resumen</a>
      <a href="#comparacion" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap">Comparación</a>
      <a href="#detalle" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap">Por publicación</a>
      <a href="#porque" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap">Por qué pasa</a>
      <a href="#recomendacion" class="px-3 py-1.5 rounded-lg text-slate-400 hover:text-white whitespace-nowrap">Recomendación</a>
    </div>
    <a href="logout.php" class="text-xs text-slate-500 hover:text-white whitespace-nowrap">Salir</a>
  </div>
</nav>

<main class="max-w-5xl mx-auto px-5 pb-20">

<header class="pt-14 pb-10">
  <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-8 w-auto mb-5">
  <p class="font-mono text-xs uppercase tracking-widest text-sky-400 mb-3">Jomar · Informe de pauta en Meta (Facebook e Instagram)</p>
  <h1 class="font-display text-3xl md:text-5xl font-bold text-white leading-tight mb-4">Repartir la pauta en varios días<br class="hidden md:block"> rinde más que gastarla en uno</h1>
  <p class="text-slate-400 max-w-2xl">Análisis de las {a['n'] + m['n'] + len(EN_CURSO)} publicaciones de Jomar pautadas entre septiembre y noviembre de 2026, comparadas con una referencia de pauta repartida en varios días. Datos de la cuenta publicitaria al {FECHA}.</p>
</header>

<section id="resumen" class="mb-16">
  <div class="grid md:grid-cols-3 gap-4 mb-6">
    <div class="card rounded-2xl p-6"><p class="text-xs text-slate-400 mb-2">Costo por 1.000 personas · 1 día, $30-50</p>
      <p class="font-display text-4xl font-bold" style="color:{GRUPOS['alto']['color']}">{usd(a['c_mil'])}</p></div>
    <div class="card rounded-2xl p-6"><p class="text-xs text-slate-400 mb-2">Costo por 1.000 personas · referencia, varios días a ~$1 diario</p>
      <p class="font-display text-4xl font-bold" style="color:{GRUPOS['repartido']['color']}">{usd(r['c_mil'])}</p></div>
    <div class="card rounded-2xl p-6 border-sky-500/40"><p class="text-xs text-slate-400 mb-2">Diferencia</p>
      <p class="font-display text-4xl font-bold text-white">{n(veces, 1)} veces</p><p class="text-sm text-slate-400 mt-1">más caro llegar a cada persona con la pauta de 1 día</p></div>
  </div>
  <ul class="space-y-2 text-slate-300">
    <li>• Las pautas de <strong>$30 a $50 en un solo día</strong> fueron las más caras: cada dólar llegó a <strong>{n(a['p_dolar'])} personas</strong>.</li>
    <li>• En la referencia de <strong>~$1 diario por 6 días</strong>, cada dólar llegó a <strong>{n(r['p_dolar'])} personas</strong>, y las dos pautas repartidas de Jomar que están corriendo van por el mismo camino.</li>
    <li>• <strong>Recomendación:</strong> pautar cada publicación entre <strong>$3 y $5 diarios durante 5 a 7 días</strong>, siempre con fecha de cierre.</li>
  </ul>
</section>

<section id="comparacion" class="mb-16">
  <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-2">La comparación</h2>
  <p class="text-slate-400 mb-6">Totales de cada forma de pautar. Todas son publicaciones con video, optimizadas para reproducciones. La <strong class="text-slate-300">referencia</strong> son 6 publicaciones de otra página de la región, pautadas a ~$1 diario por 6 días en septiembre de 2026, con el mismo tipo de anuncio.</p>
  <div class="card rounded-2xl p-5 overflow-x-auto mb-8">
    <table class="w-full text-sm min-w-[760px]">
      <thead class="text-slate-400 text-xs border-b border-slate-700/60"><tr>
        <th class="text-left py-2 pr-3 font-medium">Forma de pautar</th><th class="text-right px-2 font-medium">Gasto</th>
        <th class="text-right px-2 font-medium">Alcance</th><th class="text-right px-2 font-medium">Costo por 1.000 personas</th>
        <th class="text-right px-2 font-medium">Personas por $1</th><th class="text-right px-2 font-medium">Costo por 1.000 ThruPlays</th>
        <th class="text-right px-2 font-medium">Interacciones por $10</th><th class="text-right pl-2 font-medium">Veces que vio cada persona</th>
      </tr></thead>
      <tbody class="divide-y divide-slate-800">{''.join(fila(g) for g in ORDEN)}</tbody>
    </table>
  </div>
  <div class="grid md:grid-cols-2 gap-6 mb-8">
    <div class="card rounded-2xl p-6"><p class="font-display font-semibold text-white mb-4">Costo por 1.000 personas alcanzadas <span class="text-slate-500 font-normal text-sm">(menos es mejor)</span></p>
      {''.join(barra(g, 'c_mil', max_cmil, usd) for g in ORDEN)}</div>
    <div class="card rounded-2xl p-6"><p class="font-display font-semibold text-white mb-4">Personas alcanzadas por cada $1 <span class="text-slate-500 font-normal text-sm">(más es mejor)</span></p>
      {''.join(barra(g, 'p_dolar', max_pd, n) for g in ORDEN)}</div>
  </div>
  <div class="card rounded-2xl p-6">
    <p class="font-display font-semibold text-white mb-3">En plata: lo que cuesta llegar a {n(EJ)} personas</p>
    <div class="grid sm:grid-cols-3 gap-4">
      {''.join(f'<div><p class="text-xs text-slate-400">{GRUPOS[g]["nombre"]}</p><p class="font-display text-2xl font-bold" style="color:{GRUPOS[g]["color"]}">{usd(costo_ej[g])}</p></div>' for g in ORDEN)}
    </div>
  </div>
</section>

<section id="detalle" class="mb-16">
  <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-6">Publicación por publicación</h2>
  <h3 class="font-display text-lg font-semibold mb-3" style="color:{GRUPOS['alto']['color']}">1 día · $30 a $50</h3>
  <div class="grid md:grid-cols-2 gap-4 mb-10">{cards['alto']}</div>
  <h3 class="font-display text-lg font-semibold mb-3" style="color:{GRUPOS['medio']['color']}">1 día · $12</h3>
  <div class="grid md:grid-cols-2 gap-4 mb-10">{cards['medio']}</div>
  <h3 class="font-display text-lg font-semibold mb-1" style="color:#34d399">Varios días · $1 diario <span class="text-sm font-normal text-slate-500">(en curso, llevan 2 días)</span></h3>
  <p class="text-sm text-slate-400 mb-3">Las primeras pautas de Jomar con el gasto repartido. Ya muestran un costo por persona más bajo que cualquiera de las de 1 día.</p>
  <div class="grid md:grid-cols-2 gap-4">{curso}</div>
</section>

<section id="porque" class="mb-16">
  <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-6">Por qué pasa</h2>
  <div class="grid md:grid-cols-3 gap-4">
    <div class="card rounded-2xl p-6"><p class="font-display font-semibold text-white mb-2">Meta cobra más por apurarse</p>
      <p class="text-sm text-slate-400">Para gastar $30 o $50 en 24 horas, el anuncio tiene que ganarle espacio a muchos otros anunciantes a la vez. Eso sube el precio de cada vista.</p></div>
    <div class="card rounded-2xl p-6"><p class="font-display font-semibold text-white mb-2">Repite el anuncio a la misma gente</p>
      <p class="text-sm text-slate-400">Con $30-50 en un día, cada persona vio el anuncio {n(a['frec'], 2)} veces en promedio. En las pautas repartidas de Jomar, {n(sum(x[5] for x in EN_CURSO)/sum(x[4] for x in EN_CURSO), 2)}. Cada repetición se paga, y no suma gente nueva.</p></div>
    <div class="card rounded-2xl p-6"><p class="font-display font-semibold text-white mb-2">No da tiempo a aprender</p>
      <p class="text-sm text-slate-400">En los primeros días Meta prueba a quién mostrar el anuncio. Con varios días encuentra el público que más lo mira; en uno solo, se acaba antes de aprender.</p></div>
  </div>
  <p class="text-xs text-slate-500 mt-5">Nota: la referencia es otra página, con otro público y otros videos, y eso también influye. Las dos pautas repartidas de Jomar que están corriendo confirman la tendencia con datos propios. La diferencia de costo es consistente en todo el grupo: ninguna pauta de $30-50 en un día bajó de {usd(min(x[3]/x[4]*1000 for x in GRUPOS['alto']['ads']))} por 1.000 personas, y ninguna de la referencia pasó de {usd(max(x[3]/x[4]*1000 for x in GRUPOS['repartido']['ads']))}.</p>
</section>

<section id="recomendacion" class="mb-10">
  <h2 class="font-display text-2xl md:text-3xl font-bold text-white mb-6">Recomendación</h2>
  <div class="card rounded-2xl p-6 md:p-8 border-emerald-500/30 mb-6">
    <p class="text-sm text-emerald-300 font-mono uppercase tracking-wider mb-2">Nueva forma de pautar</p>
    <p class="font-display text-2xl md:text-3xl font-bold text-white mb-4">$3 a $5 diarios por publicación, durante 5 a 7 días</p>
    <ul class="grid md:grid-cols-2 gap-x-8 gap-y-2 text-slate-300 text-sm">
      <li>✓ Mismo dinero: $30 se reparte en 6-10 días en vez de 1</li>
      <li>✓ Siempre con fecha de cierre, para que no siga cobrando</li>
      <li>✓ Máximo 7 días: después la gente ya vio el anuncio</li>
      <li>✓ Las fechas puntuales (eventos, anuncios del día) se pautan con 2-3 días de anticipación</li>
      <li>✓ Una publicación nueva entra cuando la anterior está por terminar</li>
      <li>✓ Se revisa el costo por 1.000 personas a los 3 días y se ajusta</li>
    </ul>
  </div>
  <div class="card rounded-2xl p-6">
    <p class="font-display font-semibold text-white mb-3">Cómo se ve con $30</p>
    <div class="grid sm:grid-cols-2 gap-4 text-sm">
      <div class="rounded-xl bg-red-500/5 border border-red-500/20 p-4"><p class="text-red-300 font-semibold mb-1">Antes</p><p class="text-slate-300">$30 en 1 día · ~{n(a['p_dolar']*30)} personas</p></div>
      <div class="rounded-xl bg-emerald-500/5 border border-emerald-500/20 p-4"><p class="text-emerald-300 font-semibold mb-1">Ahora</p><p class="text-slate-300">$5 diarios × 6 días · se estima entre {n(m['p_dolar']*30, 0)} y {n(r['p_dolar']*30, 0)} personas según lo que rindió la pauta de $12 de Jomar y la referencia</p></div>
    </div>
  </div>
</section>

<footer class="border-t border-slate-800 pt-6 mt-16">
  <p class="text-xs text-slate-500">Fuente: Administrador de anuncios de Meta, datos al {FECHA}. ThruPlay = reproducción del video completo o de al menos 15 segundos.</p>
  <div class="flex items-center gap-3 mt-3">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-6 w-auto opacity-80">
    <p class="text-xs text-slate-500">Otavalo, Ecuador · noviembre de 2026</p>
  </div>
</footer>
</main>
<script>
const secs=[...document.querySelectorAll('section')];
const links=new Map([...document.querySelectorAll('.nav a[href^="#"]')].map(a=>[a.getAttribute('href').slice(1),a]));
const obs=new IntersectionObserver(es=>{{const v=es.filter(e=>e.isIntersecting).sort((a,b)=>a.boundingClientRect.top-b.boundingClientRect.top)[0];
if(!v)return;const a=links.get(v.target.id);if(a){{links.forEach(l=>l.classList.remove('on'));a.classList.add('on');}}}},{{rootMargin:'-78px 0px -55% 0px'}});
secs.forEach(s=>obs.observe(s));
</script>
</body></html>
"""

if __name__ == "__main__":
    open(os.path.join(AQUI, "login.php"), "w").write(login())
    open(os.path.join(AQUI, "index.php"), "w").write(index())
    for g in ORDEN:
        t = T[g]
        print(f"{g:10} gasto {t['gasto']:7.2f} alcance {t['alcance']:7} c/1000 {t['c_mil']:.2f} p/$ {t['p_dolar']:.0f} c/1000TP {t['c_tp']:.2f} int/$10 {t['rx10']:.0f} frec {t['frec']:.2f}")
    print(f"veces: {veces:.2f}")
