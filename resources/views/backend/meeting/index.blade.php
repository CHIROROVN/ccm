@extends('backend.layouts.app')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('backend.dashboard.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <span class="current">&nbsp;&nbsp;Meeting </span> </div>
    <h1>
      Meeting List
      <div class="pull-right btn-right">
        <button type="button" class="btn btn-success" onclick="location.href='{{route('backend.meeting.regist')}}'"><i class="icon-plus"></i> Add New Meeting</button>
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
            <h5>Meeting</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="width-col1">Delete</th>
                  <th>Meeting Title</th>
                  <th>Meeting Detail</th>
                  <th>Company Name</th>
                  <th>Contract No</th>
                  <th class="width-col4">Meeting Date</th>
                  <th class="width-col3">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(count($meetings)>0)
                  @foreach($meetings as $meeting)
                    <tr>
                      <td class="text-center text-middle">
                        <button type="button" class="btn btn-mini btn-danger" onclick="location.href='{{route('backend.meeting.edit', $meeting->meeting_id)}}'"><i class="icon-trash"></i> Delete</button>
                      </td>
                      <td>{{ $meeting->meeting_title }}</td>
                      <td>{{ $meeting->meeting_detail }}</td>
                      <td>{{ $meeting->company_name }}</td>
                      <td>{{ $meeting->contract_no }}</td>
                      <td class="text-center">{{$meeting->meeting_date}}</td>
                      <td  class="text-center text-middle">
                        <button type="button" class="btn btn-mini btn-info" onclick="location.href='{{route('backend.meeting.detail', $meeting->meeting_id)}}'"><i class="icon-eye-open"></i> View</button>
                        <button type="button" class="btn btn-mini btn-warning" onclick="location.href='{{route('backend.meeting.edit', $meeting->meeting_id)}}'"><i class="icon-pencil"></i> Edit</button>
                      </td>
                    </tr>
                  @endforeach
                @else
                <td colspan="7" style="text-align: center;">No Data</td>
                @endif
              </tbody>
            </table> 

      </div>
    </div>
  </div>
</div>

@endsection