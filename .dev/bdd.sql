create database agence_immo;

create user agence_frontoffice_service with encrypted password 'etu001844';
create user agence_backoffice_service with encrypted password 'etu001844';
grant all privileges on database agence_immo to agence_backoffice_service;
grant all privileges on database agence_immo to agence_frontoffice_service;

\c agence_immo

CREATE TABLE administrateur   
	(idAdministrateur int CONSTRAINT PK_administrateur PRIMARY KEY,     
	pseudo VARCHAR(30),
    mdp VARCHAR(20)) ;

CREATE TABLE client   
	(idClient int CONSTRAINT PK_client PRIMARY KEY,     
	pseudo VARCHAR(30),
    nom VARCHAR(50),
    mdp VARCHAR(30),
    numTel VARCHAR(30),
    mail VARCHAR(20)) ;

CREATE TABLE quartier   
	(idQuartier int CONSTRAINT PK_quartier PRIMARY KEY,
    nom VARCHAR(20)) ;

CREATE TABLE typeHabitation   
	(idtype int CONSTRAINT PK_typeHabitation PRIMARY KEY,
    nom VARCHAR(20)) ;

CREATE TABLE habitation   
	(idHabitation int CONSTRAINT PK_habitation PRIMARY KEY,
    idType int CONSTRAINT FK_idType REFERENCES typeHabitation,
    nbrChambre int,
    idQuartier int CONSTRAINT FK_idQuartier REFERENCES quartier,
    adresse VARCHAR(20),
    tarifParJour DECIMAL,
    descript VARCHAR(100)) ;

CREATE TABLE historiqueLoyer   
	(idLoyer int CONSTRAINT PK_historiqueLoyer PRIMARY KEY,     
	idHabitation int CONSTRAINT FK_idHabitation REFERENCES habitation,
    Daty DATE,
    prix DECIMAL) ;

CREATE TABLE reservation   
	(idReservation int CONSTRAINT PK_reservation PRIMARY KEY,     
	idHabitation int CONSTRAINT FK_idHabitation REFERENCES habitation,
	dateDebut DATE,
    dateFin DATE, 
    idClient VARCHAR(15)) ;

CREATE TABLE habitationDefectueux   
	(idHabitationDef int CONSTRAINT PK_habitationDefectueux PRIMARY KEY,     
	idHabitation int CONSTRAINT FK_idHabitation REFERENCES habitation,
    dateFin DATE) ;

CREATE TABLE photoHabitation   
	(idPhoto int CONSTRAINT PK_photoHabitation PRIMARY KEY,     
	idHabitation int CONSTRAINT FK_idHabitation REFERENCES habitation,
    lien VARCHAR(100)) ;

grant all on administrateur to agence_backoffice_service;
grant all on client to agence_backoffice_service;
grant all on habitation to agence_backoffice_service;
grant all on habitationdefectueux to agence_backoffice_service;
grant all on historiqueloyer to agence_backoffice_service;
grant all on photohabitation to agence_backoffice_service;
grant all on quartier to agence_backoffice_service;
grant all on reservation to agence_backoffice_service;
grant all on typehabitation to agence_backoffice_service;

grant all on client to agence_frontoffice_service;
grant all on habitationdefectueux to agence_frontoffice_service;
grant all on habitation to agence_frontoffice_service;
grant all on photohabitation to agence_frontoffice_service;
grant all on quartier to agence_frontoffice_service;
grant all on reservation to agence_frontoffice_service;
grant all on typehabitation to agence_frontoffice_service;


CREATE sequence seqAdmin;
grant all on seqAdmin to agence_backoffice_service;
grant all on seqAdmin to agence_frontoffice_service;
INSERT INTO administrateur VALUES(nextVal('seqAdmin'),'Hakim Le Hacker','aaaaaa');
INSERT INTO administrateur VALUES(nextVal('seqAdmin'),'Irchad Houssen','bbbbbb');
INSERT INTO administrateur VALUES(nextVal('seqAdmin'),'Coco Intelligent','cccccc');

CREATE sequence seqClient;
grant all on seqClient to agence_backoffice_service;
grant all on seqClient to agence_frontoffice_service;
INSERT INTO client VALUES(nextVal('seqClient'),'Tojo','TOJONIRINA Valisoa','eeeeee','0343487382','tojo@gmail.com');
INSERT INTO client VALUES(nextVal('seqClient'),'Koto','KOTOARISOA Bob','ffffff','0332384983','koto@gmail.com');
INSERT INTO client VALUES(nextVal('seqClient'),'Finaritra','HERINANTENAINA Finaritra','gggggg','0329287634','finaritra@gmail.com');
INSERT INTO client VALUES(nextVal('seqClient'),'Manantena','MANANTENASOA Manjaka','hhhhhh','0343487382','manantena@gmail.com');
INSERT INTO client VALUES(nextVal('seqClient'),'Lalaina','HERILALAINA Mioty','iiiiii','0332284983','lalaina@gmail.com');
INSERT INTO client VALUES(nextVal('seqClient'),'Fitiavana','FITIAVANTSOA Sarobidy''jjjjjj','0329297634','fitiavana@gmail.com');

