DROP DATABASE IF EXISTS RESA;

CREATE DATABASE IF NOT EXISTS RESA;
USE RESA;
# -----------------------------------------------------------------------------
#       TABLE : ETAT_RESA
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ETAT_RESA
 (
   CODEETATRESA CHAR(2) NOT NULL  ,
   NOMETATRESA CHAR(15) NULL  
   , PRIMARY KEY (CODEETATRESA) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : HEBERGEMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS HEBERGEMENT
 (
   NOHEB INTEGER(4) NOT NULL  ,
   CODETYPEHEB CHAR(5) NOT NULL  ,
   NOMHEB CHAR(40) NULL  ,
   NBPLACEHEB INTEGER(2) NULL  ,
   SURFACEHEB INTEGER(3) NULL  ,
   INTERNET BOOL NULL  ,
   ANNEEHEB INTEGER(4) NULL  ,
   SECTEURHEB CHAR(15) NULL  ,
   ORIENTATIONHEB CHAR(5) NULL  ,
   ETATHEB CHAR(32) NULL  ,
   DESCRIHEB CHAR(200) NULL  ,
   PHOTOHEB CHAR(50) NULL  ,
   TARIFSEMHEB DECIMAL(7,2) NULL  
   , PRIMARY KEY (NOHEB) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE HEBERGEMENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_HEBERGEMENT_TYPE_HEB
     ON HEBERGEMENT (CODETYPEHEB ASC);

# -----------------------------------------------------------------------------
#       TABLE : RESA
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RESA
 (
   NORESA INTEGER(5) NOT NULL  ,
   USER CHAR(8) NOT NULL  ,
   DATEDEBSEM DATE NOT NULL  ,
   NOHEB INTEGER(4) NOT NULL  ,
   CODEETATRESA CHAR(2) NOT NULL  ,
   DATERESA DATE NULL  ,
   DATEARRHES DATE NULL  ,
   MONTANTARRHES DECIMAL(7,2) NULL  ,
   NBOCCUPANT INTEGER(2) NULL  ,
   TARIFSEMRESA DECIMAL(7,2) NULL  
   , PRIMARY KEY (NORESA) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE RESA
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_RESA_COMPTE
     ON RESA (USER ASC);

CREATE  INDEX I_FK_RESA_SEMAINE
     ON RESA (DATEDEBSEM ASC);

CREATE  INDEX I_FK_RESA_HEBERGEMENT
     ON RESA (NOHEB ASC);

CREATE  INDEX I_FK_RESA_ETAT_RESA
     ON RESA (CODEETATRESA ASC);

# -----------------------------------------------------------------------------
#       TABLE : SEMAINE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SEMAINE
 (
   DATEDEBSEM DATE NOT NULL  ,
   DATEFINSEM DATE NULL  
   , PRIMARY KEY (DATEDEBSEM) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : TYPE_HEB
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPE_HEB
 (
   CODETYPEHEB CHAR(5) NOT NULL  ,
   NOMTYPEHEB CHAR(30) NULL  
   , PRIMARY KEY (CODETYPEHEB) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMPTE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMPTE
 (
   USER CHAR(8) NOT NULL  ,
   MDP CHAR(10) NULL  ,
   NOMCPTE CHAR(40) NULL  ,
   PRENOMCPTE CHAR(30) NULL  ,
   DATEINSCRIP DATE NULL  ,
   DATEFERME DATE NULL  ,
   TYPECOMPTE CHAR(3) NULL  ,
   ADRMAILCPTE CHAR(60) NULL  ,
   NOTELCPTE CHAR(15) NULL  ,
   NOPORTCPTE CHAR(15) NULL  
   , PRIMARY KEY (USER) 
 ) 
 comment = "";


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE HEBERGEMENT 
  ADD FOREIGN KEY FK_HEBERGEMENT_TYPE_HEB (CODETYPEHEB)
      REFERENCES TYPE_HEB (CODETYPEHEB) ;


ALTER TABLE RESA 
  ADD FOREIGN KEY FK_RESA_COMPTE (USER)
      REFERENCES COMPTE (USER) ;


ALTER TABLE RESA 
  ADD FOREIGN KEY FK_RESA_SEMAINE (DATEDEBSEM)
      REFERENCES SEMAINE (DATEDEBSEM) ;


ALTER TABLE RESA 
  ADD FOREIGN KEY FK_RESA_HEBERGEMENT (NOHEB)
      REFERENCES HEBERGEMENT (NOHEB) ;


ALTER TABLE RESA 
  ADD FOREIGN KEY FK_RESA_ETAT_RESA (CODEETATRESA)
      REFERENCES ETAT_RESA (CODEETATRESA) ;

