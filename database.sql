create database if not exists bdBlog;

use bdBlog;



create table if not exists user(
id integer primary key auto_increment,
name varchar(255),
password text,
birthdate date,
sex  char(1), 
isAdmin boolean,
matricule char(6),
registrationDate dateTime
);


create table if not exists post(
id integer primary key auto_increment,
title varchar(255),
content text,
user integer,
postDate datetime, 

foreign key (user) references user(id)
);


create table if not exists comment(

id integer primary key auto_increment,
user integer,
post integer,
content text,
commentDate datetime,
foreign key (user) references user(id),
foreign key (post) references post(id)
);


insert into user (name, password) values ('a','1234'),('b','1234');
	insert into post (title,content,user,postDate) values ('BLABLA'," C'est du BLABLA", 1,null),("NPK","N' iMPORTE QUUOI",2,null);