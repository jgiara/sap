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

function getVolunteerData(callback, selectedSemester, selectedYear, tableVols) {
    $.getJSON("../include/getProgramVolunteers.php",  {
            program: "Panels",
            semester: selectedSemester,
            year: selectedYear
          }, 
          function(data) {
            $.each( data, function( i, item ) {
                tableVols.row.add([
                    "<a id='test' href='./dashboard.php'>"+ item.first_name + "</a>",
                    item.last_name,
                    item.class,
                    item.school,
                    item.shift_day,
                    item.shift_time,
                    item.requirements_status,
                    item.eagle_id
                ]);
               
              }); 
            callback(tableVols);
          });
}

function getAttendanceData(callback, selectedSemester, selectedYear, selectedWeek, selectedDay, tableAttn) {
    $.getJSON("../include/getProgramAttendance.php", 
        {
            program: "Panels",
            semester: selectedSemester,
            year: selectedYear, 
            week: selectedWeek,
            day: selectedDay
        }, function(data) {
            $.each(data, function(i, item) {
                tableAttn.row.add([
                    item.first_name,
                    item.last_name,
                    item.shift_day,
                    item.shift_time,
                    item.present,
                    item.note,
                    item.eagle_id,
                    item.attendance_id,
                    "<input type=checkbox/>"
                ]);
            });
            callback(tableAttn);
        });
}

function getWeekData(callback, selectedSemester, selectedYear) {
    $.getJSON("../include/getWeek.php", 
        {
            semester: selectedSemester,
            year: selectedYear
        }, function(data) {
            $.each(data, function(i, item) {
                     document.getElementById("table-week").innerHTML += "<option value ='" + item.week_id + "'>Week " + item.week_number + ": " + item.sunday_date.substring(5) + " - " + item.saturday_date.substring(5) + "</option>"; 
            });
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

function verifyData(field, value) {
    switch(field) {
        case 'shift_day': {
            if(["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"].indexOf(value) == -1) {
                alert("Please enter a valid day of the week");
                return false;
            }
            else {
                return true;
            }
        }
        break;
        case 'shift_time': {
            var patt = /\b[1-9][0-2]?:[0-5][0-9] AM|\b[1-9][0-2]?:[0-5][0-9] PM/;
            if(!patt.test(value)) {
                alert("Please enter a valid time in the correct format\ni.e. 10:30 AM\n" + value);
                return false;
            }
            else {
                return true;
            }
        }
        break;
        case 'credit': {
            if(value != 'Pending' && value != 'Complete' != 'Incomplete') {
                alert("Please enter either Pending, Complete, or Incomplete");
                return false;
            }
            else {
                return true;
            }
        }
        break;
        default: return true;
    }
}

$('#export-excel-volunteers').on("click", function(e) {
    var s = document.getElementById("table-semester");
    var selectedSemester = s.options[s.selectedIndex].value;
    var y = document.getElementById("table-year");
    var selectedYear = y.options[y.selectedIndex].value;
    $('#table-volunteers').tableExport({type:'xlsx', fileName: 'Panels Volunteers_' + selectedSemester + selectedYear});
});
$('#export-csv-volunteers').on("click", function(e) {
    var s = document.getElementById("table-semester");
    var selectedSemester = s.options[s.selectedIndex].value;
    var y = document.getElementById("table-year");
    var selectedYear = y.options[y.selectedIndex].value;
    $('#table-volunteers').tableExport({type:'csv', fileName: 'Panels Volunteers_' + selectedSemester + selectedYear});
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
                    fileName: 'Panels Volunteers_' + selectedSemester + selectedYear});
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
    $('#table-attendance').tableExport({type:'xlsx', fileName: 'Panels Attendance_' + selectedSemester + selectedYear + '_Week' + selectedWeek + selectedDay});
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
    $('#table-attendance').tableExport({type:'csv', fileName: 'Panels Attendance_' + selectedSemester + selectedYear + '_Week' + selectedWeek + selectedDay});
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
                    fileName: 'Panels Attendance_' + selectedSemester + selectedYear + '_Week' + selectedWeek + selectedDay});
});