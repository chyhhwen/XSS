drop database if exists xss;
create database xss default character set utf8 collate utf8_general_ci;
grant all on xss.* to 'staff' @'localhost' identified by 'password';
use xss;

CREATE TABLE text
(
     id int AUTO_INCREMENT PRIMARY KEY,
     data varchar(255) not null,
     time varchar(255) not null
);

CREATE TABLE list
(
    id int AUTO_INCREMENT PRIMARY KEY,
    ip varchar(255) not null,
    time varchar(255) not null
);

INSERT INTO `text` VALUES('',"text","123");