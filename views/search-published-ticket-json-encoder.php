<?php
	require_once '../session/session.php';
	require '../class/database.php';
	require '../class/Ticket.php';

	$db = new database();
	$ticket = new Ticket();

	$ticket->searchPublishedTicket($_SESSION['id'],$_GET['search']);

	$data = array();

	if(!empty($ticket->searchPublishedTicket_ticketNo()) > 0) {
		foreach($ticket->searchPublishedTicket_ticketNo() as $ticketNo) {
			$data[$ticketNo]['ticketNo'] = $ticketNo;
			$data[$ticketNo]['date'] = $db->formatDate($db->selectNow('ticket','date','ticketNo',$ticketNo));
		}
		echo json_encode($data);
	}else { 
		$ticket->getPublishedTicket($_SESSION['id']);

		foreach($ticket->getPublishedTicket_ticketNo() as $ticketNo) {
			$data[$ticketNo]['ticketNo'] = $ticketNo;
			$data[$ticketNo]['date'] = $db->formatDate($db->selectNow('ticket','date','ticketNo',$ticketNo));			
		}
		echo json_encode($data);
	}




?>