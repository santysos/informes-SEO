/* Header, footer y datos de producto compartidos por los tres borradores.
   En WordPress esto será: menú de Apariencia, plantilla de header/footer en
   Elementor Theme Builder y productos de WooCommerce. */

const VS = {
  wa: 'https://wa.me/593981140524?text=Hola%20Valencia%20Sports%2C%20quiero%20consultar%20por%20un%20producto',
  marcas: [
    ['Rinat', 34], ['RG', 29], ['Elite Sport', 19], ['Uhlsport', 4],
    ['Reusch', 6], ['Bambino Sport', 15], ['ADM Keeper', 6],
    ['Aurik', 8], ['SP Fútbol', 5], ['Ranic', 3]
  ]
};

/* Catálogo real, precios del catálogo oficial (agosto 2026) */
const PRODUCTOS = [
  {s:'rg-toride',        m:'RG',            n:'Toride 25-26',            p:130, nivel:'Profesional', corte:'Híbrido',      latex:'KRITON Grip',        t:'8·9·10', et:'nuevo'},
  {s:'rg-aversa',        m:'RG',            n:'Aversa 25-26',            p:130, nivel:'Profesional', corte:'Ergonómico',   latex:'EVO Zone',           t:'8·9·10', et:'nuevo'},
  {s:'elite-revolution-x',m:'Elite Sport',  n:'Revolution X',            p:115, nivel:'Profesional', corte:'Negativo',     latex:'Super Soft 4mm',     t:'8·9·10'},
  {s:'rg-bacan',         m:'RG',            n:'Bacan',                   p:110, nivel:'Profesional', corte:'Roll Finger',  latex:'Pro Contact',        t:'8·9·10'},
  {s:'rg-aegix',         m:'RG',            n:'Aegix',                   p:105, nivel:'Profesional', corte:'Negativo',     latex:'Black Pro-Contact',  t:'8·9·10', et:'nuevo'},
  {s:'rg-bionix',        m:'RG',            n:'Bionix',                  p:105, nivel:'Profesional', corte:'Roll Hybrid',  latex:'Pro Contact',        t:'8·9·10'},
  {s:'elite-supreme-aqua',m:'Elite Sport',  n:'Supreme Aqua',            p: 99, nivel:'Profesional', corte:'Negativo',     latex:'Aqua Grip',          t:'8·9·10'},
  {s:'rinat-egotiko-xpro',m:'Rinat',        n:'Egotiko X Pro',           p: 95, nivel:'Profesional', corte:'Negativo',     latex:'AXG alemán',         t:'8·9·10'},
  {s:'rinat-asimetrik-pro',m:'Rinat',       n:'Asimetrik Pro',           p: 95, nivel:'Profesional', corte:'Asimétrico',   latex:'HG+ Next',           t:'8·9·10'},
  {s:'rinat-aries-xpro', m:'Rinat',         n:'Aries X Pro',             p: 95, nivel:'Profesional', corte:'Roll Finger',  latex:'AXG alemán',         t:'8·9·10'},
  {s:'rinat-egotiko-stellar',m:'Rinat',     n:'Egotiko Stellar Pro',     p: 95, nivel:'Profesional', corte:'Negativo',     latex:'OctoPlus alemán',    t:'8·9·10'},
  {s:'rinat-quetzalcoatl',m:'Rinat',        n:'Quetzalcóatl',            p: 95, nivel:'Profesional', corte:'Híbrido',      latex:'AXG alemán',         t:'7·9',    et:'edición'},
  {s:'rg-bacan-2223',    m:'RG',            n:'Bacan 22-23',             p: 95, nivel:'Profesional', corte:'Roll Finger',  latex:'Pro Contact Black',  t:'8·9·10'},
  {s:'rg-aion',          m:'RG',            n:'Aion',                    p: 95, nivel:'Profesional', corte:'Negativo',     latex:'Pro Contact',        t:'8·9·10'},
  {s:'elite-nobre',      m:'Elite Sport',   n:'Nobre',                   p: 95, nivel:'Profesional', corte:'Roll Finger',  latex:'Super Control',      t:'8·9·10'},
  {s:'bambino-ares-pro', m:'Bambino Sport', n:'Ares Blanco Pro',         p: 85, nivel:'Profesional', corte:'Negativo',     latex:'Contact 4mm',        t:'8·9·10'},
  {s:'bambino-ares-bl',  m:'Bambino Sport', n:'Ares BL',                 p: 55, nivel:'Semi-Pro',    corte:'Roll Finger',  latex:'Contact 3mm',        t:'8·9·10'},
  {s:'rinat-asimetrik-prime',m:'Rinat',     n:'Asimetrik Prime (férulas)',p: 55, nivel:'Semi-Pro',   corte:'Asimétrico',   latex:'HG+ Next',           t:'7·8·9·10'},
  {s:'aurik-clnj',       m:'Aurik',         n:'Aurik CLNJ',              p: 54, nivel:'Semi-Pro',    corte:'Roll Finger',  latex:'Látex original',     t:'7·8·9'},
  {s:'aurik-rsng',       m:'Aurik',         n:'Aurik RSNG',              p: 34, nivel:'Entrenamiento',corte:'Plano',       latex:'Látex 3mm',          t:'7·8·9'},
  {s:'aurik-ngrj',       m:'Aurik',         n:'Aurik NGRJ',              p: 26, nivel:'Entrenamiento',corte:'Plano',       latex:'Látex 3mm',          t:'7·8·9'},
  {s:'ranic-az',         m:'Ranic',         n:'Ranic AZ-BL',             p: 15, nivel:'Infantil',    corte:'Plano',        latex:'Látex escolar',      t:'7·8·9·10'},
  {s:'ranic-ng',         m:'Ranic',         n:'Ranic NG-RJ',             p: 15, nivel:'Infantil',    corte:'Plano',        latex:'Látex escolar',      t:'7·8·9·10'},
  {s:'ranic-vd',         m:'Ranic',         n:'Ranic NG-VE',             p: 15, nivel:'Infantil',    corte:'Plano',        latex:'Látex escolar',      t:'7·8·9·10'}
];

