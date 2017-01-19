function hideSelects(){
    var weekSelect = document.getElementById("table-week");
    var daySelect = document.getElementById("table-day");
    $('#table-week').attr('disabled', true);
    $('#table-day').attr('disabled', true);
}

function showSelects(){
    var weekSelect = document.getElementById("table-week");
    var daySelect = document.getElementById("table-day");
    $('#table-week').attr('disabled', false);
    $('#table-day').attr('disabled', false);
}

function getVolunteerData(callback, programName, selectedSemester, selectedYear, tableVols) {
    $.getJSON("../include/getProgramVolunteers.php",  {
            program: programName,
            semester: selectedSemester,
            year: selectedYear
          }, 
          function(data) {
            $.each( data, function( i, item ) {
                var req = item.requirements_status;
                if(req != null) {
                    for (var i = 0; i < req.length; i++) {
                        if(req.charAt(i) == '\n') {
                            req = req.substr(0, i).concat('<br>', req.substr(i+1));
                        }
                    }
                }
                var com = item.comments;
                if(com != null) {
                    for (var i = 0; i < com.length; i++) {
                        if(com.charAt(i) == '\n') {
                            com = com.substr(0, i).concat('<br>', com.substr(i+1));
                        }
                    }
                }
                tableVols.row.add([
                    "<a id='test' href='./profile.php?userEmail=" + item.email + "'>"+ item.first_name + "</a>",
                    "<a id='test' href='./profile.php?userEmail=" + item.email + "'>"+ item.last_name + "</a>",
                    item.email,
                    item.class,
                    item.school,
                    item.major,
                    item.minor,
                    item.hometown,
                    item.state_country,
                    item.ahana,
                    item.transfer,
                    item.shift_day,
                    item.shift_time,
                    req,
                    item.credit_status,
                    com,
                    item.eagle_id,
                    item.member_id
                ]);
               
              }); 
            callback(tableVols);
          });
}

function getAttendanceData(callback, programName, selectedSemester, selectedYear, selectedWeek, selectedDay, tableAttn) {
    $.getJSON("../include/getProgramAttendance.php", 
        {
            program: programName,
            semester: selectedSemester,
            year: selectedYear, 
            week: selectedWeek,
            day: selectedDay
        }, function(data) {
            $.each(data, function(i, item) {
                tableAttn.row.add([
                    "<a id='test' href='./profile.php?userEmail=" + item.email + "'>"+ item.first_name + "</a>",
                    "<a id='test' href='./profile.php?userEmail=" + item.email + "'>"+ item.last_name + "</a>",
                    item.email,
                    item.class,
                    item.school,
                    item.major,
                    item.minor,
                    item.hometown,
                    item.state_country,
                    item.ahana,
                    item.transfer,
                    item.shift_day,
                    item.shift_time,
                    item.alternate_number,
                    item.present,
                    item.gave_panel_tour,
                    item.note,
                    item.week_number,
                    item.eagle_id,
                    item.attendance_id
                ]);
            });
            callback(tableAttn);
        });
}

function getInvolvementDataHistory(callback, email, tableInvolv) {
    $.getJSON("../include/getInvolvementData.php",  {
            email: email
          }, 
          function(data) {
            $.each( data, function( i, item ) {
                var req = item.requirements;
                if(req != null) {
                    for (var i = 0; i < req.length; i++) {
                        if(req.charAt(i) == '\n') {
                            req = req.substr(0, i).concat('<br>', req.substr(i+1));
                        }
                    }
                }
                var reqs = item.requirements_status;
                if(reqs != null) {
                    for (var i = 0; i < reqs.length; i++) {
                        if(reqs.charAt(i) == '\n') {
                            reqs = reqs.substr(0, i).concat('<br>', reqs.substr(i+1));
                        }
                    }
                }
                var com = item.comments;
                if(com != null) {
                    for (var i = 0; i < com.length; i++) {
                        if(com.charAt(i) == '\n') {
                            com = com.substr(0, i).concat('<br>', com.substr(i+1));
                        }
                    }
                }
                tableInvolv.row.add([
                    item.program_name,
                    item.semester,
                    item.year,
                    item.first_name + " " + item.last_name,
                    item.credit_status,
                    req,
                    reqs,
                    com
                ]);
               
              }); 
            callback(tableInvolv);
          });
}

