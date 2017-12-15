@extends('backend.layouts.app')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('backend.dashboard.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <span class="current">&nbsp;&nbsp;Users </span> </div>
    <h1>
      Users List
      <div class="pull-right btn-right">
        <button type="button" class="btn btn-success" onclick="location.href='{{route('backend.users.regist')}}'"><i class="icon-plus"></i> Add New User</button>
      </div>
    </h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="flash-messages">
          @if($message = Session::get('danger'))

              <div id="error" class="message">
                  <a id="close" title="Message"  href="javascript:void(0);" onClick="document.getElementById('error').setAttribute('style','display: none;');">&times;</a>
                  <span>{{$message}}</span>
              </div>

          @elseif($message = Session::get('success'))

              <div id="success" class="message">
                  <a id="close" title="Message"  href="javascript:void(0);" onClick="document.getElementById('success').setAttribute('style','display: none;');">&times;</a>
                  <span>{{$message}}</span>
              </div>

          @endif  
        </div>
       <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Users</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="width-col1">Delete</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th class="width-col4">Permission</th>
                  <th class="width-col1">Status</th>
                  <th class="width-col4">Date</th>
                  <th class="width-col3">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(count($users)>0)
                  @foreach($users as $user)
                    <tr>
                      <td class="text-center text-middle">
                        <button type="button" class="btn btn-mini btn-danger" onclick="location.href='{{route('backend.users.edit')}}'"><i class="icon-trash"></i> Delete</button>
                      </td>
                      <td class="text-center">{{$user->u_name}}</td>
                      <td class="text-center">{{$user->u_login}}</td>
                      <td class="text-left">
                        @if($user->u_power01 == 1) Power01 &nbsp; @endif
                        @if($user->u_power02 == 1) Power02 &nbsp; @endif
                        @if($user->u_power02 == 1) Power03 &nbsp; @endif
                        @if($user->u_power02 == 1) Power04 &nbsp; @endif
                        @if($user->u_power02 == 1) Power05 &nbsp; @endif
                      </td>
                      <td class="text-center">
                        @if($user->u_dspl_flag == 1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-important">Inactive</span>
                        @endif
                      </td>
                      <td class="text-center">{{$user->last_date}}</td>
                      <td  class="text-center text-middle" colspan="2">
                        <button type="button" class="btn btn-mini btn-info" onclick="location.href='{{route('backend.users.detail', $user->u_id)}}'"><i class="icon-eye-open"></i> View</button>
                        <button type="button" class="btn btn-mini btn-warning" onclick="location.href='{{route('backend.users.edit', $user->u_id)}}'"><i class="icon-pencil"></i> Edit</button>
                      </td>
                    </tr>
                  @endforeach
                @else
                <td colspan="8" style="text-align: center;">No Data</td>
                @endif
              </tbody>
            </table> 

      </div>
    </div>
  </div>
</div>

@endsection