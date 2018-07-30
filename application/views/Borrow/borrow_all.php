<?php
$this->view('header');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- page Header End -->

<h2 align="center">Search Books</h1>
<form class="form-horizontal" method="post" action="<?php echo site_url()."borrows/search"?>">
	<table class="">
		<tr>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Member Name</th>
			<th>Book Name</th>
			<th>Get Result</th>	
		</tr>
		<tr>
			<td><input type="date" name="sdate" class="form-control"></td>
			<td><input type="date" name="edate" class="form-control"></td>
			<td><input type="text" name="member" class="form-control"></td>
			<td><input type="text" name="book" class="form-control"></td>
			<td><input type="submit" name="" class="form-control"></td>
		</tr>	
	</table>
</form>
	
<?php

if (@$data) {
?>	


	<h1 style="margin-top: 50px">Searched Result</h4>
	<!-- <a class="btn btn-primary" href="<?php echo site_url()."borrows/index"?>">Add New</a>
	<br><br> -->
	<table id="myTable">
		<thead>
			<tr>
				<th>Member ID</th>
				<th>Member Name</th>
				<th>Assign Date</th>
				<th>Return Date</th>
				<th>Assigned By</th>
				<th>Book Name</th>
				<th>Publisher</th>
				<th>Author</th>
				<th>Subject</th>
			</tr>
		</thead>	
		<?php
		//print_r($data);
			foreach ($data as $d) {
		?>
		<tbody>
			<tr>
				<td><?php echo $d->member_key?></td>
				<td><?php echo $d->member_name?></td>
				<td><?php echo $d->issuedate?></td>
				<td><?php echo $d->return_date?></td>
				<td><?php echo $d->libname?></td>
				<td><?php echo $d->book_name?></td>
				<td><?php echo $d->publisher_name?></td>
				<td><?php echo $d->author_name?></td>
				<td><?php echo $d->subject_name?></td>
			</tr>
		</tbody>
		<?php
			}
		?>
		
	</table>
<?php
}
?>
<!-- page footer -->
<?php
$this->view('footer');
?>

<script type="text/javascript">
	jQuery(document).ready( function () {
	    jQuery('#myTable').DataTable();
	} );
</script>
