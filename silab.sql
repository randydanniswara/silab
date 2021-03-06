--
-- PostgreSQL database dump
--

-- Dumped from database version 9.2.4
-- Dumped by pg_dump version 9.2.4
-- Started on 2014-04-25 14:36:23

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 2141 (class 1262 OID 12002)
-- Dependencies: 2140
-- Name: postgres; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE postgres IS 'default administrative connection database';


--
-- TOC entry 200 (class 3079 OID 11727)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2144 (class 0 OID 0)
-- Dependencies: 200
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- TOC entry 199 (class 3079 OID 16384)
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- TOC entry 2145 (class 0 OID 0)
-- Dependencies: 199
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 170 (class 1259 OID 16470)
-- Name: Admin; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Admin" (
    id integer NOT NULL
);


ALTER TABLE public."Admin" OWNER TO postgres;

--
-- TOC entry 191 (class 1259 OID 16738)
-- Name: aktivitas; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE aktivitas
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aktivitas OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 16596)
-- Name: Aktivitas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Aktivitas" (
    id integer DEFAULT nextval('aktivitas'::regclass) NOT NULL,
    isi text NOT NULL,
    waktu character varying(20) NOT NULL,
    id_logbook integer NOT NULL,
    kategori character varying(20) NOT NULL
);


ALTER TABLE public."Aktivitas" OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 16504)
-- Name: Anggota; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Anggota" (
    id integer NOT NULL
);


ALTER TABLE public."Anggota" OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 16525)
-- Name: Aset; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Aset" (
    nama character varying(30) NOT NULL,
    jumlah integer NOT NULL,
    tahun integer NOT NULL,
    id_lab integer NOT NULL,
    id integer NOT NULL
);


ALTER TABLE public."Aset" OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 16728)
-- Name: Aset_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "Aset_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Aset_id_seq" OWNER TO postgres;

--
-- TOC entry 2146 (class 0 OID 0)
-- Dependencies: 190
-- Name: Aset_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE "Aset_id_seq" OWNED BY "Aset".id;


--
-- TOC entry 192 (class 1259 OID 16741)
-- Name: dokumen; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE dokumen
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dokumen OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 16558)
-- Name: Dokumentasi; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Dokumentasi" (
    id integer DEFAULT nextval('dokumen'::regclass) NOT NULL,
    nama character varying(30) NOT NULL,
    waktu character varying(20) NOT NULL,
    id_lab integer NOT NULL
);


ALTER TABLE public."Dokumentasi" OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 16744)
-- Name: kategori; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE kategori
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.kategori OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 16611)
-- Name: Kategori; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Kategori" (
    id integer DEFAULT nextval('kategori'::regclass) NOT NULL,
    nama character varying(50) NOT NULL
);


ALTER TABLE public."Kategori" OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 16697)
-- Name: Kategori_Dokumentasi; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Kategori_Dokumentasi" (
    id_dokumentasi integer NOT NULL,
    id_kategori integer NOT NULL
);


ALTER TABLE public."Kategori_Dokumentasi" OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 16748)
-- Name: kegiatan; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE kegiatan
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.kegiatan OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 16535)
-- Name: Kegiatan; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Kegiatan" (
    id integer DEFAULT nextval('kegiatan'::regclass) NOT NULL,
    nama character varying(50) NOT NULL,
    deskripsi text NOT NULL,
    waktu character varying(30) NOT NULL,
    id_lab integer NOT NULL,
    waktu_kegiatan date
);


ALTER TABLE public."Kegiatan" OWNER TO postgres;

--
-- TOC entry 171 (class 1259 OID 16493)
-- Name: Ketua; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Ketua" (
    id integer NOT NULL
);


ALTER TABLE public."Ketua" OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 16751)
-- Name: lab; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE lab
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.lab OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 16507)
-- Name: Lab; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Lab" (
    id integer DEFAULT nextval('lab'::regclass) NOT NULL,
    nama character varying(50) NOT NULL,
    profil text,
    id_ketua integer
);


ALTER TABLE public."Lab" OWNER TO postgres;

--
-- TOC entry 179 (class 1259 OID 16568)
-- Name: Lab_User; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Lab_User" (
    id_user integer NOT NULL,
    id_lab integer NOT NULL
);


ALTER TABLE public."Lab_User" OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 16724)
-- Name: sequence; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE sequence
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sequence OWNER TO postgres;

