<?php
$this->view('header');
?>
<!-- page Header End -->

	<!-- page content -->
	<h1 align="center"> <?php
	 $user=$this->session->userdata('user');
	 writelang('welcome');
	echo " ".strtoupper($user->name);
	  ?></h1>

	<div class="row">
                <div class="container">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">
                            <div class="" style="width: 80%; margin: 0 auto; margin-bottom: 40px;margin-top: 20px;">
                                <!-- <form action="" method="post"> -->
                                    <input type="text" id="search_data" class="form-control search-input" name="search-term" placeholder="What are you looking for?" onkeyup="liveSearch()" autocomplete="off">
                                    <div id="suggestions">
                                        <div id="autoSuggestionsList">
                                        </div>
                                    </div>
                                   <!--  <button type="submit" class="left-searchbtn"><i class="fa fa-search" style="color: #048CCE;"></i></button>
 -->
                                <!-- </form> -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>

	<form method="post"  action="<?php echo site_url()."borrows/save"?>">
		<?php
		 if ($this->session->flashdata('success')) {
		?>
			<div class="alert alert-success alert-dismissible">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <?php echo $this->session->flashdata('success');?>
			</div>
		<?php
		 }
		?>
		<div class="form-group">
			<label class="col-xs-12">Member ID</label>
			<div class="col-xs-9">
				<input type="text" name="" class="form-control" id="member">
			</div>
			<div class="col-xs-3">
				<button type="button" id="checkmember" class="form-control btn-primary">Check Member</button>
			</div>
		<p id="cmember"></p>
		</div>
		<div class="form-group">
			<label class="col-xs-12">Book ISBN</label>
			<div class="col-xs-9">
				<input type="text" name="" class="form-control" id="book">
			</div>
			<div class="col-xs-3">
				<button type="button" id="checkbook" class="form-control btn-primary">Check Book</button>
			</div>
			<p id="cbook" class="col-xs-12"></p>
		</div>
		<!-- <div class="form-group col-xs-12" style="margin: 10px 0">
			<input type="submit" name="submit" class="btn btn-primary">
		</div> -->
	</form>
	<br><br><br>
	<div id="result"></div>

<!-- page footer -->
<?php
$this->view('footer');
?>
<script>

    function liveSearch() {

        var input_data = $('#search_data').val();
        if (input_data.length === 0) {
            $('#suggestions').hide();
        } else {


            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/search",
                data: {search_data: input_data},
                success: function (data) {
                    // return success
                    if (data.length > 0) {
                        $('#suggestions').show();
                        $('#autoSuggestionsList').addClass('auto_list');
                        $('#autoSuggestionsList').html(data);
                    }else{
                        $('#autoSuggestionsList').html("No data found");
                    }
                }
            });
        }
    }

</script>
<script type="text/javascript">
	$("#checkbook").click(function(){
		var bookid=$("#book").val();
		if (bookid=='') {
			return $("#cbook").text("Please Insert Book ISBN");
		}
		$.ajax({
			type: "POST",
			url: "<?php echo site_url()."home/checkbook"?>",
			dataType: 'html',
			data: {bookid:bookid},
		}).done(function(res) {
		    //$("#cbook").removeData();
		    $("#cmember").hide();
		    $("#result").html(res);
		  })
		  .always(function() {
		   $("#cbook").text("Book Not Found").show();
		  })
	});
	$("#checkmember").click(function(){
		var member=$("#member").val();
		if (member=='') {
			return $("#cmember").text("Please Insert Member");
		}
		$.ajax({
			type: "POST",
			url: "<?php echo site_url()."home/checkmember"?>",
			dataType: 'html',
			data: {memberid:member},
		}).done(function(res) {
		    $("#cmember").hide();
		    $("#result").html(res);
		  })
		  .always(function() {
		  	//alert('not found');
		   $("#cmember").text("Member Not Found").show();
		  })
	});
</script>
