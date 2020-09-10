<?php

	class Account
	{	

		private $con ;
		private  $errorArray;
			
		public function __construct($con)
		{
			$this->con= $con;
			$this->errorArray  = array();

		}

		public function login($username, $password)
		{
			$password = md5($password);
			$query    = mysqli_query($this->con,"SELECT * FROM users WHERE userName='$username' AND password='$password'");
			if(mysqli_num_rows($query) ==1 )
			{
				return true;
			}
			else
			{
				array_push($this->errorArray,Constants::$loginFailed);
				return false;
			}
		}

		public function register($userName, $firstName, $lastName , $email , $email2 ,$password ,$password2)
		{
			$this->validateUserName($userName);
			$this->validateFirstName($firstName);
			$this->validateLastName($lastName);
			$this->validateEmails($email,$email2);
			$this->validatePassword($password,$password2);

			if(empty($this->errorArray))
			{
				return $this->instertUserDetails($userName, $firstName , $lastName , $email , $password );
			}
			else 
			{
				return false;
			}

		}



		public function getError($error)
		{
			if(!in_array($error,$this->errorArray))
			{
				$error= "";
			}

			return "<span class='errorMessage' >$error </span>";
		}

		private function instertUserDetails($un, $fn , $ln , $em , $pw )
		{
			$encryptedPw = md5($pw);
			$profilePic  = "assets/images/profile-pics/head-emerald.png";
			$date  		 =  date('Y-m-d');

			$sql = "INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$encryptedPw','$date','$profilePic')";



			$result = $this->con->query($sql);
			 //$this->con = null;  
			return $result;
		}

		private	function validateUserName($userName)
		{
			if(strlen($userName)>25 || strlen($userName)<5)
			{
				array_push($this->errorArray,Constants::$userNameCharacters);
				return ;
			}

			//TODO :check if username exist
			print($userName);
			$sql = "SELECT userName FROM users WHERE userName='$userName'";
			$result = $this->con->query($sql);
			print_r( $result);

			if(mysqli_num_rows($result) != 0)
			{	
				
				array_push($this->errorArray,Constants::$userNameTaken);
				return;
			}


		}

		private	function validateFirstName($firstName)
		{
			if(strlen($firstName)>25 || strlen($firstName)<2)
			{
				array_push($this->errorArray, Constants::$firstNameCharactars);
				return ;
			}
		}

		private	function validateLastName($lastName)
		{
			if(strlen($lastName)>25 || strlen($lastName)<2)
			{
				array_push($this->errorArray,Constants::$lastNameCharacters);
				return ;
			}
		}
		private	function validateEmails($email,$email2)
		{
			if($email != $email2)
			{
				array_push($this->errorArray, Constants::$emailsDoNotMatch);
				return;
			}	
			if (!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				array_push($this->errorArray, Constants::$emailInvalide);
				return;
			}

			$sql = "SELECT email FROM users WHERE email='$email'" ;
			$result = $this->con->query($sql);

			echo "<br>";
			echo $email;
			print_r($result);
			if(mysqli_num_rows($result) != 0)
			{
				array_push($this->errorArray,Constants::$emailTaken);
				return;
			}


		}
		private	function validatePassword($password , $password2)
		{
			if($password != $password2)
			{
				array_push($this->errorArray, Constants::$passwordsDoNotMatch);
				return;
			}
			if(preg_match('/[^A-Za-z0-9]/',$password))
			{
				array_push($this->errorArray,Constants::$passwordNotAlphanumeric);
				return;
			}

			if(strlen($password)>25 || strlen($password)<2)
			{
				array_push($this->errorArray,Constants::$passwordCharacters);
				return ;
			}
		}



	}




?>