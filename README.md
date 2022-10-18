## Tennis Digital

Du bist Vorsitzender des örtlichen Tennis-Vereins und du denkst immer wieder über neue Möglichkeiten nach, wie du die Mitglieder besser miteinander vernetzen kannst, um den Spielspaß zu erhöhen.

### Aufgabe 1:
Du möchtest gerne eine automatische Mitgliederkartei im Internet haben. Jedes Mitglied soll in einer Datenbank erfasst werden. Da sich alle Mitglieder mit Vornamen ansprechen, genügt es, den Vornamen, eine ID und eine E-Mail-Adresse zu erfassen. Damit soll es eine übersichtliche Liste aller Mitglieder geben und einzelne Daten sollen sich im Detail anzeigen, ändern und löschen lassen können. Neue Mitglieder können über eine Eingabe-Maske hinzugefügt werden. Die E-Mailadresse wird dabei validiert.

- Jedes Mitglied soll in Datenbank erfasst werden
    - Vorname
    - ID
    - Email
- Neue Mitglieder können über Eingabe-Maske hinzugefügt werden
- Email wird auf Gültigkeit geprüft

#### Anforderungen
1. [X] Datenbanktabelle ```member_v1``` erstellen (Entitäten: ID, VORNAME, EMAIL)
2. [X] Registrierung entwickeln (EMAIL (TYPE EMAIL) und VORNAME required)
3. [X] Daten auf HTML als Liste anzeigen lassen (ID, VORNAME, EMAIL)
4. [X] Daten sollen geupdated werden können
5. [X] Daten sollen sich löschen lassen

### Aufgabe 2:
Du gestaltest ein hübsches Frontend in den Vereinsfarben rot und weiß. Oben links fügst du das Vereinslogo hinzu. Damit du auch neue Mitglieder aufnehmen kannst, während du selber am Vereinsheim bist, achtest du auch auf die Darstellung als Mobile-Version.

#### Anforderungen
1. [X] Frontend erstellen (Navigation, Body, Footer)
2. [X] Vereinslogo hinzufügen

### Aufgabe 3:
Die Website läuft und du möchtest, dass auch andere davon profitieren. Damit nicht jeder Daten ändern und einsehen kann, möchtest du einen Zugriffsschutz, so dass die Trainer Anton, Bert und Chris ebenfalls Daten einsehen, ändern, löschen und hinzufügen können. Sie sollen je ein Passwort erhalten und sich damit und über ihre E-Mail-Kennung am System anmelden können.

#### Anforderungen
1. [X] Passwort zur ```member_v1``` Tabelle hinzufügen
2. [X] Accounts für Trainer (Anton, Bert und Chris) erstellen
3. [ ] Login System bauen (Email + Passwort)
4. [ ] Datensichtbarkeit auf ```Mitglieder, View, Editierung``` nur für Trainer möglich (Session einbauen)

#### Optional:
5. [X] Für die Registrierung programmiere ich eine Registrierung um die Passwörter verschlüsseln zu lassen


### Aufgabe 4:
Jedes Mitglied bekommt ein Passwort erstellt, so dass sich die Mitglieder mit ihren E-Mailadressen und Passwörtern anmelden können. Sie können aber nur ihre eigenen Daten sehen.
### Aufgabe 5:
Um Mitglieder auch telefonisch zu erreichen, fügst du als neues Feature zu jedem Mitglied seine Telefonnummer hinzu. Da sich die Telefonnummer auch mal ändern kann, darf jedes

Mitglied seine Telefonnummer ändern. Da der Verein nur lokale Mitglieder hat, dürfen die Telefonnummern nur mit “025” anfangen oder mit “017” (bei Handy-Nummern) und sie müssen mindestens 10-stellig sein. Es sind nur Zahlen erlaubt und ein “Minus-Zeichen”.
### Aufgabe 6:
Der Tennisplatz besteht aus 8 Plätzen (1-8) und kann in der Zeit von 15:00 Uhr bis 20:00 Uhr bespielt werden für genau 1 Stunde je Spieler. Um 20:00 Uhr muss der letzte Spieler das Gelände verlassen haben und das Spiel beendet sein. Du fügst die Tennisplätze als eigene Entität in die Datenbank hinzu und vergibst eigenverantwortlich sinnvolle Felder zu jedem Platz, zumindest eine Nummerierung.
### Aufgabe 7:
Nach dem Anmelden sollen Mitglieder an einem Tag ihrer Wahl und zu einer Uhrzeit ihrer Wahl einen Platz ihrer Wahl buchen können. Optional können sie auch eintragen, wer ihr Tennispartner auf dem Platz ist.
### Aufgabe 8:
Die Mitglieder bekommen eine Liste der Platzbelegung angezeigt, wobei aufgelistet ist, welcher Platz wann von wem belegt ist.
Da es zu Doppelbuchungen kam, baust du ein Feature ein, mit dem ein bereits gebuchter Platz nicht zur gleichen Zeit doppelt gebucht werden kann. Ansonsten erscheint ein Hinweis.
### Zusatzaufgaben:
1. Du erstellst ein Docker-File für das Projekt, damit andere ebenfalls an der Software mitprogrammieren können.
2. Leg für das Project ein Git-Repository an.
3. Leg ein Backup der Datenbank an