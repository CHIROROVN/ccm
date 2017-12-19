@extends('backend.layouts.app')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{route('backend.dashboard.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('backend.contract.index') }}" class="tip-bottom">Contracts List</a> <span class="current">&nbsp;&nbsp; Company detail </span> </div>
  <h1>Contract detail</h1>
</div>
<div class="container-fluid">
  <hr>

  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Contract detail</h5>
        </div>

        <div class="widget-content nopadding">
          {!! Form::open(array('route' => ['backend.contract.detail', $contract->contract_id], 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}
            <div class="control-group">
              <label class="control-label">Company Name: <span class="required">※</span></label>
              <div class="controls">
                {{$contract->company_name}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Company Address: </label>
              <div class="controls">
                {{$contract->company_address}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Company MST : </label>
              <div class="controls">
                {{$contract->company_mst}}
              </div>
            </div>         

            <div class="control-group">
            	<div class="controls">
              		<button type="button" class="btn btn-warning" onclick="location.href='{{route('backend.contract.edit', $contract->contract_id)}}'"><i class="icon-pencil"></i>&nbsp;Edit&nbsp;</button>
              		<button type="button" class="btn btn-danger" onclick="location.href='{{route('backend.contract.delete', $contract->contract_id)}}'"><i class="icon-trash"></i> Delete</button>
          		</div>
              <div class="controls">
                  <button type="button" class="btn btn-default" onclick="location.href='{{route('backend.contract.index')}}'"><i class="icon-list"></i> Back companies List</button>
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