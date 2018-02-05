<?php
	require_once '../session/session.php';
	require '../class/database.php';
	require '../class/Ticket.php';

	$db = new database();
	$ticket = new Ticket();

	$ticket->getTodayPublishedTicket($db->formatDate(date("Y-m-d")));

	$data = array();

	if(!empty($ticket->getTodayPublishedTicket_ticketNo()) > 0) {
		foreach($ticket->getTodayPublishedTicket_ticketNo() as $ticketNo) {
			$data[$ticketNo]['ticketNo'] = $ticketNo;
			$data[$ticketNo]['date'] = $db->selectNow('ticket','dateFormatted','ticketNo',$ticketNo);
			$data[$ticketNo]['employee'] = $db->selectNow('user','name','id',$db->selectNow('ticket','employee','ticketNo',$ticketNo));
		}
		echo json_encode($data);
	}else { 
		echo "null";
	}




?>