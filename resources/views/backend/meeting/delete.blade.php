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
  <div id="breadcrumb"> <a href="{{route('backend.dashboard.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('backend.meeting.index')}}" class="tip-bottom">Meeting</a> <span class="current">&nbsp;&nbsp; delete </span> </div>
  <h1>Meeting Delete</h1>
</div>
<div class="container-fluid">
  <hr>

  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-trash"></i> </span>
          <h5>Meeting</h5>
        </div>

        <div class="widget-content nopadding">
          {!! Form::open(array('route' => ['backend.meeting.delete', $meeting->meeting_id], 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}
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
                {{dt_format($meeting->meeting_date)}}
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
                  <button type="button" class="btn btn-danger" onclick="location.href='{{route('backend.meeting.save_delete', $meeting->meeting_id)}}'"><i class="icon-trash"></i> Delete</button>
                  <button type="button" class="btn btn-default" onclick="location.href='{{route('backend.meeting.detail', $meeting->meeting_id)}}'"><i class="icon-arrow-left"></i>&nbsp;Back&nbsp;</button>
              </div>
              <div class="controls">
                  <button type="button" class="btn btn-default" onclick="location.href='{{route('backend.meeting.index')}}'">&nbsp;<i class="icon-list"></i> Back Meeting List&nbsp;</button>
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