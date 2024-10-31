# ProRend
Órarend alkalmazás. *(Programozás Házi Feladat)*

# Funkciók
- Adatok (bejelentkezés + órák) betöltése SQLite adatbázisból
- Bejelentkezési jelszavak hashelve
- PHP dinamikusan tölti be az órákat
- Órák megjelölése elmaradottként
- Óra adatainak változtatása (tanár, terem)

# PHP letöltése
macOS: `brew install php` (Szükséges: [Homebrew](https://brew.sh/))

Windows: [XAMPP Szerver](https://www.apachefriends.org/) vagy [PHP binary-k letöltése](https://windows.php.net/download/)

Linux: Ha linuxot használsz már tudod mit kell csinálni ;)

## Futtatás parancssorból (dev server):
`php -S 127.0.0.1:8080 -c php.ini`

# Bejelentkezés (case-sensitive)
Felhasználónév: `felhasznalo1`

Jelszó: `123`