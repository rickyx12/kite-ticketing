<?php

	class Ticket {

		private $host;
		private $username;
		private $password;
		private $database;

		public function __construct() {
		  $this->host = $_SERVER['DB_HOST'];
		  $this->username = $_SERVER['DB_USER'];
		  $this->password = $_SERVER['DB_PASS'];
		  $this->database = $_SERVER['DB_DB'];
		}			


		private $getTicket_id;

		public function getTicket_id() {
			return $this->getTicket_id;
		}

		public function getTicket($employee) {
			$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
			$result = mysqli_query($connection, " SELECT id FROM ticket WHERE employee = '$employee' AND status != 'publish' ORDER BY id ASC ") or die("Query fail: " . mysqli_error()); 
			while($row = mysqli_fetch_array($result))
			{
				$this->getTicket_id[] = $row['id'];
			}	
		}

		private $getPublishedTicketUser_ticketNo;

		public function getPublishedTicketUser_ticketNo() {
			return $this->getPublishedTicketUser_ticketNo;
		}

		public function getPublishedTicketUser($employee) {
			$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);     
			$result = mysqli_query($connection, " SELECT ticketNo FROM ticket WHERE employee = '$employee' AND status = 'publish' GROUP BY ticketNo ORDER BY ticketNo ASC ") or die("Query fail: " . mysqli_error()); 
			while($row = mysqli_fetch_array($result))
			{
				$this->getPublishedTicketUser_ticketNo[] = $row['ticketNo'];
			}	
		}

		private $getPublishedTicketAdmin_ticketNo;

		public function getPublishedTicketAdmin_ticketNo() {
			return $this->getPublishedTicketAdmin_ticketNo;
		}

		public function getPublishedTicketAdmin() {
			$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);     
			$result = mysqli_query($connection, " SELECT ticketNo FROM ticket WHERE status = 'publish' GROUP BY ticketNo ORDER BY ticketNo ASC ") or die("Query fail: " . mysqli_error()); 
			while($row = mysqli_fetch_array($result))
			{
				$this->getPublishedTicketAdmin_ticketNo[] = $row['ticketNo'];
			}	
		}

		private $searchPublishedTicketUser_ticketNo;

		public function searchPublishedTicketUser_ticketNo() {
			return $this->searchPublishedTicketUser_ticketNo;
		}

		public function searchPublishedTicketUser($employee,$search) {
			$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
			$result = mysqli_query($connection, " SELECT ticketNo FROM ticket WHERE employee = '$employee' AND (ticketNo = '$search' OR dateFormatted LIKE '$search%') AND status = 'publish' GROUP BY ticketNo ORDER BY ticketNo ASC ") or die("Query fail: " . mysqli_error()); 
			while($row = mysqli_fetch_array($result))
			{
				$this->searchPublishedTicketUser_ticketNo[] = $row['ticketNo'];
			}	
		}

		private $searchPublishedTicketAdmin_ticketNo;

		public function searchPublishedTicketAdmin_ticketNo() {
			return $this->searchPublishedTicketAdmin_ticketNo;
		}

		public function searchPublishedTicketAdmin($search) {
			$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
			$result = mysqli_query($connection, " SELECT ticketNo FROM ticket WHERE (ticketNo = '$search' OR dateFormatted LIKE '$search%' OR employeeFormatted LIKE '$search%') AND status = 'publish' GROUP BY ticketNo ORDER BY ticketNo ASC ") or die("Query fail: " . mysqli_error()); 
			while($row = mysqli_fetch_array($result))
			{
				$this->searchPublishedTicketAdmin_ticketNo[] = $row['ticketNo'];
			}	
		}

		public function getLastTicketNo() {
			$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
			$result = mysqli_query($connection, " SELECT ticketNo FROM ticket GROUP BY ticketNo ORDER BY ticketNo DESC LIMIT 1 ") or die("Query fail: " . mysqli_error()); 
			while($row = mysqli_fetch_array($result))
			{
				return $row['ticketNo'];
			}				
		}

		private $getTicketByTicketNo_id;

		public function getTicketByTicketNo_id() {
			return $this->getTicketByTicketNo_id;
		}

		public function getTicketByTicketNo($ticketNo) {
			$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
			$result = mysqli_query($connection, " SELECT id FROM ticket WHERE ticketNo = '$ticketNo' ORDER BY ticketNo ASC ") or die("Query fail: " . mysqli_error()); 
			while($row = mysqli_fetch_array($result))
			{
				$this->getTicketByTicketNo_id[] = $row['id'];
			}				
		}

		private $getTodayPublishedTicket_ticketNo;

		public function getTodayPublishedTicket_ticketNo() {
			return $this->getTodayPublishedTicket_ticketNo;
		}

		public function getTodayPublishedTicket($date) {
			$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);     
			$result = mysqli_query($connection, " SELECT ticketNo FROM ticket WHERE status = 'publish' AND dateFormatted = '$date' GROUP BY ticketNo ORDER BY ticketNo ASC ") or die("Query fail: " . mysqli_error()); 
			while($row = mysqli_fetch_array($result))
			{
				$this->getTodayPublishedTicket_ticketNo[] = $row['ticketNo'];
			}				
		}

	}

?>