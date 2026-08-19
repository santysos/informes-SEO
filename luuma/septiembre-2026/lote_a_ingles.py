#!/usr/bin/env python3
"""Bloque A · posts en inglés y portugués para el turista extranjero.

Justificación con datos (Search Console, 21-may a 18-ago 2026):
  · «best rooftop bars near me»  → 4.038 impresiones, 0 clics, posición 7,9
  · «best rooftop restaurants»   →   956 impresiones, 0 clics, posición 4,8
  · «melhores restaurantes perto»→   430 impresiones, 0 clics, posición 4,9
  · cluster inglés completo      → 9.387 impresiones, CTR 0,92 %
"""
from gutenberg import CAT, MENU, MENU_ALMUERZO, BEBIDAS, SITE, link, wa, guarda

POSTS = []

# ─────────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Best Rooftop Bars in Ecuador: Where Manta Fits (2026 Guide)",
 "slug": "best-rooftop-bars-ecuador-guide",
 "date": "2026-08-29T16:00:00",
 "cat": CAT["cocteles"],
 "tags": ["rooftop bar ecuador", "manta ecuador", "travel guide", "nightlife"],
 "focus_kw": "best rooftop bars ecuador",
 "yoast_title": "Best Rooftop Bars in Ecuador: 2026 Guide",
 "yoast_desc": "Quito, Guayaquil, Cuenca and Manta compared: where the real rooftop bars are in Ecuador, what they cost and which one fits the trip you are taking.",
 "excerpt": "Ecuador has fewer real rooftop bars than you would expect. Here is where they are, what a cocktail costs in each city, and why the coast changes the whole experience.",
 "bloques": [
   "Ecuador has fewer genuine rooftop bars than a country with this much coastline should have. Quito has altitude but cold nights. Guayaquil has heat but mostly hotel terraces. And on the coast, where sunset over the Pacific is the obvious selling point, the count drops to a handful.",
   "This guide is written from Manta, on the Manabí coast, so treat it as informed rather than neutral. What follows is an honest map of where rooftop drinking actually works in Ecuador, what you will pay, and which city suits which kind of trip.",

   {"h2": "What counts as a rooftop bar here"},
   "Three things separate a rooftop bar from a restaurant that happens to have an upper floor: an open sky, a proper cocktail list, and a reason to stay after the food is finished. Plenty of places in Ecuador have a terrace. Far fewer have all three.",
   {"ul": [
     "<strong>Open air, not a glassed-in dining room.</strong> If the windows do not open, it is a restaurant with a view.",
     "<strong>A bar programme, not just beer and wine.</strong> Someone has to be building drinks, not opening bottles.",
     "<strong>A view worth the elevator.</strong> Facing a parking lot does not qualify, no matter the floor.",
   ]},

   {"h2": "Quito: altitude, and a jacket"},
   "The capital sits at 2.850 metres. That is the whole story of rooftop drinking in Quito: the views over the Andes are genuinely spectacular, and by nine at night you will want a jacket. Most rooftops cluster around La Floresta and the Mariscal district, and most are attached to hotels.",
   "Expect to pay between $10 and $16 for a cocktail. The altitude also does something people forget: alcohol hits noticeably harder above 2.500 metres. Two drinks in Quito land like three at sea level.",

   {"h2": "Guayaquil: heat, height and hotel terraces"},
   "Ecuador's largest city has the tallest buildings and therefore the highest terraces, most of them on top of business hotels near Puerto Santa Ana and the Malecón 2000. The views are urban rather than natural — river, bridges and skyline.",
   "Cocktails run $11 to $18, the highest in the country. The humidity is the real variable: from January to April an open terrace in Guayaquil can be uncomfortable before the sun goes down.",

   {"h2": "Cuenca: colonial rooftops, small scale"},
   "Cuenca's historic centre has a few rooftops looking over tiled roofs and church domes, and they are lovely. They are also small — often twenty seats — and they close early. This is a sunset-drink city, not a late-night one. Cocktails $8 to $13.",

   {"h2": "Manta: the one with the ocean"},
   "Manta is the largest port on Ecuador's central coast and the only city on this list where a rooftop faces open Pacific rather than a river or a mountain range. The sun sets into the water from roughly 18:15 to 18:40 year-round — Ecuador sits on the equator, so sunset barely moves between seasons.",
   "That last detail matters more than it sounds. In Quito or Cuenca you plan around the weather. In Manta you can book a sunset table in January or in August and be right both times.",
   {"quote": "People arriving from Quito always ask what time the sunset is, as if it changed. It doesn't. We are on the equator. Six fifteen, six forty, all year. That is the one thing about Manta you can plan around.",
    "cite": "Equipo de Luuma Rooftop"},

   {"h2": "What it costs, city by city"},
   {"tabla": [["City", "Cocktail range", "The view", "Best for"], [
     ["Quito", "$10 – $16", "Andes and old town", "Cool evenings, city break"],
     ["Guayaquil", "$11 – $18", "River and skyline", "Business trips, late nights"],
     ["Cuenca", "$8 – $13", "Colonial rooftops", "Early sunset drinks"],
     ["Manta", "$8,50 – $13,60", "Open Pacific", "Sunset, seafood, beach trips"],
   ]]},
   f"For reference, at our own bar a classic mojito is $9,20, a classic margarita $9,80, a caipirinha $8,90 and the gin with red fruits $13,60. House beer is $6 and a Corona $8. The full list is on the {link(BEBIDAS, 'drinks menu')}.",

   {"h2": "Which city should you pick"},
   {"ul": [
     "<strong>You are already doing the Galápagos or the Andes:</strong> Quito, because you will pass through anyway.",
     "<strong>You are here for business:</strong> Guayaquil, where the terraces stay open latest.",
     "<strong>You want colonial charm and an early night:</strong> Cuenca.",
     "<strong>You want the ocean, seafood and a sunset you can schedule:</strong> Manta.",
   ]},
   "The honest caveat: if rooftop bars are the point of your trip, Ecuador is not the destination. There are four or five worth the trip nationwide. If they are the reward at the end of a day of beaches, whale watching or Panama hat shopping in Montecristi, the coast wins easily.",

   {"h2": "When to go, and what the weather does"},
   "Ecuador's coast has two seasons and they change the rooftop experience completely. From January to April it is hot and humid, with short heavy rain in the afternoon and warm evenings — the best months for sitting outside after dark. From June to September the air is cooler and often overcast during the day, which sounds worse but is actually when the sunsets get dramatic, because there is cloud for the light to catch.",
   "The overcast months are also whale season. Humpbacks pass the Manabí coast from June to September on their way from Antarctica, and Puerto López, an hour and forty-five minutes south of Manta, is the departure point for tours. A whale-watching morning followed by a rooftop sunset is the best day this coast offers.",
   {"ul": [
     "<strong>January to April:</strong> hot, humid, warm nights. Rain arrives around four in the afternoon and passes.",
     "<strong>May:</strong> the transition month, and the most reliable weather of the year.",
     "<strong>June to September:</strong> cooler, grey days, spectacular sunsets, whales offshore.",
     "<strong>October to December:</strong> dry and mild, the quietest months for tourism.",
   ]},

   {"h2": "Two mistakes visitors make"},
   "The first is arriving at sunset. Everyone wants the same table at the same moment, and on the coast that moment is fifteen minutes long. Arriving half an hour early costs you nothing and gets you the rail.",
   "The second is treating a rooftop like a nightclub. Ecuadorian coastal bars are not late-night venues — kitchens close around 22:00 and the crowd thins by midnight even on Saturdays. If you want to go until three in the morning, that is Guayaquil, not the coast.",

   {"h2": "If you come to Manta"},
   f"We are in La Quadra, the restaurant district five minutes from Playa Murciélago. The kitchen opens at 11:00 with the {link(MENU_ALMUERZO, 'lunch menu')} — grilled wahoo or albacora at $8,90 — and the {link(MENU, 'full menu')} starts at 16:00. Come at 17:45 if you want a rail table for sunset.",
   {"faq": [
     ("Do rooftop bars in Ecuador require a reservation?",
      "In Quito and Guayaquil, usually not except on weekends. On the coast at sunset, yes — the front tables go first and there are only so many of them. A message the same morning is normally enough."),
     ("Is there a dress code?",
      "Ecuador is relaxed about this. Smart casual works everywhere on the list. On the coast, beachwear is the only thing likely to be turned away, and even then only at dinner service."),
     ("What is the tipping norm?",
      "A 10 % service charge is added by law to the bill in Ecuador. Anything beyond that is genuinely optional and appreciated but not expected."),
     ("Can you pay with a foreign card?",
      "Yes. Ecuador uses the US dollar, so there is no currency conversion, and cards are accepted almost everywhere. Small beach vendors are cash-only."),
   ]},
   f'Planning a night in Manta? <a href="{wa("Hi, I would like to book a sunset table at Luuma")}">Message us on WhatsApp</a> and tell us the date and how many people — we will hold a table by the rail if there is one left.',
 ]})

