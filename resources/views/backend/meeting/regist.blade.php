@extends('backend.layouts.app')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{route('backend.dashboard.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('backend.users.index')}}" class="tip-bottom">Meeting</a> <span class="current">&nbsp;&nbsp; Add New Meeting </span> </div>
  <h1>Add New Meeting</h1>
</div>
<div class="container-fluid">
  <hr>

  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Meeting</h5>
        </div>

        <div class="widget-content nopadding">
          {!! Form::open(array('route' => ['backend.meeting.regist'], 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}
            <div class="control-group">
              <label class="control-label">Company Name: <span class="required">※</span></label>
              <div class="controls">
                <select class="span6">
                  <option>First option</option>
                  <option>Second option</option>
                  <option>Third option</option>
                  <option>Fourth option</option>
                  <option>Fifth option</option>
                  <option>Sixth option</option>
                  <option>Seventh option</option>
                  <option>Eighth option</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contract Name: <span class="required">※</span></label>
              <div class="controls">
                <select class="span6">
                  <option>First option</option>
                  <option>Second option</option>
                  <option>Third option</option>
                  <option>Fourth option</option>
                  <option>Fifth option</option>
                  <option>Sixth option</option>
                  <option>Seventh option</option>
                  <option>Eighth option</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Meeting Title : <span class="required">※</span></label>
              <div class="controls">
                <input type="text" class="span6" placeholder="Meeting title" name="meeting_title" value="{{old('meeting_title')}}" />
                @if ($errors->has('meeting_title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('meeting_title') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Meeting Detail : <span class="required">※</span></label>
              <div class="controls">
                <textarea name="meeting_detail" class="span6" placeholder="Meeting detail">@if(old('meeting_detail')){{old('meeting_detail')}}@endif</textarea>
                @if ($errors->has('meeting_detail'))
                    <span class="help-block">
                        <strong>{{ $errors->first('meeting_detail') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Metting Date</label>
              <div class="controls">
                <div data-date="12-02-2012" class="input-append date datepicker">
                  <input value="12-02-2012" data-date-format="mm-dd-yyyy" class="span11" type="text">
                  <span class="add-on"><i class="icon-th"></i></span> </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Checkboxes</label>
              <div class="controls">
                <label>
                  <input type="checkbox" name="radios" />
                  First One</label>
                <label>
                  <input type="checkbox" name="radios" />
                  Second One</label>
                <label>
                  <input type="checkbox" name="radios" />
                  Third One</label>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">File upload input</label>
              <div class="controls">
                <input type="file" />
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

<script>
$( document ).ready(function() {
    
});
</script>
@endsection