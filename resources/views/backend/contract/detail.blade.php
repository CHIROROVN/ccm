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
              <label class="control-label">Contract No: <span class="required">※</span></label>
              <div class="controls">
                {{$contract->contract_no}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Company: </label>
              <div class="controls"><a href="{{route('backend.company.detail', $contract->company_id)}}" >
                {{$contract->company_name}}</a>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contract Term : </label>
              <div class="controls">
                {{$contract->contract_term_from}} ~ {{$contract->contract_term_to}}
              </div>
            </div> 

             <div class="control-group">
              <label class="control-label">Contract File 1: </label>
              <div class="controls">
                {{$contract->contract_detail_real}}
              </div>
            </div>  
            <div class="control-group">
              <label class="control-label">Contract File 2: </label>
              <div class="controls">
                {{$contract->contract_detail}}
              </div>
            </div>   
            <div class="control-group">
              <label class="control-label">Contract price: </label>
              <div class="controls">
                {{$contract->contract_price}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contract VAT: </label>
              <div class="controls">
                {{$contract->contract_vat}}
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label">Bill No: </label>
              <div class="controls">
                {{$contract->bill_no}}
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label">Bill received date: </label>
              <div class="controls">
                {{$contract->bill_received_date}}
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Bill date: </label>
              <div class="controls">
                {{$contract->bill_date}}
              </div>
            </div>   
               

            <div class="control-group">
            	<div class="controls">
              		<button type="button" class="btn btn-warning" onclick="location.href='{{route('backend.contract.edit', $contract->contract_id)}}'"><i class="icon-pencil"></i>&nbsp;Edit&nbsp;</button>
              		<button type="button" class="btn btn-danger" onclick="location.href='{{route('backend.contract.delete', $contract->contract_id)}}'"><i class="icon-trash"></i> Delete</button>
          		</div>
              <div class="controls">
                  <button type="button" class="btn btn-default" onclick="location.href='{{route('backend.contract.index')}}'"><i class="icon-list"></i> Back contracts List</button>
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