# ─────────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "Where to Eat in Manta, Ecuador: An Honest Local Guide",
 "slug": "where-to-eat-manta-ecuador-guide",
 "date": "2026-09-01T16:00:00",
 "cat": CAT["gastronomia"],
 "tags": ["manta ecuador", "where to eat", "ecuadorian food", "travel guide"],
 "focus_kw": "where to eat in manta ecuador",
 "yoast_title": "Where to Eat in Manta, Ecuador: Local Guide 2026",
 "yoast_desc": "What to eat in Manta and where: ceviche for breakfast, viche, tonga, the fish market at dawn and what a meal actually costs on the Ecuadorian coast.",
 "excerpt": "Manta is a working fishing port, which means the seafood is genuinely fresh and the best of it is cheap. Here is what to order, where, and what you should pay.",
 "bloques": [
   "Manta lands more tuna than any other port on Ecuador's coast. That single fact shapes everything you will eat here: the fish arrives at dawn, the prices are lower than anywhere inland, and the local cooking is built around what the boats bring in rather than what a menu decided in advance.",
   "This is a practical guide to eating in Manta — what the dishes are, when to eat them, and roughly what you should be paying so you know when you are being charged a tourist price.",

   {"h2": "Eat ceviche in the morning, not at night"},
   "The single most useful thing a visitor can know: on the Ecuadorian coast, ceviche is breakfast food. Locals eat it between 08:00 and 11:00, when the fish came in a few hours earlier. By evening, what is being served has been sitting since morning.",
   "Ecuadorian ceviche is also not Peruvian ceviche. The fish is cured in lime but served in its own juice with onion, tomato and coriander, and it comes with popcorn and toasted maize on the side. Shrimp ceviche is usually cooked, not raw. Expect to pay $6 to $9 at a proper cevichería.",

   {"h2": "The dishes that are actually from here"},
   {"ul": [
     "<strong>Viche.</strong> A peanut-based seafood soup with green plantain — the defining dish of Manabí province. Creamy, substantial, nothing like it elsewhere in Ecuador. Around $9 to $11.",
     "<strong>Tonga.</strong> Chicken and rice wrapped and steamed in a banana leaf, with peanut sauce. Traditionally what field workers carried for lunch.",
     "<strong>Corviche.</strong> A fried green-plantain fritter stuffed with fish. Street food, $1 to $2, and one of the best things in the province.",
     "<strong>Encebollado.</strong> Tuna soup with yuca and pickled onion. Nationally the hangover cure, and Manta makes a strong case for the best version.",
     "<strong>Sal prieta.</strong> Not a dish but a condiment — ground peanut, maize and achiote. It goes on everything and you will want to take some home.",
   ]},

   {"h2": "Where to go, by situation"},
   {"h3": "The fish market at dawn"},
   "The Playita Mía market is where the boats unload. Go before 09:00 if you want to see it working. Several stalls will cook what you point at. This is the cheapest and freshest seafood in the city and the least comfortable setting — plastic chairs, concrete floor, no English spoken.",
   {"h3": "Lunch like a local"},
   f"Almuerzo is the Ecuadorian set lunch: soup, a main, juice, sometimes dessert, served from around 11:00 to 15:00 for $4 to $9 depending on the neighbourhood. It is the best value meal in the country. Ours runs $8,50 for grilled chicken and $8,90 for wahoo or albacora with rice and salad — the {link(MENU_ALMUERZO, 'lunch menu')} has the full list.",
   {"h3": "Dinner with a view"},
   "La Quadra is the restaurant district, five minutes from Playa Murciélago, and where most sit-down dinner options cluster. Prices climb here — mains $12 to $22 — and so does the comfort level. This is where you go for the sunset rather than the bargain.",

   {"h2": "What things should cost"},
   {"tabla": [["Meal", "Local price", "Tourist-zone price"], [
     ["Ceviche", "$6 – $9", "$10 – $14"],
     ["Set lunch (almuerzo)", "$4 – $6", "$8 – $10"],
     ["Corviche (street)", "$1 – $2", "$2 – $3"],
     ["Grilled fish main", "$8 – $11", "$13 – $18"],
     ["Beef cut, restaurant", "—", "$17 – $22"],
     ["Cocktail", "—", "$8,50 – $13,60"],
   ]]},
   "Neither column is a rip-off. You are paying for a chair, a view and a bathroom in the right-hand one. Just know which you are choosing.",

   {"quote": "Visitors always ask where the tourist food is. There isn't any, really. What we serve upstairs is the same viche your grandmother in Portoviejo makes, we just put it on a nicer plate and you can see the ocean while you eat it.",
    "cite": "Equipo de Luuma Rooftop"},

   {"h2": "Why the fish is genuinely better here"},
   "This is not marketing. Manta is the largest tuna port on the Pacific coast of South America, and the industrial fleet that supplies canneries worldwide unloads in the same bay as the artisanal boats that supply the city. The result is that restaurants here buy from a market that receives fish twice a day rather than from a distributor that receives it twice a week.",
   "The practical effect is on the cuts you will not see inland. Wahoo and albacora appear on menus in Manta as everyday grilled fish at $8,90; in Quito the same species are priced as specialities when they appear at all. Red tuna served raw — as tartare or with avocado — costs $11,50 to $12,60 here, which is roughly half what the equivalent plate runs in the capital.",
   f"That is also why the {link(MENU, 'evening menu')} leans on fish rather than imported product. It would be strange to do otherwise in a port.",

   {"h2": "What to avoid"},
   {"ul": [
     "<strong>Ceviche after dark in a quiet place.</strong> Not dangerous, just past its moment. Go where there is turnover.",
     "<strong>Anything advertised as 'Peruvian ceviche' on the beach.</strong> Ecuador has its own version and it is better here than an imitation of someone else's.",
     "<strong>Lobster in low season.</strong> There is a closed season for a reason. If it is on the menu year-round, ask where it came from.",
     "<strong>The first place on the beach with someone outside inviting you in.</strong> Universal rule, and it holds in Manta.",
   ]},

   {"h2": "Practical notes"},
   {"ul": [
     "<strong>Currency.</strong> Ecuador uses the US dollar. Bring small bills — nobody at a market can break a $50.",
     "<strong>Service charge.</strong> 10 % is added by law. Additional tipping is optional.",
     "<strong>Tap water.</strong> Do not drink it. Bottled water is cheap and everywhere.",
     "<strong>Timing.</strong> Kitchens on the coast close earlier than you expect. By 22:00 many are done.",
     "<strong>Sunday.</strong> The city empties toward the beach and many places close. Plan around it.",
   ]},

   {"h2": "A day of eating in Manta"},
   {"ol": [
     "08:30 — ceviche or encebollado near the market, with the fishing boats still unloading.",
     "13:00 — an almuerzo somewhere inland from the beach, where the price drops.",
     "16:00 — corviche or a bolón from a street cart, to hold you until dinner.",
     "17:45 — up to a rooftop in La Quadra for sunset, which happens around 18:15 all year.",
     "20:00 — dinner. Grilled fish if you have been eating meat, a beef cut if you have been eating fish all week.",
   ]},
   {"faq": [
     ("Is the seafood safe to eat raw?",
      "Ceviche in Ecuador is cured in lime rather than served fully raw, and shrimp is usually cooked. In a working port like Manta the turnover is high. The standard advice applies: eat it in the morning and at busy places."),
     ("Do people speak English in Manta?",
      "In hotels and the restaurant district, some. At the market and in local comedores, very little. A translation app and a smile go a long way."),
     ("Is Manta walkable?",
      "The beach and La Quadra areas are. Everything else needs a taxi, which is inexpensive — most trips inside the city are $2 to $4."),
     ("When is the best season?",
      "June to September is dry and cooler, and whale-watching season. January to April is hotter with afternoon rain but the sea is warmer."),
   ]},
   f'Coming to Manta and want a table for sunset? <a href="{wa("Hi, we are visiting Manta and would like to book a table")}">Write to us on WhatsApp</a> with your date and party size.',
 ]})

