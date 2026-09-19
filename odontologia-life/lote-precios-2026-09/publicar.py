#!/usr/bin/env python3
"""OLIFE — lote de precios (sep 2026). 2 posts de gaps verificados con Search Console:
precio de corona dental y precio de reemplazar un solo diente. Ambas consultas las cachaba
por accidente el post de implantes (pos 9-12); estos posts dedicados las capturan y descargan
ese post. Precios como rangos referenciales; el valor exacto, por WhatsApp (no se inventan).
Cat: 9 rehabilitacion-oral-estetica.
"""
import urllib.request, base64, json, time, os, re
ENV=os.path.join(os.path.dirname(os.path.abspath(__file__)),"..","..",".env")
env={}
for l in open(ENV):
    l=l.strip()
    if l.startswith("OLIFE_") and "=" in l: k,v=l.split("=",1); env[k]=v
AUTH=base64.b64encode(f"{env['OLIFE_WP_USER']}:{env['OLIFE_WP_APP_PASS']}".encode()).decode()
Hg={"Authorization":f"Basic {AUTH}","User-Agent":"Mozilla/5.0 Chrome/120"}
Hp={**Hg,"Content-Type":"application/json"}
API=env["OLIFE_WP_BASE"]
WA="https://api.whatsapp.com/send?phone=593984582733&text=Hola%2C%20quiero%20saber%20el%20precio%20de%20mi%20caso%20y%20agendar%20una%20valoraci%C3%B3n."

# URLs internas reales (verificadas)
L_IMP_COSTO="https://www.odontologialife.com/implantologia/cuanto-cuesta-implante-dental-ecuador/"
L_IMP_PUENTE="https://www.odontologialife.com/implantologia/implante-dental-vs-puente-fijo/"
L_CORONA_MAT="https://www.odontologialife.com/rehabilitacion-oral-estetica/corona-dental-cuando-materiales/"
L_PROT_FR="https://www.odontologialife.com/rehabilitacion-oral-estetica/protesis-fija-vs-removible-cual-conviene/"
L_ENDO="https://www.odontologialife.com/endodoncia/endodoncia-ecuador-guia-tratamiento-conducto/"
L_CORONA_PRECIO="https://www.odontologialife.com/rehabilitacion-oral-estetica/cuanto-cuesta-corona-dental-ecuador/"

def P(t): return f"<!-- wp:paragraph -->\n<p>{t}</p>\n<!-- /wp:paragraph -->"
def H2(t): return f'<!-- wp:heading -->\n<h2 class="wp-block-heading">{t}</h2>\n<!-- /wp:heading -->'
def Q(t): return f'<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>{t}</p></blockquote>\n<!-- /wp:quote -->'
def UL(items):
    lis="".join(f"<!-- wp:list-item -->\n<li>{i}</li>\n<!-- /wp:list-item -->\n" for i in items)
    return f'<!-- wp:list -->\n<ul class="wp-block-list">\n{lis}</ul>\n<!-- /wp:list -->'
def TB(h,rows):
    th="".join(f"<th>{x}</th>" for x in h)
    tr="".join("<tr>"+"".join(f"<td>{c}</td>" for c in r)+"</tr>" for r in rows)
    return f'<!-- wp:table {{"className":"is-style-stripes"}} -->\n<figure class="wp-block-table is-style-stripes"><table><thead><tr>{th}</tr></thead><tbody>{tr}</tbody></table></figure>\n<!-- /wp:table -->'
def CTA():
    return ('\n<!-- olife-cta-wa -->\n'
      + H2("¿Quieres saber el precio de tu caso?")
      + "\n" + P("El valor exacto depende de tu diagnóstico, no de un listado general. Escríbenos por WhatsApp, cuéntanos tu caso y agenda tu valoración en <strong>Odontología Life, Otavalo</strong>. Te respondemos rápido.")
      + f'\n<!-- wp:buttons -->\n<div class="wp-block-buttons"><!-- wp:button {{"backgroundColor":"vivid-green-cyan"}} -->\n<div class="wp-block-button"><a class="wp-block-button__link has-vivid-green-cyan-background-color has-background wp-element-button" href="{WA}">Escribir por WhatsApp</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->')