--
-- TOC entry 177 (class 1259 OID 16548)
-- Name: LogBook; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "LogBook" (
    id integer DEFAULT nextval('sequence'::regclass) NOT NULL,
    nama_anggota character varying(50) NOT NULL,
    judul character varying(30) NOT NULL,
    id_lab integer NOT NULL,
    isi text
);


ALTER TABLE public."LogBook" OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 16646)
-- Name: LogBook_Angoota; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "LogBook_Angoota" (
    id_logbook integer NOT NULL,
    id_user integer NOT NULL
);


ALTER TABLE public."LogBook_Angoota" OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16754)
-- Name: pesan; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pesan
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pesan OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 16583)
-- Name: Pesan; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Pesan" (
    id integer DEFAULT nextval('pesan'::regclass) NOT NULL,
    pesan text NOT NULL,
    waktu character varying(20) NOT NULL,
    penerima character varying(50) NOT NULL,
    pengirim character varying(50) NOT NULL,
    id_user integer NOT NULL
);


ALTER TABLE public."Pesan" OWNER TO postgres;

--
-- TOC entry 169 (class 1259 OID 16407)
-- Name: Profil; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Profil" (
    id integer NOT NULL,
    nama_depan character varying(20) NOT NULL,
    nama_belakang character varying(20) NOT NULL,
    ttl character varying(32),
    alamat character varying(50),
    telp character varying(15),
    avatar character varying(20)
);


ALTER TABLE public."Profil" OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 16616)
-- Name: Profil_Anggota; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Profil_Anggota" (
    id_user integer NOT NULL,
    id_profil integer NOT NULL
);


ALTER TABLE public."Profil_Anggota" OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 16631)
-- Name: Profil_Ketua; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Profil_Ketua" (
    id_user integer NOT NULL,
    id_profil integer NOT NULL
);


ALTER TABLE public."Profil_Ketua" OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 16760)
-- Name: publikasi; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE publikasi
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.publikasi OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 16515)
-- Name: Publikasi; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Publikasi" (
    id integer DEFAULT nextval('publikasi'::regclass) NOT NULL,
    tahun integer NOT NULL,
    pengarang character varying(50) NOT NULL,
    judul character varying(50) NOT NULL,
    id_lab integer
);


ALTER TABLE public."Publikasi" OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 16677)
-- Name: Publikasi_Anggota; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Publikasi_Anggota" (
    id_publikasi integer NOT NULL,
    id_user integer NOT NULL
);


ALTER TABLE public."Publikasi_Anggota" OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 16661)
-- Name: Publikasi_Ketua; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "Publikasi_Ketua" (
    id_publikasi integer NOT NULL,
    id_user integer NOT NULL
);


ALTER TABLE public."Publikasi_Ketua" OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 16763)
-- Name: user; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "user"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."user" OWNER TO postgres;

--
-- TOC entry 168 (class 1259 OID 16398)
-- Name: User; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "User" (
    username character(32) NOT NULL,
    password character(32) NOT NULL,
    email character(32) NOT NULL,
    id integer DEFAULT nextval('"user"'::regclass) NOT NULL,
    role integer DEFAULT 3 NOT NULL
);


ALTER TABLE public."User" OWNER TO postgres;

--
-- TOC entry 2024 (class 2604 OID 16730)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Aset" ALTER COLUMN id SET DEFAULT nextval('"Aset_id_seq"'::regclass);


--
-- TOC entry 2107 (class 0 OID 16470)
-- Dependencies: 170
-- Data for Name: Admin; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Admin" (id) FROM stdin;
1
\.


--
-- TOC entry 2118 (class 0 OID 16596)
-- Dependencies: 181
-- Data for Name: Aktivitas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Aktivitas" (id, isi, waktu, id_logbook, kategori) FROM stdin;
\.


--
-- TOC entry 2109 (class 0 OID 16504)
-- Dependencies: 172
-- Data for Name: Anggota; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Anggota" (id) FROM stdin;
3
\.


--
-- TOC entry 2112 (class 0 OID 16525)
-- Dependencies: 175
-- Data for Name: Aset; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Aset" (nama, jumlah, tahun, id_lab, id) FROM stdin;
\.


--
-- TOC entry 2147 (class 0 OID 0)
-- Dependencies: 190
-- Name: Aset_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"Aset_id_seq"', 7, true);


--
-- TOC entry 2115 (class 0 OID 16558)
-- Dependencies: 178
-- Data for Name: Dokumentasi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Dokumentasi" (id, nama, waktu, id_lab) FROM stdin;
\.


