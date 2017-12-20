@extends('backend.layouts.app')
@section('content')

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{route('backend.dashboard.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('backend.users.index')}}" class="tip-bottom">Users</a> <span class="current">&nbsp;&nbsp; detail </span> </div>
  <h1>User Detail</h1>
</div>
<div class="container-fluid">
  <hr>

  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>User</h5>
        </div>

        <div class="widget-content nopadding">
          <form class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Full Name :</label>
              <div class="controls">
                {{$user->u_name}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Username :</label>
              <div class="controls">
                {{$user->u_login}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password :</label>
              <div class="controls">
                *****
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Permission :</label>
              <div class="controls">
                <label> @if($user->u_power01 == 1) Power01 @endif</label>
                <label> @if($user->u_power02 == 1) Power02 @endif</label>
                <label> @if($user->u_power03 == 1) Power03 @endif</label>
                <label> @if($user->u_power04 == 1) Power04 @endif</label>
                <label> @if($user->u_power05 == 1) Power05 @endif</label>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Status :</label>
              <div class="controls">
                <label>
                  @if($user->u_dspl_flag == 1)
                  <span style="color: green;">Active</span>
                  @else
                  <span style="color: red;">Inactive</span>
                  @endif
                </label>
              </div>
              
            </div>

            <div class="control-group">
            	<div class="controls">
              		<button type="button" class="btn btn-warning" onclick="location.href='{{route('backend.users.edit', $id)}}'"><i class="icon-pencil"></i>&nbsp;Edit&nbsp;</button>
              		<button type="button" class="btn btn-danger" onclick="location.href='{{route('backend.users.delete', $id)}}'"><i class="icon-trash"></i> Delete</button>
          		</div>
              <div class="controls">
                  <button type="button" class="btn btn-default" onclick="location.href='{{route('backend.users.index')}}'"><i class="icon-th-list"></i> Go back User List</button>
                </div>
            </div>

          </form>
          
        </div>

      </div>

    </div>

  </div>

</div>
</div>

@endsection