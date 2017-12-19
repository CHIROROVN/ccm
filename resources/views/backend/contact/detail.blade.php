@extends('backend.layouts.app')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{route('backend.dashboard.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('backend.contact.index') }}" class="tip-bottom">Companies List</a> <span class="current">&nbsp;&nbsp; Contact detail </span> </div>
  <h1>Contact detail</h1>
</div>
<div class="container-fluid">
  <hr>

  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Contact detail</h5>
        </div>

        <div class="widget-content nopadding">
          {!! Form::open(array('route' => ['backend.contact.detail', $contact->contact_id], 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}
            <div class="control-group">
              <label class="control-label">Contact name: <span class="required">※</span></label>
              <div class="controls">
                {{$contact->contact_name}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Company name: </label>
              <div class="controls"><a href="{{route('backend.company.detail', $contact->company_id)}}" >{{$contact->company_name}}</a>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contact Email : </label>
              <div class="controls">
                {{$contact->contact_email}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contact Tel : </label>
              <div class="controls">
                {{$contact->contact_tel}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contact Title : </label>
              <div class="controls">
                {{$contact->contact_title}}
              </div>
            </div>         

            <div class="control-group">
            	<div class="controls">
              		<button type="button" class="btn btn-warning" onclick="location.href='{{route('backend.contact.edit', $contact->contact_id)}}'"><i class="icon-pencil"></i>&nbsp;Edit&nbsp;</button>
              		<button type="button" class="btn btn-danger" onclick="location.href='{{route('backend.contact.delete', $contact->contact_id)}}'"><i class="icon-trash"></i> Delete</button>
          		</div>
              <div class="controls">
                  <button type="button" class="btn btn-default" onclick="location.href='{{route('backend.contact.index')}}'"><i class="icon-list"></i> Back companies List</button>
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