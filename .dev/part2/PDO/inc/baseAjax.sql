SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE `DataProduct`;
USE `DataParoduct`

CREATE TABLE IF NOT EXISTS `TypeP` (
  `id` INT,
  `nom` varchar(50) NOT NULL,
   PRIMARY KEY (`idProduct`)
);

CREATE TABLE IF NOT EXISTS `Product` (
  `idProduct` INT,
  `type1` INT,
  `type2` INT,
  `pathP` varchar(100) NOT NULL,
  `nameP` varchar(50) NOT NULL,
  `prix` double,
  `dateAjout` DATE,
  `nbrSatisfact` INT,
   PRIMARY KEY (`idProduct`),
   FOREIGN KEY (type1) REFERENCES TypeP(id),
   FOREIGN KEY (type2) REFERENCES TypeP(id)
);


CREATE sequence idType;
INSERT INTO TypeP(id,nom) VALUES(idType.nextVal(),"Fresh Meat");
INSERT INTO TypeP(id,nom) VALUES(idType.nextVal(),"Vegetables");
INSERT INTO TypeP(id,nom) VALUES(idType.nextVal(),"Fruit & Nut Gifts");
INSERT INTO TypeP(id,nom) VALUES(idType.nextVal(),"Fresh Berries");
INSERT INTO TypeP(id,nom) VALUES(idType.nextVal(),"Ocean Foods");
INSERT INTO TypeP(id,nom) VALUES(idType.nextVal(),"Butter & Eggs");
INSERT INTO TypeP(id,nom) VALUES(idType.nextVal(),"Fastfood");
INSERT INTO TypeP(id,nom) VALUES(idType.nextVal(),"Fresh Onion");
INSERT INTO TypeP(id,nom) VALUES(idType.nextVal(),"Papayaya & Crisps");
INSERT INTO TypeP(id,nom) VALUES(idType.nextVal(),"Oatmeal");
INSERT INTO TypeP(id,nom) VALUES(idType.nextVal(),"Fresh Banana");

CREATE sequence idProduit;
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),11,9,"img/sary/Fresh Bananas/Bananas1.jpg","banane",2000,'2012-10-10',10);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),11,8,"img/sary/Fresh Bananas/Bananas2.jpg","banane",2000,'2012-10-12',100);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),11,1,"img/sary/Fresh Bananas/Bananas3.jpg","banane",2000,'2012-10-09',23);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),10,7,"img/sary/oatmeal/Oatmeal1.jpg","oatmeal",2000,'2012-10-15',80);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),10,5,"img/sary/oatmeal/Oatmeal2.jpg","oatmeal",2000,'2012-10-13',90);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),10,4,"img/sary/oatmeal/Oatmeal3.jpg","oatmeal",2000,'2012-10-20',39);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),9,9,"img/sary/papayaya/Papayaya1.jpg","papaya",2000,'2012-10-01',29);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),9,9,"img/sary/papayaya/Papayaya2.jpg","papaya",2000,'2012-10-17',90);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),9,9,"img/sary/papayaya/Papayaya3.jpg","papaya",2000,'2012-10-19',89);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),8,8,"img/sary/fresh onion/Onion1.jpg","onion",2000,'2012-10-18',48);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),8,8,"img/sary/fresh onion/Onion2.jpg","onion",2000,'2012-10-07',77);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),8,8,"img/sary/fresh onion/Onion3.jpg","onion",2000,'2012-10-02',90);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),7,7,"img/sary/fastfood/Fastfood1.jpg","fastfood",2000,'2012-10-03',68);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),7,7,"img/sary/fastfood/Fastfood2.jpg","fastfood",2000,'2012-10-09',95);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),7,7,"img/sary/fastfood/Fastfood3.jpg","fastfood",2000,'2012-10-18',101);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),6,6,"img/sary/butter/Butter1.jpg","butter",2000,'2012-10-21',95);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),6,6,"img/sary/butter/Butter2.jpg","butter",2000,'2012-08-12',19);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),6,6,"img/sary/butter/Butter3.jpg","butter",2000,'2012-08-10',23);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),5,5,"img/sary/ocean food/Ocean_Foods1.jpg","crevette",2000,'2012-08-11',22);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),5,5,"img/sary/ocean food/Ocean_Foods2.jpg","crevette",2000,'2012-08-12',55);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),5,5,"img/sary/ocean food/Ocean_Foods3.jpg","crevette",2000,'2012-08-13',91);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),4,4,"img/sary/fresh berries/Berries1.jpg","berries",2000,'2012-08-18',94);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),4,4,"img/sary/fresh berries/Berries2.jpg","berries",2000,'2012-08-19',83);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),4,4,"img/sary/fresh berries/Berries3.jpg","berries",2000,'2012-08-20',76);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),3,3,"img/sary/fruit/Fruit1.jpg","fruit",2000,'2012-09-01',61);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),3,3,"img/sary/fruit/Fruit2.jpg","fruit",2000,'2012-09-02',31);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),3,3,"img/sary/fruit/Fruit3.jpg","fruit",2000,'2012-09-05',89);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),2,2,"img/sary/vegetables/Vegetables1.jpg","legumes",2000,'2012-09-07',25);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),2,2,"img/sary/vegetables/Vegetables2.jpg","legumes",2000,'2012-09-09',13);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),2,2,"img/sary/vegetables/Vegetables3.jpg","legumes",2000,'2012-09-10',20);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),1,1,"img/sary/fresh meat/Meat1.jpg","viande",2000,'2012-09-11',122);
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),1,1,"img/sary/fresh meat/Meat2.jpg","viande",2000,'2012-09-12',23;
INSERT INTO Product(idProduct,type1,type2,pathP,nameP,prix,dateAjout,nbrSatisfact) VALUES(idProduit.nextVal(),1,1,"img/sary/fresh meat/Meat3.jpg","viande",2000,'2012-09-13',25);
COMMIT;



