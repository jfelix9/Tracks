CREATE TABLE Student (
	Suser_name VARCHAR(10) NOT NULL PRIMARY KEY,
	Sfname VARCHAR(50) NOT NULL,
	Sminit VARCHAR(1),
	Slname VARCHAR(50) NOT NULL,
	Spass_word VARCHAR(50) NOT NULL,
	Sid INT(8) NOT NULL,
	Sgraduated BOOLEAN NOT NULL,
	Sdegree VARCHAR(50) NOT NULL,
	Sgpa FLOAT(3) NOT NULL,
	Sgrad_year DATE NOT NULL,
	Sgrant_info VARCHAR(50) NOT NULL,
	Fuser_name VARCHAR(10) NOT NULL,
	FOREIGN KEY (Fuser_name) REFERENCES Faculty(Fuser_name)
);
CREATE TABLE Faculty (
	Fuser_name VARCHAR(10) NOT NULL PRIMARY KEY,
	Fpass_word VARCHAR(50) NOT NULL,
	Ffname VARCHAR(50) NOT NULL,
	Fminit VARCHAR(1),
	Flname VARCHAR(50) NOT NULL
);

CREATE TABLE Admin (
	Auser_name VARCHAR(10) NOT NULL PRIMARY KEY,
	Apass_word VARCHAR(50) NOT NULL,
	Afname VARCHAR(50) NOT NULL,
	Aminit VARCHAR(1),
	Alname VARCHAR(50) NOT NULL
);
CREATE TABLE Student_milestones (
	Suser_name VARCHAR(10) NOT NULL,
	Smilestones VARCHAR(50) NOT NULL,
	Mdate_achieved DATE NOT NULL,
	PRIMARY KEY(Suser_name, Smilestones, Mdate_achieved),
	FOREIGN KEY (Suser_name) REFERENCES Student(Suser_name)
);
CREATE TABLE Student_courses (
	Suser_name VARCHAR(10) NOT NULL,
	Scourses VARCHAR(50) NOT NULL,
	PRIMARY KEY(Suser_name, Scourses),
	FOREIGN KEY (Suser_name) REFERENCES Student(Suser_name)
);
CREATE TABLE Student_conferences (
	Suser_name VARCHAR(10) NOT NULL,
	Sconferences VARCHAR(50) NOT NULL,
	PRIMARY KEY(Suser_name, Sconferences),
	FOREIGN KEY (Suser_name) REFERENCES Student(Suser_name)
);
CREATE TABLE Student_papers (
	Suser_name VARCHAR(10) NOT NULL,
	Spapers VARCHAR(100) NOT NULL,
	Pdate_published DATE NOT NULL,
	PRIMARY KEY(Suser_name, Spapers),
	FOREIGN KEY (Suser_name) REFERENCES Student(Suser_name)
);
CREATE TABLE Confirms_updates (
	Suser_name VARCHAR(10) NOT NULL,
	Auser_name VARCHAR(10) NOT NULL,
	PRIMARY KEY(Suser_name, Auser_name),
	FOREIGN KEY (Suser_name) REFERENCES Student(Suser_name),
	FOREIGN KEY (Auser_name) REFERENCES Admin(Auser_name)
);
CREATE TABLE Advises (
	Suser_name VARCHAR(10) NOT NULL,
	Fuser_name VARCHAR(10) NOT NULL,
	PRIMARY KEY(Suser_name, Fuser_name),
	FOREIGN KEY (Suser_name) REFERENCES Student(Suser_name),
	FOREIGN KEY (Fuser_name) REFERENCES Faculty(Fuser_name)
);