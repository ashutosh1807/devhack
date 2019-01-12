Drop DATABASE devhack;
create database devhack;
\c devhack

drop table student;
drop table instructor;

SET datestyle = dmy; 

CREATE TABLE student
(
  userid VARCHAR(9) NOT NULL,
  password VARCHAR(20),
  name VARCHAR(20),
  student BOOLEAN DEFAULT TRUE,
  PRIMARY KEY (userid)
);

INSERT into Student values('160020020','18/08/1997','Ashutosh agarwal',true);
INSERT into student values('phawade','123456','R Phawade',false);