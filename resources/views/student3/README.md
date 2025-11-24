userstories:
Studenten:
[] Als student wil ik een overzicht van mijn vakken zien zodat ik weet wat ik volg. 
CRUD: R (vak.index)
[]Als student wil ik een detail pagina van mijn vak zien zodat ik alle informatie heb. 
CRUD: R (vak.detail)
[] Als student wil ik een overzicht van mijn modules zien zodat ik weet wat ik moet beheersen.
CRUD: R (module.index)
[]Als student wil ik een detail pagina van mijn module zien zodat ik alle informatie heb. 
CRUD: R (module.detail)
[] Als student wil ik een overzicht van mijn opdrachten in mijn modules zien zodat ik weet wat ik moet af hebben.
CRUD: R (opdacht.index)
[]Als student wil ik een detail pagina van mijn opdracht zien zodat ik alle informatie heb. 
CRUD: R (opdracht.detail)
[] Als student wil ik de weging per module kunnen zien zodat ik weet hoe cijfers meetellen.
CRUD: R (module.detail)
[] Als student wil ik per module kunnen zien welke docent deze verzorgt zodat ik weet bij wie ik vragen stel.
CRUD: R (module.detail)
[] Als student wil ik feedback kunnen zien op afgeronde modules zodat ik weet waar ik kan verbeteren.
CRUD: R (module.detail)
[] Als student wil ik opmerkingen of vragen kunnen achterlaten bij een module zodat ik direct contact kan opnemen met de docent.
CRUD: C (module.detail)
[] Als student wil ik de studiegids per opleiding kunnen inzien zodat ik weet wat de leerdoelen zijn. 
CRUD: R (gids.opleiding)
[] Als student wil ik een overzicht van mijn studiegidsen voor al mijn vakken zien zodat ik weet welke ik kan gebruiken. 
CRUD: R (gids.index)
[] Als student wil ik de studiegids per vak kunnen inzien zodat ik weet wat de leerdoelen zijn.
CRUD: R (gids.detail)

Docenten:
[] Als docent wil ik vakken kunnen aanmaken zodat ik inhoud kan toevoegen. 
CRUD: C (vak.create)
[] Als docent wil ik vakken kunnen aanpassen en verwijderen zodat alles acteel blijft. 
CRUD: U/D (vak.table)
[] Als docent wil ik modules kunnen aanmakenzodat ik inhoud kan toevoegen. 
CRUD: C (module.create)
[] Als docent wil ik modules kunnen aanpassen en verwijderen zodat alles acteel blijft. 
CRUD: U/D (module.table)
[] Als docent wil ik modules binnen vakken kunnen indelen zodat de structuur duidelijk is.
CRUD: U (vak.table)
[] Als docent wil ik bijlagen kunnen toevoegen aan vakken zodat ik documenten kan delen.
CRUD: U (vak.table)
[] Als docent wil ik bijlagen kunnen toevoegen aan modules zodat ik documenten kan delen.
CRUD: U (module.table)
[] Als docent wil ik opdrachten kunnen aanmaken zodat ik inhoud kan toevoegen. 
CRUD: C (opdracht.create)
[] Als docent wil ik opdrachten per module kunnen instellen zodat studenten weten wat ze moeten af hebben.
CRUD: U (module.table)
[] Als docent wil ik gidsen kunnen aanmaken zodat leerlingen extra informatie krijgen. 
CRUD: C (gids.create)

Extra/Admin:
[] Als admin wil ik vakken kunnen koppelen aan specifieke opleidingen zodat ze zichtbaar zijn voor de juiste studenten.
CRUD: C/U



relaties andere studenten:
student 2 Opleidingen, klassen & groepenbeheer> 
opleiding heeft meerdere vakken, vakken kunnen meerdere opleidingen hebben
een klas volgt meerdere modules, modules kunnen meerdere klassen hebben
een studiegids behoort tot 1 opleiding
Opleiding (V) --- (V) Vak
Klas (V) --- (V) vak
Gids (1) --- (1) Opleiding

student 4 Roostersysteem met lokaalreserveringen>
een vak heeft meerdere lessen
Vak (1) --- (N) RoosterItem

student 5 Cijferregistratie & studievoortgang>
student krijgt een cijfer voor een vak

student 8 Toetsplanning & herkansingen>
een module heeft meerdere toetsen, een toets kan meerder modules hebben
een vak heeft meerdere toetsen
Module (1) --- (1) Toets
vak (1) --- (N) Toets