const ACCESORIOS = [
  {s:'gloveglu',         n:'Glove Glu Megagrip 120 ml', p:28, d:'Aerosol para recuperar el agarre del látex'},
  {s:'licra-proone',     n:'Licra Pro-One Elion',       p:44, d:'Pantalón con protecciones para portero'},
  {s:'rodilleras',       n:'Rodilleras Under Shield',   p:36, d:'Espuma de alta densidad en zonas de impacto'},
  {s:'coderas',          n:'Coderas de portero',        p:32, d:'Protección en caídas sobre superficie dura'},
  {s:'canilleras-rinat', n:'Canilleras Rinat Pro',      p:12, d:'Espinilleras ligeras, varias tallas'},
  {s:'canilleras-pro',   n:'Canilleras con espuma',     p:12, d:'Modelo con placa de absorción'}
];

/* ---------- render de piezas comunes ---------- */

function menuMarcas(){
  return VS.marcas.map(([m,n]) =>
    `<a href="catalogo.html"><span>${m}</span><span class="n">${String(n).padStart(2,'0')}</span></a>`
  ).join('');
}

function pintarHeader(activo){
  const el = document.querySelector('[data-header]');
  if(!el) return;
  el.innerHTML = `
  <div class="topbar">
    <div class="wrap">
      <span><span class="largo">Envío a todo el Ecuador · </span><b>Personalización de guantes incluida</b></span>
      <div class="tb-links">
        <a href="#">Seguir mi pedido</a>
        <a href="${VS.wa}">WhatsApp 098 114 0524</a>
      </div>
    </div>
  </div>
  <header class="nav">
    <div class="wrap">
      <a href="home-a.html" class="logo">
        <img src="assets/iso.png" alt="Valencia Sports">
        <span class="txt"><span>Valencia</span><span>Sports</span></span>
      </a>
      <nav class="menu">
        <a href="home-a.html" ${activo==='inicio'?'style="color:var(--rojo)"':''}>Inicio</a>
        <div class="tiene-sub">
          <a href="catalogo.html" ${activo==='guantes'?'style="color:var(--rojo)"':''}>Guantes de portero ▾</a>
          <div class="sub">${menuMarcas()}</div>
        </div>
        <a href="#">Ropa deportiva</a>
        <a href="#">Accesorios</a>
        <a href="#">Balones</a>
        <a href="#" class="destacado">Ofertas</a>
      </nav>
      <button class="burger" aria-label="Menú" onclick="document.querySelector('.menu-movil').classList.add('abierto')">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 5h18v2.4H3zm0 5.8h18v2.4H3zm0 5.8h18V19H3z"/></svg>
      </button>
      <div class="acciones">
        <button class="icon-btn" aria-label="Buscar">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="11" cy="11" r="7"/><path d="M20 20l-3.5-3.5"/></svg>
        </button>
        <button class="icon-btn" aria-label="Mi cuenta">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4.4 3.6-7 8-7s8 2.6 8 7"/></svg>
        </button>
        <button class="icon-btn" aria-label="Carrito" style="position:relative">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 4h2.2l2.3 12h10l2.5-9H6"/><circle cx="9.5" cy="20" r="1.4"/><circle cx="17" cy="20" r="1.4"/></svg>
          <span class="badge">2</span>
        </button>
      </div>
    </div>
  </header>
  <div class="menu-movil">
    <div class="mm-cab">
      <a href="home-a.html" class="logo">
        <img src="assets/iso.png" alt="Valencia Sports">
        <span class="txt"><span>Valencia</span><span>Sports</span></span>
      </a>
      <button class="mm-cerrar" onclick="document.querySelector('.menu-movil').classList.remove('abierto')">✕</button>
    </div>
    <a href="home-a.html">Inicio</a>
    <a href="catalogo.html">Guantes de portero</a>
    <div class="mm-marcas">
      <div class="t">Por marca</div>
      ${VS.marcas.map(([m]) => `<a href="catalogo.html">${m}</a>`).join('')}
    </div>
    <a href="#">Ropa deportiva</a>
    <a href="#">Accesorios</a>
    <a href="#">Balones</a>
    <a href="#" style="color:var(--rojo)">Ofertas</a>
    <a href="${VS.wa}" class="btn btn-rojo" style="margin-top:22px; justify-content:center; border-bottom:0">Escribir por WhatsApp</a>
  </div>`;
}

