<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>Trouble Tracker</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
   <link href='<?php echo base_url(); ?>assets/css/admin/datepicker.css' rel='stylesheet'>
  <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
var base_url="<?php echo base_url(); ?>";
</script>
</head>
<body>
    
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">Trouble Tracker</a>
	      <ul class="nav">
	        <li <?php if($this->uri->segment(2) == 'home'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>home">Home</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'feeds'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>feeds">Feeds</a>
	        </li>
                
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata("Username");?> <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>welcome/logout">Logout</a>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>	
