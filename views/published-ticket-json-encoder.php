<?php
	require_once '../session/session.php';
	require '../class/database.php';
	require '../class/Ticket.php';

	$db = new database();
	$ticket = new Ticket();

	$ticket->getPublishedTicket($_SESSION['id']);

	$data = array();

	if(!empty($ticket->getPublishedTicket_ticketNo()) > 0) {
		foreach($ticket->getPublishedTicket_ticketNo() as $ticketNo) {
			$data[$ticketNo]['ticketNo'] = $ticketNo;
			$data[$ticketNo]['date'] = $db->formatDate($db->selectNow('ticket','date','ticketNo',$ticketNo));
		}
		echo json_encode($data);
	}else { 
		echo "null";
	}




?>