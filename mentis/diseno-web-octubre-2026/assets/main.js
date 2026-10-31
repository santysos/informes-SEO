// Mentis Psicología — interacciones del borrador
(() => {
  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
  const root = document.documentElement;

  // Cabecera: se oculta al bajar, reaparece al subir
  const header = document.querySelector('.site-header');
  let lastY = scrollY;
  addEventListener('scroll', () => {
    const y = scrollY;
    header.classList.toggle('solid', y > 30);
    header.classList.toggle('hide', y > 300 && y > lastY && !root.classList.contains('menu-open'));
    lastY = y;
  }, { passive: true });

  // Menú móvil
  const burger = document.querySelector('.burger');
  burger?.addEventListener('click', () => {
    const open = root.classList.toggle('menu-open');
    burger.setAttribute('aria-expanded', open);
  });

  // Títulos palabra por palabra (respeta <em> y el trazo a mano)
  document.querySelectorAll('.split').forEach(el => {
    let i = 0;
    const walk = node => {
      [...node.childNodes].forEach(n => {
        if (n.nodeType === 3) {
          const frag = document.createDocumentFragment();
          n.textContent.split(/(\s+)/).forEach(part => {
            if (!part) return;
            if (/^\s+$/.test(part)) { frag.append(' '); return; }
            const w = document.createElement('span'); w.className = 'w';
            const s = document.createElement('span'); s.textContent = part; s.style.setProperty('--i', i++);
            w.append(s); frag.append(w);
          });
          n.replaceWith(frag);
        } else if (n.nodeType === 1 && n.tagName !== 'svg') {
          if (n.classList.contains('ring') || n.classList.contains('underline-hand')) {
            // la palabra con trazo se anima entera
            const w = document.createElement('span'); w.className = 'w'; w.style.overflow = 'visible';
            const s = document.createElement('span'); s.style.setProperty('--i', i++);
            n.replaceWith(w); s.append(n); w.append(s);
          } else walk(n);
        }
      });
    };
    walk(el);
  });

  // Aparición al hacer scroll
  const io = new IntersectionObserver(entries => entries.forEach(e => {
    if (!e.isIntersecting) return;
    e.target.classList.add('in');
    e.target.querySelectorAll('.ring,.underline-hand').forEach(r => r.classList.add('drawn'));
    if (e.target.matches('.ring,.underline-hand')) e.target.classList.add('drawn');
    io.unobserve(e.target);
  }), { threshold: .15, rootMargin: '0px 0px -8% 0px' });
  document.querySelectorAll('.split,.fade,.reveal-img,.ring,.underline-hand').forEach(el => io.observe(el));
  // las líneas decorativas se dibujan al entrar en pantalla
  const dio = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('drawn'); dio.unobserve(e.target); } }), { threshold: .2 });
  document.querySelectorAll('.deco').forEach(el => dio.observe(el));

  // Escalonado automático dentro de grupos
  document.querySelectorAll('[data-stagger]').forEach(g => {
    [...g.children].forEach((c, k) => { c.classList.add('fade'); c.style.setProperty('--d', (k * 0.14) + 's'); io.observe(c); });
  });

  // Contadores
  const cio = new IntersectionObserver(es => es.forEach(e => {
    if (!e.isIntersecting) return;
    const el = e.target, to = +el.dataset.count, t0 = performance.now(), dur = 2600;
    const tick = t => { const p = Math.min(1, (t - t0) / dur); el.textContent = Math.round(to * (1 - Math.pow(1 - p, 3))); if (p < 1) requestAnimationFrame(tick); };
    reduce ? el.textContent = to : requestAnimationFrame(tick);
    cio.unobserve(el);
  }), { threshold: .6 });
  document.querySelectorAll('[data-count]').forEach(el => cio.observe(el));

  // Parallax suave
  const px = [...document.querySelectorAll('[data-parallax]')];
  if (px.length && !reduce) {
    const run = () => {
      px.forEach(el => {
        const r = el.parentElement.getBoundingClientRect();
        const k = (parseFloat(el.dataset.parallax) || .08) * .5;
        el.style.transform = `translate3d(0,${(r.top + r.height / 2 - innerHeight / 2) * -k}px,0)`;
      });
      requestAnimationFrame(run);
    };
    requestAnimationFrame(run);
  }

  // Testimonios
  document.querySelectorAll('[data-quotes]').forEach(box => {
    const slides = [...box.querySelectorAll('.q-slide')], count = box.querySelector('.count');
    let cur = 0, timer;
    const show = i => {
      slides[cur].classList.remove('on'); cur = (i + slides.length) % slides.length; slides[cur].classList.add('on');
      if (count) count.textContent = `${cur + 1} / ${slides.length}`;
    };
    const restart = () => { clearInterval(timer); timer = setInterval(() => show(cur + 1), 11000); };
    box.querySelector('.prev')?.addEventListener('click', () => { show(cur - 1); restart(); });
    box.querySelector('.next')?.addEventListener('click', () => { show(cur + 1); restart(); });
    show(0); restart();
  });


  // Almacenamiento local seguro (modo privado puede fallar)
  const store = {
    get: k => { try { return localStorage.getItem(k); } catch (e) { return null; } },
    set: (k, v) => { try { localStorage.setItem(k, v); } catch (e) {} },
    sget: k => { try { return sessionStorage.getItem(k); } catch (e) { return null; } },
    sset: (k, v) => { try { sessionStorage.setItem(k, v); } catch (e) {} },
  };

  // Aviso de cookies (LOPDP)
  const ck = document.querySelector('.cookies');
  const showCookies = () => { ck.hidden = false; };
  if (ck && !store.get('mentis-cookies')) showCookies();
  ck?.querySelectorAll('[data-cookies]').forEach(b => b.addEventListener('click', () => { store.set('mentis-cookies', b.dataset.cookies); ck.hidden = true; }));
  document.querySelectorAll('[data-cookies-open]').forEach(a => a.addEventListener('click', e => { e.preventDefault(); showCookies(); }));

  // Aviso "Empieza hoy" al bajar el 45 % de la página (una vez por visita)
  const nudge = document.querySelector('.nudge');
  if (nudge && !document.querySelector('[data-wizard]') && !store.sget('mentis-nudge')) {
    const onScroll = () => {
      const p = scrollY / (document.documentElement.scrollHeight - innerHeight);
      if (p > .45 && ck.hidden) {
        nudge.hidden = false; requestAnimationFrame(() => nudge.classList.add('show'));
        removeEventListener('scroll', onScroll);
      }
    };
    addEventListener('scroll', onScroll, { passive: true });
    nudge.querySelector('.nudge-x').addEventListener('click', () => { nudge.classList.remove('show'); store.sset('mentis-nudge', '1'); setTimeout(() => nudge.hidden = true, 500); });
    nudge.querySelector('.btn').addEventListener('click', () => store.sset('mentis-nudge', '1'));
  }

  // Formulario guiado "Empieza aquí"
  const wz = document.querySelector('[data-wizard]');
  if (wz) {
    const steps = [...wz.querySelectorAll('.wz-step')], bar = wz.querySelector('.wz-bar i');
    const back = wz.querySelector('.wz-back'), next = wz.querySelector('.wz-next');
    const PROS = window.MENTIS_PROS || {};
    let cur = 0;
    const val = n => [...wz.querySelectorAll(`[name="${n}"]:checked`)].map(i => i.value);
    const valid = () => cur === 0 ? val('quien').length : cur === 1 ? val('motivo').length : cur === 2 ? val('sede').length : true;
    const recommend = () => {
      const q = val('quien')[0], m = val('motivo');
      if (q === 'hijo') return m.includes('Aprendizaje o colegio') ? ['allison-garrido', 'pamela-villegas'] : ['pamela-villegas', 'allison-garrido'];
      if (q === 'pareja') return ['cristina-munoz'];
      if (q === 'familia') return ['cristina-munoz', 'pamela-villegas'];
      if (m.includes('Orientación vocacional')) return ['pamela-villegas', 'cristina-munoz'];
      if (m.includes('Ansiedad o estrés')) return ['francisco-vasquez', 'cristina-munoz', 'jacobo-recalde'];
      return ['cristina-munoz', 'jacobo-recalde', 'francisco-vasquez'];
    };
    const LBL = { yo: 'para mí', hijo: 'para mi hijo o hija', pareja: 'para mi pareja y yo', familia: 'para mi familia' };
    const finish = () => {
      const recs = recommend();
      wz.querySelector('.wz-pros').innerHTML = recs.map(k => { const p = PROS[k]; return `<div class="wz-pro"><span class="av">${p.photo ? `<img src="img/${p.photo}.webp" alt="">` : p.ini}</span><span><b>${p.name}</b><small>${p.role}</small></span></div>`; }).join('');
      const nombre = wz.querySelector('[name="nombre"]').value.trim();
      const sede = val('sede')[0], motivos = val('motivo').join(', ').toLowerCase();
      wz.querySelector('.wz-sum').textContent = `Terapia ${LBL[val('quien')[0]]} · ${val('motivo').join(', ')} · ${sede}`;
      const msg = `Hola, Mentis${nombre ? `, soy ${nombre}` : ''}. Me gustaría agendar una primera cita ${LBL[val('quien')[0]]} (${sede}). Motivo: ${motivos}. Me recomendaron conversar con ${recs.map(k => PROS[k].name).join(' o ')}.`;
      // Número de WhatsApp de cada sede por confirmar: sin número, WhatsApp deja elegir el chat
      wz.querySelector('.wz-send').href = 'https://wa.me/?text=' + encodeURIComponent(msg);
    };
    const go = i => {
      steps[cur].classList.remove('on'); cur = i; steps[cur].classList.add('on');
      bar.style.width = Math.min(100, (cur + 1) * 33.4) + '%';
      back.disabled = cur === 0;
      next.hidden = cur === 3;
      if (cur === 3) finish();
      next.disabled = !valid();
      wz.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' });
    };
    wz.addEventListener('change', e => {
      next.disabled = !valid();
      // en preguntas de una sola respuesta avanza solo
      if (e.target.type === 'radio' && cur < 2) setTimeout(() => go(cur + 1), 280);
    });
    next.addEventListener('click', () => valid() && go(cur + 1));
    back.addEventListener('click', () => cur > 0 && go(cur - 1));
    back.disabled = true; next.disabled = true;
  }

  // Selector de paleta (A/B/C) para la presentación al cliente
  const picks = [...document.querySelectorAll('[data-theme-set]')];
  const setTheme = t => {
    if (t === 'a') delete root.dataset.theme; else root.dataset.theme = t;
    picks.forEach(b => b.setAttribute('aria-pressed', b.dataset.themeSet === t));
    store.set('mentis-paleta', t);
  };
  picks.forEach(b => b.addEventListener('click', () => setTheme(b.dataset.themeSet)));
  setTheme(root.dataset.theme || 'a');

  // Año del pie
  document.querySelectorAll('[data-year]').forEach(e => e.textContent = new Date().getFullYear());
})();
