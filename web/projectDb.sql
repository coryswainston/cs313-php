--
-- PostgreSQL database dump
--

-- Dumped from database version 10.1
-- Dumped by pg_dump version 10.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
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
-- Name: album; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE album (
    albumid integer NOT NULL,
    albumtitle character varying(150) NOT NULL,
    albumyear smallint
);


ALTER TABLE album OWNER TO postgres;

--
-- Name: album_albumid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE album_albumid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE album_albumid_seq OWNER TO postgres;

--
-- Name: album_albumid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE album_albumid_seq OWNED BY album.albumid;


--
-- Name: post; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE post (
    postid integer NOT NULL,
    posttitle character varying(200) NOT NULL,
    postcontent text NOT NULL,
    postimageuri character varying(200),
    postdate date,
    postauthor integer NOT NULL
);


ALTER TABLE post OWNER TO postgres;

--
-- Name: post_postauthor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE post_postauthor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE post_postauthor_seq OWNER TO postgres;

--
-- Name: post_postauthor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE post_postauthor_seq OWNED BY post.postauthor;


--
-- Name: post_postid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE post_postid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE post_postid_seq OWNER TO postgres;

--
-- Name: post_postid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE post_postid_seq OWNED BY post.postid;


--
-- Name: siteuser; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE siteuser (
    userid integer NOT NULL,
    useremail character varying(300) NOT NULL,
    userpassword character varying(50) NOT NULL,
    username character varying(300)
);


ALTER TABLE siteuser OWNER TO postgres;

--
-- Name: siteuser_userid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE siteuser_userid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE siteuser_userid_seq OWNER TO postgres;

--
-- Name: siteuser_userid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE siteuser_userid_seq OWNED BY siteuser.userid;


--
-- Name: song; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE song (
    songid integer NOT NULL,
    songtitle character varying(150) NOT NULL,
    songartist character varying(250) NOT NULL,
    songuri character varying(150) NOT NULL,
    albumid integer NOT NULL
);


ALTER TABLE song OWNER TO postgres;

--
-- Name: song_albumid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE song_albumid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE song_albumid_seq OWNER TO postgres;

--
-- Name: song_albumid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE song_albumid_seq OWNED BY song.albumid;


--
-- Name: song_songid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE song_songid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE song_songid_seq OWNER TO postgres;

--
-- Name: song_songid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE song_songid_seq OWNED BY song.songid;


--
-- Name: album albumid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY album ALTER COLUMN albumid SET DEFAULT nextval('album_albumid_seq'::regclass);


--
-- Name: post postid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY post ALTER COLUMN postid SET DEFAULT nextval('post_postid_seq'::regclass);


--
-- Name: post postauthor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY post ALTER COLUMN postauthor SET DEFAULT nextval('post_postauthor_seq'::regclass);


--
-- Name: siteuser userid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY siteuser ALTER COLUMN userid SET DEFAULT nextval('siteuser_userid_seq'::regclass);


--
-- Name: song songid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY song ALTER COLUMN songid SET DEFAULT nextval('song_songid_seq'::regclass);


--
-- Name: song albumid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY song ALTER COLUMN albumid SET DEFAULT nextval('song_albumid_seq'::regclass);


--
-- Data for Name: album; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY album (albumid, albumtitle, albumyear) FROM stdin;
1	Can't Help Wishing For Amnesia - Single	2017
2	Lost Boys - Single	2017
3	Words - Single	2017
\.


