@extends('backend.layouts.app')
@section('content')

  <script>
  $( function() {
    $( "#datepicker" ).datetimepicker({
      format: 'Y-m-d h:i:s'
    });
  } );
  </script>

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{route('backend.dashboard.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('backend.meeting.index')}}" class="tip-bottom">Meeting</a> <span class="current">&nbsp;&nbsp; edit </span> </div>
  <h1>Edit Meeting</h1>
</div>
<div class="container-fluid">
  <hr>

  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
          <h5>Meeting</h5>
        </div>

        <div class="widget-content nopadding">
          {!! Form::open(array('route' => ['backend.meeting.edit', $id], 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}
            <div class="control-group">
              <label class="control-label">Company Name: <span class="required">※</span></label>
              <div class="controls">
                <select class="span6" id="company_id" name="company_id">
      					@if(!empty($company))
      						@foreach($company as $key => $com)
      							<option value="{{$key}}" @if(old('company_id') == $key) selected @elseif($meeting->company_id == $key) selected @endif >{{$com}}</option>
      						@endforeach
      					@endif
                </select>
                @if ($errors->has('company_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('company_id') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contact Name: <span class="required">※</span></label>
              <div class="controls">
                <select class="span6" id="contact_id" name="contact_id"></select>
                @if ($errors->has('contact_id')) 
                <span class="help-block">
                    <strong>{{ $errors->first('contact_id') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Meeting Title : <span class="required">※</span></label>
              <div class="controls">
                <input type="text" class="span6" placeholder="Meeting title" name="meeting_title" value="@if(old('meeting_title')){{old('meeting_title')}}@else{{$meeting->meeting_title}}@endif" />
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
                <textarea name="meeting_detail" class="span6" placeholder="Meeting detail">@if(old('meeting_detail')){{old('meeting_detail')}}@else{{$meeting->meeting_detail}}@endif</textarea>
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
                <div data-date="{{date('Y-m-d H:i')}}" class="input-append date datepicker">
                	<input type="text" id="datepicker" name="meeting_date" value="@if(old('meeting_date')){{old('meeting_date')}}@else{{$meeting->meeting_date}}@endif">
                	<!-- <span class="add-on"><i class="icon-th"></i></span> --> </div>
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
                <label>
                  <input type="radio" name="radio_meeting_file_1" id="radio1_meeting_file_1" value="1" checked />
                  Not change → @if(!empty($meeting->meeting_file_1))
                <a href="{{ asset('public') }}{{$meeting->meeting_file_1}}" target="_blank" title="View file" @if(empty($meeting->meeting_file_1)) class="disabled" @endif >View</a>
                @else No file @endif  </label>
                <label>
                  <input type="radio" name="radio_meeting_file_1" id="radio2_meeting_file_1" value="2" />
                  Change <input type="file" name="meeting_file_1" id="meeting_file_1" value="{{old('meeting_file_1')}}" /> <input type="button" id="meeting_file_1_del" class="btn-reset" value="X" title="Cancel"> </label>
                <label>
                  <input type="radio" name="radio_meeting_file_1" id="radio3_meeting_file_1" value="3" />
                  Delete</label>
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
                <label>
                  <input type="radio" name="radio_meeting_file_2" id="radio1_meeting_file_2" value="1" checked />
                  Not change → @if(!empty($meeting->meeting_file_2))
                <a href="{{ asset('public') }}{{$meeting->meeting_file_2}}" target="_blank" title="View file" @if(empty($meeting->meeting_file_2)) class="disabled" @endif>View</a>
                @else No file @endif  </label>
                <label>
                  <input type="radio" name="radio_meeting_file_2" id="radio2_meeting_file_2" value="2" />
                  Change <input type="file" name="meeting_file_2" id="meeting_file_2" value="{{old('meeting_file_2')}}" />  <input type="button" id="meeting_file_2_del" class="btn-reset" value="X" title="Cancel"></label>
                <label>
                  <input type="radio" name="radio_meeting_file_2" id="radio3_meeting_file_2" value="3" />
                  Delete</label>
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
  $('.btn-reset').addClass('btn-hide');
  var selected = '';
	var option_contact = '<option value="" ></option>';
  var contact_id_old = "{{$meeting->contact_id}}";
  var contact_id_new = "{{old('contact_id')}}";
  if(contact_id_old != null){
    selected = contact_id_old;
  }else{
    selected = contact_id_new;
  }

	var company_id = $('#company_id').val();    	
	$.ajax({
        type: "GET",
        url: "{{route('backend.meeting.contact_ajax')}}",
        data: {company_id: company_id},
        dataType: 'json',
        success: function (data) {
            $.each(data, function(key,contact) {
              if(selected == contact.contact_id){
                selected = "selected";
              }
            console.log(selected);
		        option_contact += '<option value="'+contact.contact_id+'" '+selected+' >'+contact.contact_name+'</option>';
		    });
            console.log(option_contact);
            $('#contact_id').html(option_contact);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

$('#company_id').on('change', function (e) {
	var option_contact = '<option value="" ></option>';
	var selected = '';
     e.preventDefault();
	var company_id = $(this).val();	
	$.ajax({
        type: "GET",
        url: "{{route('backend.meeting.contact_ajax')}}",
        data: {company_id: company_id},
        dataType: 'json',
        success: function (data) {
            $.each(data, function(key,contact) {
              if(selected == contact.contact_id){
                selected = "selected";
              }
		        option_contact += '<option value="'+contact.contact_id+'" '+selected+' >'+contact.contact_name+'</option>';
		    });
            console.log(option_contact);
		    $('#contact_id').html(option_contact);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

$('#meeting_file_1').change(function(){
    $( "#radio2_meeting_file_1" ).prop( "checked", true );
    if($(this).length > 0){
      $('#meeting_file_1_del').removeClass('btn-hide');
    }   
  });

$('#meeting_file_2').change(function(){
    $( "#radio2_meeting_file_2" ).prop( "checked", true );
    if($(this).length > 0){
      $('#meeting_file_2_del').removeClass('btn-hide');
    }   
  });

$('#meeting_file_1_del').click(function(){
    var $el = $('#meeting_file_1');
    $el.wrap('<form>').closest('form').get(0).reset();
    $el.unwrap();
    $('#meeting_file_1_del').addClass('btn-hide');
    $('#meeting_file_1').val('');
  });

$('#meeting_file_2_del').click(function(){
    var $el = $('#meeting_file_2');
    $el.wrap('<form>').closest('form').get(0).reset();
    $el.unwrap();
    $('#meeting_file_2_del').addClass('btn-hide');
    $('#meeting_file_2').val('');
  });

</script>
@endsection