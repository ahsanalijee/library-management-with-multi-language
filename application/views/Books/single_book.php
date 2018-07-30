<?php
$this->view('header');
?>
	<h1 align="center">Searched Books</h1>

<?php
if (count($res)>0) {
			
			if (!$res[0]->book_status ==0) {
				$stat="Assigned to <a class='btn btn-primary' href='".site_url().'members/single/'.$res[0]->member_id."'>".$res[0]->member_name."</a>";
				
				
			}else{

				$stat="Available &nbsp;<a href=".site_url()."borrows/index/".$res[0]->isbn.">Assign Now</a>";
			}
			echo '<table class="table table-responsive"><tr><th>ISBN</th><th>Name</th><th>Publisher</th><th>Author</th><th>Subject</th><th>Language</th><th>Status</th><tr><tr><td>'.$res[0]->isbn.'</td><td>'.$res[0]->book_name.'</td><td>'.$res[0]->publisher_name.'</td><td>'.$res[0]->author_name.'</td><td>'.$res[0]->subject_name.'</td><td>'.$res[0]->language_name.'</td><td>'.$stat.'</td></tr></table>';
			
		}

?>

<?php
$this->view('footer');
?>