POSTS=[]
def add(cat,slug,title,meta,fkw,excerpt,blocks):
    POSTS.append(dict(cat=cat,slug=slug,title=title,meta=meta,fkw=fkw,excerpt=excerpt,
                      content="\n\n".join(blocks)+"\n"+CTA()))

# 1. Precio de corona dental
add(9,"cuanto-cuesta-corona-dental-ecuador","¿Cuánto cuesta una corona dental en Ecuador? Precios 2026",
    "Precio de una corona dental en Ecuador según el material: metal-porcelana, zirconio o cerámica pura. Qué incluye el valor y cuándo conviene ponerla.",
    "cuanto cuesta una corona dental ecuador",
    "Cuánto cuesta una corona dental en Ecuador según el material, qué incluye el precio y cuándo conviene ponerla.",
    [
    P("Una corona dental cuesta en Ecuador <strong>entre $150 y $600</strong>, y esa distancia la explica casi por completo el material. Una corona es una funda que cubre por completo un diente dañado o muy reconstruido para devolverle forma, fuerza y estética. Cuando el dentista te dice que un diente «necesita corona» y no basta una calza, es porque le queda poca estructura sana para aguantar la mordida."),
    P("Aquí tienes el desglose de precios por tipo de corona, qué incluye el valor y en qué casos conviene, para que llegues a la consulta sabiendo de qué se habla."),
    H2("Precios 2026: cuánto cuesta cada tipo de corona"),
    TB(["Tipo de corona","Precio referencial","Para qué se usa"],
       [["Metal-porcelana","$150 – $300","La clásica: resistente y económica. El borde puede verse gris con los años."],
        ["Zirconio","$300 – $500","Muy resistente y estética; ideal para muelas y dientes visibles."],
        ["Cerámica pura (tipo e.max)","$350 – $600","La más estética; primera opción para dientes frontales."],
        ["Provisional","$40 – $80","Protege el diente mientras se fabrica la definitiva."]]),
    P(f"Estos rangos corresponden al mercado ecuatoriano. El valor exacto depende del material, del laboratorio y de si el diente necesita pasos previos. Si la corona va sobre un implante, el costo se suma al del <a href=\"{L_IMP_COSTO}\">implante dental</a>; si va sobre un diente natural muy dañado, a veces primero hace falta una <a href=\"{L_ENDO}\">endodoncia</a>."),
    H2("Qué incluye el precio y qué se cobra aparte"),
    UL(["El tallado del diente y la toma de medidas (impresión o escaneo).","La fabricación de la corona en el laboratorio.","La corona provisional mientras esperas la definitiva.","La colocación y el ajuste de la mordida."]),
    P("Lo que suele cotizarse por separado es el trabajo previo que necesita el diente: una endodoncia, un perno para reforzarlo o el tratamiento de una encía inflamada. Por eso dos presupuestos de corona pueden verse muy distintos: uno incluye solo la funda y el otro, todo lo que hay que hacer antes para que dure."),
    Q("La corona no es lo caro; lo caro es rehacerla. Una corona bien ajustada, sobre un diente bien tratado, dura muchos años. Una puesta con prisa sobre un diente enfermo se despega o se infecta por debajo."),
    H2("Por qué el mismo diente puede costar $150 o $500"),
    P("El material manda: una metal-porcelana en una muela que casi no se ve no necesita el mismo acabado que una cerámica pura en un diente frontal. También pesa el estado del diente: si llega sano y solo desgastado, es una corona directa; si necesita endodoncia y perno, el presupuesto crece. Y el laboratorio: un trabajo de precisión con buen ceramista cuesta más, y se nota en cómo calza y cómo se ve."),
    H2("Corona, carilla o incrustación: no confundir"),
    P(f"No todo diente dañado necesita corona. Si el problema es estético y el diente está sano, una carilla puede bastar; si la fractura es parcial, a veces alcanza una incrustación. La corona se reserva para cuando el diente perdió mucha estructura y hay que protegerlo por completo. Un buen diagnóstico evita pagar una corona donde bastaba algo menor: para elegir bien vale la pena leer sobre <a href=\"{L_CORONA_MAT}\">cuándo y con qué material se pone una corona</a>."),
    H2("Cuándo NO conviene apurarse con una corona"),
    P("Si la encía alrededor del diente está inflamada o hay caries activa, primero se trata eso: cementar una corona sobre un diente enfermo esconde el problema y termina en una infección por debajo, difícil de ver hasta que duele. Y si el diente ya no tiene raíz aprovechable, la corona sola no sirve; ahí la conversación es otra, entre un <a href=\"{L_IMP_PUENTE}\">implante o un puente fijo</a>."),
    H2("¿Y en Otavalo? El precio frente a Quito"),
    P("Los rangos nacionales aplican igual en Imbabura. La diferencia práctica es el traslado: una corona pide al menos dos visitas (tallado y colocación), más los controles. Para pacientes de Otavalo, Cotacachi o Atuntaqui, resolverlo cerca ahorra varias idas a Quito por la Panamericana, sin pagar de más por el mismo trabajo."),
    H2("Cómo es el proceso de ponerse una corona"),
    P("Ponerse una corona toma normalmente dos citas. En la primera se prepara el diente: se talla para dejar espacio a la funda, se toma una impresión o un escaneo y se coloca una corona provisional para que no quedes con el diente descubierto. Con esas medidas, el laboratorio fabrica la corona a tu medida en unos días."),
    P("En la segunda cita se retira la provisional, se prueba la definitiva y se ajusta la mordida hasta que sientas que cierras natural, sin que el diente choque antes que los demás. Recién ahí se cementa. Ese ajuste fino es lo que separa una corona cómoda de una que molesta al comer, así que no conviene apurar el último paso."),
    H2("Cómo cuidar la corona para que dure años"),
    P("Una corona no se pica, pero el diente natural que tiene debajo sí, y la encía alrededor puede inflamarse. Por eso se cuida como un diente propio: cepillado, hilo dental o cepillos interdentales alrededor del borde, y controles periódicos. La mayoría de coronas que fallan no lo hacen por el material, sino por una caries que avanzó por debajo sin que nadie la revisara a tiempo."),
    P("Si además rechinas los dientes, conviene contarlo: la fuerza del bruxismo puede fisurar hasta el zirconio, y una férula de descanso protege la corona y el resto de tu dentadura. Cuidada así, una corona bien hecha acompaña muchos años sin sobresaltos."),
    H2("Preguntas frecuentes"),
    P("<strong>¿Cuánto dura una corona dental?</strong><br>Con buena higiene y controles, muchos años. La de zirconio y la cerámica pura son las más duraderas y estéticas."),
    P("<strong>¿Duele ponerse una corona?</strong><br>El tallado se hace con anestesia y no duele. Puede haber sensibilidad pasajera mientras usas la provisional."),
    P("<strong>¿La corona se ve natural?</strong><br>La cerámica pura y el zirconio imitan muy bien el diente natural; la metal-porcelana puede mostrar un borde gris con el tiempo."),
    P("<strong>¿El seguro cubre la corona?</strong><br>Depende de la póliza. Si es por una fractura o caries suele considerarse, no así cuando es puramente estética. Confírmalo antes."),
    ])

