# FileUploader voorbeeld
Dit is een voorbeeld, hoe je de webapp van FileUploader kunt beginnen.

De minimale eisen aan dit project zijn:
- Je volgt PSR-1 en PSR-12
- Je maakt gebruik van een namespace.
- Je maakt gebruik van functions.
- Je code is strictly typed en je gebruikt type hinting.
- Je zorgt voor een algemene errorhandler om errors op te vangen.
- Je zorgt ervoor dat in functies exceptions worden gemaakt wanneer nodig.
- Je werkt van scratch, dus ook geen tutorial of kopie van een ander project als start.
- Je werkt met Classes op een object georiënteerde manier.
- Je controleert input uit een formulier (i.v.m. security).
- Je maakt gebruik van $_SESSIONS.

Daarnaast moet er in dit project een login-functie komen met de volgende eisen:
- Gebruik PDO als database-connectie
- Gebruik prepare() en execute() om de verbinding veilig te maken
- Gebruik gehashte wachtwoorden voor de veiligheid
   (met password_hash() en password_verify())
   
Tenslotte wil je in ieder geval de volgende functionaliteiten in het progamma hebben:
- Inloggen en registreren kan aan de voorkant (zie het voorbeeld)
- Sla gegevens op in de database, zodra er een bestand wordt geüpload
- Werk de gegevens bij, als er een bestand wordt verwijderd
- Zorg ervoor dat een gebruiker maximaal 50MB opslag heeft
- Maak een eigen mapje aan voor elke gebruiker in Uploads
- Controleer of een gebruikersnaam of een bestandsnaam al bestaat
- Gebruik SESSION om alle pagina's af te schermen met een uitloggen optie

**Verdieping** (extra):
- Houd bij hoevaak een bestand gedownload is
- Maak de mogelijkheid om de bestandsnaam in de webapp te wijzigen (zowel op schijf als in de database)
- Maak de mogelijkheid om een bestand te delen met andere gebruikers in de webapp