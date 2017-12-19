@extends('backend.layouts.app')
@section('content')

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{route('backend.dashboard.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('backend.users.index')}}" class="tip-bottom">Users</a> <span class="current">&nbsp;&nbsp; edit </span> </div>
  <h1>User Edit</h1>
</div>
<div class="container-fluid">
  <hr>

  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>User</h5>
        </div>

        <div class="widget-content nopadding">
          {!! Form::open(array('route' => ['backend.users.edit',$id], 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}
            <div class="control-group">
              <label class="control-label">Full Name : <span class="required">※</span></label>
              <div class="controls">
                <input type="text" class="span8" placeholder="Full Name" name="u_name" value="@if(old('u_name')){{old('u_name')}}@else{{$user->u_name}}@endif" />
                @if ($errors->has('u_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('u_name') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Username : <span class="required">※</span></label>
              <div class="controls">
                <input type="text" class="span8" placeholder="Username" name="u_login" value="@if(old('u_login')){{old('u_login')}}@else{{$user->u_login}}@endif"/>
                @if ($errors->has('u_login'))
                    <span class="help-block">
                        <strong>{{ $errors->first('u_login') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password :</label>
              <div class="controls">
                <input type="password" class="span8" placeholder="Enter Password" name="u_passwd" value="" />
                @if ($errors->has('u_passwd'))
                    <span class="help-block">
                        <strong>{{ $errors->first('u_passwd') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Permission :</label>
              <div class="controls">
                <label>
                  <input type="checkbox" name="u_power01" value="1" @if(old('u_power01') == 1) checked @elseif($user->u_power01 == 1) checked @endif />&nbsp;
                   Power01</label>
                <label>
                  <input type="checkbox" name="u_power02" value="1" @if(old('u_power02') == 1) checked @elseif($user->u_power02 == 1) checked @endif />&nbsp;
                   Power02</label>
                <label>
                  <input type="checkbox" name="u_power03" value="1" @if(old('u_power03') == 1) checked @elseif($user->u_power03 == 1) checked @endif />&nbsp;
                   Power03</label>
                  <label>
                  <input type="checkbox" name="u_power04" value="1" @if(old('u_power04') == 1) checked @elseif($user->u_power04 == 1) checked @endif/>&nbsp;
                   Power04</label>
                  <label>
                  <input type="checkbox" name="u_power05"  value="1" @if(old('u_power05') == 1) checked @elseif($user->u_power05 == 1) checked @endif/>&nbsp;
                   Power05</label>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Status :</label>
              <div class="controls">
                <label>
                  <input type="checkbox" name="u_dspl_flag" value="1" @if(old('u_dspl_flag') == 1) checked @elseif($user->u_dspl_flag == 1) checked @endif/>&nbsp;
                   <span style="color: green;">Active</span>/<span style="color: red;">Inactive</span></label>
              </div>
            </div>

            <div class="control-group">
              <div class="controls">
                  <button type="submit" class="btn btn-success"><i class="icon-save"></i> Save</button>
                  <button type="reset" class="btn btn-default"><i class="icon-refresh"></i> Reset</button>
              </div>
            </div>
          {!! Form::close() !!}
        </div>

      </div>

    </div>

  </div>

</div>
</div>

@endsection