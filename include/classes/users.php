
<?php 
class Users{
 	
	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}	
	 
	
	public function email_exists($Email) {

		$query = $this->db->prepare("SELECT COUNT(`eagle_id`) FROM `Users` WHERE `email`= ?");
		$query->bindValue(1, $Email);
	
		try{

			$query->execute();
			$rows = $query->fetchColumn();

			if($rows == 1){
				return true;
			}else{
				return false;
			}

		} catch (PDOException $e){
			die($e->getMessage());
		}

	}

public function register( $Password, $Email, $First_Name, $Last_Name, $Eagle_Id, $Address, $Phone, $Type){
		
		$Time = time();
		$Ip = $_SERVER['REMOTE_ADDR'];
		$Password = sha1($Password);
		
	 
		$query 	= $this->db->prepare("INSERT INTO `Users` (/////UPDATE THIS`password`, `email`, `first_name`, `Last_Name`, `Eagle_Id`, `Address`, `Phone`, `Type`, `Ip`, `Time`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
	 
		$query->bindValue(1, $Password);
		$query->bindValue(2, $Email);
		$query->bindValue(3, $First_Name);
	        $query->bindValue(4, $Last_Name);
	        $query->bindValue(5, $Eagle_Id);
	        $query->bindValue(6, $Address);
	        $query->bindValue(7, $Phone);
	        $query->bindValue(8, $Type);
	        $query->bindValue(9, $Ip);
	        $query->bindValue(10, $Time);
      
	 
		try{
			$query->execute();
		
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
	

	public function login($Email, $Password) {

		$query = $this->db->prepare("SELECT `password` FROM `Users` WHERE `email` = ?");
		$query->bindValue(1, $Email);
		
		try{
			
			$query->execute();
			$data = $query->fetch();
			$stored_password = $data['password'];

			
			if($stored_password === sha1($Password)){
				//updateLastLogin($Email);
				return $Email;
			}else{
				return false;	
			}

		}catch(PDOException $e){
			die($e->getMessage());
		}
	
	} 

	public function get_roles($Email) { 

		$query = $this->db->prepare("SELECT group_name FROM Groups inner join Group_Members on Groups.group_id = Group_Members.group_id WHERE user = ?");
		$query->bindValue(1, $Email);
		
		try{
			
			$query->execute();
			return $query->fetchAll();

		}catch(PDOException $e){
			die($e->getMessage());
		}
	
	} 

	public function userdata($Email) {

		$query = $this->db->prepare("SELECT * FROM `Users` WHERE `email`= ?");
		$query->bindValue(1, $Email);

		try{

			$query->execute();

			return $query->fetch();

		} catch(PDOException $e){

			die($e->getMessage());
		}

	}

	  	  	 
	public function get_users() {

		$query = $this->db->prepare("SELECT * FROM `Users`");
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch();

		}	
	
		

public function recover($Email) {

	$letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	$newpass = substr(str_shuffle($letters), 0, 8);
	$encryptpass =  sha1($newpass);

	$message = "Hello User,\r\n\r\nYour new password is ".$newpass.".";
	$headers = 'From: passwordreset@bcsap.org' . "\r\n" .
				'Reply-To: sap@bc.edu' ."\r\n".
          'X-Mailer: PHP/' . phpversion();

	$query = $this->db->prepare("UPDATE Users SET password = '$encryptpass' WHERE email = ?");
	$query->bindValue(1, $Email);

		try{
			$query->execute();

			mail($Email, "SAP Website Portal: Password Reset", $message, $headers);

		
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}
} //close class
?>















