<!DOCTYPE html>
<html>
	<head>
		<title id="pageTitle">{pagetitle}</title>
		<meta charset="UTF-8" />
		<link type="text/css" rel="stylesheet" href="/assets/css/style.css" />
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
                <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
                <script type="text/javascript">{loadScript}</script>
        </head>
	<body>
		
            
            
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="glyphicon glyphicon-menu-hamburger"></span>
                    </button>
                    <a class="navbar-brand" href="/">GPS Tracker</a>
                  </div>
                  

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      {navLinks}
                    </ul>
                      {loginForm}
                  </div><!-- /.navbar-collapse -->
                  
                </div><!-- /.container-fluid -->
              </nav>
            
            
            <div id="body">
            <div id="header">
                    <h1 id="pageHeader">{pageheader}</h1>		
		</div>	
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
		<div id="navigation">
                    {navigation}
		</div>
		<div id="content">
                    {content}
		</div>
            <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.2.2.min.js"); ?>"></script>
            <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
            </div>
	</body>
</html>