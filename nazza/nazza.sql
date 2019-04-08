

#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Adhérant
#------------------------------------------------------------

CREATE TABLE Adherant(
        id_adh Int  Auto_increment  NOT NULL ,
        nom    Varchar (50) NOT NULL ,
        prenom Varchar (50) NOT NULL ,
        pseudo Varchar (50) NOT NULL ,
        mdp    Varchar (50) NOT NULL ,
        status Bool NOT NULL
	,CONSTRAINT Adherant_PK PRIMARY KEY (id_adh)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Ville
#------------------------------------------------------------

CREATE TABLE Ville(
        id_ville  Int NOT NULL ,
        nom_ville Varchar (50) NOT NULL ,
        longitude Float NOT NULL ,
        latitude  Float NOT NULL
	,CONSTRAINT Ville_PK PRIMARY KEY (id_ville)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Trajet
#------------------------------------------------------------

CREATE TABLE Trajet(
        id_trajet Int Auto_increment NOT NULL ,
        debut     Int NOT NULL ,
        fin       Int NOT NULL ,
        nb_places Int NOT NULL ,
        date      Datetime NOT NULL ,
        
	CONSTRAINT Trajet_PK PRIMARY KEY (id_trajet)

	
    ,CONSTRAINT deb_vil_FK FOREIGN KEY (debut) REFERENCES Ville(id_ville)
    ,CONSTRAINT fin_vil_FK FOREIGN KEY (fin) REFERENCES Ville(id_ville)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Personnel
#------------------------------------------------------------

CREATE TABLE Personnel(
        id Int NOT NULL ,
        Fonction Varchar (20) NOT NULL ,

        CONSTRAINT Perso_adh_FK FOREIGN KEY (id) REFERENCES Adherant(id_adh)

)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Eleve
#------------------------------------------------------------

CREATE TABLE Eleve(
        id Int NOT NULL ,
        Filiaire Varchar (20) NOT NULL ,

        CONSTRAINT Eleve_adh_FK FOREIGN KEY (id) REFERENCES Adherant(id_adh)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Propose
#------------------------------------------------------------

CREATE TABLE Propose(
        id_trajet_Propose Int NOT NULL ,
        id_adh_Adherant   Int NOT NULL 
	#--,CONSTRAINT Propose_PK PRIMARY KEY (id_trajet_Propose,id_adh_Adherant)

	,CONSTRAINT Propose_Trajet_FK FOREIGN KEY (id_trajet_Propose) REFERENCES Trajet(id_trajet)
	,CONSTRAINT Propose_Adherant0_FK FOREIGN KEY (id_adh_Adherant) REFERENCES Adherant(id_adh)
    
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: est passagé
#------------------------------------------------------------

CREATE TABLE est_passage(
        id_trajet_est_passage Int NOT NULL ,
        id_adh_Adherant       Int NOT NULL 
	#--,CONSTRAINT est_passage_PK PRIMARY KEY (id_trajet_est_passage,id_adh_Adherant)

	,CONSTRAINT est_passage_Trajet_FK FOREIGN KEY (id_trajet_est_passage) REFERENCES Trajet(id_trajet)
	,CONSTRAINT est_passage_Adherant0_FK FOREIGN KEY (id_adh_Adherant) REFERENCES Adherant(id_adh)
    
)ENGINE=InnoDB;

