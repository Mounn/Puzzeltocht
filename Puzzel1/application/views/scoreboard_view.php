<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Profile | By Mounir</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>index.php/profile/index">Scoreboard</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if ($this->session->userdata('login')){ ?>
				<li><p class="navbar-text">Hello <?php echo $this->session->userdata('uname'); ?></p></li>
				<li><a href="<?php echo base_url(); ?>index.php/home/logout">Log Out</a></li>
				<?php } else { ?>
				<li><a href="<?php echo base_url(); ?>index.php/login">Login</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/signup">Signup</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>

<style type="text/css">
	table {
  border: 10px solid black;
  font-size: 350%;
  background-color: #F8F8F8;
  margin: 0 auto;
  border-collapse:
    collapse;
    font-family: Arial;
}
th {
  border: 2px solid blue;
  background-color: #ffffff;
  margin: 0 auto;
}
.rank {
  color: white;
  background-color: black;
  border: 10px solid black;
}
.first {
  color: green;
  border: 10px solid black;
}
.nothing {
  border: 10px solid black;
}

</style>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h4>Score van alle users</h4>
			<hr/>
			<?php foreach ($getuser as $row){ ?><?php } ?> 
    <table id="rankings" border="1">  
        <tbody>  
           <tr>  
              <td class="rank">Naam</td> 
              <td class="rank">E-mail</td>
              <td class="rank">Score</td> 
           </tr>     
           <?php  
           foreach ($getuser as $row)  
           {  
              ?><tr>  
              <td class="nothing"><?php echo $row->fname;?> <?php echo $row->lname;?></td>  
              <td class="nothing"><?php echo $row->email;?></td> 
              <td class="first"><?php echo $row->score;?></td>  
              </tr>  
           <?php } ?>  
        </tbody>
    </table>
			
			</div>

		</div>
	</div>	

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>