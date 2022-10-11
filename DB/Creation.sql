DROP DATABASE IF EXISTS Assignment1;

CREATE DATABASE Assignment1;
USE Assignment1;

CREATE TABLE IF NOT EXISTS Assignment1.Course
(
    CourseCode             varchar(45)         NOT NULL,
    Title             	   varchar(45)    DEFAULT NULL,
    Semester               varchar(45)    DEFAULT NULL,
    days               	   varchar(45)    DEFAULT NULL,
    Time          	   	   time           DEFAULT NULL,
    instructor			   varchar(45)    DEFAULT NULL,
    room       			   varchar(45)    DEFAULT NULL,
    StartDate              date   		  DEFAULT NULL,
    EndDate                date    		  DEFAULT NULL,
    CONSTRAINT course_pk PRIMARY KEY (CourseCode)
);

CREATE TABLE IF NOT EXISTS  Assignment1.Student
(
    StudentID      int NOT NULL,
    FirstName      varchar(45) DEFAULT NULL,
    LastName  	   varchar(45) DEFAULT NULL,
    Address        varchar(45) DEFAULT NULL,
    Email          varchar(45)  DEFAULT NULL,
    Phone          int  DEFAULT NULL,
    DOB   		   date  DEFAULT NULL,
    CONSTRAINT Student_pk PRIMARY KEY (StudentID)
);

CREATE TABLE IF NOT EXISTS Assignment1.RegisteredIn
(
    StudentID 	int          NOT NULL,
    CourseCode     varchar(45) NOT NULL,
	PRIMARY KEY (StudentID, CourseCode),
    CONSTRAINT CourseCode foreign key(CourseCode) references Course(CourseCode),
    CONSTRAINT StudentID foreign key(StudentID) references Student(StudentID)
);

CREATE TABLE IF NOT EXISTS Assignment1.Administrator (
`EmployementID` INT NOT NULL , 
`Address` VARCHAR(45) NULL DEFAULT NULL , 
`DOB` DATE NOT NULL , 
`Email` VARCHAR(45) NULL DEFAULT NULL , 
`Phone` INT NULL DEFAULT NULL , 
`FirstName` VARCHAR(45) NULL DEFAULT NULL , 
`LastName` VARCHAR(45) NULL DEFAULT NULL,
PRIMARY KEY(`EmployementID`) );

INSERT INTO `assignment1`.`course` (`CourseCode`, `Title`, `Semester`, `days`, `Time`, `instructor`, `room`, `StartDate`, `EndDate`) VALUES ('comp346', 'operarting system', 'fall', 'Mon-Wed', '10:00:00', 'nadia', 'H492', '2022-09-10', '2022-12-22');
INSERT INTO `assignment1`.`course` (`CourseCode`, `Title`, `Semester`, `days`, `Time`, `instructor`, `room`, `StartDate`, `EndDate`) VALUES ('comp352', 'data structure', 'winter', 'Mon-Wed', '10:00:00', 'nadia', 'H532', '2022-09-10', '2022-12-22');
INSERT INTO `assignment1`.`Student` (`StudentID`, `FirstName`, `LastName`, `Address`, `Email`, `Phone`, `DOB`) VALUES ('2342342', 'haland', 'koriski', '130 place vertu', 'hal@gmail.com', '324234234','1999-04-09');