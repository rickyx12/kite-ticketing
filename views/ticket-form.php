<?php
	require_once '../session/session.php';
	require '../class/database.php';
	require '../class/Ticket.php';

	$db = new database();
	$ticket = new Ticket();

	$ticket->getTicketByTicketNo($_POST['ticketNo']);

?>
<html>
	<head>
		<title>Ticket</title>
		<script src="../assets/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<script src="../assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>		
		<script src="../assets/jspdf.min.js"></script>
		<script src="../assets/jspdf.plugin.autotable.js"></script>
		<link rel="stylesheet" type="text/css" href="../assets/ticket-form.css">
	</head>
	<body>
		<br>
		<div id="content">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h3>DAILY PRODUCTION WORK TICKET</h3>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6">
							<label>NAME:</label>
							<input type='text' id='name-field' value='<?= $db->selectNow("user","name","id",$db->selectNow("ticket",'employee','ticketNo',$_POST["ticketNo"])) ?>'>
						</div>
						<div class="col-md-3">
								<label>SECTION:</label>
								<input type="text" class="other-field" value="DTU">
						</div>
						<div class="col-md-3">
								<label>DATE:</label>
								<input type="text" class="other-field" value="<?= $db->formatDate($db->selectNow('ticket','date','ticketNo',$_POST['ticketNo'])) ?>">
						</div>					
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>SUBJECT</th>
									<th>CODE/TITLE</th>
									<th>START</th>
									<th>END</th>
									<th>ACTIVITY</th>
									<th>REMARKS</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($ticket->getTicketByTicketNo_id() as $id): ?>
									<tr>
										<td>
											<?= $db->selectNow('ticket','subject','id',$id) ?>
										</td>
										<td>
											<?= $db->selectNow('ticket','title','id',$id) ?>
										</td>
										<td>
											<?= $db->selectNow('ticket','start','id',$id) ?>
										</td>
										<td>
											<?= $db->selectNow('ticket','end','id',$id) ?>
										</td>
										<td>
											<?= $db->selectNow('ticket','activity','id',$id) ?>
										</td>
										<td>
											<?= $db->selectNow('ticket','remarks','id',$id) ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<div class="row">
							<div class="footer">
								<div class="col-md-4">
									Checked by:
									<br><br>
									<input type="text" class="bottom-field">
									<br>
									<label class="bottom-field-label">SUPERVISOR</label>
								</div>
								<div class="col-md-4">
									Checked by:
									<br><br>
									<input type="text" class="bottom-field">
									<br>
									<label class="bottom-field-label">MANAGER</label>							
								</div>
								<div class="col-md-4">
									
								</div>
							</div>
						</footer>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>