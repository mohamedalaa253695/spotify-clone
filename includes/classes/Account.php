<?php

	class Account
	{
		private $errorArray;
			
		public function __construct()
		{
			$this->errorArray=array();
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
				return ture;
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

		private	function validateUserName($userName)
		{
			if(strlen($userName)>25 || strlen($userName)<5)
			{
				array_push($this->errorArray,Constants::$userNameCharacters);
				return ;
			}

			//TODO :check if username exist
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