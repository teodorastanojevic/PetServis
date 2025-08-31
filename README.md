# PetServis

**PetServis** je web aplikacija za prijavu i praćenje izgubljenih ljubimaca.  
Korisnici mogu da prijave ljubimca, pregledaju sopstvene prijave, dok administratori imaju dodatne mogućnosti za upravljanje i statistiku.

---

## Funkcionalnosti

- Registracija i prijava korisnika
- Dodavanje prijave izgubljenog ljubimca sa:
  - Ime (opciono)
  - Vrsta
  - Boja
  - Lokacija
  - Opis
  - Kontakt
  - Slika (opciono upload)
-  Pregled sopstvenih prijava
-  Admin panel:
  - Pregled svih prijava
  - Izmena statusa ("Izgubljen", "Pronađen")
  - Istorija izmena
-  Statistika prijava (ukupno i po statusima) + mogućnost exporta u PDF
-  Logout i bezbedno uništavanje sesije

---

## Struktura projekta

```
htdocs/sup25/ts/
│
├── config/          # Konfiguracija baze
├── controllers/     # Logika aplikacije (Auth, Servisi, Devices, Home)
├── models/          # Modeli za rad sa bazom (Servis.php, ...)
├── views/           # UI (login.php, register.php, home.php, layout.php, ...)
│   ├── ljubimci/    # Pogledi za ljubimce (add, list, edit, statistika, ...)
│
├── uploads/         # Slike ljubimaca
├── index.php        # Glavna ulazna tačka
├── routes.php       # Rute i kontroleri
└── README.md        
```

---

## Uloge korisnika

-  **User**
  - Registracija / login
  - Dodavanje prijava
  - Pregled sopstvenih prijava
- **Admin**
  - Sve kao User
  - Pregled svih prijava
  - Izmena statusa
  - Pregled istorije
  - Statistika prijava

---

##  Baza podataka

Projekat koristi epiz_31121671_sup25 databazu

### Tabele

- **ts_korisnici**
- **ts_ljubimci**
- **ts_logs**   

---

## Podaci za testiranje

Korisnik:

Korisničko ime: teodora
Lozinka: teodora123

Admin:

Korisničko ime: admin
Lozinka: admin123
Link aplikacije: https://usp2022.epizy.com/sup25/ts/index.php

## Autor projekta

Teodora Stanojević
Indeks br: 2020/5007 FIT


