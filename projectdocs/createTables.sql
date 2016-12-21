drop table Users;
drop table Groups;
drop table Group_Members;
drop table Programs;
drop table Program_Members;
drop table Council;
drop table Council_Members;
drop table Notes;
drop table Attendance;
drop table User_Audit;

create table Users (
eagle_id int(8) not null primary key,
first_name varchar(30) not null,
last_name varchar(30) not null,
sex varchar(1) not null check(sex in ('M', 'F')),
class int(4) not null,
school varchar(4) not null check(school in ('MCAS', 'CSOM', 'CSON', 'LSOE')),
major varchar(40) not null,
minor varchar(40),
hometown varchar(30) not null,
state_country varchar(20) not null,
international varchar(3) not null check(international in ('Yes', 'No')),
ahana varchar(3) not null check(ahana in ('Yes', 'No')),
transfer varchar(3) not null check(transfer in ('Yes', 'No')),
phone varchar(12) not null,
email varchar(30) not null,
local_address varchar(100) not null,
password varchar(40) not null,
position varchar(40) not null,
updated datetime not null,
joined date not null,
applied_tours int(1),
applied_panels int(1),
applied_council int(1),
applied_summer int(1),
active varchar(3) not null check(active in ('Yes', 'No', 'Abroad', 'Prac/Clinical', 'Graduated')));

create table Groups (
	group_id int(10) not null auto_increment primary key,
	group_name varchar(20) not null
);

create table Group_Members (
	group_member_id int(10) not null auto_increment primary key,
	user int(8) not null references Users(eagle_id),
	group_id int(10) not null references Groups(group_id),
	access varchar(10) not null check(access in ('view', 'edit'))
);

create table Council (
	council_id int(10) not null auto_increment primary key,
	academic_year varchar(10) not null
);

create table Council_Members (
	council_member_id int(10) not null auto_increment primary key,
	user int(8) not null references Users(eagle_id), 
	council_id int(10) not null references Council(council_id),
	position varchar(40) not null
);

create table Programs (
	program_id int(10) not null auto_increment primary key, 
	program_name varchar(30) not null,
	coordinator int(8) not null references Users(eagle_id),
	semester varchar(6) not null check(semester in('Fall', 'Spring')),
	year int(4) not null, 
	requirements text not null
);

create table Program_Members (
	member_id int(10) not null auto_increment primary key,
	user int(8) not null references Users(eagle_id),
	program int(10) not null references Programs(program_id),
	title varchar(20),
	shift_day varchar(10), 
	shift_time varchar(10),
	requirements_status varchar(10) not null check(requirements_staus in('Complete', 'Pending', 'Incomplete'))
);

create table Notes (
	note_id int(10) not null auto_increment primary key,
	user int(8) not null references Users(eagle_id),
	submitted_by int(8) not null references Users(eagle_id),
	submitted datetime not null,
	program int(10) references Programs(program_id),
	comments text not null
);

create table Attendance (
	attendance_id int(10) not null auto_increment primary key,
	user int(8) not null references Users(eagle_id),
	program int(10) not null references Programs(program_id),
	present varchar(10) not null check(present in('Present', 'Excused', 'No Show')),
	week int(10) not null references Programming_Weeks(week_id),
	note varchar(30), 
	shift_day varchar(10) not null,
	shift_time varchar(10) not null
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

create table User_Audit (
	audit_id int(10) not null auto_increment primary key,
	field varchar(15) not null,
	old_value varchar(100) not null,
	new_value varchar(100) not null,
	updated datetime not null,
	updated_by int(8) not null references Users(eagle_id)
);


