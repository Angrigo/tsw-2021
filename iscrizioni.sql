DROP TABLE IF EXISTS iscrizioni cascade;


CREATE TABLE iscrizioni(
id SERIAL PRIMARY KEY,
nome varchar(50),
email varchar(100),
password varchar(100),
data_creazione TIMESTAMP DEFAULT Now() 
);


GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO www;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO www;



