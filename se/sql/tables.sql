create table search_sites(
	site_id int auto_increment not null primary key,
	url varchar(255),
	title varchar(255),
	short_desc text,
	indexdate date,
	spider_depth int default 2,
	required text,
	disallowed text,
	can_leave_domain bool) ENGINE = MYISAM;
create table search_links (
	link_id int auto_increment primary key not null,
	site_id int,
	url varchar(255) not null,
	title varchar(200),
	description varchar(255),
	fulltxt mediumtext,
	indexdate date,
	size float(2),
	md5sum varchar(32),
	key url (url),
	key md5key (md5sum),
	visible int default 0, 
	level int) ENGINE = MYISAM;
create table search_keywords	(
	keyword_id int primary key not null auto_increment,
	keyword varchar(30) not null,
	unique kw (keyword),
	key keyword (keyword(10))) ENGINE = MYISAM;
create table search_link_keyword0 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keyword1 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keyword2 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keyword3 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keyword4 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keyword5 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keyword6 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keyword7 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keyword8 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keyword9 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keyworda (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keywordb (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keywordc (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keywordd (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keyworde (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_link_keywordf (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
create table search_categories(
	category_id integer not null auto_increment primary key, 
	category text,
	parent_num integer
	) ENGINE = MYISAM;
create table search_site_category (
	site_id integer,
	category_id integer
	) ENGINE = MYISAM;
create table search_temp (
	link varchar(255),
	level integer,
	id varchar (32)
	) ENGINE = MYISAM;
create table search_pending (
	site_id integer,
	temp_id varchar(32),
	level integer,
	count integer,
	num integer) ENGINE = MYISAM;

create table search_query_log (
	query varchar(255),
	time timestamp(14),
	elapsed float(2),
	results int,
	key query_key(query)
	) ENGINE = MYISAM;

create table search_domains (
	domain_id int auto_increment primary key not null,	
	domain varchar(255)
) ENGINE = MYISAM;
