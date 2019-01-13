 Drop DATABASE devhack;
create database devhack;
\c devhack

drop table student;
drop table instructor;
drop table translate;
drop table attendance;

SET datestyle = dmy; 

CREATE TABLE student
(
  userid VARCHAR(9) NOT NULL,
  password VARCHAR(20),
  name VARCHAR(20),
  student BOOLEAN DEFAULT TRUE,
  PRIMARY KEY (userid)
);

CREATE TABLE translate
(
  text varchar
);
CREATE TABLE attendance(
  userid VARCHAR(9) NOT NULL,
  lecdate Date,
  lectime time,
  PRIMARY KEY (userid)
);


INSERT into Student values('160020020','123456','Ashutosh agarwal',true);
INSERT into student values('phawade','123456','R Phawade',false);
INSERT into translate values('Hi my name is Abhinav');
INSERT into attendance values('160020020',now()::date,now()::time);