# ─────────────────────────────────────────────────────────────────────
POSTS.append({
 "title": "What to Do in Manta, Ecuador in 24 Hours",
 "slug": "what-to-do-manta-ecuador-24-hours",
 "date": "2026-09-04T16:00:00",
 "cat": CAT["vida"],
 "tags": ["manta ecuador", "things to do", "travel guide", "one day itinerary"],
 "focus_kw": "what to do in manta ecuador",
 "yoast_title": "What to Do in Manta, Ecuador in 24 Hours",
 "yoast_desc": "A realistic one-day plan for Manta: fish market at dawn, Montecristi hats, Playa Murciélago and sunset from a rooftop. Times, costs and what to skip.",
 "excerpt": "One day in Manta is enough if you plan it right. This is the itinerary we give visitors, with real timings, costs and the two things most guides recommend that we would skip.",
 "bloques": [
   "Most people reach Manta for one of three reasons: a cruise ship docked for the day, a stopover between Quito and the beaches further south, or a work trip with an afternoon free. All three give you roughly twenty-four hours.",
   "That is enough. Manta is a working port rather than a resort town, which means the interesting parts are compact and the tourist infrastructure is thin. Here is how to use the day, written by people who live here.",

   {"h2": "Morning · the port waking up"},
   {"h3": "07:00 — Playita Mía fish market"},
   "The boats unload at dawn and the market is at full speed by seven. Tuna, wahoo, dorado, shrimp, and a lot of shouting. Several stalls will cook what you buy. It is loud, wet underfoot and completely genuine — the single most memorable hour in the city if you do not mind the smell of fish.",
   {"h3": "08:30 — breakfast the coastal way"},
   "Encebollado, the tuna and yuca soup, is what people actually eat in the morning here. So is ceviche. Both cost $6 to $9 near the market. If neither appeals, a bolón — fried green plantain with cheese — is the safe option at around $3.",

   {"h2": "Mid-morning · Montecristi"},
   "Twenty minutes inland is Montecristi, where the Panama hat comes from. The name is a historical accident: the hats were shipped through Panama, but they have always been woven in Ecuador, and the finest of them here.",
   {"ul": [
     "<strong>What a real one costs.</strong> A tourist-grade hat is $20 to $40. A genuine fino weave starts around $150 and goes past $800. The difference is visible if you hold them side by side against light.",
     "<strong>How to tell.</strong> Count the rings in the crown. Finer weave, more rings, more months of work.",
     "<strong>Also there.</strong> Ciudad Alfaro, the mausoleum complex for Eloy Alfaro, with views over the valley. Worth an hour.",
   ]},
   "A taxi from Manta is around $10 to $15 each way, or you can negotiate a round trip with waiting time for $30 to $40.",

   {"h2": "Afternoon · the beach"},
   "Playa Murciélago is the city beach — long, walkable and lined with places to eat. It is not the prettiest beach in Ecuador and nobody in Manta would claim otherwise, but it is a five-minute drive from anywhere in the city.",
   "If you have a car and want better sand, Santa Marianita is twenty-five minutes south and is the kite-surfing beach, consistently windy from June to November. San Mateo, the fishing village north, is quieter and more photogenic than either.",
   {"quote": "Guests come with a list of eight things and get through four. Manta is not a place you tick off. Pick the market, pick Montecristi, and leave the afternoon loose — the coast decides the pace, not the itinerary.",
    "cite": "Equipo de Luuma Rooftop"},

   {"h2": "Evening · sunset, and it is punctual"},
   "Ecuador is on the equator, so the sun sets between 18:15 and 18:40 every day of the year. Unlike almost anywhere else, you can plan a sunset months in advance and be right.",
   f"La Quadra, the restaurant district near Playa Murciélago, is where the rooftops are. Arrive by 17:45 for a rail table. Cocktails run $8,50 to $13,60 — a classic mojito is $9,20 and a caipirinha $8,90 on our own {link(BEBIDAS, 'drinks list')}.",
   f"For dinner afterwards, the local dishes worth ordering are viche at $9,80 or the grilled catch of the day. Beef cuts run $17,60 to $21,95 if you have been eating fish all week. The {link(MENU, 'full menu')} opens at 16:00.",

   {"h2": "What to eat, and when"},
   "The coastal eating schedule surprises visitors. Ceviche is a morning dish here, eaten between eight and eleven when the fish came in at dawn. Almuerzo, the set lunch of soup, main and juice, runs from eleven to three and costs $4 to $9 depending on the neighbourhood. Dinner starts late by North American standards — nobody eats before seven — and kitchens close around ten.",
   "The dishes that are actually from Manabí, rather than from Ecuador generally, are worth seeking out: viche, a peanut and seafood soup with green plantain; tonga, chicken and rice steamed in a banana leaf; and corviche, a fried plantain fritter stuffed with fish that costs a dollar from a street cart and is one of the best things on this coast.",
   "One warning about seafood pricing. Fish is genuinely cheap here because Manta is the largest tuna port on South America's Pacific coast — grilled wahoo or albacora runs $8,90 as an everyday lunch. If somewhere on the beach quotes you $25 for a fish plate, you are paying a tourist premium, not a quality premium.",

   {"h2": "Two things we would skip"},
   {"ul": [
     "<strong>The shopping malls.</strong> They come up in every list of things to do in Manta and they are the same malls as everywhere else. You did not fly here for a food court.",
     "<strong>Whale-watching booked from Manta between October and May.</strong> The season runs June to September only. Outside those months, tours advertised to tourists are going out to sea to find nothing.",
   ]},

   {"h2": "Getting around, and what it costs"},
   "Manta is not a walking city outside the beach strip. Taxis are cheap and plentiful, and the only rule worth following is to agree the price before getting in, since meters are rarely used.",
   {"tabla": [["Trip", "Cost", "Time"], [
     ["Cruise port to the beach", "$3 – $5", "8 min"],
     ["Anywhere in the city", "$2 – $4", "5–15 min"],
     ["Manta to Montecristi", "$10 – $15", "20 min"],
     ["Manta to Santa Marianita", "$12 – $18", "25 min"],
     ["Manta to Puerto López", "$60 – $80", "1 h 45"],
   ]]},
   "A full day of the itinerary above — market breakfast, Montecristi round trip, beach afternoon, sunset drinks and dinner — comes to roughly $85 to $120 per person including transport. Cutting Montecristi brings it under $60.",

   {"h2": "If you have a second day"},
   {"ol": [
     "Puerto López and Isla de la Plata — the budget Galápagos, two hours south, with boobies and frigatebirds.",
     "Los Frailes beach in Machalilla National Park, the best beach on Ecuador's mainland coast, no development at all.",
     "The Ruta del Spondylus south, stopping at fishing villages and surf towns as far as Ayampe.",
   ]},
   {"faq": [
     ("Is Manta safe for tourists?",
      "The beach areas, La Quadra and the malecón are fine during the day and in the evening. As in any port city, avoid deserted areas late at night and use registered taxis or an app rather than flagging cars down."),
     ("Do I need cash?",
      "For the market, taxis and street food, yes — small bills. Restaurants and hotels take cards. Ecuador uses the US dollar, so there is no exchange to worry about."),
     ("How do I get from the cruise terminal to the city?",
      "The port is in the city. A taxi to the beach or La Quadra is $3 to $5 and takes under ten minutes."),
     ("Is one day enough?",
      "For Manta itself, yes. If you want the national park and the beaches south, you need at least two more."),
   ]},
   f'Docking for the day or passing through? <a href="{wa("Hi, we are in Manta for the day and would like a table for sunset")}">Message us on WhatsApp</a> and we will tell you the sunset time for that exact date.',
 ]})

if __name__ == "__main__":
    for s in POSTS:
        ruta, pal = guarda(s)
        print(f"  {pal:>5} palabras · {ruta.split('/')[-1]}")
