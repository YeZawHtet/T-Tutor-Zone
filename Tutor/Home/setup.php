<?php 
$con=mysqli_connect("localhost","root","");
$query="CREATE DATABASE IF NOT EXISTS TutorDb";
mysqli_query($con,$query);
mysqli_select_db($con,"TutorDb");
$query="CREATE TABLE IF NOT EXISTS Admin
(
	AdminID int primary key auto_increment,
	Username varchar(100),
	Email varchar(100),
	Password varchar(50),
	Phone varchar(50),
	NRC varchar(50)
);";
$result=mysqli_query($con,$query);
if ($result) 
{
	echo "Admin TABLE Create Success <br>";
	$q="INSERT INTO `admin`(`Username`, `Email`, `Password`, `Phone`, `NRC`) VALUES ('Admin','admin@gmail.com','123','0965599884','9/ppp(N)012345')";
	$a=mysqli_query($con, $q);
}

$query="CREATE TABLE IF NOT EXISTS ContactUs
(
	ContactUsID int primary key auto_increment,
	ContactName varchar(100),
	Email varchar(100),
	MessageText varchar(255)
);";
$result=mysqli_query($con,$query);
if ($result) 
{
	echo "ContactUs TABLE Create Success <br>";
}

$query="CREATE TABLE IF NOT EXISTS Division
(
	DivisionID int primary key auto_increment,
	DivisionName varchar (100)
);";
$result=mysqli_query($con,$query);
if ($result) 
{
	echo "Division TABLE Create Success <br>";
	
}

$query="CREATE TABLE IF NOT EXISTS Class
(
	ClassID int primary key auto_increment,
	ClassName varchar(100)
);";
$result=mysqli_query($con,$query);
if ($result) 
{
	echo "Class TABLE Create Success <br>";
	
}

$query="CREATE TABLE IF NOT EXISTS Category
(
	CategoryID int Primary Key auto_increment,
	CategoryName varchar (50)
);";
$result=mysqli_query($con,$query);
if ($result) {
	echo "Category TABLE CREATE Success <br>";
}

$query="CREATE TABLE IF NOT EXISTS Parent
(
	PaID int primary key auto_increment,
	PaName varchar(50),
	Email varchar(50),
	Password varchar(50),
	Phone varchar(50),
	PaCityName varchar(50),
	NRC varchar(50),
	ParentImage varchar(100),
	JoinDate date
);";
$result=mysqli_query($con,$query);
if ($result) 
{
	echo "Parent TABLE Create Success <br>";
}

$query="CREATE TABLE IF NOT EXISTS Student
(
	StudentID int primary key auto_increment,
	StudentName varchar(100),
	PaID int not null,
	DateofBirth  Date,
	Gender varchar(50),
	StudentImage varchar(100),
	Foreign Key (PaID) References Parent(PaID) on delete cascade
);";
$result=mysqli_query($con,$query);
if ($result) 
{
	echo "Student TABLE Create Success <br>";
	
}

$query="CREATE TABLE IF NOT EXISTS City
(
	CityID int Primary key auto_increment,
	DivisionID int not null,
	CityName varchar(100),
	Foreign Key (DivisionID) References Division(DivisionID) on delete cascade

);";
$result=mysqli_query($con,$query);
if ($result) 
{
	echo "City TABLE Create Success <br>";
	
}
$query="CREATE TABLE IF NOT EXISTS Charge
(
	ChargeID int Primary Key auto_increment,
	AdminID int not null,
	ChargeType varchar(30),
	noOfSubjects int, 
	Amount int,
	DefineDate Date,
	Foreign Key(AdminID) References Admin(AdminID) on delete cascade
);";
$result=mysqli_query($con,$query);
if ($result) {
	echo "Charge TABLE CREATE Success <br>";
}

$query="CREATE TABLE IF NOT EXISTS Tutor
(
	TutorID int Primary Key auto_increment,
	CityID int not null,
	TutorStatus varchar(50),
	TutorName varchar(100),
	Email varchar(100),
	Phone varchar(30),
	Password varchar(30),
	NRC varchar(50),
	DOB date,
	Image varchar(255),
	Gender varchar(30),
	JoinDate date,
	Intro text,
	Foreign Key(CityID) References City(CityID) on delete cascade
);";
$result=mysqli_query($con,$query);
if ($result) {
	echo "Tutor TABLE CREATE Success <br>";
}

