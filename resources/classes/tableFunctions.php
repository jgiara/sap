
<?php 
class TableFunctions {
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}	
	 
	public function getProgramVolunteers($program, $semester, $year) {
		$query = $this->db->prepare("SELECT * from Program_Members, Users, Programs where user=email and program=program_id and program_name=? and semester=? and year=?");
		$query->bindValue(1, $program);
		$query->bindValue(2, $semester);
		$query->bindValue(3, $year);

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getProgramAttendance($program, $semester, $year, $week, $day) {
		if($week == 'all') {
			$query = $this->db->prepare("SELECT * from Attendance, Users, Programs as p, Programming_Weeks as w where w.week_id=week and user=email and program=p.program_id and p.program_name=? and p.semester=? and p.year=? and shift_day like ?");			
			$query->bindValue(1, $program);
			$query->bindValue(2, $semester);
			$query->bindValue(3, $year);
			$query->bindValue(4, $day);
		}
		else {
			$query = $this->db->prepare("SELECT * from Attendance, Users, Programs as p, Programming_Weeks as w where w.week_id=week and user=email and program=p.program_id and p.program_name=? and p.semester=? and p.year=? and week=? and shift_day like ?");			
			$query->bindValue(1, $program);
			$query->bindValue(2, $semester);
			$query->bindValue(3, $year);
			$query->bindValue(4, $week);
			$query->bindValue(5, $day);
		}
		
		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getWeeks($semester, $year) {
		$query = $this->db->prepare("SELECT * from Programming_Weeks where semester=? and year=? order by week_number desc");
		$query->bindValue(1, $semester);
		$query->bindValue(2, $year);

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getAllUsers($status) {
		$query = $this->db->prepare("SELECT * from Users where status=?");
		$query->bindValue(1, $status);

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getUserData($email) {
		$query = $this->db->prepare("SELECT * from Users where email=?");
		$query->bindValue(1, $email);

		try {
			$query->execute();
			$data = $query->fetch();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getAllPossibleUsers() {
		$query = $this->db->prepare("SELECT * from Users where status!='Graduated'");

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function insertCouncilMember($email, $semester, $year, $position) {
		if($semester == 'Fall') {
			$query = $this->db->prepare("INSERT INTO Council_Members (user, council_id, position) values (?, (SELECT council_id from Council where fall_year=?), ?)");
		}
		else {
			$query = $this->db->prepare("INSERT INTO Council_Members (user, council_id, position) values (?, (SELECT council_id from Council where spring_year=?), ?)");
		}
		$query->bindValue(1, $email);
		$query->bindValue(2, $year);
		$query->bindValue(3, $position);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function inlineUpdate($id, $field, $table, $newValue, $whereField) {
		$query = $this->db->prepare("UPDATE $table set $field=? where $whereField=?");
		$query->bindValue(1, $newValue);
		$query->bindValue(2, $id);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getAllEmails() { 

		$query = $this->db->prepare("SELECT email FROM Users");
		
		try{
			
			$query->execute();
			$data = $query->fetchAll();
			$emails = [];
			foreach($data as $em) {
				array_push($emails, $em[0]);
			}
			return $emails;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	
	}

	public function insertProgramMemberCoordinator($id, $program, $semester, $year) {
		$query = $this->db->prepare("INSERT INTO Program_Members (user, program, credit_status) values ((SELECT user from Council_Members where council_member_id=?), (SELECT program_id from Programs where program_name=? and semester=? and year=?), 'Pending')");
		$query->bindValue(1, $id);
		$query->bindValue(2, $program);
		$query->bindValue(3, $semester);
		$query->bindValue(4, $year);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function insertProgramMemberShift($email, $program, $semester, $year, $day, $time) {
		$query = $this->db->prepare("INSERT INTO Program_Members (user, program, shift_day, shift_time, credit_status) values (?, (SELECT program_id from Programs where program_name=? and semester=? and year=?), ?, ?, 'Pending')");
		$query->bindValue(1, $email);
		$query->bindValue(2, $program);
		$query->bindValue(3, $semester);
		$query->bindValue(4, $year);
		$query->bindValue(5, $day);
		$query->bindValue(6, $time);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function insertProgramMemberShiftGreeting($email, $program, $semester, $year, $day, $time, $weekColor) {
		$query = $this->db->prepare("INSERT INTO Program_Members (user, program, shift_day, shift_time, credit_status, week_color) values (?, (SELECT program_id from Programs where program_name=? and semester=? and year=?), ?, ?, 'Pending', ?)");
		$query->bindValue(1, $email);
		$query->bindValue(2, $program);
		$query->bindValue(3, $semester);
		$query->bindValue(4, $year);
		$query->bindValue(5, $day);
		$query->bindValue(6, $time);
		$query->bindValue(7, $weekColor);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function insertProgramMember($email, $program, $semester, $year) {
		$query = $this->db->prepare("INSERT INTO Program_Members (user, program, credit_status) values (?, (SELECT program_id from Programs where program_name=? and semester=? and year=?), 'Pending')");
		$query->bindValue(1, $email);
		$query->bindValue(2, $program);
		$query->bindValue(3, $semester);
		$query->bindValue(4, $year);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function insertManualShifts($email, $program, $semester, $year, $week, $day, $time, $notes) {
		$query = $this->db->prepare("INSERT INTO Attendance (user, program, week, note, shift_day, shift_time) values (?, (SELECT program_id from Programs where program_name=? and semester=? and year=?), ?, ?, ?, ?)");
		$query->bindValue(1, $email);
		$query->bindValue(2, $program);
		$query->bindValue(3, $semester);
		$query->bindValue(4, $year);
		$query->bindValue(5, $week);
		$query->bindValue(6, $notes);
		$query->bindValue(7, $day);
		$query->bindValue(8, $time);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function deleteShiftsForWeek($program, $semester, $year, $week) {
		$query = $this->db->prepare("DELETE from Attendance where program=(SELECT program_id from Programs where program_name=? and semester=? and year=?) and week=?");
		$query->bindValue(1, $program);
		$query->bindValue(2, $semester);
		$query->bindValue(3, $year);
		$query->bindValue(4, $week);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getAssignedShiftsForProgram($program, $semester, $year) {
		$query = $this->db->prepare("SELECT user, shift_day, shift_time from Program_Members where program=(SELECT program_id from Programs where program_name=? and semester=? and year=?)");
		$query->bindValue(1, $program);
		$query->bindValue(2, $semester);
		$query->bindValue(3, $year);

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getAssignedShiftsForProgramGreeting($program, $semester, $year, $weekColor) {
		$query = $this->db->prepare("SELECT user, shift_day, shift_time from Program_Members where program=(SELECT program_id from Programs where program_name=? and semester=? and year=?) and week_color=?");
		$query->bindValue(1, $program);
		$query->bindValue(2, $semester);
		$query->bindValue(3, $year);
		$query->bindValue(4, $weekColor);

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function insertAutoShifts($email, $program, $semester, $year, $week, $day, $time) {
		$query = $this->db->prepare("INSERT INTO Attendance (user, program, week, note, shift_day, shift_time) values (?, (SELECT program_id from Programs where program_name=? and semester=? and year=?), ?, ?, ?, ?)");
		$query->bindValue(1, $email);
		$query->bindValue(2, $program);
		$query->bindValue(3, $semester);
		$query->bindValue(4, $year);
		$query->bindValue(5, $week);
		$query->bindValue(6, $notes);
		$query->bindValue(7, $day);
		$query->bindValue(8, $time);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function insertAutoShiftsGreeting($email, $program, $semester, $year, $week, $day, $time, $weekColor) {
		$query = $this->db->prepare("INSERT INTO Attendance (user, program, week, note, shift_day, shift_time, week_color) values (?, (SELECT program_id from Programs where program_name=? and semester=? and year=?), ?, ?, ?, ?, ?)");
		$query->bindValue(1, $email);
		$query->bindValue(2, $program);
		$query->bindValue(3, $semester);
		$query->bindValue(4, $year);
		$query->bindValue(5, $week);
		$query->bindValue(6, $notes);
		$query->bindValue(7, $day);
		$query->bindValue(8, $time);
		$query->bindValue(9, $weekColor);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getUsersNotInProgram($program, $semester, $year) {
		$query = $this->db->prepare("SELECT email, first_name, last_name from Users where email not in (SELECT user from Program_Members, Programs where program_id=program and program_name=? and semester=? and year=?) and status!='Graduated'");
		$query->bindValue(1, $program);
		$query->bindValue(2, $semester);
		$query->bindValue(3, $year);

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getUsersInProgram($program, $semester, $year) {
		$query = $this->db->prepare("SELECT member_id, first_name, last_name from Users, Program_Members, Programs where email=user and program_id=program and program_name=? and semester=? and year=? and email in (SELECT user from Program_Members, Programs where program_id=program and program_name=? and semester=? and year=?)");
		$query->bindValue(1, $program);
		$query->bindValue(2, $semester);
		$query->bindValue(3, $year);
		$query->bindValue(4, $program);
		$query->bindValue(5, $semester);
		$query->bindValue(6, $year);

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getUsersInProgramForShifts($program, $semester, $year) {
		$query = $this->db->prepare("SELECT email, first_name, last_name from Users where email in (SELECT user from Program_Members, Programs where program_id=program and program_name=? and semester=? and year=?)");
		$query->bindValue(1, $program);
		$query->bindValue(2, $semester);
		$query->bindValue(3, $year);

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getProgramMemberID($email, $program, $semester, $year) {
		$query = $this->db->prepare("SELECT member_id from Program_Members, Programs where program_id = program and user=? and program_name=? and semester=? and year=?");
		$query->bindValue(1, $email);
		$query->bindValue(2, $program);
		$query->bindValue(3, $semester);
		$query->bindValue(4, $year);

		try {
			$query->execute();
			$data = $query->fetchColumn();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function deleteProgramMembers($id) {
		$query = $this->db->prepare("DELETE from Program_Members where member_id=?");
		$query->bindValue(1, $id);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function editProgramMembers($id, $field, $newValue) {
		$query = $this->db->prepare("UPDATE Program_Members set $field=? where member_id=?");
		$query->bindValue(1, $newValue);
		$query->bindValue(2, $id);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getShiftsForWeek($program, $semester, $year, $week, $day) {
		if($day == 'day') {
			$day = '%' . $day;
			if($week == 'all') {
				$query = $this->db->prepare("SELECT attendance_id, first_name, last_name from Users, Attendance where user=email and shift_day like ? and attendance_id in (SELECT attendance_id from Attendance, Programs where program_id=program and program_name=? and semester=? and year=?)");
				$query->bindValue(1, $day);
				$query->bindValue(2, $program);
				$query->bindValue(3, $semester);
				$query->bindValue(4, $year);
			}
			else {
				$query = $this->db->prepare("SELECT attendance_id, first_name, last_name from Users, Attendance where user=email and week=? and shift_day like ? and attendance_id in (SELECT attendance_id from Attendance, Programs where program_id=program and program_name=? and semester=? and year=?)");
				$query->bindValue(1, $week);
				$query->bindValue(2, $day);
				$query->bindValue(3, $program);
				$query->bindValue(4, $semester);
				$query->bindValue(5, $year);
			}
			
		}
		else {
			if($week == 'all') {
				$query = $this->db->prepare("SELECT attendance_id, first_name, last_name from Users, Attendance where user=email and shift_day=? and attendance_id in (SELECT attendance_id from Attendance, Programs where program_id=program and program_name=? and semester=? and year=?)");
				$query->bindValue(1, $day);
				$query->bindValue(2, $program);
				$query->bindValue(3, $semester);
				$query->bindValue(4, $year);
			}
			else {
				$query = $this->db->prepare("SELECT attendance_id, first_name, last_name from Users, Attendance where user=email and week=? and shift_day=? and attendance_id in (SELECT attendance_id from Attendance, Programs where program_id=program and program_name=? and semester=? and year=?)");
				$query->bindValue(1, $week);
				$query->bindValue(2, $day);
				$query->bindValue(3, $program);
				$query->bindValue(4, $semester);
				$query->bindValue(5, $year);
			}
		}

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function deleteShifts($id) {
		$query = $this->db->prepare("DELETE from Attendance where attendance_id=?");
		$query->bindValue(1, $id);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function editShifts($id, $field, $newValue) {
		$query = $this->db->prepare("UPDATE Attendance set $field=? where attendance_id=?");
		$query->bindValue(1, $newValue);
		$query->bindValue(2, $id);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function insertProgrammingWeek($week, $year, $semester, $sun, $mon, $tues, $wed, $thurs, $fri, $sat) {
		$query = $this->db->prepare("INSERT INTO Programming_Weeks (week_number, semester, year, current_week, sunday_date, monday_date, tuesday_date, wednesday_date, thursday_date, friday_date, saturday_date) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$query->bindValue(1, $week);
		$query->bindValue(2, $semester);
		$query->bindValue(3, $year);
		$current = 'No';
		$query->bindValue(4, $current);
		$query->bindValue(5, $sun);
		$query->bindValue(6, $mon);
		$query->bindValue(7, $tues);
		$query->bindValue(8, $wed);
		$query->bindValue(9, $thurs);
		$query->bindValue(10, $fri);
		$query->bindValue(11, $sat);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function deleteRoles($id) {
		$query = $this->db->prepare("DELETE from Group_Members where group_member_id=?");
		$query->bindValue(1, $id);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function deleteRolesByEmail($user) {
		$query = $this->db->prepare("DELETE from Group_Members where user=?");
		$query->bindValue(1, $user);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function deleteUser($user) {
		$query = $this->db->prepare("DELETE from Users where email=?");
		$query->bindValue(1, $user);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function deleteCouncilMember($id) {
		$query = $this->db->prepare("DELETE from Council_Members where council_member_id=?");
		$query->bindValue(1, $id);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function insertRoles($email, $role) {
		$query = $this->db->prepare("INSERT INTO Group_Members (user, group_id) values(?, ?)");
		$query->bindValue(1, $email);
		$query->bindValue(2, $role);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getAllRoles() {
		$query = $this->db->prepare("SELECT group_member_id, first_name, last_name, group_name from Group_Members, Groups, Users where Groups.group_id=Group_Members.group_id and user=email");

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getRoles() {
		$query = $this->db->prepare("SELECT * from Group_Members, Groups, Users where Groups.group_id=Group_Members.group_id and user=email");

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getAllUsersForRoles() {
		$query = $this->db->prepare("SELECT email, first_name, last_name from Users where status != 'Graduated'");

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function changePassword($email, $password, $fn, $ln) {
		$encryptpass =  sha1($password);

		$message = "Hello ".$fn." ".$ln.",\r\n\r\nYour new password is ".$password."."."\r\n\r\nIf you did not request this new password, please email sap@bc.edu.";
		$headers = 'From: passwordreset@bcsap.org' . "\r\n" .
					'Reply-To: sap@bc.edu' ."\r\n".
	          'X-Mailer: PHP/' . phpversion();

		$query = $this->db->prepare("UPDATE Users SET password = ? WHERE email = ?");
		$query->bindValue(1, $encryptpass);
		$query->bindValue(2, $email);

		try{
			$query->execute();

			mail($email, "SAP Website Portal: Your Password Has Been Changed", $message, $headers);

		
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	public function getPrograms($semester, $year) {
		$query = $this->db->prepare("SELECT program_name, first_name, last_name, requirements, program_id, count(member_id) from Programs, Program_Members, Users, Council_Members, Council where program_id=program and coordinator=council_member_id and Council_Members.user=email and semester=? and year=? group by program_name, first_name, last_name, requirements, program_id");
		$query->bindValue(1, $semester);
		$query->bindValue(2, $year);

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getCoordinatorsForYear($year, $semester) {
		if($semester == 'Fall') {
			$query = $this->db->prepare("SELECT * from Users, Council_Members, Council where email=user and Council.council_id=Council_Members.council_id and fall_year=?");
		}
		else {
			$query = $this->db->prepare("SELECT * from Users, Council_Members, Council where email=user and Council.council_id=Council_Members.council_id and spring_year=?");
		}
		
		$query->bindValue(1, $year);


		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function insertProgram($program, $semester, $year, $coordinator) {
		$query = $this->db->prepare("INSERT INTO Programs (program_name, semester, year, coordinator) values(?, ?, ?, ?)");
		$query->bindValue(1, $program);
		$query->bindValue(2, $semester);
		$query->bindValue(3, $year);
		$query->bindValue(4, $coordinator);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getExistingProgramsForSemester($year, $semester) {
		$query = $this->db->prepare("SELECT program_name from Programs where year=? and semester=?");
		
		$query->bindValue(1, $year);
		$query->bindValue(2, $semester);


		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function updateUserStatus($email, $status) {
		$query = $this->db->prepare("UPDATE Users set status=? where email=?");
		$query->bindValue(1, $status);
		$query->bindValue(2, $email);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function markGraduated($year) {
		$query = $this->db->prepare("UPDATE Users set status='Graduated' where class=?");
		$query->bindValue(1, $year);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function markInactive($year, $semester) {
		$query = $this->db->prepare("UPDATE Users set status='Inactive' where email not in (SELECT user from Programs, Program_Members where program_id=program and year=? and semester=?)");
		$query->bindValue(1, $year);
		$query->bindValue(2, $semester);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function searchUsers($val) {
		$query = $this->db->prepare("SELECT * from Users where first_name like ? or last_name like ? or eagle_id like ?");
		$val = strtolower($val);
		$val = '%'.$val.'%';
		$query->bindValue(1, $val);
		$query->bindValue(2, $val);
		$query->bindValue(3, $val);

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function insertUserAuto($email, $info) {
		$query = $this->db->prepare("INSERT INTO Users (email, eagle_id, first_name, last_name, sex, class, school, major, minor, hometown, state_country, international, ahana, transfer, phone, status, password) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Active', ?)");
		$query->bindValue(1, $email);
		$query->bindValue(2, trim($info[1]));
		$query->bindValue(3, trim($info[2]));
		$query->bindValue(4, trim($info[3]));
		$query->bindValue(5, trim($info[4]));
		$query->bindValue(6, trim($info[5]));
		$query->bindValue(7, trim($info[6]));
		$query->bindValue(8, trim($info[7]));
		$query->bindValue(9, trim($info[8]));
		$query->bindValue(10, trim($info[9]));
		$query->bindValue(11, trim($info[10]));
		$query->bindValue(12, trim($info[11]));
		$query->bindValue(13, trim($info[12]));
		$query->bindValue(14, trim($info[13]));
		$query->bindValue(15, trim($info[14]));
		$pass = sha1(trim($info[1]));
		$query->bindValue(16, $pass);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function insertUserManual($email, $id, $fn, $ln, $sex, $year, $school, $major, $minor, $hometown, $state, $international, $ahana, $transfer, $phone) {
		$query = $this->db->prepare("INSERT INTO Users (email, eagle_id, first_name, last_name, sex, class, school, major, minor, hometown, state_country, international, ahana, transfer, phone, status, password) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Active', ?)");
		$query->bindValue(1, $email);
		$query->bindValue(2, $id);
		$query->bindValue(3, $fn);
		$query->bindValue(4, $ln);
		$query->bindValue(5, $sex);
		$query->bindValue(6, $year);
		$query->bindValue(7, $school);
		$query->bindValue(8, $major);
		$query->bindValue(9, $minor);
		$query->bindValue(10, $hometown);
		$query->bindValue(11, $state);
		$query->bindValue(12, $international);
		$query->bindValue(13, $ahana);
		$query->bindValue(14, $transfer);
		$query->bindValue(15, $phone);
		$pass = sha1($id);
		$query->bindValue(16, $pass);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getHistoryCreditForProgram($program, $user) {
		$query = $this->db->prepare("SELECT count(program_id), credit_status from Programs, Program_Members where program=program_id and program_name=? and user=? group by credit_status");
		
		$query->bindValue(1, $program);
		$query->bindValue(2, $user);


		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getCreditHistory($user) {
		$query = $this->db->prepare("SELECT panels, tours, greeting, om, efad, aed, outreach, hsvisits, ahana, io, transfer, media from Credit_History where user=?");
		
		$query->bindValue(1, $user);


		try {
			$query->execute();
			$data = $query->fetch();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function updateProfile($fn, $ln, $id, $sex, $year, $school, $major, $minor, $hometown, $state, $local, $ahana, $international, $transfer, $email) {
		$query = $this->db->prepare("UPDATE Users set eagle_id=?, first_name=?, last_name=?, sex=?, class=?, school=?, major=?, minor=?, hometown=?, state_country=?, international=?, ahana=?, transfer=?, local_address=? where email=?");
		$query->bindValue(1, $id);
		$query->bindValue(2, $fn);
		$query->bindValue(3, $ln);
		$query->bindValue(4, $sex);
		$query->bindValue(5, $year);
		$query->bindValue(6, $school);
		$query->bindValue(7, $major);
		$query->bindValue(8, $minor);
		$query->bindValue(9, $hometown);
		$query->bindValue(10, $state);
		$query->bindValue(11, $international);
		$query->bindValue(12, $ahana);
		$query->bindValue(13, $transfer);
		$query->bindValue(14, $local);
		$query->bindValue(15, $email);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function updateUserProfile($fn, $ln, $id, $sex, $year, $school, $major, $minor, $hometown, $state, $local, $ahana, $international, $transfer, $tours, $panels, $council, $summer, $status, $email) {
		$query = $this->db->prepare("UPDATE Users set eagle_id=?, first_name=?, last_name=?, sex=?, class=?, school=?, major=?, minor=?, hometown=?, state_country=?, international=?, ahana=?, transfer=?, local_address=?, applied_tours=?, applied_panels=?, applied_council=?, applied_summer=?, status=? where email=?");
		$query->bindValue(1, $id);
		$query->bindValue(2, $fn);
		$query->bindValue(3, $ln);
		$query->bindValue(4, $sex);
		$query->bindValue(5, $year);
		$query->bindValue(6, $school);
		$query->bindValue(7, $major);
		$query->bindValue(8, $minor);
		$query->bindValue(9, $hometown);
		$query->bindValue(10, $state);
		$query->bindValue(11, $international);
		$query->bindValue(12, $ahana);
		$query->bindValue(13, $transfer);
		$query->bindValue(14, $local);
		$query->bindValue(15, $tours);
		$query->bindValue(16, $panels);
		$query->bindValue(17, $council);
		$query->bindValue(18, $summer);
		$query->bindValue(19, $status);
		$query->bindValue(20, $email);

		try {
			$query->execute();
			return true;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getInvolvementData($email) {
		$query = $this->db->prepare("SELECT * from Program_Members, Users, Programs, Council_Members where  program=program_id and coordinator=council_member_id and Council_Members.user=email and Program_Members.user=?");
		$query->bindValue(1, $email);

		try {
			$query->execute();
			$data = $query->fetchAll();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function getName($email) {
		$query = $this->db->prepare("SELECT first_name, last_name from Users where email=?");
		$query->bindValue(1, $email);

		try {
			$query->execute();
			$data = $query->fetch();
			return $data;

		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

} //close class
?>















