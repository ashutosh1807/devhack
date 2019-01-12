Drop DATABASE devhack;
drop table Student;

SET datestyle = dmy; 

CREATE TABLE Student
(
  rollno CHAR(9) NOT NULL,
  password DATE,
  student BOOLEAN DEFAULT TRUE,
  PRIMARY KEY (rollno)
);

INSERT into Student values('160020020','18/08/1997',true);