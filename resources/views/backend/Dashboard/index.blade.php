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
        
        <li class="bg_lb span2"> <a href="{{route('backend.dashboard.index')}}"> <i class="icon-dashboard"></i>
          <!-- <span class="label label-important">20</span> --> Dashboard </a> </li>
       
        @if(Auth::user()->u_power01 == 1)
        <li class="bg_ly span2"> <a href="{{route('backend.company.index')}}"> <i class="icon-home"></i> Company</a> </li>
        @endif
         @if(Auth::user()->u_power02 == 1)
        <li class="bg_lg span2"> <a href="{{route('backend.contact.index')}}"> <i class="icon-phone"></i> Contact</a> </li>
        @endif
        @if(Auth::user()->u_power03 == 1)       
        <li class="bg_lo span2"> <a href="{{route('backend.contract.index')}}"> <i class="icon-book"></i> Contracts</a> </li>
        @endif
        @if(Auth::user()->u_power04 == 1)
        <li class="bg_lb span2"> <a href="{{route('backend.meeting.index')}}"> <i class="icon-group"></i> Meeting</a> </li>
        @endif
        @if(Auth::user()->u_power05 == 1)
        <li class="bg_ls span2"> <a href="{{route('backend.users.index')}}"> <i class="icon-user"></i> Users</a> </li>
        @endif

      </ul>
    </div> 
  </div>

</div>

@endsection