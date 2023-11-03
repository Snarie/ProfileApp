show tables;

drop table hobbies;

describe modules_users;

create table hobbies_users (
                               id int auto_increment not null primary key,
                               hobbyid int,
                               userid int,
                               created_at timestamp default current_timestamp,
                               updated_at timestamp default current_timestamp on update current_timestamp
);
create table hobbies (
                         id int auto_increment not null primary key,
                         name varchar(32) not null,
                         description varchar(256),
                         created_at timestamp default current_timestamp,
                         updated_at timestamp default current_timestamp on update current_timestamp
);
insert into hobbies (name, description) value ('Tennis', 'Tennis is een balsport voor twee spelers (enkelspel) of paren (dubbelspel), waarbij een bal van gemiddeld 67 mm diameter met een racket over een net gespeeld moet worden.');
insert into hobbies (name, description) value ('Voetbal', 'Voetbal is een wereldwijd populaire balsport waarbij twee ploegen van elf spelers moeten proberen de bal in het doel van de tegenstander te krijgen. ');
insert into hobbies (name, description) value ('Hockey', 'Hockey is een balsport voor teams. Het belangrijkste attribuut van de hockeyspeler is de stick, die wordt gebruikt om de bal te hanteren.');
create table skills (
                         id int auto_increment not null primary key,
                         name varchar(32) not null,
                         description varchar(256),
                             created_at timestamp default current_timestamp,
                             updated_at timestamp default current_timestamp on update current_timestamp
    );
insert into skills (name, description) value ('Programmeren in Python', 'Het vermogen om software te schrijven en problemen op te lossen met behulp van de Python-programmeertaal.');
insert into skills (name, description) value ('Data-analyse', 'De capaciteit om gegevens te verzamelen, analyseren en interpreteren om zinvolle inzichten te verkrijgen en beslissingen te ondersteunen.');
insert into skills (name, description) value ('Effectieve communicatie', 'Het vermogen om gedachten en ideeën duidelijk en overtuigend over te brengen, zowel schriftelijk als mondeling.');
insert into skills (name, description) value ('Projectmanagement', 'De vaardigheid om projecten te plannen, organiseren, uitvoeren en beheren, inclusief het beheren van middelen en het voldoen aan deadlines.');
CREATE TABLE content (
  id int(11) NOT NULL AUTO_INCREMENT primary key,
  page varchar(25) NOT NULL,
  title varchar(4096) DEFAULT NULL,
  content varchar(4096) DEFAULT NULL
);
INSERT INTO content (page, title, content) VALUES
('home', 'Home', '<img src=\'https://www.w3schools.com/w3css/img_lights.jpg\' alt=\'Lights\' style=\'heigth:100%\'>'),
('contact', 'Contact', '<article>\r\n<p>Eerste Titel</p>\r\n<p>Adres<BR>Woonplaats<p>\r\n</article>\r\n<article>\r\n<p>Tweede Titel</p>\r\n<p>Email<BR>Telefoon<p>\r\n</article>'),
('about', '<link rel=\'stylesheet\' href=\'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css\' />About', '<article><p>Over mij</p><p>Ik ben student bij Windesheim Almere. Ik volg de opleiding Associate Degree Software Development.</p></article>\r\n<article><p>Over de opleiding</p><p>De opleiding is een tweejarige opleiding. Het is een opleiding waarbij je veel leert over programmeren en het ontwikkelen van software.</p></article>\r\n<article><p>Over de school</p><p>Windesheim Almere is een school waarbij je veel praktijkgericht bezig bent. Je leert veel over het vakgebied en je leert veel over jezelf.</p></article>\r\n<article><p>Over de toekomst</p><p>Ik wil graag verder studeren zodat ik in Almere mijn HBO-ICT bachelor kan halen.</p></article>\r\n<article><p>Locatie</p><div class=\'map-container\'><div id=\'map\' style=\'height: 100%;\'></div></div></article>\r\n<script src=\'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js\'></script>\r\n<script>\r\n  var map = L.map(\'map\').setView([52.37156887996604, 5.219101315953748], 17); \r\n\r\n  L.tileLayer(\'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png\', {\r\n    attribution: \'&copy; <a href=\\\"https://www.openstreetmap.org/copyright\\\">OpenStreetMap</a> contributors\'\r\n  }).addTo(map);\r\n\r\n  L.marker([52.37156887996604, 5.219101315953748]).addTo(map)\r\n    .bindPopup(\'Windesheim in Almere locatie Circus\')\r\n    .openPopup();\r\n\r\n	function onMapClick(e) {\r\n		alert(\'You clicked the map at \' + e.latlng);\r\n	}\r\n	map.on(\'click\', onMapClick);\r\n</script>\r\n'),
('details', 'Details', '<h1>Hobby’s</h1>\r\n<div class=\'table\'> \r\n%data%\r\n</div>'),
('skills', 'Skills', '<div class=\'table\'>\r\n%data%\r\n</div>');


select * from content;
select * from hobbies_users;
select * from hobbies;
INSERT INTO hobbies_users (hobbyid, userid) VALUES
(1, 1),
(1,3),
(2,2),
(2,3),
(3,1);
describe hobbies;

select h.name
from hobbies_users
join users u on u.id = hobbies_users.userid
join hobbies h on h.id = hobbies_users.hobbyid
where u.id = 1;

select * from hobbies_users;


select * from hobbies_users;

select *
from users
where users.username = 'Barry';

select * from users;


