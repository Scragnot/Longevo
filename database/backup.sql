--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.3
-- Dumped by pg_dump version 9.5.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: postgres; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE postgres IS 'default administrative connection database';


--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: chamado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE chamado (
    id_chamado integer NOT NULL,
    id_cliente integer,
    id_pedido integer,
    titulo text,
    observacao text
);


ALTER TABLE chamado OWNER TO postgres;

--
-- Name: chamado_id_chamado_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE chamado_id_chamado_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE chamado_id_chamado_seq OWNER TO postgres;

--
-- Name: chamado_id_chamado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE chamado_id_chamado_seq OWNED BY chamado.id_chamado;


--
-- Name: cliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE cliente (
    id_cliente integer NOT NULL,
    nome text,
    email text
);


ALTER TABLE cliente OWNER TO postgres;

--
-- Name: cliente_id_cliente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cliente_id_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cliente_id_cliente_seq OWNER TO postgres;

--
-- Name: cliente_id_cliente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cliente_id_cliente_seq OWNED BY cliente.id_cliente;


--
-- Name: pedido; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE pedido (
    id_pedido integer NOT NULL,
    nome text
);


ALTER TABLE pedido OWNER TO postgres;

--
-- Name: pedido_id_pedido_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pedido_id_pedido_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pedido_id_pedido_seq OWNER TO postgres;

--
-- Name: pedido_id_pedido_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE pedido_id_pedido_seq OWNED BY pedido.id_pedido;


--
-- Name: id_chamado; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY chamado ALTER COLUMN id_chamado SET DEFAULT nextval('chamado_id_chamado_seq'::regclass);


--
-- Name: id_cliente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cliente ALTER COLUMN id_cliente SET DEFAULT nextval('cliente_id_cliente_seq'::regclass);


--
-- Name: id_pedido; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedido ALTER COLUMN id_pedido SET DEFAULT nextval('pedido_id_pedido_seq'::regclass);


--
-- Data for Name: chamado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY chamado (id_chamado, id_cliente, id_pedido, titulo, observacao) FROM stdin;
1	1	1	Chamado 1	Cliente 1 Pedido 1
2	2	2	chamado 2	cliente 2 pedido 2
3	3	3	chamado 3	cliente 3 pedido 3
4	4	4	chamado 4	cliente 4 pedido 4
5	5	5	chamado 5	cliente 5 pedido 5
6	6	6	chamado 6	cliente 6 pedido 6
7	7	7	chamado 7	cliente 7 pedido 7
8	11	1	teste	
9	11	1	teste	testestestesteassd
10	11	5	teste	teste
11	11	4	teste	teste
12	12	9	teste	teste
\.


--
-- Name: chamado_id_chamado_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('chamado_id_chamado_seq', 12, true);


--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cliente (id_cliente, nome, email) FROM stdin;
1	pessoa1	email1@email.com
2	pessoa2	email2@email.com
3	pessoa3	email3@email.com
4	pessoa4	email4@email.com
5	pessoa5	email5@email.com
6	pessoa6	email6@email.com
7	pessoa7	email7@email.com
8	pessoa8	email8@email.com
9	pessoa9	email9@email.com
10	pessoa10	email10@email.com
11	djskhldjaskhldkah	teste@teste.com
12	djskhldjaskhldkah5465456	teste9@teste.com
\.


--
-- Name: cliente_id_cliente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cliente_id_cliente_seq', 12, true);


--
-- Data for Name: pedido; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pedido (id_pedido, nome) FROM stdin;
1	pedido1
2	pedido2
3	pedido3
4	pedido4
5	pedido5
6	pedido6
7	pedido7
8	pedido8
9	pedido9
10	pedido10
\.


--
-- Name: pedido_id_pedido_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pedido_id_pedido_seq', 10, true);


--
-- Name: chamado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY chamado
    ADD CONSTRAINT chamado_pkey PRIMARY KEY (id_chamado);


--
-- Name: cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id_cliente);


--
-- Name: pedido_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedido
    ADD CONSTRAINT pedido_pkey PRIMARY KEY (id_pedido);


--
-- Name: chamado_id_cliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY chamado
    ADD CONSTRAINT chamado_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente);


--
-- Name: chamado_id_pedido_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY chamado
    ADD CONSTRAINT chamado_id_pedido_fkey FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: chamado; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE chamado FROM PUBLIC;
REVOKE ALL ON TABLE chamado FROM postgres;
GRANT ALL ON TABLE chamado TO postgres;
GRANT ALL ON TABLE chamado TO teste;


--
-- Name: chamado_id_chamado_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE chamado_id_chamado_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE chamado_id_chamado_seq FROM postgres;
GRANT ALL ON SEQUENCE chamado_id_chamado_seq TO postgres;
GRANT ALL ON SEQUENCE chamado_id_chamado_seq TO teste;


--
-- Name: cliente; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE cliente FROM PUBLIC;
REVOKE ALL ON TABLE cliente FROM postgres;
GRANT ALL ON TABLE cliente TO postgres;
GRANT ALL ON TABLE cliente TO teste;


--
-- Name: cliente_id_cliente_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE cliente_id_cliente_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE cliente_id_cliente_seq FROM postgres;
GRANT ALL ON SEQUENCE cliente_id_cliente_seq TO postgres;
GRANT ALL ON SEQUENCE cliente_id_cliente_seq TO teste;


--
-- Name: pedido; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE pedido FROM PUBLIC;
REVOKE ALL ON TABLE pedido FROM postgres;
GRANT ALL ON TABLE pedido TO postgres;
GRANT ALL ON TABLE pedido TO teste;


--
-- Name: pedido_id_pedido_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE pedido_id_pedido_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE pedido_id_pedido_seq FROM postgres;
GRANT ALL ON SEQUENCE pedido_id_pedido_seq TO postgres;
GRANT ALL ON SEQUENCE pedido_id_pedido_seq TO teste;


--
-- PostgreSQL database dump complete
--