--
-- TOC entry 2119 (class 0 OID 16611)
-- Dependencies: 182
-- Data for Name: Kategori; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Kategori" (id, nama) FROM stdin;
\.


--
-- TOC entry 2125 (class 0 OID 16697)
-- Dependencies: 188
-- Data for Name: Kategori_Dokumentasi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Kategori_Dokumentasi" (id_dokumentasi, id_kategori) FROM stdin;
\.


--
-- TOC entry 2113 (class 0 OID 16535)
-- Dependencies: 176
-- Data for Name: Kegiatan; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Kegiatan" (id, nama, deskripsi, waktu, id_lab, waktu_kegiatan) FROM stdin;
\.


--
-- TOC entry 2108 (class 0 OID 16493)
-- Dependencies: 171
-- Data for Name: Ketua; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Ketua" (id) FROM stdin;
2
4
\.


--
-- TOC entry 2110 (class 0 OID 16507)
-- Dependencies: 173
-- Data for Name: Lab; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Lab" (id, nama, profil, id_ketua) FROM stdin;
6	labbaru	asdasdasd	6
5	Maknyos masbro	Halo halo beuhh	6
4	Cyber Security	Lab Cyber Security adalah salah satu Lab terbaru yang pernah ada di Fakultas kami	9
8	Lab B05	DAPET A SEMUA	9
7	Lab Propensi	asdasdasdPPP	4
\.


--
-- TOC entry 2116 (class 0 OID 16568)
-- Dependencies: 179
-- Data for Name: Lab_User; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Lab_User" (id_user, id_lab) FROM stdin;
7	4
8	6
9	7
12	5
\.


--
-- TOC entry 2114 (class 0 OID 16548)
-- Dependencies: 177
-- Data for Name: LogBook; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "LogBook" (id, nama_anggota, judul, id_lab, isi) FROM stdin;
\.


--
-- TOC entry 2122 (class 0 OID 16646)
-- Dependencies: 185
-- Data for Name: LogBook_Angoota; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "LogBook_Angoota" (id_logbook, id_user) FROM stdin;
\.


--
-- TOC entry 2117 (class 0 OID 16583)
-- Dependencies: 180
-- Data for Name: Pesan; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Pesan" (id, pesan, waktu, penerima, pengirim, id_user) FROM stdin;
\.


--
-- TOC entry 2106 (class 0 OID 16407)
-- Dependencies: 169
-- Data for Name: Profil; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Profil" (id, nama_depan, nama_belakang, ttl, alamat, telp, avatar) FROM stdin;
4	Jikanka	Suhartini	Bandung 33 Januari 1337	12345678901234567890123456789012345678901234567890	0989878768	\N
6	asdasdasd	asdasda	qe12312312	asdasvsf sdfsdf	67867	\N
7	User baru tau	Bukan User baru	04/08/2014	asdasdasdasd	234234	\N
2	Hornet	The Hacker A B	04/19/2014	kelas	789789	\N
3	Fujimaru	Takagi	Boyolali, 29 Februari 2014	Kyoto, 3rd Urakawa street	889645645	intro-bg.jpg
1	Zaka	Zaidan Azminur	Jakarta, 3 Maret 1994	Jln jalan kemana aja dah boleh	09989263872	2.png
9	Papa Mama	Adek kakak	04/07/2014	Jl Murah meriah	+98989	5.png
\.


--
-- TOC entry 2120 (class 0 OID 16616)
-- Dependencies: 183
-- Data for Name: Profil_Anggota; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Profil_Anggota" (id_user, id_profil) FROM stdin;
\.


--
-- TOC entry 2121 (class 0 OID 16631)
-- Dependencies: 184
-- Data for Name: Profil_Ketua; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Profil_Ketua" (id_user, id_profil) FROM stdin;
\.


--
-- TOC entry 2111 (class 0 OID 16515)
-- Dependencies: 174
-- Data for Name: Publikasi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Publikasi" (id, tahun, pengarang, judul, id_lab) FROM stdin;
\.


--
-- TOC entry 2124 (class 0 OID 16677)
-- Dependencies: 187
-- Data for Name: Publikasi_Anggota; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Publikasi_Anggota" (id_publikasi, id_user) FROM stdin;
\.


--
-- TOC entry 2123 (class 0 OID 16661)
-- Dependencies: 186
-- Data for Name: Publikasi_Ketua; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Publikasi_Ketua" (id_publikasi, id_user) FROM stdin;
\.


