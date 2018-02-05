<?php
	require_once '../session/session.php';
	require '../class/database.php';
	require '../class/Ticket.php';

	$db = new database();
	$ticket = new Ticket();

	$data = array();

	if( $db->selectNow('user','role','id',$_SESSION['id']) == "user" ) {
		$ticket->getPublishedTicketUser($_SESSION['id']);
		
		if(!empty($ticket->getPublishedTicketUser_ticketNo()) > 0) {
			foreach($ticket->getPublishedTicketUser_ticketNo() as $ticketNo) {
				$data[$ticketNo]['ticketNo'] = $ticketNo;
				$data[$ticketNo]['date'] = $db->formatDate($db->selectNow('ticket','date','ticketNo',$ticketNo));
			}
			echo json_encode($data);
		}else { 
			echo "null";
		}
	}else {
		$ticket->getPublishedTicketAdmin();

		if(!empty($ticket->getPublishedTicketAdmin_ticketNo()) > 0) { 
			foreach($ticket->getPublishedTicketAdmin_ticketNo() as $ticketNo) {
				$data[$ticketNo]['ticketNo'] = $ticketNo;
				$data[$ticketNo]['date'] = $db->formatDate($db->selectNow('ticket','date','ticketNo',$ticketNo));
				$data[$ticketNo]['employee'] = $db->selectNow('user','name','id',$db->selectNow('ticket','employee','ticketNo',$ticketNo));
			}
			echo json_encode($data);
		}else {
			echo "null";
		}
	}



?>