#!/usr/bin/env python3
"""Bloque A (segunda parte) · inglés y portugués.

  4. Manta beaches — el cluster «playas» son 6.155 impresiones con CTR 0,36 %,
     pero en español ya hay dos posts canibalizándose. En inglés no hay ninguno.
  5. Ecuadorian coastal food — «ecuadorian food» y variantes dentro del cluster inglés.
  6. Portugués — «melhores restaurantes perto», 430 impresiones y 0 clics.
"""
from gutenberg import CAT, MENU, MENU_ALMUERZO, BEBIDAS, link, wa, guarda

POSTS = []

# ─────────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Manta Beaches: Which One to Choose and How to Get There",
 "slug": "manta-beaches-which-one-to-choose",
 "date": "2026-09-07T16:00:00",
 "cat": CAT["vida"],
 "tags": ["manta beaches", "manta ecuador", "travel guide", "santa marianita"],
 "focus_kw": "manta beaches ecuador",
 "yoast_title": "Manta Beaches, Ecuador: Which One to Choose",
 "yoast_desc": "Murcielago, Santa Marianita, San Mateo and Los Frailes compared: which Manta beach suits swimming, surfing or quiet, with travel times and costs.",
 "excerpt": "Manta has four beaches worth your time and they are nothing alike. One is for swimming, one for kitesurfing, one for photos and one is worth the drive south.",
 "bloques": [
   "Manta is a port city with beaches rather than a beach town, and the difference shows. The sand nearest the centre is convenient and busy; the good stuff needs a short drive. If you have one afternoon, the choice matters.",
   "Here are the four beaches worth considering, what each is actually for, and how long it takes to reach them.",

   {"h2": "Playa Murciélago — the convenient one"},
   "The city beach, and the only one you can walk to from most hotels. A long crescent of grey-gold sand with a paved promenade, food stalls, sun-loungers for rent and lifeguards on duty at weekends.",
   {"ul": [
     "<strong>Good for:</strong> a swim without planning, sunset walks, eating within fifty metres of the water.",
     "<strong>Not good for:</strong> solitude, clear water, or anything resembling a postcard.",
     "<strong>Getting there:</strong> walking distance from La Quadra and the hotel zone; $2 to $4 by taxi from anywhere in Manta.",
     "<strong>Cost:</strong> free. Loungers and umbrellas $5 to $10 for the day.",
   ]},
   "The water at Murciélago is safe to swim in but rarely clear — this is an active port and the bay carries sediment. Nobody comes here for snorkelling.",

   {"h2": "Santa Marianita — the wind one"},
   "Twenty-five minutes south and a completely different beach: wide, flat, almost empty on weekdays, and windy from June to November with a consistency that has made it one of South America's kitesurfing centres.",
   "If you kite or want to learn, this is the reason to come to Manta rather than anywhere else on the coast. Lessons run $50 to $80 for a couple of hours with equipment. If you do not kite, the same wind that makes it famous will blow sand at you all afternoon — go in the morning or come in the calmer months.",
   {"quote": "People ask which beach is the best and the honest answer is that it depends on the hour. Murcielago in the morning, Santa Marianita if there is wind and you want to watch the kites, San Mateo at five for the photographs. They are all twenty minutes apart.",
    "cite": "Equipo de Luuma Rooftop"},

   {"h2": "San Mateo — the fishing village"},
   "North of the city, fifteen minutes, and the most photogenic of the group. Wooden boats pulled up on the sand, pelicans working the shallows, and a fish landing that happens in the early afternoon when the day boats return.",
   "This is not a swimming beach — the boats and the working port see to that — but it is the one visitors remember. Go around four in the afternoon, when the boats come in and the light gets good.",

   {"h2": "Los Frailes — worth the drive"},
   "An hour and a half south, inside Machalilla National Park, and by common agreement the best beach on mainland Ecuador. White sand, clear water, no buildings at all — the park protects it from development, and the only way in is a walk from the entrance or a short trail over the headland.",
   {"ul": [
     "<strong>Getting there:</strong> 1 h 30 by car via the Ruta del Spondylus, or a tour from Manta at $45 to $70 per person.",
     "<strong>Entry:</strong> the national park charges a small fee and closes in the late afternoon.",
     "<strong>Take with you:</strong> everything. There are no vendors, no restaurant, no shade beyond the tree line.",
     "<strong>Combine with:</strong> Puerto López and the Isla de la Plata boat trip, which leaves from the same stretch of coast.",
   ]},

   {"h2": "The four compared"},
   {"tabla": [["Beach", "From Manta", "Best for", "Swimming"], [
     ["Murciélago", "walkable / 5 min", "Convenience, food, sunset", "Yes"],
     ["Santa Marianita", "25 min", "Kitesurfing, space", "Yes, windy"],
     ["San Mateo", "15 min", "Photography, fishing boats", "No"],
     ["Los Frailes", "1 h 30", "The best sand and water", "Yes"],
   ]]},

   {"h2": "Practical things worth knowing"},
   {"ul": [
     "<strong>The current.</strong> The Pacific here has rip currents, particularly at Santa Marianita. Swim where other people are swimming.",
     "<strong>Sun.</strong> You are on the equator. Overcast days burn people badly because the cloud hides the intensity, not the UV.",
     "<strong>Tides.</strong> They move a long way on this coast. At low tide Murciélago doubles in width; at high tide parts of San Mateo disappear.",
     "<strong>Valuables.</strong> Standard beach rules. Take what you can carry into the water with you.",
     "<strong>Season.</strong> January to April is hot with warmer water; June to September is cooler, greyer and better for whales.",
   ]},

   {"h2": "How to end a beach day"},
   f"Sunset on the Ecuadorian coast lands between 18:15 and 18:40 every day of the year, because the equator does not do seasons. That makes the last part of a beach day easy to plan: come off the sand around five thirty, and be somewhere with a view by quarter to six.",
   f"La Quadra, the restaurant district five minutes from Murciélago, is where the rooftops are. Our own kitchen opens at 11:00 with the {link(MENU_ALMUERZO, 'lunch menu')} — grilled wahoo or albacora with rice and salad at $8,90 — and the {link(MENU, 'full menu')} runs from 16:00. Cocktails go from $8,50 to $13,60.",
   {"faq": [
     ("Which Manta beach is best for children?",
      "Murciélago, without much competition. It is the only one with lifeguards, shallow entry, food nearby and bathrooms. Santa Marianita has too much wind and Los Frailes has no facilities at all."),
     ("Can you swim at Manta beaches year-round?",
      "Yes. Water temperature ranges roughly 22 to 27 degrees between seasons. The cooler months, June to September, are also the grey ones, but the sea stays swimmable."),
     ("Do I need a car?",
      "Not for Murciélago or San Mateo — taxis are $2 to $18 depending on distance. For Los Frailes a car or a tour makes far more sense than a taxi waiting three hours."),
     ("Is there surf?",
      "Not really in Manta itself. Santa Marianita gets wind swell, and the serious surf towns — Montañita, Ayampe, Canoa — are one to three hours away along the coast."),
   ]},
   f'Coming off the beach and want a table for sunset? <a href="{wa("Hi, we are at the beach in Manta and would like a sunset table")}">Message us on WhatsApp</a> with the time and how many of you there are.',
 ]})