$query="CREATE TABLE IF NOT EXISTS Experience
(
	ExperienceID int primary key auto_increment,
	StartDate date,
	EndDate date,
	Info text,
	TutorID int not null,
	Foreign key (TutorID) references Tutor(TutorID) on delete cascade
);";
$result=mysqli_query($con,$query);
if ($result) 
{
	echo "Experience TABLE Create Success <br>";
	
}

$query="CREATE TABLE IF NOT EXISTS Degree
(
	DegreeID int primary key auto_increment,
	DegreeName varchar(100),
	DegreeImage varchar(100),
	AchievedDate date,
	TutorID int not null,
	Foreign key (TutorID) references Tutor(TutorID) on delete cascade
);";
$result=mysqli_query($con,$query);
if ($result) 
{
	echo "Degree TABLE Create Success <br>";
	
}

$query="CREATE TABLE IF NOT EXISTS Payment
(
	PaymentID int Primary Key auto_increment,
	TutorID int not null,
	ChargeID int not null,
	PaymentDate Date,
	Amount int,
	Image varchar(255),
	ConfirmDate Date,
	ExpireDate Date,
	Foreign Key(TutorID) References Tutor(TutorID) on delete cascade,
	Foreign Key(ChargeID) References Charge(ChargeID) on delete cascade
);";
$result=mysqli_query($con,$query);
if ($result) {
	echo "Payment TABLE CREATE Success <br>";
}

$query="CREATE TABLE IF NOT EXISTS Subject
(
	SubjectID int Primary Key auto_increment,
	SubjectName varchar (50)
);";
$result=mysqli_query($con,$query);
if ($result) {
	echo "Subject TABLE CREATE Success <br>";
}
 
$query="CREATE TABLE IF NOT EXISTS SubjectTutor
(
	SubjectTutorID int Primary Key auto_increment,
	TutorID int not null,
	SubjectID int not null,
	CategoryID int not null,
	ClassID int not null,
	Plan varchar(100),
	Price int,
	Foreign Key(TutorID) References Tutor(TutorID) on delete cascade,
	Foreign Key(SubjectID) References Subject(SubjectID) on delete cascade,
	Foreign Key(CategoryID) References Category(CategoryID) on delete cascade,
	Foreign KEy(ClassID) References Class(ClassID) on delete cascade
);";
$result=mysqli_query($con,$query);
if ($result) {
	echo "SubjectTutor TABLE CREATE Success <br>";
}

$query="CREATE TABLE IF NOT EXISTS BookingDetail
(
	BookingDetailID int Primary Key auto_increment,
	Message varchar(255),
	Status varchar(25),
	JoinDate date,
	JoinTime time,
	StudentID int not null,
	SubjectTutorID int not null,
	Foreign Key(StudentID) References Student(StudentID) on delete cascade,
	Foreign Key(SubjectTutorID) References SubjectTutor(SubjectTutorID) on delete cascade
);";
$result=mysqli_query($con,$query);
if ($result) {
	echo "BookingDetail TABLE CREATE Success <br>";
}

$query="CREATE TABLE IF NOT EXISTS Rating
(
	RatingID int Primary Key auto_increment,
	BookingDetailID int not null,
	Email varchar (50) not null,
	Rate int,
	feedback varchar(255),
	Foreign Key(BookingDetailID) References BookingDetail(BookingDetailID) on delete cascade
);";
$result=mysqli_query($con,$query);
if ($result) {
	echo "Rating TABLE CREATE Success <br>";
}

$query="CREATE TABLE IF NOT EXISTS SubjectRequest
(
	SubjectRequestID int Primary Key auto_increment,
	SubjectName varchar(50) not null,
	PaID int,
	TutorID int,
	Foreign Key(PaID) References Parent(PaID) on delete cascade,
	Foreign Key(TutorID) References Tutor(TutorID) on delete cascade
);";
$result=mysqli_query($con,$query);
if ($result) {
	echo "SubjectRequest TABLE CREATE Success <br>";
}

 echo mysqli_error($con);
 ?>