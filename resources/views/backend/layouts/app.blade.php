<!DOCTYPE html>
<html lang="en">
<head>
<title>Chiroro-Net Viet Co.,Ltd</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('') }}public/backend/css/bootstrap.min.css" />
<link rel="stylesheet" href="{{ asset('') }}public/backend/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="{{ asset('') }}public/backend/css/colorpicker.css" />
<link rel="stylesheet" href="{{ asset('') }}public/backend/css/datepicker.css" />
<link rel="stylesheet" href="{{ asset('') }}public/backend/css/uniform.css" />
<link rel="stylesheet" href="{{ asset('') }}public/backend/css/select2.css" />
<link rel="stylesheet" href="{{ asset('') }}public/backend/css/matrix-style.css" />
<link rel="stylesheet" href="{{ asset('') }}public/backend/css/matrix-media.css" />

<link href="{{ asset('') }}public/backend/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="icon" href="{{ asset('') }}public/favicon/favicon.png" type="image/gif" >
 <script src="{{ asset('') }}public/backend/js/jquery.min.js"></script> 
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="{{route('backend.dashboard.index')}}">Chiroro</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome: {{@Auth::user()->u_name}}</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="{{route('backend.users.logout')}}"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>

  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->

<!--sidebar-menu-->

@include('backend.layouts.sidebar')

<!--sidebar-menu-->

<!--Content-->
@yield('content')
<!--End Content-->

<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; Chiroro-Net Viet Co., Ltd. All Rights Reserved.</div>
</div>
<!--end-Footer-part-->

<script src="{{ asset('') }}public/backend/js/jquery.ui.custom.js"></script> 
<script src="{{ asset('') }}public/backend/js/bootstrap.min.js"></script> 
<script src="{{ asset('') }}public/backend/js/bootstrap-colorpicker.js"></script> 
<script src="{{ asset('') }}public/backend/js/bootstrap-datepicker.js"></script> 
<script src="{{ asset('') }}public/backend/js/jquery.toggle.buttons.js"></script> 
<script src="{{ asset('') }}public/backend/js/masked.js"></script> 
<script src="{{ asset('') }}public/backend/js/jquery.uniform.js"></script> 
<script src="{{ asset('') }}public/backend/js/select2.min.js"></script> 
<script src="{{ asset('') }}public/backend/js/matrix.js"></script> 
<script src="{{ asset('') }}public/backend/js/matrix.form_common.js"></script> 

</body>
</html>