<?php
$this->view('header');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- page Header End -->
<h2 align="center">Books</h2>
<a class="btn btn-primary" href="<?php echo site_url()."books/index"?>">Add New</a>
<br><br><br>
<table id="myTable">
	<thead>
		<tr>
			<th>Name</th>
			<th>Subject</th>
			<th>Author</th>
			<th>Publisher</th>
			<th>ISBN</th>
			<th>Quantity</th>
			<th>Actions</th>
		</tr>
	</thead>
	<?php
	// print_r($data);
	// exit();
		foreach ($data as $d) {
	?>
	<tbody>
		<tr>
			<td><?php echo $d->book_name?></td>
			<td><?php echo $d->subject_name?></td>
			<td><?php echo $d->author_name?></td>
			<td><?php echo $d->publisher_name?></td>
			<td><?php echo $d->isbn?></td>
			<td><?php echo $d->quantity?></td>
			<td>
				<a class="btn btn-warning" href="<?php echo site_url()."books/edit/".$d->book_id?>">Edit</a>
				<a class="btn btn-danger" onclick="return confirm('Are You Sure You Wanna Delete This?')" href="<?php echo site_url()."books/delete/".$d->book_id?>">Delete</a>
			</td>
		</tr>
	</tbody>
	<?php
		}
	?>
	
</table>

<!-- page footer -->
<?php
$this->view('footer');
?>

<script type="text/javascript">
	jQuery(document).ready( function () {
	    jQuery('#myTable').DataTable();
	} );
</script>