--
-- TOC entry 2105 (class 0 OID 16398)
-- Dependencies: 168
-- Data for Name: User; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "User" (username, password, email, id, role) FROM stdin;
popok                           	6d07aee588ccb4eeeae36423b55a32ba	popok@popok.com                 	6	2
userbaru                        	827ccb0eea8a706c4c34a16891f84e7b	userbaru@gmail.com              	7	1
user                            	36f17c3939ac3e7b2fc9396fa8e953ea	pengunjung@ad.com               	3	3
aaa                             	47bce5c74f589f4867dbd57e9ca9f808	aaa                             	8	3
Propensi                        	827ccb0eea8a706c4c34a16891f84e7b	popok@popok.com                 	9	2
hana                            	549f98c63c1ecd8c6f7c635af607dec0	hana                            	10	3
master                          	ef09aed49ae4607583c942401e477845	hfhfh                           	11	3
master                          	ef09aed49ae4607583c942401e477845	da                              	12	3
master                          	ef09aed49ae4607583c942401e477845	a                               	13	3
jika                            	90fe1c5b968c82b104a2284aa91012e5	guhuhuhyggggggggggggggggg       	4	3
admin                           	4d2b31c91d33a32a98584546736d5c73	zakazai@gmail.com               	1	1
ketua                           	36f17c3939ac3e7b2fc9396fa8e953ea	sasag                           	2	2
\.


--
-- TOC entry 2148 (class 0 OID 0)
-- Dependencies: 191
-- Name: aktivitas; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('aktivitas', 1, false);


--
-- TOC entry 2149 (class 0 OID 0)
-- Dependencies: 192
-- Name: dokumen; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('dokumen', 1, false);


--
-- TOC entry 2150 (class 0 OID 0)
-- Dependencies: 193
-- Name: kategori; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('kategori', 1, false);


--
-- TOC entry 2151 (class 0 OID 0)
-- Dependencies: 194
-- Name: kegiatan; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('kegiatan', 1, true);


--
-- TOC entry 2152 (class 0 OID 0)
-- Dependencies: 195
-- Name: lab; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('lab', 8, true);


--
-- TOC entry 2153 (class 0 OID 0)
-- Dependencies: 196
-- Name: pesan; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pesan', 1, false);


--
-- TOC entry 2154 (class 0 OID 0)
-- Dependencies: 197
-- Name: publikasi; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('publikasi', 1, false);


--
-- TOC entry 2155 (class 0 OID 0)
-- Dependencies: 189
-- Name: sequence; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sequence', 3, true);


--
-- TOC entry 2156 (class 0 OID 0)
-- Dependencies: 198
-- Name: user; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"user"', 13, true);


--
-- TOC entry 2038 (class 2606 OID 16713)
-- Name: Admin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Admin"
    ADD CONSTRAINT "Admin_pkey" PRIMARY KEY (id);


--
-- TOC entry 2064 (class 2606 OID 16603)
-- Name: Aktivitas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Aktivitas"
    ADD CONSTRAINT "Aktivitas_pkey" PRIMARY KEY (id);


--
-- TOC entry 2042 (class 2606 OID 16715)
-- Name: Anggota_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Anggota"
    ADD CONSTRAINT "Anggota_pkey" PRIMARY KEY (id);


--
-- TOC entry 2048 (class 2606 OID 16735)
-- Name: Aset_id_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Aset"
    ADD CONSTRAINT "Aset_id_key" UNIQUE (id);


--
-- TOC entry 2050 (class 2606 OID 16737)
-- Name: Aset_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Aset"
    ADD CONSTRAINT "Aset_pkey" PRIMARY KEY (id);


--
-- TOC entry 2058 (class 2606 OID 16562)
-- Name: Dokumentasi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Dokumentasi"
    ADD CONSTRAINT "Dokumentasi_pkey" PRIMARY KEY (id);


--
-- TOC entry 2078 (class 2606 OID 16701)
-- Name: Kategori_Dokumentasi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Kategori_Dokumentasi"
    ADD CONSTRAINT "Kategori_Dokumentasi_pkey" PRIMARY KEY (id_dokumentasi, id_kategori);


--
-- TOC entry 2066 (class 2606 OID 16615)
-- Name: Kategori_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Kategori"
    ADD CONSTRAINT "Kategori_pkey" PRIMARY KEY (id);


--
-- TOC entry 2052 (class 2606 OID 16542)
-- Name: Kegiatan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Kegiatan"
    ADD CONSTRAINT "Kegiatan_pkey" PRIMARY KEY (id);