function getName(callback, email) {
    $.getJSON("../include/getName.php", 
        {
            email: email
        }, function(data) {
            callback(data);
        });
}

function getWeekData(callback, selectedSemester, selectedYear) {
    $.getJSON("../include/getWeeks.php", 
        {
            semester: selectedSemester,
            year: selectedYear
        }, function(data) {
            document.getElementById("table-week").innerHTML += "<option value='all'>All Weeks</option>";
            $.each(data, function(i, item) {
                if(item.current_week == 'Yes') {
                     document.getElementById("table-week").innerHTML += "<option value ='" + item.week_id + "' selected='selected'>Week " + item.week_number + ": " + item.sunday_date.substring(5) + " - " + item.saturday_date.substring(5) + "</option>"; 
                 }
                 else {
                    document.getElementById("table-week").innerHTML += "<option value ='" + item.week_id + "'>Week " + item.week_number + ": " + item.sunday_date.substring(5) + " - " + item.saturday_date.substring(5) + "</option>"; 
                 }
            });
            callback();
        });
}

function searchUsers(callback, searchVals, tableVols) {
    $.getJSON("../include/searchUsers.php",  {
            searchVals: searchVals
          }, 
          function(data) {
            $.each( data, function( i, item ) {
                tableVols.row.add([
                    "<a id='test' href='./profile.php?userEmail=" + item.email + "'>"+ item.first_name + "</a>",
                    "<a id='test' href='./profile.php?userEmail=" + item.email + "'>"+ item.last_name + "</a>",
                    item.email,
                    item.phone,
                    item.class,
                    item.school,
                    item.major,
                    item.minor,
                    item.hometown,
                    item.state_country,
                    item.status
                ]);
               
              }); 
            callback(tableVols);
          });
}

function getAllUsers(callback, selectedStatus, tableVols) {
    $.getJSON("../include/getAllUsers.php", 
    {
        status: selectedStatus
    }, function(data) {
        $.each(data, function(i, item) {
            tableVols.row.add([
                "<a id='test' href='./profile.php?userEmail=" + item.email + "'>"+ item.first_name + "</a>",
                "<a id='test' href='./profile.php?userEmail=" + item.email + "'>"+ item.last_name + "</a>",
                item.email,
                item.phone,
                item.sex,
                item.class,
                item.school,
                item.major,
                item.minor,
                item.hometown,
                item.state_country,
                item.ahana,
                item.international,
                item.transfer,
                item.local_address,
                item.applied_tours,
                item.applied_panels,
                item.applied_council,
                item.applied_summer,
                item.status,
                item.last_login,
                item.eagle_id,
                'Delete'
            ]);
        });
        callback(tableVols);
    });
}

function getWeeks(callback, selectedSemester, selectedYear, tableWeek) {
    $.getJSON("../include/getWeeks.php", 
    {
        semester: selectedSemester,
        year: selectedYear
    }, function(data) {
        $.each(data, function(i, item) {
            tableWeek.row.add([
                item.week_number,
                item.current_week,
                item.sunday_date,
                item.monday_date,
                item.tuesday_date,
                item.wednesday_date,
                item.thursday_date,
                item.friday_date,
                item.saturday_date,
                item.week_id
            ]);
        });
        callback(tableWeek);
    });
}

function insertProgrammingWeek(callback, week, year, semester, sun, mon, tues, wed, thurs, fri, sat) {
    $.post("../include/insertProgrammingWeek.php",
    {
        week : week,
        year : year,
        semester : semester,
        sun : sun,
        mon : mon,
        tues : tues,
        wed : wed,
        thurs : thurs,
        fri : fri,
        sat : sat
    },
    function() {
        callback();
    });
    
}

function inLineUpdatePostData(callback, uid, ufield, utable, unewValue, uwhereField) {
    $.post("../include/inlineUpdateTable.php",
            {
                id : uid,
                field : ufield,
                table : utable,
                newValue : unewValue,
                whereField : uwhereField
            },
          function(){
            callback();
        });
}

function toggleColumns(table, index) {
    var column = table.column(index);
    column.visible(!column.visible());
}

function getUsersStatus(callback, status) {
    $.getJSON("../include/getUsersStatus.php", 
        {
            status: status
        }, function(data) {
            var vols = []
            vols[0] = [];
            vols[1] = [];
            vols[2] = [];
            $.each(data, function(i, item) {
                vols[0][i] = item.email;
                vols[1][i] = item.first_name;
                vols[2][i] = item.last_name;
            });
            callback(vols);
        });
}

