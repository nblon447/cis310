DROP TABLE survey;

CREATE TABLE survey (
id int not null primary key auto_increment,
submittime datetime,
major varchar(255),
expectedgrade varchar(255),
favetopping varchar(255),
userip varchar(255),
sessionid varchar(255)
);

DROP TABLE album;

CREATE TABLE album (
id int not null primary key auto_increment,
inserttime datetime,
albumtitle varchar(255),
albumartist varchar(255),
albumlength int,
status varchar(255)
);

INSERT INTO album VALUES (0, now(), 'Purple Rain', 'Prince', '60', 'A');
INSERT INTO album VALUES (0, now(), 'Hotel California', 'Eagles', '55', 'A');
INSERT INTO album VALUES (0, now(), 'Desperado', 'Eagles', '47', 'A');
INSERT INTO album VALUES (0, now(), 'Tusk', 'Fleetwood Mac', '35', 'A');
INSERT INTO album VALUES (0, now(), 'Meat Dress', 'Lady Gaga', '46', 'A');
INSERT INTO album VALUES (0, now(), 'Reign in Blood', 'Slayer', '51', 'A');
INSERT INTO album VALUES (0, now(), 'Yeezus', 'Kanye West', '45', 'A');
INSERT INTO album VALUES (0, now(), 'Rumors', 'Fleetwood Mac', '39', 'A');
INSERT INTO album VALUES (0, now(), 'Con Todo El Mundo', 'Khruanbin', '53', 'A');
INSERT INTO album VALUES (0, now(), 'Heaven and Earth', 'Kamasi Washington', '59', 'A');