# ─────────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Ecuadorian Coastal Food: What to Try in Manabí",
 "slug": "ecuadorian-coastal-food-manabi",
 "date": "2026-09-10T16:00:00",
 "cat": CAT["gastronomia"],
 "tags": ["ecuadorian food", "manabi", "coastal cuisine", "what to eat"],
 "focus_kw": "ecuadorian coastal food",
 "yoast_title": "Ecuadorian Coastal Food: What to Try in Manabi",
 "yoast_desc": "Viche, tonga, corviche, sal prieta and encebollado explained: the dishes that define Manabi province, what they taste like and what they cost.",
 "excerpt": "Manabi is where Ecuadorians agree the best food in the country is cooked. Nine dishes explained — what is in them, what they taste like and what you should pay.",
 "bloques": [
   "Ask an Ecuadorian from anywhere in the country where the best food is and a surprising number will say Manabí, the coastal province where Manta sits. It is one of the few things people from Quito and Guayaquil agree on.",
   "The reason is peanut. Manabí cooking is built on ground peanut, green plantain and whatever came off the boats that morning, and it tastes like nowhere else in South America. Here is what to order and what it actually is.",

   {"h2": "Viche — the dish that defines the province"},
   "A thick soup of fish or seafood in a broth of ground peanut, with green plantain, yuca, corn and peanut dumplings. It is creamy without any dairy in it, savoury, and substantial enough to be a whole meal.",
   "Viche is to Manabí what a chowder is to New England: everyone makes it, everyone's grandmother makes it best, and the argument never ends. Mixed viche with shrimp and fish runs around $9,80. If you eat one thing from this list, make it this.",

   {"h2": "Tonga — lunch in a leaf"},
   "Chicken and rice with peanut sauce, wrapped in a banana leaf and steamed. It originated as the meal field workers carried to the plantation, which is why it travels well and holds heat for hours.",
   "The leaf is not decoration. It perfumes the rice while it steams, and the dish tastes noticeably different cooked any other way.",

   {"h2": "Corviche — the best dollar you will spend"},
   "A fritter of mashed green plantain stuffed with seasoned fish, deep fried until the outside cracks. Street food, $1 to $2, sold from carts and small windows all over Manta.",
   "Order it with sal prieta on top. If you only try one street food in Ecuador, this is a better choice than anything you will be sold in Quito.",

   {"h2": "Sal prieta — the condiment you will take home"},
   "Ground toasted peanut, toasted maize, achiote and cumin, mixed into a coarse powder. It goes on plantain, on fish, on rice, on everything. Every family has a slightly different ratio and every one of them will tell you theirs is correct.",
   "You can buy it in bags at any market for a couple of dollars, and it survives the flight home better than anything else on this list.",

   {"h2": "Encebollado — the national hangover cure"},
   "Tuna, yuca and pickled red onion in a cumin broth, topped with more onion and eaten with plantain chips. Ecuador's most beloved breakfast, and Manta makes a strong claim to the best version because the tuna is landed a few hundred metres away.",
   "Eaten from about seven in the morning. By afternoon the good places have run out.",

   {"h2": "Ceviche — and how it differs from Peru's"},
   "Ecuadorian ceviche is served in its own juice rather than drained, which makes it closer to a cold soup than a salad. Shrimp ceviche is cooked, not raw. It comes with popcorn and toasted maize on the side, both of which go in the bowl.",
   "It is breakfast and mid-morning food on this coast, $6 to $9 at a proper cevichería. Ordering it at nine at night marks you as a visitor.",
   {"quote": "Guests are surprised that we serve viche and tonga upstairs, as if a rooftop should only do imported food. It is the opposite. If you come to Manabi and eat pasta, you wasted the trip.",
    "cite": "Equipo de Luuma Rooftop"},

   {"h2": "The rest of the list"},
   {"ul": [
     "<strong>Bolón de verde.</strong> A ball of mashed green plantain with cheese or pork, fried. Breakfast, about $3.",
     "<strong>Cazuela.</strong> Fish or seafood baked in a clay bowl with plantain and peanut. Close cousin of viche, thicker.",
     "<strong>Guatita.</strong> Tripe in peanut sauce. Divisive, cheap and genuinely good if you are not squeamish.",
     "<strong>Seco de chivo.</strong> Slow-cooked goat with rice. Not coastal originally, but everywhere on this coast now.",
   ]},

   {"h2": "What a meal costs"},
   {"tabla": [["Dish", "Where", "Price"], [
     ["Corviche", "Street cart", "$1 – $2"],
     ["Encebollado", "Market or comedor", "$3 – $5"],
     ["Ceviche", "Cevichería", "$6 – $9"],
     ["Almuerzo (set lunch)", "Local comedor", "$4 – $6"],
     ["Viche", "Restaurant", "$9 – $11"],
     ["Grilled fish, restaurant", "Restaurant", "$8,90 – $13"],
     ["Beef cut, restaurant", "Restaurant", "$17,60 – $21,95"],
   ]]},
   f"Our own kitchen serves the criollo dishes from 11:00 and the {link(MENU, 'evening menu')} from 16:00 — mixed viche is $9,80 and the grilled catch of the day is $8,90 on the {link(MENU_ALMUERZO, 'lunch menu')}.",

   {"h2": "Two rules for eating well here"},
   "First: eat seafood in the morning and meat at night. The fish that arrived at dawn is at its best before noon, and every local eats accordingly.",
   "Second: if a menu is translated into four languages and has photographs, you are in a tourist place and paying for it. The comedores that locals use rarely have a written menu at all — someone tells you what there is.",
   {"faq": [
     ("Is Manabí food spicy?",
      "No. Ecuadorian cooking is savoury rather than hot. Chilli comes separately as ají, a sauce on the table, so you control it."),
     ("Can vegetarians eat well here?",
      "It takes effort. The peanut base of most dishes is vegetarian but they are almost always built around fish or chicken. Menestra with rice, bolón with cheese and salads are the reliable options."),
     ("What should I bring home?",
      "Sal prieta, and cocoa. Ecuador grows some of the best cacao in the world and it costs a fraction of what it does abroad."),
     ("Is street food safe?",
      "Generally yes, at busy carts with high turnover. Corviche and bolón are fried to order, which helps. Avoid anything that has been sitting warm."),
   ]},
   f'Want to try the Manabí dishes with a view of the Pacific? <a href="{wa("Hi, we would like to try the traditional Manabi dishes at Luuma")}">Write to us on WhatsApp</a> and we will save you a table.',
 ]})