function getUsersNotInProgram(callback, programName, selectedSemester, selectedYear) {
    $.getJSON("../include/getUsersNotInProgram.php", 
        {
            program: programName,
            semester: selectedSemester,
            year: selectedYear
        }, function(data) {
            var vols = []
            vols[0] = [];
            vols[1] = [];
            vols[2] = [];
            $.each(data, function(i, item) {
                vols[0][i] = item.email;
                vols[1][i] = item.first_name;
                vols[2][i] = item.last_name;
            });
            callback(vols);
        });
}

function getUsersInProgram(callback, programName, selectedSemester, selectedYear) {
    $.getJSON("../include/getUsersInProgram.php", 
        {
            program: programName,
            semester: selectedSemester,
            year: selectedYear
        }, function(data) {
            var vols = []
            vols[0] = [];
            vols[1] = [];
            vols[2] = [];
            $.each(data, function(i, item) {
                vols[0][i] = item.member_id;
                vols[1][i] = item.first_name;
                vols[2][i] = item.last_name;
            });
            callback(vols);
        });
}

function getUsersInProgramForShifts(callback, programName, selectedSemester, selectedYear) {
    $.getJSON("../include/getUsersInProgramForShifts.php", 
        {
            program: programName,
            semester: selectedSemester,
            year: selectedYear
        }, function(data) {
            var vols = []
            vols[0] = [];
            vols[1] = [];
            vols[2] = [];
            $.each(data, function(i, item) {
                vols[0][i] = item.email;
                vols[1][i] = item.first_name;
                vols[2][i] = item.last_name;
            });
            callback(vols);
        });
}

function getShiftsForWeek(callback, programName, selectedSemester, selectedYear, selectedWeek, selectedDay) {
    $.getJSON("../include/getShiftsForWeek.php", 
        {
            program: programName,
            semester: selectedSemester,
            year: selectedYear,
            week: selectedWeek, 
            day: selectedDay
        }, function(data) {
            var shifts = []
            shifts[0] = [];
            shifts[1] = [];
            shifts[2] = [];
            $.each(data, function(i, item) {
                shifts[0][i] = item.attendance_id;
                shifts[1][i] = item.first_name;
                shifts[2][i] = item.last_name;
            });
            callback(shifts);
        });
}

function insertProgramMembersManualShift(callback, emails, program, semester, year, day, time) {
    $.post("../include/insertProgramMembersManualShift.php",
            {
                emails: emails,
                program: program,
                semester: semester, 
                year: year,
                day: day,
                time: time
            }, function() {
                callback();
            });
}

function insertManualShifts(callback, emails, program, semester, year, week, day, time, notes) {
    $.post("../include/insertManualShifts.php",
            {
                emails: emails,
                program: program,
                semester: semester, 
                year: year,
                week: week,
                day: day,
                time: time,
                notes: notes
            }, function() {
                callback();
            });
}

function insertAutoShifts(callback, program, semester, year, week) {
    $.post("../include/insertAutoShifts.php",
            {
                program: program,
                semester: semester, 
                year: year,
                week: week
            }, function() {
                callback();
            });
}

function editProgramMembers(callback, ids, field, newValue) {
    $.post("../include/editProgramMembers.php",
            {
                ids: ids,
                field: field,
                newValue: newValue
            }, function() {
                callback();
            });
}

function editShifts(callback, ids, field, newValue) {
    $.post("../include/editShifts.php",
            {
                ids: ids,
                field: field,
                newValue: newValue
            }, function() {
                callback();
            });
}

function getAllUsersForRoles(callback) {
    $.getJSON("../include/getAllUsersForRoles.php", 
        {
            

        }, function(data) {
            var users = []
            users[0] = [];
            users[1] = [];
            users[2] = [];
            $.each(data, function(i, item) {
                users[0][i] = item.email;
                users[1][i] = item.first_name;
                users[2][i] = item.last_name;
            });
            callback(users);
        });
}

function getRoles(callback, tableRoles) {
    $.getJSON("../include/getRoles.php", 
        {
            

        }, function(data) {
            $.each(data, function(i, item) {
                tableRoles.row.add([
                    item.first_name, 
                    item.last_name,
                    item.email,
                    item.group_name,
                    item.group_member_id
                ]);
            });
            callback(tableRoles);
        });
}

