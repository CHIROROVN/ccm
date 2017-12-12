@extends('backend.layouts.app')
@section('content')

<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb span2"> <a href="index.html"> <i class="icon-dashboard"></i> <span class="label label-important">20</span> Dashboard </a> </li>
        <li class="bg_lg span3"> <a href="company.html"> <i class="icon-signal"></i> Company</a> </li>        
        <li class="bg_lo span3"> <a href="contract.html"> <i class="icon-th-list"></i> Contracts</a> </li>
        <li class="bg_ls span2"> <a href="users.html"> <i class="icon-tint"></i> Users</a> </li>

      </ul>
    </div> 
  </div>

</div>

@endsection