CREATE sequence seqQuartier;
grant all on seqQuartier to agence_backoffice_service;
grant all on seqQuartier to agence_frontoffice_service;
INSERT INTO quartier VALUES(nextVal('seqQuartier'),'East Tremont');
INSERT INTO quartier VALUES(nextVal('seqQuartier'),'Belmont');
INSERT INTO quartier VALUES(nextVal('seqQuartier'),'Bronxdale');
INSERT INTO quartier VALUES(nextVal('seqQuartier'),'Longwood');
INSERT INTO quartier VALUES(nextVal('seqQuartier'),'Norwood');
INSERT INTO quartier VALUES(nextVal('seqQuartier'),'West Concours');
INSERT INTO quartier VALUES(nextVal('seqQuartier'),'Parkchester');

CREATE sequence seqTypeHabitation;
grant all on seqTypeHabitation to agence_backoffice_service;
INSERT INTO typeHabitation VALUES(nextVal('seqTypeHabitation'),'Appartement');
INSERT INTO typeHabitation VALUES(nextVal('seqTypeHabitation'),'Duplex');
INSERT INTO typeHabitation VALUES(nextVal('seqTypeHabitation'),'Studio');
INSERT INTO typeHabitation VALUES(nextVal('seqTypeHabitation'),'Triplex');
INSERT INTO typeHabitation VALUES(nextVal('seqTypeHabitation'),'Un loft');
INSERT INTO typeHabitation VALUES(nextVal('seqTypeHabitation'),'Souplex');
INSERT INTO typeHabitation VALUES(nextVal('seqTypeHabitation'),'La colocation');

CREATE sequence seqHabitation;
grant all on seqHabitation to agence_backoffice_service;
grant all on seqHabitation to agence_frontoffice_service;
INSERT INTO habitation VALUES(nextVal('seqHabitation'),1,3,1,'8TH FLOOR',55000,'Appartement avec un salon et deux chambres');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),2,4,1,'9TH FLOOR',66000,'Le meilleur logement avec 1 cuisine,2grandes salles et 1salon');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),1,5,2,'10TH FLOOR',75000,'Appartement avec pismcine,garage et 5 chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),2,2,3,'11TH FLOOR',100000,'Vivez confortablemet avec ce logement à deux chambres et de salle de bain');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),3,7,3,'12TH FLOOR',17000,'comportant une grande chambre,1cuisine');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),4,3,2,'10TH FLOOR',20000,'Trois chambres avec cuisine et salle de bain');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),5,3,4,'8THFLOOR',40000,'Trois petit chambres mais confortables');
--donnée habitation vaovao
INSERT INTO habitation VALUES(nextVal('seqHabitation'),5,4,4,'8THFLOOR',70000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),5,4,5,'8THFLOOR',50000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),5,4,1,'8THFLOOR',100000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),1,4,5,'12THFLOOR',90000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),1,3,5,'12THFLOOR',80000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),1,2,5,'12THFLOOR',60000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),1,1,1,'10THFLOOR',40000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),1,1,2,'10THFLOOR',50000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),1,1,3,'10THFLOOR',60000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),1,1,4,'10THFLOOR',90000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),2,1,1,'09THFLOOR',50000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),2,1,2,'09THFLOOR',60000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),2,1,3,'09THFLOOR',70000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),2,1,4,'09THFLOOR',80000,'Maison avec des chambres confortables');
INSERT INTO habitation VALUES(nextVal('seqHabitation'),2,2,5,'09THFLOOR',50000,'Maison avec des chambres confortables');

CREATE sequence seqHistoriqueLoyer;
grant all on seqHistoriqueLoyer to agence_backoffice_service;
grant all on seqHistoriqueLoyer to agence_frontoffice_service;
INSERT INTO historiqueLoyer VALUES(nextVal('seqHistoriqueLoyer'),1,'2022-01-01',50000);
INSERT INTO historiqueLoyer VALUES(nextVal('seqHistoriqueLoyer'),2,'2022-01-01',60000);
INSERT INTO historiqueLoyer VALUES(nextVal('seqHistoriqueLoyer'),3,'2022-01-01',80000);
INSERT INTO historiqueLoyer VALUES(nextVal('seqHistoriqueLoyer'),4,'2022-01-01',100000);
INSERT INTO historiqueLoyer VALUES(nextVal('seqHistoriqueLoyer'),5,'2022-01-01',90000);
INSERT INTO historiqueLoyer VALUES(nextVal('seqHistoriqueLoyer'),6,'2022-01-01',110000);
INSERT INTO historiqueLoyer VALUES(nextVal('seqHistoriqueLoyer'),7,'2022-01-01',70000);