function getAllRoles(callback) {
    $.getJSON("../include/getAllRoles.php", 
        { 
            

        }, function(data) {
            var roles = []
            roles[0] = [];
            roles[1] = [];
            roles[2] = [];
            roles[3] = [];
            $.each(data, function(i, item) {
                roles[0][i] = item.group_member_id;
                roles[1][i] = item.first_name;
                roles[2][i] = item.last_name;
                roles[3][i] = item.group_name;
            });
            callback(roles);
        });
}

function getUserData(callback, email) {
    $.getJSON("../include/getUserData.php", 
        { 
            email: email

        }, function(data) {
            callback(data);
        });
}

function insertRoles(callback, emails, role) {
    $.post("../include/insertRoles.php",
            {
                emails: emails,
                role: role
            }, function() {
                callback();
            });
}

function insertUserManual(callback, email, id, fn, ln, sex, year, school, major, minor, hometown, state, international, ahana, transfer, phone) {
    $.post("../include/insertUserManual.php",
            {
                email: email,
                id: id,
                fn: fn,
                ln: ln,
                sex: sex,
                year: year,
                school: school,
                major: major,
                minor: minor,
                hometown: hometown,
                state: state,
                international: international,
                ahana: ahana,
                transfer: transfer,
                phone: phone
            }, function(data) {
                if(data.includes('exists')) {
                    alert(fn + " " + ln + " was not added becuase this user already exists in the database");
                }
                else {
                    alert(fn + " " + ln + " was added to the database");
                }
                callback();
            });
}

function deleteRoles(callback, ids) {
    $.post("../include/deleteRoles.php",
            {
                ids: ids
            }, function() {
                callback();
            });
}

function deleteUser(callback, user) {
    $.post("../include/deleteUser.php",
            {
                user: user
            }, function() {
                callback();
            });
}

function changePassword(callback, emails, password) {
    $.post("../include/changePassword.php",
            {
                emails: emails,
                password: password
            }, function() {
                callback();
            });
}

function getPrograms(callback, selectedSemester, selectedYear, tableProgram) {
    $.getJSON("../include/getPrograms.php",  {
            semester: selectedSemester,
            year: selectedYear
          }, 
          function(data) {
            $.each( data, function( i, item ) {
                var req = item[3];
                if(req != null) {
                    for (var i = 0; i < req.length; i++) {
                        if(req.charAt(i) == '\n') {
                            req = req.substr(0, i).concat('<br>', req.substr(i+1));
                        }
                    }
                }
                tableProgram.row.add([
                    item[0],
                    item[1] + " " + item[2],
                    req,
                    item[5],
                    item[4],
                ]);
               
              }); 
            callback(tableProgram);
          });
}

function insertProgram(callback, programName, year, semester, coordinator) {
    $.post("../include/insertProgram.php",
            {
                program: programName,
                year: year,
                semester: semester,
                coordinator: coordinator
            }, function() {
                callback();
            });
}

function getCoordinatorsForYear(callback, year, semester) {
    $.getJSON("../include/getCoordinatorsForYear.php", 
        {
            year: year,
            semester: semester

        }, function(data) {
            var users = []
            users[0] = [];
            users[1] = [];
            users[2] = [];
            $.each(data, function(i, item) {
                users[0][i] = item.council_member_id;
                users[1][i] = item.first_name;
                users[2][i] = item.last_name;
            });
            callback(users);
        });
}

function getAllCouncilMembers(callback, selectedYear, selectedSemester, tableVols) {
    $.getJSON("../include/getAllCouncilMembers.php",  {
            year: selectedYear,
            semester: selectedSemester
          }, 
          function(data) {
            $.each( data, function( i, item ) {
                tableVols.row.add([
                    item.position,
                    item.first_name,
                    item.last_name,
                    item.email,
                    item.class,
                    item.school,
                    item.major,
                    item.minor,
                    item.hometown,
                    item.state_country,
                    'Delete',
                    item.council_member_id
                ]);
               
              }); 
            callback(tableVols);
          });
}

function insertCouncilMember(callback, emails, selectedYear, selectedSemester, position) {
    $.post("../include/insertCouncilMember.php",
            {
                emails: emails,
                year: selectedYear,
                semester: selectedSemester,
                position: position
            }, function() {
                callback();
            });
}