# 2. Precio de reemplazar un solo diente
add(9,"cuanto-cuesta-reemplazar-un-diente-ecuador","¿Cuánto cuesta reemplazar un diente en Ecuador? Precios 2026",
    "Cuánto cuesta reemplazar un diente en Ecuador con implante, puente fijo o prótesis removible: precios referenciales y cuál conviene según tu caso.",
    "cuanto cuesta una protesis dental de un solo diente",
    "Precio de reemplazar un solo diente en Ecuador con implante, puente o prótesis removible, y cómo elegir la opción que te conviene.",
    [
    P("Reemplazar un solo diente cuesta en Ecuador <strong>desde unos $80 con una prótesis removible y hasta $650–$1.200 con un implante</strong>, según la opción que elijas. Las tres soluciones cierran el hueco, pero cambian mucho en comodidad, duración y precio, y la más barata hoy no siempre es la más económica a los cinco años."),
    P("Aquí tienes las tres formas de reemplazar un diente, cuánto cuesta cada una y en qué caso conviene, para que decidas con números claros."),
    H2("Precios 2026: las tres formas de reemplazar un diente"),
    TB(["Opción","Precio referencial","Cómo es"],
       [["Prótesis removible de un diente","$80 – $200","Se quita para limpiar. La más económica y rápida, pero se mueve y es un recurso temporal."],
        ["Puente fijo (3 piezas)","$450 – $900","Fijo; se apoya tallando los dos dientes vecinos, que deben estar sanos."],
        ["Implante + corona","$650 – $1.200","Fijo y definitivo; reemplaza la raíz sin tocar los dientes de al lado."]]),
    P(f"Estos rangos corresponden al mercado ecuatoriano. El valor exacto depende del estado del hueso, de los dientes vecinos y del material de la corona. Si te inclinas por el implante, el <a href=\"{L_IMP_COSTO}\">costo del implante dental</a> detalla de qué depende; si dudas entre implante y puente, esta <a href=\"{L_IMP_PUENTE}\">comparación entre implante y puente fijo</a> lo explica a fondo."),
    H2("Cuál conviene según tu caso"),
    UL(["<strong>Dientes vecinos sanos y quieres no tocarlos:</strong> el implante es la opción que respeta el resto de tu boca.","<strong>Los dientes vecinos ya tienen coronas o están dañados:</strong> el puente aprovecha ese trabajo y sale más rápido.","<strong>Presupuesto ajustado o solución temporal:</strong> la removible de un diente resuelve mientras juntas para algo fijo.","<strong>Falta hueso donde iría el implante:</strong> primero se evalúa un injerto; el plan se define después."]),
    Q("La pregunta correcta no es cuál es más barato hoy, sino cuánto cuesta cada opción por año de uso. Un implante bien hecho puede durar décadas; una removible temporal se cambia varias veces en ese mismo tiempo."),
    H2("El costo por año: la cuenta que casi nadie hace"),
    P("Una prótesis removible de $150 que se reemplaza cada pocos años termina sumando más de lo que parece, además de la incomodidad diaria de que se mueva. Un implante de $900 que dura quince o veinte años sale, por año de uso, más barato que ir renovando soluciones temporales. Cuando se mide así, la opción «cara» a veces es la que menos cuesta a largo plazo."),
    P(f"Eso no significa que el implante sea siempre lo indicado: si los dientes vecinos ya están comprometidos, un puente puede ser lo más sensato. Y si lo que necesitas es reemplazar varias piezas y no una sola, conviene mirar el panorama completo entre <a href=\"{L_PROT_FR}\">prótesis fija y removible</a>."),
    H2("Qué encarece o abarata el reemplazo"),
    UL(["<strong>Estado del hueso:</strong> si falta hueso para el implante, un injerto suma costo y tiempo.","<strong>Los dientes vecinos:</strong> para un puente deben estar sanos; si necesitan tratamiento, el presupuesto crece.","<strong>El material de la corona:</strong> zirconio o cerámica pura cuestan más que metal-porcelana.","<strong>Pasos previos:</strong> una extracción, una limpieza o tratar una encía inflamada se cotizan aparte."]),
    H2("Cuándo NO decidir solo por el precio"),
    P("Elegir la removible solo porque es la más barata, cuando tu caso pedía algo fijo, termina en incomodidad diaria y en gastar de a poco lo que habría costado la solución definitiva. Y poner un puente tallando dos dientes sanos, pudiendo hacer un implante, sacrifica estructura buena para ahorrar en el momento. La valoración es la que evita los dos errores: se mide el hueco, el hueso y los vecinos antes de recomendar."),
    H2("¿Y en Otavalo? Resolverlo cerca"),
    P("Los rangos aplican igual en toda la sierra norte. La diferencia está en el número de visitas: un implante pide varias citas espaciadas en meses, y para pacientes de Otavalo, Cotacachi o Ibarra hacerlas cerca evita viajes largos a Quito. Al mismo precio de mercado, resolverlo en Imbabura ahorra tiempo y pasajes sin bajar la calidad del trabajo."),
    H2("Qué pasa si dejas el hueco sin reemplazar"),
    P("Un diente que falta no es solo un tema estético. Con el tiempo, los dientes vecinos tienden a inclinarse hacia el espacio vacío y el de la arcada opuesta puede empezar a bajar o subir buscando contacto. Eso descuadra la mordida y complica cualquier tratamiento futuro, que termina siendo más largo y más caro que si se hubiera reemplazado a tiempo."),
    P("Además, el hueso de la zona donde estaba la raíz empieza a reabsorberse cuando deja de recibir estímulo. Por eso reemplazar el diente pronto hace más que devolver la función: conserva las condiciones para elegir la mejor solución. Mientras más se espera, más suele estrecharse el abanico de opciones."),
    H2("Cuánto tarda cada opción"),
    TB(["Opción","Tiempo aproximado","Citas"],
       [["Prótesis removible de un diente","1 a 3 semanas","Pocas"],
        ["Puente fijo","2 a 4 semanas","Varias, seguidas"],
        ["Implante + corona","3 a 6 meses","Espaciadas mientras integra el hueso"]]),
    P("El implante es el que más tarda porque el hueso necesita meses para integrar el tornillo antes de cargar la corona. Ese tiempo de espera no es tiempo perdido: es lo que hace que el resultado aguante décadas. Si necesitas cubrir el hueco mientras tanto, se puede usar una provisional durante el proceso."),
    H2("Preguntas frecuentes"),
    P("<strong>¿Cuál es la forma más barata de reemplazar un diente?</strong><br>La prótesis removible de un diente, desde unos $80. Es económica pero temporal: se mueve y hay que reemplazarla."),
    P("<strong>¿El implante es siempre mejor que el puente?</strong><br>Respeta los dientes vecinos y dura más, pero necesita hueso suficiente. Si los vecinos ya están dañados, el puente puede convenir."),
    P("<strong>¿Cuánto tarda todo el proceso?</strong><br>La removible, pocas semanas; el puente, algunas visitas; el implante, varios meses mientras el hueso integra el tornillo."),
    P("<strong>¿Puedo empezar con algo económico y luego poner implante?</strong><br>Sí, muchos usan una removible temporal mientras planifican el implante. Conviene conversarlo desde el inicio para cuidar el hueso."),
    ])

