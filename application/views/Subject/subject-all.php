<?php
$this->view('header');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- page Header End -->
<h2 align="center">All Subjects</h2>
<a class="btn btn-primary" href="<?php echo site_url()."subjects/index"?>">Add New</a>
<table id="myTable" class="table table-hover">
	<thead>
		<tr>
			<th>Subject Name</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($data as $d) {
	?>
		<tr>
			<td><?php echo $d->subject_name?></td>
			<td>
				<a class="btn btn-warning" href="<?php echo site_url()."subjects/edit/".$d->subject_id?>">Edit</a>
				<a class="btn btn-danger" onclick="return confirm('Are You Sure You Wanna Delete This?')" href="<?php echo site_url()."subjects/delete/".$d->subject_id?>">Delete</a>
			</td>
		</tr>
	<?php
		}
	?>
	</tbody>
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
