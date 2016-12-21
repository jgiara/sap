insert into Groups (group_name) values ('Council');
insert into Groups (group_name) values ('Volunteer');
insert into Groups (group_name) values ('Staff');
insert into Groups (group_name) values ('Admin');

/*council priviledges*/
insert into Group_Members (user, group_id, access)
values (16114836, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (16114836, 2, 'edit');
insert into Group_Members (user, group_id, access)
values (56981046, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (56981046, 2, 'edit');
insert into Group_Members (user, group_id, access)
values (49705582, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (49705582, 2, 'edit');
insert into Group_Members (user, group_id, access)
values (56226194, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (56226194, 2, 'edit');
insert into Group_Members (user, group_id, access)
values (50917926, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (50917926, 2, 'edit');
insert into Group_Members (user, group_id, access)
values (38587263, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (38587263, 2, 'edit');
insert into Group_Members (user, group_id, access)
values (71939373, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (71939373, 2, 'edit');
insert into Group_Members (user, group_id, access)
values (80627466, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (80627466, 2, 'edit');
insert into Group_Members (user, group_id, access)
values (34834116, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (34834116, 2, 'edit');
insert into Group_Members (user, group_id, access)
values (10263464, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (10263464, 2, 'edit');
insert into Group_Members (user, group_id, access)
values (36598285, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (36598285, 2, 'edit');
insert into Group_Members (user, group_id, access)
values (29542691, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (29542691, 2, 'edit');
insert into Group_Members (user, group_id, access)
values (84462221, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (84462221, 2, 'edit');
insert into Group_Members (user, group_id, access)
values (70733046, 1, 'edit');
insert into Group_Members (user, group_id, access)
values (70733046, 2, 'edit');

insert into Programs (program_name, coordinator, semester, year, requirements)
values ('Panels', 12345678, 'Spring', 2016, '2 Extra Panels');

insert into Council (academic_year) values ('2016-2017');

insert into Program_Members (user, program, title, requirements_status)
values (, 1, 'Volunteer', 'Complete');

//insert many rows into table based on query from other table, get values, etc.



