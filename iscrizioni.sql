DROP TABLE IF EXISTS iscrizioni cascade;


CREATE TABLE iscrizioni(
nome varchar(50),
email varchar(100),
password varchar(100),
data_creazione TIMESTAMP DEFAULT Now() 
);


GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA myfootballblog TO www;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA myfootballblog TO www;