CREATE sequence seqReservation;
grant all on seqReservation to agence_backoffice_service;
grant all on seqReservation to agence_frontoffice_service;
INSERT INTO reservation VALUES(nextVal('seqReservation'),1,'2022-01-01','2022-01-10',1);
INSERT INTO reservation VALUES(nextVal('seqReservation'),2,'2022-01-01','2022-01-10',2);
INSERT INTO reservation VALUES(nextVal('seqReservation'),3,'2022-01-01','2022-01-10',3);
INSERT INTO reservation VALUES(nextVal('seqReservation'),4,'2022-01-01','2022-01-10',4);
INSERT INTO reservation VALUES(nextVal('seqReservation'),5,'2022-01-01','2022-01-10',5);

CREATE sequence seqHabitationDefectueux;
grant all on seqHabitationDefectueux to agence_backoffice_service;
grant all on seqHabitationDefectueux to agence_frontoffice_service;
INSERT INTO habitationDefectueux VALUES(nextVal('seqHabitationDefectueux'),1,'2022-12-01');
INSERT INTO habitationDefectueux VALUES(nextVal('seqHabitationDefectueux'),2,'2022-10-01');
INSERT INTO habitationDefectueux VALUES(nextVal('seqHabitationDefectueux'),3,'2022-09-01');

CREATE sequence seqPhoto;
grant all on seqPhoto to agence_backoffice_service;
grant all on seqPhoto to agence_frontoffice_service;
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),1,'habitation1.jpg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),2,'habitation2.jpg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),3,'habitation3.jpg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),4,'habitation4.jpeg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),5,'habitation5.jpeg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),6,'habitation6.jpg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),7,'habitation7.jpeg');
--photo vaovao
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),8,'habitation1.jpg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),9,'habitation2.jpg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),10,'habitation3.jpg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),11,'habitation4.jpeg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),12,'habitation5.jpeg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),13,'habitation6.jpg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),14,'habitation7.jpeg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),15,'habitation1.jpg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),16,'habitation2.jpg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),17,'habitation3.jpg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),18,'habitation4.jpeg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),19,'habitation5.jpeg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),20,'habitation6.jpg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),21,'habitation7.jpeg');
INSERT INTO photoHabitation VALUES(nextVal('seqPhoto'),22,'habitation1.jpg');

--liste des habitations
create view habitationNonSupprime as select * from habitation where idHabitation not in (select idHabitation from habitationDefectueux);
select typeHabitation.nom,nbrChambre,quartier.nom,descript,adresse,tarifParJour from habitationNonSupprime 
        join quartier on habitationNonSupprime.idQuartier=quartier.idQuartier 
        join typeHabitation on typeHabitation.idtype=habitationNonSupprime.idType;

--liste des habitations disponibles dans une date donnee
select typeHabitation.nom as typeHabitation,nbrChambre,quartier.nom as nomQuartier,descript,adresse,tarifParJour from habitationNonSupprime 
        join quartier on habitationNonSupprime.idQuartier=quartier.idQuartier 
        join typeHabitation on typeHabitation.idtype=habitationNonSupprime.idType 
        where idHabitation not in (select idHabitation from reservation where DATE('2022-01-05')>=dateDebut and DATE('2022-01-05')<=dateFin);

--verifier si une chambre est disponible à partir d une date donnee(si resultat null=>chambre indisponible)
select idHabitation from habitation where idHabitation=6 and idHabitation
        in (select idHabitation
        from habitationNonSupprime 
        where idHabitation not in
        (select idHabitation
        from reservation where 
        DATE('2022-01-05')>=dateDebut and DATE('2022-01-05')<=dateFin));

--detail d une habitation à partir d une id
select typeHabitation.nom,nbrChambre,quartier.nom,descript,adresse,tarifParJour from habitationNonSupprime 
        join quartier on habitationNonSupprime.idQuartier=quartier.idQuartier 
        join typeHabitation on typeHabitation.idtype=habitationNonSupprime.idType where habitationNonSupprime.idHabitation=5;

--supprimer une habitation à l aide de son id(donne en argument d une fonction)
INSERT INTO habitationDefectueux VALUES(nextVal('seqHabitationDefectueux'),1,current_date);

--recherche à partir du description
select typeHabitation.nom,nbrChambre,quartier.nom,descript,adresse,tarifParJour from habitationNonSupprime 
        join quartier on habitationNonSupprime.idQuartier=quartier.idQuartier 
        join typeHabitation on typeHabitation.idtype=habitationNonSupprime.idType where habitationNonSupprime.descript like '%logement%';

--recherche multicritere à partir d un type,quartier et nombre de chambre
select typeHabitation.nom,nbrChambre,quartier.nom,descript,adresse,tarifParJour from habitationNonSupprime 
        join quartier on habitationNonSupprime.idQuartier=quartier.idQuartier 
        join typeHabitation on typeHabitation.idtype=habitationNonSupprime.idType 
        where typeHabitation.nom='Appartement' 
        and quartier.nom='East Tremont' 
        and habitationNonSupprime.nbrChambre=3;

