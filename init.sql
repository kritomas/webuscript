create table User
(
	id int primary key auto_increment,
	username varchar(32) unique not null,
	password varchar(512) not null,
	language varchar(32)
);