--
-- TOC entry 2040 (class 2606 OID 16717)
-- Name: Ketua_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Ketua"
    ADD CONSTRAINT "Ketua_pkey" PRIMARY KEY (id);


--
-- TOC entry 2060 (class 2606 OID 16572)
-- Name: Lab_User_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Lab_User"
    ADD CONSTRAINT "Lab_User_pkey" PRIMARY KEY (id_user, id_lab);


--
-- TOC entry 2044 (class 2606 OID 16514)
-- Name: Lab_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Lab"
    ADD CONSTRAINT "Lab_pkey" PRIMARY KEY (id);


--
-- TOC entry 2072 (class 2606 OID 16650)
-- Name: LogBook_Angoota_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "LogBook_Angoota"
    ADD CONSTRAINT "LogBook_Angoota_pkey" PRIMARY KEY (id_logbook, id_user);


--
-- TOC entry 2054 (class 2606 OID 16552)
-- Name: LogBook_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "LogBook"
    ADD CONSTRAINT "LogBook_pkey" PRIMARY KEY (id);


--
-- TOC entry 2062 (class 2606 OID 16590)
-- Name: Pesan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Pesan"
    ADD CONSTRAINT "Pesan_pkey" PRIMARY KEY (id);


--
-- TOC entry 2068 (class 2606 OID 16620)
-- Name: Profil_Anggota_Lab_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Profil_Anggota"
    ADD CONSTRAINT "Profil_Anggota_Lab_pkey" PRIMARY KEY (id_user, id_profil);


--
-- TOC entry 2070 (class 2606 OID 16635)
-- Name: Profil_Ketua_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Profil_Ketua"
    ADD CONSTRAINT "Profil_Ketua_pkey" PRIMARY KEY (id_user, id_profil);


--
-- TOC entry 2036 (class 2606 OID 16468)
-- Name: Profil_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Profil"
    ADD CONSTRAINT "Profil_pkey" PRIMARY KEY (id);


--
-- TOC entry 2076 (class 2606 OID 16691)
-- Name: Publikasi_Anggota_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Publikasi_Anggota"
    ADD CONSTRAINT "Publikasi_Anggota_pkey" PRIMARY KEY (id_publikasi, id_user);


--
-- TOC entry 2074 (class 2606 OID 16665)
-- Name: Publikasi_Ketua_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Publikasi_Ketua"
    ADD CONSTRAINT "Publikasi_Ketua_pkey" PRIMARY KEY (id_publikasi, id_user);


--
-- TOC entry 2046 (class 2606 OID 16519)
-- Name: Publikasi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Publikasi"
    ADD CONSTRAINT "Publikasi_pkey" PRIMARY KEY (id);


--
-- TOC entry 2032 (class 2606 OID 16419)
-- Name: User_id_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "User"
    ADD CONSTRAINT "User_id_username_key" UNIQUE (id, username);


--
-- TOC entry 2034 (class 2606 OID 16415)
-- Name: User_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "User"
    ADD CONSTRAINT "User_pkey" PRIMARY KEY (id);


--
-- TOC entry 2056 (class 2606 OID 16605)
-- Name: id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "LogBook"
    ADD CONSTRAINT id UNIQUE (id);


--
-- TOC entry 2103 (class 2606 OID 16702)
-- Name: Kategori_Dokumentasi_id_dokumentasi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Kategori_Dokumentasi"
    ADD CONSTRAINT "Kategori_Dokumentasi_id_dokumentasi_fkey" FOREIGN KEY (id_dokumentasi) REFERENCES "Dokumentasi"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2104 (class 2606 OID 16707)
-- Name: Kategori_Dokumentasi_id_kategori_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Kategori_Dokumentasi"
    ADD CONSTRAINT "Kategori_Dokumentasi_id_kategori_fkey" FOREIGN KEY (id_kategori) REFERENCES "Kategori"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2081 (class 2606 OID 16496)
-- Name: Ketua_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Ketua"
    ADD CONSTRAINT "Ketua_id" FOREIGN KEY (id) REFERENCES "User"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2102 (class 2606 OID 16692)
-- Name: Publikasi_Anggota_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Publikasi_Anggota"
    ADD CONSTRAINT "Publikasi_Anggota_id_user_fkey" FOREIGN KEY (id_user) REFERENCES "User"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2080 (class 2606 OID 16488)
-- Name: admin_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Admin"
    ADD CONSTRAINT admin_id FOREIGN KEY (id) REFERENCES "User"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2092 (class 2606 OID 16606)
