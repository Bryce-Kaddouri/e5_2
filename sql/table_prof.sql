CREATE TABLE Professeurs (
    id SMALLINT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(10) NOT NULL,
    prenom VARCHAR(10) NOT NULL,
    login VARCHAR(15) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    CONSTRAINT PK_Professeurs PRIMARY KEY (id)
);

INSERT INTO Professeurs VALUES(NULL, 'DEFAY', 'Nicolas', 'ndefay', SHA2('12-Soleil&', 512));
INSERT INTO Professeurs VALUES(NULL, 'SICARD', 'Olivier', 'osicard', SHA2('12-Soleil&', 512));