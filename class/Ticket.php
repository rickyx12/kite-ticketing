<?php

	class Ticket {

		public $host;
		public $username;
		public $password;
		public $database;
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

		private $getPublishedTicket_ticketNo;

		public function getPublishedTicket_ticketNo() {
			return $this->getPublishedTicket_ticketNo;
		}

		public function getPublishedTicket($employee) {
			$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
			$result = mysqli_query($connection, " SELECT ticketNo FROM ticket WHERE employee = '$employee' AND status = 'publish' GROUP BY ticketNo ORDER BY ticketNo ASC ") or die("Query fail: " . mysqli_error()); 
			while($row = mysqli_fetch_array($result))
			{
				$this->getPublishedTicket_ticketNo[] = $row['ticketNo'];
			}	
		}

		private $searchPublishedTicket_ticketNo;

		public function searchPublishedTicket_ticketNo() {
			return $this->searchPublishedTicket_ticketNo;
		}

		public function searchPublishedTicket($employee,$search) {
			$connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);      
			$result = mysqli_query($connection, " SELECT ticketNo FROM ticket WHERE employee = '$employee' AND (ticketNo = '$search' OR dateFormatted LIKE '$search%') AND status = 'publish' GROUP BY ticketNo ORDER BY ticketNo ASC ") or die("Query fail: " . mysqli_error()); 
			while($row = mysqli_fetch_array($result))
			{
				$this->searchPublishedTicket_ticketNo[] = $row['ticketNo'];
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

	}

?>