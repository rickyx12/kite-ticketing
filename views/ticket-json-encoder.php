<?php
	require_once '../session/session.php';
	require '../class/database.php';
	require '../class/Ticket.php';

	$db = new database();
	$ticket = new Ticket();

	$ticket->getTicket($_SESSION['id']);

	$data = array();

	if(!empty($ticket->getTicket_id()) > 0) {
		foreach($ticket->getTicket_id() as $ticketId) {
			$data[$ticketId]['id'] = $ticketId;
			$data[$ticketId]['subject'] = $db->selectNow('ticket','subject','id',$ticketId);
			$data[$ticketId]['title'] = $db->selectNow('ticket','title','id',$ticketId);
			$data[$ticketId]['start'] = $db->selectNow('ticket','start','id',$ticketId);
			$data[$ticketId]['end'] = $db->selectNow('ticket','end','id',$ticketId);
			$data[$ticketId]['activity'] = $db->selectNow('ticket','activity','id',$ticketId);
			$data[$ticketId]['remarks'] = $db->selectNow('ticket','remarks','id',$ticketId);
		}
		echo json_encode($data);
	}else { 
		echo "null";
	}




?>