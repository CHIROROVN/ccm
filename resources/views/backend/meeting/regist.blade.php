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
                <select class="span6" id="company_id" name="company_id">
					@if(!empty($company))
						@foreach($company as $key => $com)
							<option value="{{$key}}">{{$com}}</option>
						@endforeach
					@endif                  
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contract No: <span class="required">※</span></label>
              <div class="controls">
                <select class="span6" id="contract_id" name="contract_id">
                                    
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
              <label class="control-label">Metting Date: <span class="required">※</span></label>
              <div class="controls">
                <div data-date="{{date('m/d/Y')}}" class="input-append date datepicker">
                	<input value="{{date('m/d/Y')}}" data-date-format="mm-dd-yyyy" class="span11" type="text">
                	<span class="add-on"><i class="icon-th"></i></span> </div>
					@if ($errors->has('meeting_date'))
					<span class="help-block">
					    <strong>{{ $errors->first('meeting_date') }}</strong>
					</span>
					@endif
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Meeting File 1: </label>
              <div class="controls">
                <input type="file" name="meeting_file_1" />
                @if ($errors->has('meeting_file_1'))
				<span class="help-block">
				    <strong>{{ $errors->first('meeting_file_1') }}</strong>
				</span>
				@endif
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Meeting File 2: </label>
              <div class="controls">
                <input type="file" name="meeting_file_1" />
                @if ($errors->has('meeting_file_2'))
				<span class="help-block">
				    <strong>{{ $errors->first('meeting_file_2') }}</strong>
				</span>
				@endif
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
    $('#company_id').on('change', function (e) {
    	var company_id = $(this).val();
    	alert(company_id);
    });
});
</script>
@endsection