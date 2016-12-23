drop table Users;
drop table Groups;
drop table Group_Members;
drop table Programs;
drop table Program_Members;
drop table Council;
drop table Council_Members;
drop table Notes;
drop table Programming_Weeks;
drop table Attendance;

create table Users (
email varchar(30) not null primary key,
eagle_id int(8) not null,
first_name varchar(30) not null,
last_name varchar(30) not null,
sex varchar(1) not null check(sex in ('M', 'F')),
class int(4) not null,
school varchar(4) not null check(school in ('MCAS', 'CSOM', 'CSON', 'LSOE')),
major varchar(60) not null,
minor varchar(60),
hometown varchar(30) not null,
state_country varchar(20) not null,
international varchar(3) not null check(international in ('Yes', 'No')),
ahana varchar(3) not null check(ahana in ('Yes', 'No')),
transfer varchar(3) not null check(transfer in ('Yes', 'No')),
phone varchar(12) not null,
local_address varchar(100) not null,
password varchar(40) not null,
position varchar(40) not null,
updated datetime not null,
updated_by varchar(30) not null references Users(email),
joined varchar(12) not null,
applied_tours int(1),
applied_panels int(1),
applied_council int(1),
applied_summer int(1),
status varchar(15) not null check(status in ('Yes', 'No', 'Abroad', 'Prac/Clinical', 'Graduated')),
last_login datetime 
);

create table Groups (
	group_id int(10) not null auto_increment primary key,
	group_name varchar(20) not null
);

create table Group_Members (
	group_member_id int(10) not null auto_increment primary key,
	user varchar(30) not null references Users(email),
	group_id int(10) not null references Groups(group_id),
	access varchar(5) not null check(access in ('view', 'edit')),
	updated datetime not null,
	updated_by varchar(30) not null references Users(email)
);

create table Council (
	council_id int(10) not null auto_increment primary key,
	academic_year varchar(10) not null
);

create table Council_Members (
	council_member_id int(10) not null auto_increment primary key,
	user varchar(30) not null references Users(email), 
	council_id int(10) not null references Council(council_id),
	position varchar(40) not null,
	updated datetime not null,
	updated_by varchar(30) not null references Users(email)
);

create table Programs (
	program_id int(10) not null auto_increment primary key, 
	program_name varchar(30) not null,
	coordinator int(10) not null references Council_Members(council_member_id),
	semester varchar(6) not null check(semester in('Fall', 'Spring')),
	year int(4) not null, 
	requirements text not null
);

create table Program_Members (
	member_id int(10) not null auto_increment primary key,
	user varchar(30) not null references Users(email),
	program int(10) not null references Programs(program_id),
	title varchar(20),
	shift_day varchar(10), 
	shift_time varchar(10),
	requirements_status varchar(10) not null check(requirements_staus in('Complete', 'Pending', 'Incomplete')),
	updated datetime not null,
	updated_by varchar(30) not null references Users(email),
	comments text
);

create table Notes (
	note_id int(10) not null auto_increment primary key,
	user varchar(30) not null references Users(email),
	submitted_by varchar(30) not null references Users(email),
	submitted datetime not null,
	program int(10) references Programs(program_id),
	comments text not null,
	updated datetime not null,
	updated_by varchar(30) not null references Users(email)
);

create table Programming_Weeks (
	week_id int(10) not null auto_increment primary key, 
	week_number int(2) not null,
	semester varchar(6) not null check(semester in('Fall', 'Spring')),
	year int(4) not null, 
	sunday_date varchar(10) not null,
	monday_date varchar(10) not null,
	tuesday_date varchar(10) not null,
	wednesday_date varchar(10) not null,
	thursday_date varchar(10) not null,
	friday_date varchar(10) not null,
	saturday_date varchar(10) not null
);

create table Attendance (
	attendance_id int(10) not null auto_increment primary key,
	user varchar(30) not null references Users(email),
	program int(10) not null references Programs(program_id),
	present varchar(10) not null check(present in('Present', 'Excused', 'No Show')),
	week int(10) not null references Programming_Weeks(week_id),
	note varchar(30), 
	shift_day varchar(10) not null,
	shift_time varchar(10) not null,
	updated datetime not null,
	updated_by varchar(30) not null references Users(email)
);


