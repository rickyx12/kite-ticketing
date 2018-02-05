<?php
	require_once '../session/session.php';
	require '../class/database.php';
	require '../class/Ticket.php';

	$db = new database();
	$ticket = new Ticket();

	$data = array();

	if( $db->selectNow('user','role','id',$_SESSION['id']) == "user" ) {

		$ticket->searchPublishedTicketUser($_SESSION['id'],$_GET['search']);
		if(!empty($ticket->searchPublishedTicketUser_ticketNo()) > 0) {
			foreach($ticket->searchPublishedTicketUser_ticketNo() as $ticketNo) {
				$data[$ticketNo]['ticketNo'] = $ticketNo;
				$data[$ticketNo]['date'] = $db->formatDate($db->selectNow('ticket','date','ticketNo',$ticketNo));
			}
			echo json_encode($data);
		}else { 
			$ticket->getPublishedTicketUser($_SESSION['id']);

			foreach($ticket->getPublishedTicketUser_ticketNo() as $ticketNo) {
				$data[$ticketNo]['ticketNo'] = $ticketNo;
				$data[$ticketNo]['date'] = $db->formatDate($db->selectNow('ticket','date','ticketNo',$ticketNo));			
			}
			echo json_encode($data);
		}
	}else {

		$ticket->searchPublishedTicketAdmin($_GET['search']);
		if(!empty($ticket->searchPublishedTicketAdmin_ticketNo()) > 0) {
			foreach($ticket->searchPublishedTicketAdmin_ticketNo() as $ticketNo) {
				$data[$ticketNo]['ticketNo'] = $ticketNo;
				$data[$ticketNo]['date'] = $db->formatDate($db->selectNow('ticket','date','ticketNo',$ticketNo));
				$data[$ticketNo]['employee'] = $db->selectNow('user','name','id',$db->selectNow('ticket','employee','ticketNo',$ticketNo));
			}
			echo json_encode($data);
		}else { 
			$ticket->getPublishedTicketAdmin($_SESSION['id']);

			foreach($ticket->getPublishedTicketAdmin_ticketNo() as $ticketNo) {
				$data[$ticketNo]['ticketNo'] = $ticketNo;
				$data[$ticketNo]['date'] = $db->formatDate($db->selectNow('ticket','date','ticketNo',$ticketNo));
				$data[$ticketNo]['employee'] = $db->selectNow('user','name','id',$db->selectNow('ticket','employee','ticketNo',$ticketNo));			
			}
			echo json_encode($data);
		}		
	}



?>