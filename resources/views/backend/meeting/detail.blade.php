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
  <div id="breadcrumb"> <a href="{{route('backend.dashboard.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('backend.meeting.index')}}" class="tip-bottom">Meeting</a> <span class="current">&nbsp;&nbsp; detail </span> </div>
  <h1>Meeting Detail</h1>
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
          {!! Form::open(array('route' => ['backend.meeting.detail', $meeting->meeting_id], 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}
            <div class="control-group">
              <label class="control-label">Company Name: <span class="required">※</span></label>
              <div class="controls">
                {{$meeting->company_name}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contact Name: <span class="required">※</span></label>
              <div class="controls">
                {{$meeting->contact_name}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Meeting Title : <span class="required">※</span></label>
              <div class="controls">
                {{$meeting->meeting_title}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Meeting Detail : <span class="required">※</span></label>
              <div class="controls">
                {!! nl2br($meeting->meeting_detail) !!}
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Metting Date: <span class="required">※</span></label>
              <div class="controls">
                {{$meeting->meeting_date}}
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Meeting File 1: </label>
              <div class="controls">
                @if(!empty($meeting->meeting_file_1))
                <a href="{{ asset('public') }}{{$meeting->meeting_file_1}}" target="_blank" title="">View file</a>
                @endif   
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Meeting File 2: </label>
              <div class="controls">
                @if(!empty($meeting->meeting_file_2))
                <a href="{{ asset('public') }}{{$meeting->meeting_file_2}}" target="_blank" title="">View file</a>
                @endif
              </div>
            </div>

            <div class="control-group">
            	<div class="controls">
              		<button type="button" class="btn btn-warning" onclick="location.href='{{route('backend.meeting.edit', $meeting->meeting_id)}}'"><i class="icon-pencil"></i>&nbsp;Edit&nbsp;</button>
              		<button type="button" class="btn btn-danger" onclick="location.href='{{route('backend.meeting.delete', $meeting->meeting_id)}}'"><i class="icon-trash"></i> Delete</button>
          		</div>
              <div class="controls">
                  <button type="button" class="btn btn-default" onclick="location.href='{{route('backend.meeting.index')}}'"><i class="icon-list"></i> Back Meeting List</button>
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
	var option_contact = '<option value="" ></option>';
	var selected = "{{old('contact_id')}}";
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

</script>
@endsection