--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.17
-- Dumped by pg_dump version 9.6.17

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: school_boards; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.school_boards (
    id integer NOT NULL,
    name character varying(20)
);


ALTER TABLE public.school_boards OWNER TO postgres;

--
-- Name: school_boards_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.school_boards_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.school_boards_id_seq OWNER TO postgres;

--
-- Name: school_boards_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.school_boards_id_seq OWNED BY public.school_boards.id;


--
-- Name: student_grade; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.student_grade (
    id integer NOT NULL,
    student_id integer,
    grade integer
);


ALTER TABLE public.student_grade OWNER TO postgres;

--
-- Name: student_grade_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.student_grade_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.student_grade_id_seq OWNER TO postgres;

--
-- Name: student_grade_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.student_grade_id_seq OWNED BY public.student_grade.id;


--
-- Name: students; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.students (
    id integer NOT NULL,
    name character varying(99),
    school_board_id integer
);


ALTER TABLE public.students OWNER TO postgres;

--
-- Name: students_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.students_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.students_id_seq OWNER TO postgres;

--
-- Name: students_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.students_id_seq OWNED BY public.students.id;


--
-- Name: school_boards id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.school_boards ALTER COLUMN id SET DEFAULT nextval('public.school_boards_id_seq'::regclass);


--
-- Name: student_grade id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_grade ALTER COLUMN id SET DEFAULT nextval('public.student_grade_id_seq'::regclass);


--
-- Name: students id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students ALTER COLUMN id SET DEFAULT nextval('public.students_id_seq'::regclass);


--
-- Data for Name: school_boards; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.school_boards (id, name) FROM stdin;
\.


--
-- Name: school_boards_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.school_boards_id_seq', 1, false);


--
-- Data for Name: student_grade; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.student_grade (id, student_id, grade) FROM stdin;
\.


--
-- Name: student_grade_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.student_grade_id_seq', 1, false);


--
-- Data for Name: students; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.students (id, name, school_board_id) FROM stdin;
\.


--
-- Name: students_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.students_id_seq', 1, false);


--
-- Name: school_boards school_boards_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.school_boards
    ADD CONSTRAINT school_boards_pkey PRIMARY KEY (id);


--
-- Name: student_grade student_grade_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_grade
    ADD CONSTRAINT student_grade_pkey PRIMARY KEY (id);


--
-- Name: students students_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_pkey PRIMARY KEY (id);


--
-- Name: student_grade student_grade_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_grade
    ADD CONSTRAINT student_grade_fk FOREIGN KEY (student_id) REFERENCES public.students(id);


--
-- Name: students students_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_fk FOREIGN KEY (school_board_id) REFERENCES public.school_boards(id);


--
-- PostgreSQL database dump complete
--

