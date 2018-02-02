<?php

	require_once '../session/session.php';
	require '../class/database.php';
	require '../class/Ticket.php';

	$ids = $_POST['ids'];

	$db = new database();
	$ticket = new Ticket();

	$id = explode(",",$ids);

	$ticketNo = $ticket->getLastTicketNo() + 1;

	foreach($id as $id) {
		$db->editNow('ticket','id',$id,'status','publish');
		$db->editNow('ticket','id',$id,'date',date("Y-m-d"));
		$db->editNow('ticket','id',$id,'ticketNo',$ticketNo);
	}
?>