def existing():
    got=set()
    for st in ("publish","future","draft","pending","private"):
        page=1
        while True:
            try:
                arr=json.loads(urllib.request.urlopen(urllib.request.Request(f"{API}/posts?per_page=100&page={page}&status={st}&_fields=slug",headers=Hg),timeout=30).read())
            except Exception: break
            if not arr: break
            got|={a['slug'] for a in arr}
            if len(arr)<100: break
            page+=1
    return got

def run():
    have=existing()
    for post in POSTS:
        if post['slug'] in have:
            print(f"  [YA] {post['slug']}"); continue
        w=len(re.findall(r'\w+',re.sub(r'<[^>]+>',' ',post['content'])))
        body={"slug":post['slug'],"title":post['title'],"status":"publish","content":post['content'],
              "excerpt":post['excerpt'],"categories":[post['cat']],
              "meta":{"_yoast_wpseo_title":post['title'][:60],"_yoast_wpseo_metadesc":post['meta'],"_yoast_wpseo_focuskw":post['fkw']}}
        try:
            r=urllib.request.urlopen(urllib.request.Request(f"{API}/posts",data=json.dumps(body).encode(),headers=Hp,method='POST'),timeout=45)
            d=json.loads(r.read()); print(f"  [OK] id={d['id']} {post['slug']} · {w} pal · {r.status}")
            time.sleep(6)
        except Exception as e:
            print(f"  [ERR] {post['slug']}: {str(e)[:130]}"); time.sleep(15)

if __name__=="__main__": run()
