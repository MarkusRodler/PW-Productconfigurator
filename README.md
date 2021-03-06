# Professionelle Webentwicklung

## Übung 2: Produktkonfigurator
Erstellen Sie die Geschäftslogik für einen Produktkonfigurator.
Dabei gelten die folgenden Geschäftsregeln:

* Artikel werden durch eine eindeutige ID identifiziert und
  haben einen Namen

* beim Kauf von bestimmten Artikeln können verschiedene Optionen
  hinzugewählt werden

* es gibt drei verschiedene Arten von Artikeln: Artikel ohne
  Optionen, Artikel mit maximal einer Option und Artikel mit
  mindestens einer und höchstens drei Optionen

* bestimmte Optionen sind nicht miteinander kombinierbar

* normalerweise sind Optionen jeweils nur auf bestimmte Artikel
  anwendbar; bestimmte Optionen wie Garantieverlängerungen oder
  Zusatzleistungen können jedoch auf alle Artikel angewendet
  werden, sofern diese generell Optionen zulassen

* jeder Artikel und jede Option haben einen Preis

* es kann pro Geschäftsvorgang nur ein einziger Artikel gekauft
  werden

* für den zu kaufenden Artikel müssen sowohl der Basispreis
  des Artikels als auch der Gesamtpreis inklusive aller
  gewählten Optionen angezeigt werden


## Getting started

 ```bash
# get the code
git clone https://github.com/MarkusRodler/PW-Productconfigurator.git
cd PW-Productconfigurator

# install dependencies using composer (if installed globally)
composer install

# run tests
vendor/bin/phpunit
 ```