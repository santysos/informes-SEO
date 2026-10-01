#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Lote N — 1 post: llantas de un auto usado.

Reemplaza a «Maxus T60 vs Changan Hunter», que canibalizaba el post publicado de la
Maxus. Las llantas no tienen post propio en el sitio y aparecen en el cluster «qué
revisar en un auto usado», que suma cientos de impresiones en posiciones 13 a 35.

Sin precios de llantas ni normas legales con cifra: el 1,6 mm se presenta como
referencia habitual y se remite a la revisión técnica de la zona.
"""
from comun import (CAT, CHECKLIST, CITA, FECHAS, REVISION_TECNICA, SITE, cierre,
                   guarda, link)

CHOCADO = f"{SITE}/guias-de-compra/como-saber-si-un-auto-fue-chocado/"

llantas = {
    "title": "Llantas de un auto usado: cómo saber si hay que cambiarlas",
    "slug": "llantas-auto-usado-cuando-cambiarlas",
    "date": FECHAS[11],
    "cat": CAT["guias"],
    "tags": ["llantas auto usado", "fecha de fabricación llanta", "desgaste de llantas",
             "revisar auto usado", "mantenimiento auto Ibarra"],
    "excerpt": "Las llantas cuentan más del auto de lo que parece: su edad, cómo lo "
               "manejaron y si la suspensión está bien. Cómo leerlas antes de comprar y "
               "cuánto restarle al precio si hay que cambiarlas.",
    "yoast_title": "Llantas de un auto usado: cuándo hay que cambiarlas",
    "yoast_desc": "Fecha de fabricación, profundidad del labrado y desgaste disparejo: "
                  "lo que dicen las llantas de un usado y cómo usarlo para negociar el precio.",
    "focus_kw": "llantas auto usado",
    "bloques": [
        "Casi todos los compradores miran las llantas de un auto usado, pero la mayoría "
        "solo se fija en si tienen labrado. Es la mitad de la información. Una llanta con "
        "buen labrado puede tener ocho años, estar cuarteada por el sol y no servir para "
        "un viaje por la Panamericana.",

        "Las llantas además son un informe gratuito del auto: el tipo de desgaste dice si "
        "la alineación está bien, si la suspensión trabaja como debe y hasta cómo se "
        "manejó. Esta guía le explica cómo leerlas en cinco minutos, sin herramientas.",

        {"h2": "La respuesta corta: tres cosas deciden si sirven"},

        "Una llanta de un auto usado está bien si pasa estos tres filtros. Si falla en "
        "uno, hay que cambiarla aunque se vea entera.",

        {"tabla": [
            ["Qué revisar", "Cómo se mira", "Cuándo hay que cambiarla"],
            ["Edad", "Los cuatro últimos números del código DOT en el costado",
             "Desde los cinco o seis años, revisarla a fondo; con grietas, cambiarla"],
            ["Labrado", "Indicador de desgaste dentro de las ranuras",
             "Cuando el labrado llega al indicador (cerca de 1,6 mm)"],
            ["Desgaste", "Comparar el centro con los bordes y una llanta con otra",
             "Si es disparejo, primero corregir la causa y después cambiarla"],
        ]},

        "El orden importa. La edad se revisa primero porque es lo que más se pasa por "
        "alto, y una llanta vieja con labrado nuevo es justamente la que engaña.",

        {"h2": "Cómo leer la fecha de fabricación"},

        "En el costado de cada llanta hay un código que empieza con las letras DOT. Los "
        "cuatro últimos números son la fecha: los dos primeros son la semana y los dos "
        "últimos el año. Un código que termina en 2321 indica que se fabricó en la semana "
        "23 de 2021.",

        "Ese número sirve para dos cosas. La primera es saber la edad real del caucho, que "
        "envejece aunque el auto no se use. La segunda es comparar: si el auto es de 2022 "
        "y las cuatro llantas son de 2021, probablemente son las originales. Si una sola "
        "tiene otra fecha, se cambió por algo, y vale la pena preguntar por qué.",

        "Muchos fabricantes recomiendan una revisión profesional desde los cinco o seis "
        "años y no pasar de los diez, aunque el labrado esté bien. En la Sierra el "
        "plazo práctico suele ser menor: el sol de altura en Ibarra o Tulcán reseca el "
        "caucho más rápido que en la Costa.",

        {"h2": "El labrado: la prueba de la moneda y el indicador"},

        "Dentro de las ranuras principales hay pequeños puentes de caucho, más bajos que "
        "el resto del labrado. Son los indicadores de desgaste. Cuando la superficie de "
        "la llanta queda al nivel de esos puentes, llegó al límite.",

        "Ese límite ronda los 1,6 milímetros, que es la referencia que usan la mayoría de "
        f"normas. Si va a pasar la {link(REVISION_TECNICA, 'revisión técnica vehicular')}, "
        "confirme el criterio que aplican en su cantón, porque una llanta lisa es motivo "
        "de rechazo.",

        "Un detalle que pocos consideran: con lluvia, una llanta con poco labrado pierde "
        "agarre mucho antes de llegar al límite. Si suele manejar por la vía a Otavalo en "
        "las tardes de aguacero o bajar al valle del Chota, conviene cambiarlas con algo "
        "de margen y no apurarlas hasta el último milímetro.",

        {"h2": "Lo que el desgaste disparejo le dice del auto"},

        "Esta es la parte más útil para un comprador, porque el desgaste revela problemas "
        "que no se ven en una vuelta corta.",

        {"tabla": [
            ["Patrón de desgaste", "Causa probable", "Qué hacer antes de comprar"],
            ["Gastada en el centro", "Presión de aire alta de forma habitual",
             "Poco grave; corregir la presión"],
            ["Gastada en los dos bordes", "Presión baja de forma habitual",
             "Revisar si hay una fuga lenta"],
            ["Gastada en un solo borde", "Alineación desajustada",
             "Pedir alineación; si persiste, revisar la suspensión"],
            ["Ondas o parches a lo largo", "Amortiguadores cansados o rueda desbalanceada",
             "Revisar amortiguadores en el elevador"],
            ["Dos llantas de un lado distintas al otro", "Posible golpe fuerte",
             "Revisar la estructura del auto"],
        ]},

        f"El último caso merece atención. Un desgaste muy distinto entre los dos lados "
        f"puede venir de un golpe que movió la geometría del auto. Las señales para "
        f"confirmarlo están en {link(CHOCADO, 'cómo saber si un auto fue chocado')}.",

        {"quote": "Las llantas son lo último que la gente pregunta y de lo primero que "
                  "conviene mirar. Un desgaste en un solo borde casi nunca es problema de la "
                  "llanta: es la alineación o la suspensión avisando.",
         "cite": CITA},

        {"h2": "Revisión de llantas en cinco minutos, paso a paso"},

        {"ol": [
            "Con el auto estacionado en plano, gire el volante hacia un lado para ver "
            "completa la banda de las llantas delanteras.",
            "Lea el código DOT de las cuatro llantas y anote los años.",
            "Pase la mano por la banda, de adentro hacia afuera: si nota escalones o "
            "filos, hay desgaste disparejo.",
            "Busque grietas finas en el costado y entre los bloques del labrado.",
            "Revise que no haya bultos ni cortes en el costado: una burbuja significa "
            "que la estructura interna se rompió y la llanta no se repara.",
            "Abra la cajuela y revise la de repuesto: muchas veces está vencida o sin aire.",
            "En la prueba de manejo, fíjese si el auto tira hacia un lado o vibra entre "
            "los 80 y los 100 km/h.",
        ]},

        f"Este repaso es un punto dentro del {link(CHECKLIST, 'checklist completo para revisar un auto usado')}, "
        "pero vale hacerlo aparte porque es el que más se usa para negociar.",

        {"h2": "Cómo usar las llantas para negociar el precio"},

        "Si las cuatro llantas hay que cambiarlas, es un gasto que va a hacer apenas "
        "compre el auto. Es razonable pedir que el vendedor lo asuma o que lo descuente. "
        "Para hacerlo bien:",

        {"ul": [
            "<strong>Cotice antes de negociar.</strong> Pregunte en una llantera de Ibarra "
            "el valor del juego de cuatro en la medida exacta, que está impresa en el "
            "costado. Con una cifra real la conversación es otra.",
            "<strong>Separe lo urgente de lo próximo.</strong> Una llanta con burbuja es "
            "urgente. Unas llantas al 40 % de vida son un gasto de dentro de un año, y se "
            "negocia distinto.",
            "<strong>Sume la causa además del síntoma.</strong> Si hay desgaste en un "
            "borde, al precio de las llantas súmele la alineación y una revisión de "
            "suspensión; cambiar llantas sin corregir eso es tirar el dinero.",
        ]},

        {"h2": "Cuándo las llantas no deberían pesar en su decisión"},

        "Las llantas son un consumible. Si el auto está bien en motor, caja, estructura y "
        "papeles, unas llantas gastadas no son razón para descartarlo: son un costo "
        "conocido que se resuelve en una mañana.",

        "Lo que sí debería frenarlo es un desgaste disparejo que el vendedor no sabe "
        "explicar, en un auto que además tira hacia un lado. Ahí las llantas no son el "
        "problema, son la pista.",

        {"h2": "La regla para quedarse tranquilo"},

        "Antes de pagar, anote la fecha DOT de las cinco llantas, contando la de "
        "repuesto, y el tipo de desgaste de cada una. Con esos dos datos sabe cuánto "
        "va a gastar en los primeros meses y si el auto esconde un problema de "
        "alineación o de suspensión. Son cinco minutos que valen más que cualquier "
        "promesa del vendedor.",

        {"faq": [
            ("¿Cada cuánto se cambian las llantas de un auto?",
             "Depende del uso más que del tiempo. Se cambian cuando el labrado llega al "
             "indicador de desgaste, cuando tienen grietas o bultos, o cuando superan la "
             "edad que recomienda el fabricante, aunque se vean bien."),
            ("¿Dónde veo la fecha de fabricación de una llanta?",
             "En el costado, en el código que empieza con DOT. Los cuatro últimos números "
             "son la semana y el año: 1822 significa semana 18 de 2022."),
            ("¿Es malo que un auto usado tenga llantas de marcas distintas?",
             "No es grave en sí, pero en el mismo eje deberían ser iguales en medida y "
             "tipo. Si una es distinta, pregunte por qué se cambió: puede ser un pinchazo "
             "o un golpe."),
            ("¿Las llantas viejas pasan la revisión técnica?",
             "Una llanta lisa, con cortes o con bultos es motivo de rechazo. Confirme el "
             "criterio en la revisión técnica de su cantón antes de presentarse."),
            ("¿Conviene cambiar solo dos llantas?",
             "Se puede, y las nuevas suelen ir atrás para mantener la estabilidad. Pero "
             "si el desgaste es disparejo, primero corrija la alineación o la suspensión."),
        ]},

        cierre("Hola, quiero revisar un auto en OKCars y saber el estado de sus llantas.",
               "Si quiere ver una unidad en Ibarra y revisarle las llantas con calma, "
               "escríbanos al"),
    ],
}


if __name__ == "__main__":
    print(guarda(llantas))
