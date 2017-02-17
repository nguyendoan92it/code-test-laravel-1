<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="_token" content="{{ csrf_token() }}"/>
<link href="<?php echo DOMAIN ?>public/template/css/bootstrap.min.css" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="<?php echo DOMAIN ?>public/template/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo DOMAIN ?>public/template/css/uniform.css" />
<link rel="stylesheet" href="<?php echo DOMAIN ?>public/template/css/select2.css" />
<link rel="stylesheet" href="<?php echo DOMAIN ?>public/template/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo DOMAIN ?>public/template/css/matrix-media.css" />
<link href="<?php echo DOMAIN ?>public/template/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Admin</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class=""></li>
  </ul>
</div>

<!--sidebar-menu-->

  <ul>

  </ul>

</div>

<div id="content"> <!-- Content -->
@yield('content')
</div>


<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part-->
<script src="<?php echo DOMAIN ?>public/template/js/jquery.min.js"></script>
<script src="<?php echo DOMAIN ?>public/template/js/jquery.ui.custom.js"></script>
<script src="<?php echo DOMAIN ?>public/template/js/bootstrap.min.js"></script>
<script src="<?php echo DOMAIN ?>public/template/js/jquery.uniform.js"></script>
<script src="<?php echo DOMAIN ?>public/template/js/select2.min.js"></script>
<script src="<?php echo DOMAIN ?>public/template/js/jquery.dataTables.min.js"></script>
<script src="<?php echo DOMAIN ?>public/template/js/matrix.js"></script>
<script src="<?php echo DOMAIN ?>public/template/js/matrix.tables.js"></script>
<script src="<?php echo DOMAIN ?>public/template/js/tinymce/js/tinymce/tinymce.min.js"></script>


</body>
</html>