function deleteCouncilMember(callback, id) {
    $.post("../include/deleteCouncilMember.php",
            {
                id: id
            }, function() {
                callback();
            });
}

function getAllPossibleUsers(callback) {
    $.getJSON("../include/getAllPossibleUsers.php", 
        {

        }, function(data) {
            var users = []
            users[0] = [];
            users[1] = [];
            users[2] = [];
            $.each(data, function(i, item) {
                users[0][i] = item.email;
                users[1][i] = item.first_name;
                users[2][i] = item.last_name;
            });
            callback(users);
        });
}

function getExistingProgramsForSemester(callback, year, semester) {
    $.getJSON("../include/getExistingProgramsForSemester.php", 
        {
            year: year,
            semester: semester

        }, function(data) {
            var users = []
            $.each(data, function(i, item) {
                users[i] = item.program_name;
            });
            callback(users);
        });
}

function markGraduated(callback, year) {
    $.post("../include/markGraduated.php",
            {
                year: year
            }, function() {
                callback();
            });
}

function markInactive(callback, year, semester) {
    $.post("../include/markInactive.php",
            {
                year: year,
                semester: semester
            }, function() {
                callback();
            });
}

function getInvolvementData(callback, user, year) {
    $.getJSON("../include/getHistoryCreditForProgram.php", 
    {
        user: user,
        year: year
    }, function(data) {
        callback(data);
    });
}

function updateProfile(callback, email, fnn, lnn, eagleidn, sexn, phonen, yearn, schooln, majorn, minorn, hometownn, staten, localn, ahanan, internationaln, transfern) {
    $.post("../include/updateProfile.php",
            {
                fn: fnn, 
                ln: lnn, 
                eagleid: eagleidn,
                sex: sexn,
                year: yearn,
                school: schooln, 
                major: majorn,
                minor: minorn,
                hometown: hometownn,
                state: staten,
                local: localn,
                ahana: ahanan,
                international: internationaln,
                transfer: transfern,
                email: email
            }, function() {
                callback();
            });
}

function updateUserProfile(callback, email, fnn, lnn, eagleidn, sexn, phonen, yearn, schooln, majorn, minorn, hometownn, staten, localn, ahanan, internationaln, transfern, toursn, panelsn, counciln, summern, statusn) {
    $.post("../include/updateUserProfile.php",
            {
                fn: fnn, 
                ln: lnn, 
                eagleid: eagleidn,
                sex: sexn,
                year: yearn,
                school: schooln, 
                major: majorn,
                minor: minorn,
                hometown: hometownn,
                state: staten,
                local: localn,
                ahana: ahanan,
                international: internationaln,
                transfer: transfern,
                tours: toursn,
                panels: panelsn,
                council: counciln,
                summer: summern,
                status: statusn,
                email: email
            }, function() {
                callback();
            });
}

function verifyData(field, value) {
    switch(field) {
        case 'shift_time': {
            var patt = /\b[1-9][0-2]?:[0-5][0-9] AM\b|\b[1-9][0-2]?:[0-5][0-9] PM\b/;
            if(!patt.test(value)) {
                alert('Please enter a valid time in the correct format\n(XX:XX AM/PM; i.e. "10:00 AM" or "2:30 PM")');
                return false;
            }
            else {
                return true;
            }
        } break;
        default: return true;
    }
}
$('#export-excel-all').on("click", function(e) {
    var s = document.getElementById("table-status");
    var selectedStatus = s.options[s.selectedIndex].value;
    $('#table-volunteers').tableExport({type:'xlsx', fileName: document.getElementById("programName").value + '_' + selectedStatus});
});
$('#export-csv-all').on("click", function(e) {
    var s = document.getElementById("table-status");
    var selectedStatus = s.options[s.selectedIndex].value;
    $('#table-volunteers').tableExport({type:'csv', fileName: document.getElementById("programName").value + '_' + selectedStatus});
});
$('#export-pdf-all').on("click", function(e) {
    var s = document.getElementById("table-status");
    var selectedStatus = s.options[s.selectedIndex].value;
    $('#table-volunteers').tableExport({
                    type: 'pdf',
                    jspdf: {margins: {left:30, right:30, top:40, bottom:20},
                            autotable: {styles: {overflow: 'linebreak'},
                                        tableWidth: 'wrap'}},
                    fileName: document.getElementById("programName").value + '_' + selectedStatus});
});

