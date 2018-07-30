<?php
	if (!$this->session->has_userdata('user')) {
		redirect("librarian/index");
	}
    //echo "<pre>";
    //print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
 <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

           

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body {
                margin: 0 15px 0 15px;
            }

            p.footer {
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }

            #suggestions{

                position: relative;
                z-index: 9999;
            }
            #autoSuggestionsList > li {
                background: none repeat scroll 0 0 #F3F3F3;
                border-bottom: 1px solid #E3E3E3;
                list-style: none outside none;
                padding: 3px 15px 3px 15px;
                text-align: left;
            }
            #autoSuggestionsList > li a {  color: #1d80c2; }
            .auto_list {
                border: 1px solid #E3E3E3;
                border-radius: 5px 5px 5px 5px;
                position: absolute;
                width: 100%;
            }

            .search-input {
                padding: 25px;
                border: solid 1px #CCCCCC;
                /* margin: 2% 10%; */
                background: #F8F8F8;
                border-radius: 25px;
                text-align: center;
                font-size: 20px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                /* box-sizing: border-box; */
                /* text-align: left; */
                font-size: 19px;
                /* font-family: inherit; */
                -webkit-box-shadow: 0px 0px 0px 1px #b8b8b8;
                -moz-box-shadow: 0px 0px 0px 1px #b8b8b8;
                /* box-shadow: 0px 0px 0px 1px #b8b8b8; */
                -webkit-background-clip: padding-box;
                -moz-background-clip: padding-box;
                background-clip: padding-box;
                border: 3px solid rgba(255,255,255,0.4);
                -webkit-border-radius: 30px;
                -moz-border-radius: 30px;
                border-radius: 30px;
                /* width: 100% !important; */
                max-width: none;
                height: 54px;
                min-height: 54px;
                padding: 0 45px 0 20px;
            }

            .left-searchbtn {
                border: 0px solid rgba(255,255,255,0.4);
                background: #F8F8F8;
                margin-left: -105px;
                background-repeat: no-repeat;
                font-size: 20px;
                float: right;
                margin-top: -37px;
                position: relative;
                padding: 0px;
                margin-right: 23px;
            }
 </style>
</head>
<body>
	<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="<?php echo site_url()."home/index"?>"><?php echo lang('site_name');?></a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo lang('books');?>
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="<?php echo site_url()."borrows/index"?>"><?php echo lang('add_books');?></a></li>
		          <li><a href="<?php echo site_url()."borrows/borrows"?>"><?php echo lang('all_books');?></a></li>
		        </ul>
		      </li>
		      <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo lang('members');?>
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="<?php echo site_url()."members/index"?>"><?php echo lang('add_members');?></a></li>
		          <li><a href="<?php echo site_url()."members/members"?>"><?php echo lang('all_members');?></a></li>
		        </ul>
		      </li>
		      <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo lang('books');?>
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="<?php echo site_url()."books/index"?>"><?php echo lang('add_books');?></a></li>
		          <li><a href="<?php echo site_url()."books/books"?>"><?php echo lang('all_books');?></a></li>
		        </ul>
		      </li>
		      <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo lang('publishers');?>
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="<?php echo site_url()."publishers/index"?>"><?php echo lang('add_publishers');?></a></li>
		          <li><a href="<?php echo site_url()."publishers/publishers"?>"><?php echo lang('all_publishers');?></a></li>
		        </ul>
		      </li>
		      <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo lang('author');?>
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="<?php echo site_url()."authors/index"?>"><?php echo lang('all_author');?></a></li>
		          <li><a href="<?php echo site_url()."authors/authors"?>"><?php echo lang('add_author');?></a></li>
		        </ul>
		      </li>
		      <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo lang('subject');?>
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="<?php echo site_url()."subjects/index"?>"><?php echo lang('add_subject');?></a></li>
		          <li><a href="<?php echo site_url()."subjects/subjects"?>"><?php echo lang('all_subject');?></a></li>
		        </ul>
		      
		      </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo lang('change_language');?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu">


                  <li><a href='<?php echo site_url()?>langswitch/switchLanguage/english'><?php echo lang('english');?></a></li>
                  <li><a href='<?php echo site_url()?>langswitch/switchLanguage/urdu'><?php echo lang('urdu');?></a></li>
                </ul>
              
              </li>
		    </ul>
		      <ul class="nav navbar-nav navbar-right">
			      <li><a href="<?php echo site_url()."home/logout"?>"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
			      
			    </ul>
		  </div>
		</nav>
	<div class="container">
		
	