DROP DATABASE IF EXISTS athnet;
CREATE DATABASE athnet
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;
USE athnet;

CREATE TABLE club (
    id_club        INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nom            VARCHAR(100) NOT NULL,
    ciutat         VARCHAR(100),
    data_creacio   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_club),
    UNIQUE KEY uq_club_nom (nom)
);


CREATE TABLE usuari (
    id_usuari       INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    nom             VARCHAR(50)   NOT NULL,
    cognoms         VARCHAR(100)  NOT NULL,
    username        VARCHAR(50)   NOT NULL,
    email           VARCHAR(150)  NOT NULL,
    password        VARCHAR(255)  NOT NULL,
    data_naixement  DATE          NOT NULL,
    rol             VARCHAR(50) NOT NULL DEFAULT 'usuari',
    id_club         INT UNSIGNED  NULL,
    data_registre   DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_usuari),
    UNIQUE KEY uq_usuari_email    (email),
    UNIQUE KEY uq_usuari_username (username),
    KEY idx_usuari_club (id_club),
    KEY idx_usuari_rol  (rol),
    CONSTRAINT fk_usuari_club
        FOREIGN KEY (id_club) REFERENCES club (id_club)
        ON DELETE SET NULL ON UPDATE CASCADE
);


CREATE TABLE competicio (
    id_competicio  INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    nom            VARCHAR(150)  NOT NULL,
    data           DATETIME      NOT NULL,
    ubicacio       VARCHAR(150),
    distancia_km   DECIMAL(8,2),
    tipus          VARCHAR(50)   NOT NULL DEFAULT 'Ruta',
    PRIMARY KEY (id_competicio)
);

CREATE TABLE activitat (
    id_activitat  INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    id_usuari     INT UNSIGNED  NOT NULL,
    titol         VARCHAR(25)   NOT NULL,
    tipus         VARCHAR(50)   NOT NULL,
    data          DATETIME      NOT NULL,
    durada        INT UNSIGNED  NOT NULL,
    distancia     DECIMAL(8,2),
    ruta          JSON              NULL,
    PRIMARY KEY (id_activitat),
    KEY idx_activitat_usuari (id_usuari),
    CONSTRAINT fk_activitat_usuari
        FOREIGN KEY (id_usuari) REFERENCES usuari (id_usuari)
        ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE record_marca (
    id_record        INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    id_activitat     INT UNSIGNED  NOT NULL,
    tipus_marca      VARCHAR(50)   NOT NULL,
    valor            DECIMAL(10,2) NOT NULL,
    data_assoliment  DATE          NOT NULL,
    PRIMARY KEY (id_record),
    UNIQUE KEY uq_record_activitat (id_activitat),
    CONSTRAINT fk_record_activitat
        FOREIGN KEY (id_activitat) REFERENCES activitat (id_activitat)
        ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE inscripcio (
    id_usuari         INT UNSIGNED NOT NULL,
    id_competicio     INT UNSIGNED NOT NULL,
    data_inscripcio   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_usuari, id_competicio),
    KEY idx_inscripcio_competicio (id_competicio),
    CONSTRAINT fk_inscripcio_usuari
        FOREIGN KEY (id_usuari) REFERENCES usuari (id_usuari)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_inscripcio_competicio
        FOREIGN KEY (id_competicio) REFERENCES competicio (id_competicio)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE segueix (
    id_seguidor  INT UNSIGNED NOT NULL,
    id_seguit    INT UNSIGNED NOT NULL,
    data_inici   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_seguidor, id_seguit),
    KEY idx_segueix_seguit (id_seguit),
    CONSTRAINT fk_segueix_seguidor
        FOREIGN KEY (id_seguidor) REFERENCES usuari (id_usuari)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_segueix_seguit
        FOREIGN KEY (id_seguit) REFERENCES usuari (id_usuari)
        ON DELETE CASCADE ON UPDATE CASCADE
);
