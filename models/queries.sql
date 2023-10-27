show databases;

create database profileApp;
use profileApp;

show tables;

select username
from users;
select name
from modules;

select modules.name, users.username, modules_users.grade
from modules_users
         join users on users.id = modules_users.userid
         join modules on modules.id = modules_users.moduleid;



update users
set username = 'tamar'
where users.id = 3;


create table modules_users
(
    id         int auto_increment not null primary key,
    moduleid   int,
    userid     int,
    grade      float,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

insert into modules_users (moduleid, userid, grade) value (1, 2, 0.0);
insert into modules_users (moduleid, userid, grade) value (1, 1, 5.6);
select *
from modules_users;

create table hobbies
(
    id         int auto_increment primary key not null,
    userid     int                            not null,
    hobby      varchar(32)                    not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

insert into hobbies (userid, hobby)
VALUES (1, 'BG'),
       (2, 'Tekenen'),
       (1, 'Schapen hoeden');
insert into hobbies (userid, hobby)
VALUES (3, 'Gamen'),
       (3, 'Lezen');
select *
from hobbies;

select username, hobby
from hobbies
         join users on users.id = hobbies.userid;

use profileApp;

show tables;

# READ
select *
from users
where created_at is not null;

# READ admin
select *
from users
where created_at is null;

# CREATE
insert into users (username)
values ('Djimairo'),
       ('Radjen');

# UPDATE
update users
set username = 'Quinten'
where id = 4;

update users
set username = 'Denzel'
where id = 5;

# DELETE (soft)
update users
set created_at = null
where id = 6;

update users
set created_at = current_timestamp
where id = 6;

show tables;

describe profile;

# alter table profile
# drop column user_id;

select *
from profile;

#delete - verwijderen van data
#drop - verwijderen van de tabel fysiek

delete
from profile
where id = 10;

alter table profiles
    modify id int;

insert into profiles (id, firstname, lastname, email)
    value (1, 'Stephan', 'Hoeksema', 's.hoeksema@windesheim.nl');

insert into profiles (id, firstname, lastname, email)
    value (4, 'Quinten', 'Tahepary', 's1202007@student.windesheim.nl');


select username, firstname, email
from users
         join profiles on profiles.id = users.id;

alter table profile rename profiles;

SELECT *
FROM users
    left join profiles on profiles.id = users.id
    left join hobbies on hobbies.userid = users.id;

select * from hobbies;

drop table users;

create table users
(
    id          int auto_increment primary key,
    username   varchar(32)                           not null,
    password   varchar(255)                          null,
    created_at timestamp default current_timestamp() null,
    updated_at timestamp default current_timestamp() null on update current_timestamp(),
    constraint username
        unique (username)
);

select * from hobbies