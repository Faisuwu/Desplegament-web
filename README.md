# Desplegament-web
Aquesta és una petita aplicació web feta amb PHP.

# Documentació dels nous Scripts PHP

-Introducció

Aquest document proporciona una explicació dels dos nous scripts PHP que formen part de l'aplicació. Aquests scripts estan dissenyats per interactuar amb una base de dades per afegir i eliminar productes.

# Script d'Eliminació de Producte

-Descripció
Aquest script permet eliminar un producte de la base de dades.

-Característiques Destacades

Verifica si s'ha enviat una sol·licitud POST.
Elimina el producte corresponent de la base de dades.
Gestiona els errors de manera adequada.
Ús
Per eliminar un producte, es requereix l'enviament d'una sol·licitud POST amb l'ID del producte a eliminar.

# Script d'Afegir Nou Producte

-Descripció
Aquest script permet afegir un nou producte a la base de dades.

-Característiques Destacades

Verifica si la petició és un POST.
Processa les dades del formulari per afegir un nou producte a la base de dades.
Redirigeix l'usuari a la pàgina principal després d'afegir el producte amb èxit.

-Ús
Per afegir un nou producte, s'ha de completar el formulari amb el nom, descripció, preu i categoria del producte, i enviar-lo mitjançant una sol·licitud POST.

-Requisits Previs
Els dos scripts requereixen la connexió a una base de dades. Aquesta connexió està gestionada per un fitxer anomenat Connexio.php.
