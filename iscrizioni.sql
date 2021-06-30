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

INSERT INTO iscrizioni(nome, email, password) values('Test','test@test.com', '$2y$10$SbiqSQXJ.N5Lq2Mp/TO/9OSifKCIm15hwhE.qYW7EzQp25ROKy//y');


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

INSERT INTO recensioni(titolo, testo,squadra,utente) values('Titolo 1','testooooooo', 1, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Titolo 2','testooooooo', 1, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Titolo 3','testooooooo', 2, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Titolo 4','testooooooo', 2, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Titolo 5','testooooooo', 3, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Titolo 6','testooooooo', 3, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Titolo 7','testooooooo', 3, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Titolo 8','testooooooo', 4, 1);
INSERT INTO recensioni(titolo, testo,squadra,utente) values('Titolo 9','testooooooo', 4, 1);


GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO www;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO www;