-- Name: aktiv_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Aktivitas"
    ADD CONSTRAINT aktiv_id FOREIGN KEY (id_logbook) REFERENCES "LogBook"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2085 (class 2606 OID 16530)
-- Name: aset_id_lab; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Aset"
    ADD CONSTRAINT aset_id_lab FOREIGN KEY (id_lab) REFERENCES "Lab"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2101 (class 2606 OID 16685)
-- Name: blahblah; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Publikasi_Anggota"
    ADD CONSTRAINT blahblah FOREIGN KEY (id_publikasi) REFERENCES "Publikasi"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2088 (class 2606 OID 16563)
-- Name: dok_id_lab; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Dokumentasi"
    ADD CONSTRAINT dok_id_lab FOREIGN KEY (id_lab) REFERENCES "Lab"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2082 (class 2606 OID 16680)
-- Name: fk_anggota; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Anggota"
    ADD CONSTRAINT fk_anggota FOREIGN KEY (id) REFERENCES "User"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2097 (class 2606 OID 16651)
-- Name: fk_log; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "LogBook_Angoota"
    ADD CONSTRAINT fk_log FOREIGN KEY (id_logbook) REFERENCES "LogBook"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2094 (class 2606 OID 16626)
-- Name: fk_profil; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Profil_Anggota"
    ADD CONSTRAINT fk_profil FOREIGN KEY (id_profil) REFERENCES "Profil"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2095 (class 2606 OID 16636)
-- Name: fk_profil_ketua; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Profil_Ketua"
    ADD CONSTRAINT fk_profil_ketua FOREIGN KEY (id_profil) REFERENCES "Profil"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2099 (class 2606 OID 16667)
-- Name: fk_pub; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Publikasi_Ketua"
    ADD CONSTRAINT fk_pub FOREIGN KEY (id_publikasi) REFERENCES "Publikasi"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2093 (class 2606 OID 16621)
-- Name: fk_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Profil_Anggota"
    ADD CONSTRAINT fk_user FOREIGN KEY (id_user) REFERENCES "User"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2100 (class 2606 OID 16672)
-- Name: fk_user1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Publikasi_Ketua"
    ADD CONSTRAINT fk_user1 FOREIGN KEY (id_user) REFERENCES "User"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2096 (class 2606 OID 16641)
-- Name: fk_user_ketua; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Profil_Ketua"
    ADD CONSTRAINT fk_user_ketua FOREIGN KEY (id_user) REFERENCES "User"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2098 (class 2606 OID 16656)
-- Name: fk_user_log; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "LogBook_Angoota"
    ADD CONSTRAINT fk_user_log FOREIGN KEY (id_user) REFERENCES "User"(id);


--
-- TOC entry 2083 (class 2606 OID 16766)
-- Name: id_ketua; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Lab"
    ADD CONSTRAINT id_ketua FOREIGN KEY (id_ketua) REFERENCES "User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2086 (class 2606 OID 16543)
-- Name: kegiatan_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Kegiatan"
    ADD CONSTRAINT kegiatan_id FOREIGN KEY (id_lab) REFERENCES "Lab"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2090 (class 2606 OID 16578)
-- Name: lab_lab_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Lab_User"
    ADD CONSTRAINT lab_lab_id FOREIGN KEY (id_lab) REFERENCES "Lab"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2089 (class 2606 OID 16573)
-- Name: lab_user_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Lab_User"
    ADD CONSTRAINT lab_user_id FOREIGN KEY (id_user) REFERENCES "User"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2087 (class 2606 OID 16553)
-- Name: log_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "LogBook"
    ADD CONSTRAINT log_id FOREIGN KEY (id_lab) REFERENCES "Lab"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2091 (class 2606 OID 16591)
-- Name: pesan_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Pesan"
    ADD CONSTRAINT pesan_id FOREIGN KEY (id_user) REFERENCES "User"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2079 (class 2606 OID 16460)
-- Name: profil_user_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Profil"
    ADD CONSTRAINT profil_user_id FOREIGN KEY (id) REFERENCES "User"(id) ON UPDATE RESTRICT ON DELETE SET NULL;


--
-- TOC entry 2084 (class 2606 OID 16520)
-- Name: publiaksi_lab_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Publikasi"
    ADD CONSTRAINT publiaksi_lab_id FOREIGN KEY (id_lab) REFERENCES "Lab"(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- TOC entry 2143 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2014-04-25 14:36:24

--
-- PostgreSQL database dump complete
--