# ─────────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Restaurantes em Manta, Equador: guia para brasileiros",
 "slug": "restaurantes-manta-equador-guia-brasileiros",
 "date": "2026-09-13T16:00:00",
 "cat": CAT["gastronomia"],
 "tags": ["manta equador", "restaurantes", "turismo brasil", "guia de viagem"],
 "focus_kw": "restaurantes manta equador",
 "yoast_title": "Restaurantes em Manta, Equador: guia brasileiro",
 "yoast_desc": "O que comer em Manta: ceviche pela manha, viche de amendoim, precos reais em dolar e onde ver o por do sol. Guia pratico para brasileiros no Equador.",
 "excerpt": "Manta é o maior porto de atum da costa do Pacífico sul-americano. Guia prático do que comer, quanto custa em dólar e por que o almoço aqui custa menos que um lanche no Brasil.",
 "bloques": [
   "O Equador usa o dólar americano, o que assusta os brasileiros no primeiro dia e alivia no segundo, quando percebem que um almoço completo custa quatro dólares. Manta, no litoral da província de Manabí, é o maior porto de atum da costa do Pacífico sul-americano — e isso define tudo o que se come aqui.",
   "Este guia é escrito por quem trabalha na cidade. O que segue é o que vale a pena comer, quanto custa de verdade e os horários que ninguém avisa.",

   {"h2": "O horário muda tudo"},
   "A regra mais útil para um brasileiro em Manta: ceviche é comida de manhã. Os pescadores chegam ao amanhecer e o peixe está no seu melhor antes do meio-dia. Os locais comem ceviche entre oito e onze da manhã. À noite, o que se serve já passou o dia inteiro pronto.",
   "O almoço vai das onze às três da tarde e é a melhor relação custo-benefício do país: sopa, prato principal, suco e às vezes sobremesa por quatro a nove dólares. O jantar começa tarde para o padrão brasileiro — ninguém come antes das sete — e as cozinhas fecham por volta das dez.",

   {"h2": "O que pedir"},
   {"ul": [
     "<strong>Viche.</strong> Sopa grossa de peixe ou frutos do mar com amendoim moído e banana verde. É o prato que define Manabí e não existe igual no Brasil. Cerca de $9,80.",
     "<strong>Ceviche equatoriano.</strong> Diferente do peruano: servido no próprio caldo, com pipoca e milho torrado ao lado. O camarão vem cozido. $6 a $9.",
     "<strong>Corviche.</strong> Bolinho frito de banana verde recheado com peixe. Comida de rua, um a dois dólares, e uma das melhores coisas da costa.",
     "<strong>Encebollado.</strong> Sopa de atum com mandioca e cebola em conserva. O café da manhã nacional.",
     "<strong>Sal prieta.</strong> Não é prato, é tempero: amendoim e milho torrados moídos. Compre um saquinho na feira para levar.",
   ]},

   {"h2": "Quanto custa de verdade"},
   {"tabla": [["Item", "Preço em dólar"], [
     ["Almoço executivo local", "$4 – $6"],
     ["Ceviche", "$6 – $9"],
     ["Peixe grelhado com arroz", "$8,90"],
     ["Viche misto", "$9,80"],
     ["Corte de carne bovina", "$17,60 – $21,95"],
     ["Caipirinha", "$8,90"],
     ["Cerveja da casa", "$6,00"],
     ["Táxi dentro da cidade", "$2 – $4"],
   ]]},
   "Uma observação sobre a caipirinha: sim, servem no Equador, e sim, com cachaça de verdade em alguns lugares. Não espere o padrão brasileiro em todo canto. A versão com maracujá ou goiaba, a $9,95, costuma agradar mais.",
   {"quote": "Chega muito brasileiro de cruzeiro e todos perguntam a mesma coisa: onde está o restaurante bom. A resposta é que o peixe aqui é bom em qualquer lugar, porque o porto está a duzentos metros. O que muda é a vista.",
    "cite": "Equipo de Luuma Rooftop"},

   {"h2": "Onde comer, por situação"},
   {"h3": "Mercado de peixe ao amanhecer"},
   "O mercado da Playita Mía é onde os barcos descarregam. Antes das nove da manhã está funcionando a todo vapor. Várias barracas cozinham o que você apontar. É o mais fresco e o mais barato — e o menos confortável.",
   {"h3": "Almoço como local"},
   f"Qualquer comedor longe da praia serve almoço por quatro a seis dólares. Na zona turística sobe para oito ou dez. O nosso {link(MENU_ALMUERZO, 'cardápio de almoço')} tem peixe grelhado — wahoo ou albacora — a $8,90 com arroz e salada.",
   {"h3": "Jantar com vista"},
   f"La Quadra é o bairro dos restaurantes, a cinco minutos da Praia Murciélago. É onde ficam os rooftops. O {link(MENU, 'cardápio da noite')} abre às 16:00 e os coquetéis vão de $8,50 a $13,60.",

   {"h2": "O pôr do sol é pontual"},
   "O Equador fica sobre a linha do equador, então o sol se põe entre 18:15 e 18:40 todos os dias do ano. Não muda com a estação. É a única coisa nesta cidade que se pode agendar com meses de antecedência.",
   "Chegue às 17:45 se quiser mesa na grade. Todo mundo quer a mesma mesa no mesmo momento, e esse momento dura quinze minutos.",

   {"h2": "Detalhes práticos"},
   {"ul": [
     "<strong>Moeda.</strong> Dólar americano. Leve notas pequenas — ninguém na feira troca cinquenta dólares.",
     "<strong>Gorjeta.</strong> 10% já vem na conta por lei. Além disso é opcional.",
     "<strong>Água.</strong> Não beba da torneira. Água engarrafada é barata.",
     "<strong>Idioma.</strong> Espanhol. Português funciona mal aqui, apesar da semelhança — vale usar tradutor.",
     "<strong>Domingo.</strong> A cidade esvazia em direção à praia e muitos lugares fecham.",
   ]},
   {"faq": [
     ("Dá para pagar em real?",
      "Não. O Equador é dolarizado desde 2000. Cartões internacionais funcionam bem em restaurantes e hotéis, mas feira e táxi são em dinheiro."),
     ("O ceviche equatoriano é seguro?",
      "Sim, é curado em limão e o camarão vem cozido. Num porto pesqueiro a rotatividade é alta. A regra é comer pela manhã e em lugar movimentado."),
     ("Quantos dias em Manta?",
      "Um dia basta para a cidade. Dois ou três se quiser Montecristi, os chapéus panamá e as praias do parque nacional ao sul."),
     ("Qual a melhor época?",
      "Junho a setembro é mais fresco e é temporada de baleias jubarte. Janeiro a abril é quente com chuva à tarde e mar mais morno."),
   ]},
   f'Vem para Manta e quer mesa no pôr do sol? <a href="{wa("Ola, somos do Brasil e queremos reservar uma mesa no Luuma")}">Mande mensagem no WhatsApp</a> com a data e quantas pessoas.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
