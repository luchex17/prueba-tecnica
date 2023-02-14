-- Database: prueba

-- DROP DATABASE IF EXISTS prueba;

CREATE DATABASE prueba
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Spanish_Spain.1252'
    LC_CTYPE = 'Spanish_Spain.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;

CREATE EXTENSION IF NOT EXISTS 
"uuid-ossp" WITH schema public;

-- Table: public.materias

-- DROP TABLE IF EXISTS public.materias;

CREATE TABLE IF NOT EXISTS public.materias
(
    id uuid NOT NULL DEFAULT 'uuid_generate_v4()',
    nombre character varying(50) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT materias_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.materias
    OWNER to postgres;    

-- Table: public.usuario_materia

-- DROP TABLE IF EXISTS public.usuario_materia;

CREATE TABLE IF NOT EXISTS public.usuario_materia
(
    id uuid NOT NULL DEFAULT 'uuid_generate_v4()',
    idusuario uuid NOT NULL,
    idmateria uuid NOT NULL,
    CONSTRAINT usuario_materia_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.usuario_materia
    OWNER to postgres;

-- Table: public.usuarios

-- DROP TABLE IF EXISTS public.usuarios;

CREATE TABLE IF NOT EXISTS public.usuarios
(
    id uuid NOT NULL DEFAULT 'uuid_generate_v4()',
    nombre character varying(50) COLLATE pg_catalog."default" NOT NULL,
    apellido character varying(50) COLLATE pg_catalog."default" NOT NULL,
    email character varying(100) COLLATE pg_catalog."default" NOT NULL,
    telefono character varying(50) COLLATE pg_catalog."default" NOT NULL,
    clave character varying(100) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT usuarios_pkey PRIMARY KEY (id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.usuarios
    OWNER to postgres;