$('#export-excel-volunteers').on("click", function(e) {
    var s = document.getElementById("table-semester");
    var selectedSemester = s.options[s.selectedIndex].value;
    var y = document.getElementById("table-year");
    var selectedYear = y.options[y.selectedIndex].value;
    $('#table-volunteers').tableExport({type:'xlsx', fileName: document.getElementById("programName").value + ' Volunteers_' + selectedSemester + selectedYear});
});
$('#export-csv-volunteers').on("click", function(e) {
    var s = document.getElementById("table-semester");
    var selectedSemester = s.options[s.selectedIndex].value;
    var y = document.getElementById("table-year");
    var selectedYear = y.options[y.selectedIndex].value;
    $('#table-volunteers').tableExport({type:'csv', fileName: document.getElementById("programName").value + ' Volunteers_' + selectedSemester + selectedYear});
});
$('#export-pdf-volunteers').on("click", function(e) {
    var s = document.getElementById("table-semester");
    var selectedSemester = s.options[s.selectedIndex].value;
    var y = document.getElementById("table-year");
    var selectedYear = y.options[y.selectedIndex].value;
    $('#table-volunteers').tableExport({
                    type: 'pdf',
                    jspdf: {margins: {left:30, right:30, top:40, bottom:20},
                            autotable: {styles: {overflow: 'linebreak'},
                                        tableWidth: 'wrap'}},
                    fileName: document.getElementById("programName").value + ' Volunteers_' + selectedSemester + selectedYear});
});
$('#export-excel-attendance').on("click", function(e) {
    var s = document.getElementById("table-semester");
    var selectedSemester = s.options[s.selectedIndex].value;
    var y = document.getElementById("table-year");
    var selectedYear = y.options[y.selectedIndex].value;
    var w = document.getElementById("table-week");
    var selectedWeek = w.options[w.selectedIndex].value; //sometimes has an undefined value
    var d = document.getElementById("table-day");
    var selectedDay = d.options[d.selectedIndex].value;
    if(selectedDay == 'day') {
        selectedDay = '';
    }
    else {
        selectedDay = '_' + selectedDay;
    }
    $('#table-attendance').tableExport({type:'xlsx', fileName: document.getElementById("programName").value + ' Attendance_' + selectedSemester + selectedYear + '_Week' + selectedWeek + selectedDay});
});
$('#export-csv-attendance').on("click", function(e) {
    var s = document.getElementById("table-semester");
    var selectedSemester = s.options[s.selectedIndex].value;
    var y = document.getElementById("table-year");
    var selectedYear = y.options[y.selectedIndex].value;
    var w = document.getElementById("table-week");
    var selectedWeek = w.options[w.selectedIndex].value; //sometimes has an undefined value
    var d = document.getElementById("table-day");
    var selectedDay = d.options[d.selectedIndex].value;
    if(selectedDay == 'day') {
        selectedDay = '';
    }
    else {
        selectedDay = '_' + selectedDay;
    }
    $('#table-attendance').tableExport({type:'csv', fileName: document.getElementById("programName").value + ' Attendance_' + selectedSemester + selectedYear + '_Week' + selectedWeek + selectedDay});
});
$('#export-pdf-attendance').on("click", function(e) {
    var s = document.getElementById("table-semester");
    var selectedSemester = s.options[s.selectedIndex].value;
    var y = document.getElementById("table-year");
    var selectedYear = y.options[y.selectedIndex].value;
    var w = document.getElementById("table-week");
    var selectedWeek = w.options[w.selectedIndex].value; //sometimes has an undefined value
    var d = document.getElementById("table-day");
    var selectedDay = d.options[d.selectedIndex].value;
    if(selectedDay == 'day') {
        selectedDay = '';
    }
    else {
        selectedDay = '_' + selectedDay;
    }
    $('#table-attendance').tableExport({
                    type: 'pdf',
                    jspdf: {margins: {left:30, right:30, top:40, bottom:20},
                            autotable: {styles: {overflow: 'linebreak'},
                                        tableWidth: 'wrap'}},
                    fileName: document.getElementById("programName").value + ' Attendance_' + selectedSemester + selectedYear + '_Week' + selectedWeek + selectedDay});
});