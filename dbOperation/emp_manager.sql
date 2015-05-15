create table admin(
id int primary key,
name varchar(32) not null,
password varchar(128) not null)
ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

create table emp(
id int primary key auto_increment,
name varchar(64) not null,
grade tinyint,
email varchar(64)not null,
salary float)
ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