function pintarFooter(){
  const el = document.querySelector('[data-footer]');
  if(!el) return;
  el.innerHTML = `
  <footer class="pie-web">
    <div class="wrap">
      <div class="pie-grid">
        <div>
          <a href="home-a.html" class="logo" style="margin-bottom:16px">
            <img src="assets/iso-white.png" alt="Valencia Sports" style="height:40px">
            <span class="txt" style="color:#fff"><span>Valencia</span><span>Sports</span></span>
          </a>
          <p style="color:rgba(255,255,255,.62); font-size:14px; max-width:290px; line-height:1.65">
            Tienda especializada en implementos para porteros. Distribuidores de Rinat, RG,
            Elite Sport, Reusch y Uhlsport en Ecuador.
          </p>
          <div style="display:flex; gap:10px; margin-top:20px">
            <a href="#" style="width:36px;height:36px;border:1px solid rgba(255,255,255,.25);display:grid;place-items:center;border-radius:4px">IG</a>
            <a href="#" style="width:36px;height:36px;border:1px solid rgba(255,255,255,.25);display:grid;place-items:center;border-radius:4px">FB</a>
            <a href="#" style="width:36px;height:36px;border:1px solid rgba(255,255,255,.25);display:grid;place-items:center;border-radius:4px">TK</a>
          </div>
        </div>
        <div>
          <h4>Categorías</h4>
          <a href="catalogo.html">Guantes de portero</a><br>
          <a href="#">Ropa deportiva</a><br>
          <a href="#">Accesorios</a><br>
          <a href="#">Balones</a><br>
          <a href="#">Ofertas</a>
        </div>
        <div>
          <h4>Marcas</h4>
          ${VS.marcas.slice(0,6).map(([m])=>`<a href="catalogo.html">${m}</a><br>`).join('')}
        </div>
        <div>
          <h4>Ayuda</h4>
          <a href="#">Cómo elegir tu talla</a><br>
          <a href="#">Tipos de corte y látex</a><br>
          <a href="#">Envíos y tiempos de entrega</a><br>
          <a href="#">Cambios y garantía</a><br>
          <a href="${VS.wa}">Escribir por WhatsApp</a>
        </div>
      </div>
      <div class="pie-abajo">
        <span>© 2026 Valencia Sports · Ecuador</span>
        <span>Borrador de diseño — Creative Web</span>
      </div>
    </div>
  </footer>`;
}

/* card de producto reutilizable */
function cardProducto(p, opts={}){
  const et = p.et==='nuevo'   ? '<span class="etiqueta et-rojo">Nuevo</span>'
           : p.et==='edicion' || p.et==='edición' ? '<span class="etiqueta et-navy">Edición limitada</span>'
           : p.et==='oferta'  ? '<span class="etiqueta et-rojo">-20%</span>' : '';
  return `
  <article class="card">
    ${et}
    <a href="producto.html" class="foto"><img src="assets/prod/${p.s}.png" alt="${p.m} ${p.n}" loading="lazy"></a>
    <div class="marca">${p.m}</div>
    <h3><a href="producto.html">${p.n}</a></h3>
    <div class="specs">
      <span>${p.corte}</span><span>Talla ${p.t}</span>
    </div>
    <div class="pie">
      <div class="precio">$${p.p}</div>
      <span class="add">Ver</span>
    </div>
  </article>`;
}

document.addEventListener('DOMContentLoaded', ()=>{
  pintarHeader(document.body.dataset.pagina);
  pintarFooter();
});
