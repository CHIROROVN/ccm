@extends('backend.layouts.app')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{route('backend.dashboard.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('backend.company.index') }}" class="tip-bottom">Companies List</a> <span class="current">&nbsp;&nbsp; Company detail </span> </div>
  <h1>Company detail</h1>
</div>
<div class="container-fluid">
  <hr>

  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Company detail</h5>
        </div>

        <div class="widget-content nopadding">
          {!! Form::open(array('route' => ['backend.company.detail', $company->company_id], 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}
            <div class="control-group">
              <label class="control-label">Company Name: <span class="required">※</span></label>
              <div class="controls">
                {{$company->company_name}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Company Address: </label>
              <div class="controls">
                {{$company->company_address}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Company MST : </label>
              <div class="controls">
                {{$company->company_mst}}
              </div>
            </div>         

            <div class="control-group">
            	<div class="controls">
              		<button type="button" class="btn btn-warning" onclick="location.href='{{route('backend.company.edit', $company->company_id)}}'"><i class="icon-pencil"></i>&nbsp;Edit&nbsp;</button>
              		<button type="button" class="btn btn-danger" onclick="location.href='{{route('backend.company.delete', $company->company_id)}}'"><i class="icon-trash"></i> Delete</button>
          		</div>
              <div class="controls">
                  <button type="button" class="btn btn-default" onclick="location.href='{{route('backend.company.index')}}'"><i class="icon-list"></i> Back companies List</button>
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