<!--
    This view is the base view for all webpages within this website. All
    webpages are filled with data found in the several keys in this template:
        loadScript  = A key to insert a script which handles onload functions.
                      This is defaulted to a blank script.
        navLinks    = The links in the navigation bar for each web page.
        loginForm   = The login form which may be replaced with logout data 
                      if the user is already logged in.
        pageheader  = The header data for the page
        navigation  = The navigation for the data.
        content     = The main content of the page.

    The template contains basic css styling, bootstrap library, skeleton for the
    navigation bar, and places to insert the content for the page, navigation,
    and header.
-->
<!DOCTYPE html>
<html>

<head>
    <title id="pageTitle">{pagetitle}</title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="/assets/css/style.css" />
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url(" assets/css/bootstrap.css "); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
        {loadScript}
    </script>
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
            </div>
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.container-fluid -->
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
        <script type="text/javascript" src="<?php echo base_url(" assets/js/jquery-2.2.2.min.js "); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url(" assets/js/bootstrap.js "); ?>"></script>
    </div>
</body>

</html>