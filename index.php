<?php 

	class User{
		public $username; //private protect our variables / properties 
		protected $email; // can accessed through extended Classes 
		public $role = 'member';

		public function __construct($username, $email){
			$this->username = $username;
			$this->email = $email;
		}

		public function __destruct(){
			echo "the user $this->username was removed <br/>";
		}

		public function __clone(){
			$this->username = $this->username . "(cloned)<br/>";
		}

		public function addFriend(){
			return " $this->username added a new friend";
		}

		public function message(){
			return "$this->email sent a new message";
		}

		//getter 
		public function getUser(){
			return "Username: " .$this->username . " <br/>  Email: " . $this->email;
		}

		public function getEmail(){
			return $this->email;
		}

		//setter 
		public function setEmail($email){
			if(strpos($email, '@') > -1){
				$this->email = $email;
			}
		}

		
	}

	class AdminUser extends User {
		public $level;
		public $role ='admin';

		public function __construct($username, $email, $level){
			$this->level = $level;
			parent::__construct($username, $email);  //call parent class constructor
		}

		public function message(){
			return "$this->email, an admin, sent a new message";
		}
	}

	$user1 = new User('Antonis', 'zahantonis001@gmail.com');
	$user2 = new User('John', 'johnz@gmail.com');
	$user3 = new AdminUser('immortal', 'antonioz91ud@gmail.com', 5);
	echo $user1->addFriend() . '<br/>';
	echo $user1->getUser() . '<br/>';

	echo "<br/>";

	echo $user2->addFriend() . '<br/>';
	$user2->setEmail('ioannios7@yahoo.gr');
	echo $user2->getUser() . '<br/>';

	echo $user3->getUser() . '<br/>';

	echo $user1->role . '<br/>';
	echo $user3->role . '<br/>';

	echo $user1->message() . '<br/>';
	echo $user3->message() . '<br/>';

	// print_r(get_class_vars('User')); //return all variables of this class in array 
	// print_r(get_class_methods('User'));

	// unset($user1);
	$user4 = clone $user1;
	echo $user4->username;
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 
 </body>
 </html>