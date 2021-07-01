DROP TABLE IF EXISTS iscrizioni cascade;
DROP TABLE IF EXISTS squadre cascade;
DROP TABLE IF EXISTS recensioni cascade;


CREATE TABLE iscrizioni(
id SERIAL PRIMARY KEY,
nome varchar(50),
email varchar(100),
password varchar(200),
data_creazione TIMESTAMP DEFAULT Now() 
);

INSERT INTO iscrizioni(nome, email, password) values('Ores','ores@test.com', '$2y$10$eo.hrM4ke.IwWr5N4vayWu8W9QAs3NM/eQhQJwTZqgbtklsFGLbI.');
INSERT INTO iscrizioni(nome, email, password) values('Gabriele','gabriele@test.com', '$2y$10$M4JVwSnG1IcYcdVyIJwcb.asa6uU8fNFsElvsQFbjFF8dSnSHVAxW');
INSERT INTO iscrizioni(nome, email, password) values('Marco','marco@test.com', '$2y$10$JTBwzz6U.2NOUXMwRj1zkOvye29RKX/Z5NWCS0tVpitvc89jpSxrK');
INSERT INTO iscrizioni(nome, email, password) values('Umberto','umberto@test.com', '$2y$10$vGBtQnQbf3GC8ZTpIZanp.QDsgNRFpACSg..t3VoDZXfPY8lxuUaa');


CREATE TABLE squadre (
id SERIAL PRIMARY KEY,
nome varchar(50),
immagine varchar(50),
data_creazione TIMESTAMP DEFAULT Now() 
);

INSERT INTO squadre(nome, immagine) values('Milan','milan.png');
INSERT INTO squadre(nome, immagine) values('Inter','inter.png');
INSERT INTO squadre(nome, immagine) values('Roma','roma.png');
INSERT INTO squadre(nome, immagine) values('Real Madrid','real.png');
INSERT INTO squadre(nome, immagine) values('Barcellona','barca.png');
INSERT INTO squadre(nome, immagine) values('Bayern Monaco','bayern.png');
INSERT INTO squadre(nome, immagine) values('Borussia Dortmund','dortmund.png');
INSERT INTO squadre(nome, immagine) values('Paris Saint-Germain','psg.png');
INSERT INTO squadre(nome, immagine) values('Tottenham Hotspur','tottenham.png');
INSERT INTO squadre(nome, immagine) values('Manchester City','city.png');
INSERT INTO squadre(nome, immagine) values('Losc Lille','lille.png');

CREATE TABLE recensioni (
id SERIAL PRIMARY KEY,
titolo varchar(100),
testo text,
data_creazione TIMESTAMP DEFAULT Now(),
squadra int REFERENCES squadre (id) 
    ON UPDATE CASCADE ON DELETE CASCADE,
utente int REFERENCES iscrizioni (id) 
    ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO recensioni(titolo, testo,squadra,utente) values('Hala Madrid','Il Real Madrid è una delle squadre più vincenti in Europa, se non la più vincente. Un club che ha milioni di tifosi in tutto il mondo e che non smette mai di crescere sotto diversi aspetti.', 4, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Barca "Mas que un club"','Il Barca è un club che ha segnato la storia del calcio degli ultimi 20 anni. Un club estremamente legato al territorio della Catalogna', 5, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Milano è Rossonera','Il Milan è il club italiano più vincente in Europa', 1, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Pazza Inter Amala','Internazionale Milano, un club destinato a soccombere sotto il potere e la Gloria della Juventus', 2, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Roma Caput Mundi','La Roma si ama a prescindere', 3, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Bayern Monaco, la richezza della Baviera','Il Bayern Munich è uno dei simbolo della Baviera per la sua gestione sportiva e commerciale efficiente ed oculata', 6, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Borussia Dortmund','Il Bvb è famoso per il calore del suo Stadio, in particolare per il loro famoso "Muro Giallo", ovvero la curva Sud', 7, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Manchester city, il potere dei petroldollari','Il City era un club sconosciuto fino al 2011, diventato una potenza europea dopo essere stato acquistato dallo sceicco Mansour ',10, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Psg','Il club parigino è diventato un club in fortissima espasione sotto gli investimenti dello sceicco del Qatar',8, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Lille','La squadra Francese ha sopreso tutti nel 2021 vincendo a sopresa la Ligue One battendo la corrazzata del PSG', 11, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Spurs','Il club di Londra ha appena costruito uno stadio enorme munito anche di Strip CLub sul tetto dello stadio, esperienza incredibile', 9, 1);


GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO www;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO www;