--
-- Data for Name: post; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY post (postid, posttitle, postcontent, postimageuri, postdate, postauthor) FROM stdin;
1	Lorem Ipsum	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent accumsan, nunc non mattis luctus, turpis est varius nulla, egestas condimentum mi eros eget ligula. Praesent ut sollicitudin lorem. In lacinia ullamcorper ante vel sodales. Donec a nulla eu tortor ultrices sollicitudin. Mauris id blandit nisl. Fusce semper mi quis eros sagittis, vitae elementum velit mollis. Fusce sodales nulla libero, at ullamcorper dui porttitor sed. Sed blandit pharetra velit ut interdum.<br/>Pellentesque eget aliquam augue, quis accumsan nibh. Nam ac tortor urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec iaculis aliquam nisl quis pretium. Vestibulum vel placerat mi, id luctus metus. Aliquam a blandit erat, pulvinar euismod lacus. Aliquam erat volutpat. Phasellus blandit, est id sollicitudin molestie, est justo cursus metus, eu pretium metus quam et urna. Mauris volutpat magna vel mauris iaculis molestie. Pellentesque sit amet enim neque. Phasellus lacus libero, sollicitudin eget velit sed, cursus condimentum risus.<br/>Cras ultrices arcu eget sapien aliquam varius. Phasellus sagittis velit sed ligula pharetra, vel sagittis risus sollicitudin. Maecenas tempor enim a dapibus placerat. Quisque quis ipsum feugiat, maximus leo in, hendrerit elit. Aenean lacinia, massa ac lobortis placerat, nulla magna sodales eros, in pretium nulla lorem bibendum libero. Maecenas nec laoreet nunc, ac ornare elit. Quisque in velit finibus, tempus mauris quis, iaculis nulla. Praesent vestibulum metus viverra elit dignissim tempus. Maecenas venenatis maximus viverra. Aliquam erat volutpat. Phasellus augue risus, convallis vitae vulputate a, malesuada vitae elit. Mauris id bibendum nunc. Pellentesque lorem nibh, aliquet ut condimentum pharetra, ornare ac est. Donec quis lacus pharetra, laoreet lacus et, congue libero.<br/>Etiam a ligula viverra, volutpat dui at, efficitur nulla. In nec pulvinar mauris. Integer et orci scelerisque, iaculis massa a, tristique ipsum. Vivamus efficitur nisl luctus lacus pulvinar, sed sagittis ex iaculis. Cras ornare ultrices libero a condimentum. Nulla viverra eros sit amet quam porta, nec malesuada est vulputate. In finibus felis purus, et hendrerit justo eleifend in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque purus purus, congue ut orci rutrum, elementum volutpat massa.<br/>Donec elementum turpis nulla, id suscipit lacus tempor et. Quisque in bibendum sem. Sed id interdum est, sed laoreet massa. Nulla vitae dapibus augue. Phasellus consectetur enim elementum metus elementum, sit amet efficitur nulla luctus. In metus quam, rutrum ut venenatis sit amet, hendrerit quis massa. Suspendisse potenti. Duis nulla orci, condimentum et mi id, euismod semper est. Ut tincidunt varius varius. Etiam luctus nisi eros, ut blandit enim tempor non.	images/cover.jpg	2018-02-10	2
\.


--
-- Data for Name: siteuser; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY siteuser (userid, useremail, userpassword, username) FROM stdin;
1	breathingmusicdeeply@gmail.com	pass1234	Lacie Anne Lewis
2	swainstoncory@gmail.com	Preston1!	Cory Swainston
\.


--
-- Data for Name: song; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY song (songid, songtitle, songartist, songuri, albumid) FROM stdin;
2	Lost Boys	Adam & Lace	music/lost-boys.mp3	2
3	Words	Fine Lace	music/words.mp3	3
1	Can't Help Wishing For Amnesia	Adam & Lace	music/cant-help-wishing.mp3	1
\.


--
-- Name: album_albumid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('album_albumid_seq', 3, true);


--
-- Name: post_postauthor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('post_postauthor_seq', 1, false);


--
-- Name: post_postid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('post_postid_seq', 1, true);


--
-- Name: siteuser_userid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('siteuser_userid_seq', 2, true);


--
-- Name: song_albumid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('song_albumid_seq', 1, false);


--
-- Name: song_songid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('song_songid_seq', 3, true);


--
-- Name: album album_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY album
    ADD CONSTRAINT album_pkey PRIMARY KEY (albumid);


--
-- Name: post post_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY post
    ADD CONSTRAINT post_pkey PRIMARY KEY (postid);


--
-- Name: siteuser siteuser_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY siteuser
    ADD CONSTRAINT siteuser_pkey PRIMARY KEY (userid);


--
-- Name: siteuser siteuser_useremail_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY siteuser
    ADD CONSTRAINT siteuser_useremail_key UNIQUE (useremail);


--
-- Name: song song_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY song
    ADD CONSTRAINT song_pkey PRIMARY KEY (songid);


--
-- Name: post post_postauthor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY post
    ADD CONSTRAINT post_postauthor_fkey FOREIGN KEY (postauthor) REFERENCES siteuser(userid);


--
-- Name: song song_albumid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY song
    ADD CONSTRAINT song_albumid_fkey FOREIGN KEY (albumid) REFERENCES album(albumid);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM postgres;


--
-- PostgreSQL database dump complete
--

