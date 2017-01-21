drop table Users;
drop table Groups;
drop table Group_Members;
drop table Programs;
drop table Program_Members;
drop table Council;
drop table Council_Members;
drop table Programming_Weeks;
drop table Attendance;
drop table Audit;

create table Users (
email varchar(30) not null primary key,
eagle_id int(8) not null,
first_name varchar(30) not null,
last_name varchar(30) not null,
sex varchar(6) not null check(sex in ('Male', 'Female')),
class int(4) not null,
school varchar(4) not null check(school in ('MCAS', 'CSOM', 'CSON', 'LSOE')),
major varchar(70) not null,
minor varchar(70),
hometown varchar(30) not null,
state_country varchar(20) not null,
international varchar(3) not null check(international in ('Yes', 'No')),
ahana varchar(3) not null check(ahana in ('Yes', 'No')),
transfer varchar(3) not null check(transfer in ('Yes', 'No')),
phone varchar(15) not null,
local_address varchar(100),
password varchar(40) not null,
applied_tours int(1),
applied_panels int(1),
applied_council int(1),
applied_summer int(1),
status varchar(25) not null check(status in ('Active', 'Inactive', 'Abroad', 'Prac/Clinical', 'Graduated')),
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
	access varchar(5) not null check(access in ('view', 'edit'))
);

create table Council (
	council_id int(10) not null auto_increment primary key,
	fall_year int(4) not null,
	spring_year int(4) not null
);

create table Council_Members (
	council_member_id int(10) not null auto_increment primary key,
	user varchar(30) not null references Users(email), 
	council_id int(10) not null references Council(council_id),
	position varchar(40) not null
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
	shift_day varchar(10), 
	shift_time varchar(10),
	credit_status varchar(10) not null check(credit_staus in('Complete', 'Pending', 'Incomplete')),
	requirements_status text,
	comments text,
	week_color varchar(6) check(week_color in('Maroon', 'Gold'))
);

create table Programming_Weeks (
	week_id int(10) not null auto_increment primary key, 
	week_number int(2) not null,
	semester varchar(6) not null check(semester in('Fall', 'Spring')),
	year int(4) not null, 
	current_week varchar(3) not null check(current_week in('Yes', 'No')),
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
	present varchar(10) check(present in('Present', 'Excused', 'No Show')),
	week int(10) not null references Programming_Weeks(week_id),
	note varchar(100), 
	shift_day varchar(10) not null,
	shift_time varchar(10) not null,
	alternate_number varchar(10),
	gave_panel_tour varchar(3) check(gave_panel_tour in('Yes', 'No')),
	week_color varchar(6) check(week_color in('Maroon', 'Gold'))
);

create table Audit (
	audit_id int(10) not null auto_increment primary key,
	table_value varchar(25) not null,
	field_value varchar(25) not null, 
	old_value varchar(70) not null,
	new_value varchar(70) not null,
	updated datetime not null,
	updated_by varchar(30) not null references Users(email)
);

create table Credit_History (
	credit_id int(10) not null auto_increment primary key,
	user varchar(30) not null references Users(email),
	panels int(1) not null,
	tours int(1) not null,
	greeting int(1) not null,
	om int(1) not null,
	efad int(1) not null,
	aed int(1) not null,
	outreach int(1) not null,
	hsvisits int(1) not null,
	ahana int(1) not null,
	io int(1) not null,
	transfer int(1) not null,
	media int(1) not null
);