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
              		<button type="button" class="btn btn-warning" onclick="location.href='{{route('backend.company.edit', $company->company_id)}}'">&nbsp;<i class="icon-pencil"></i>&nbsp;Edit&nbsp;&nbsp;</button>
              		<button type="button" class="btn btn-danger" onclick="location.href='{{route('backend.company.delete', $company->company_id)}}'">&nbsp;<i class="icon-trash"></i> Delete&nbsp;</button>
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
  <!-- -->
  <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Contact List </h5>
          </div>
          <div class="widget-content">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>                  
                  <th>Contact name</th>                  
                  <th>Contact email</th>
                  <th>Contact Tel</th>
                  <th class="width-col10">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(empty($contacts) || count($contacts) < 1)
                <tr><td colspan="4"><h3 align="center">Don't have any data</h3></td>               
                </tr>
                @else  
                  @foreach($contacts as $contact) 
                <tr>                  
                  <td>{{$contact->contact_name}}</td>                  
                  <td>{{$contact->contact_email}}</td>
                  <td>{{$contact->contact_tel}}</td>
                  <td class="center">
                      <button type="button" class="btn btn-mini btn-info" onclick="location.href='{{route('backend.contact.detail', $contact->contact_id)}}'"><i class="icon-eye-open"></i> View</button>
                    <button type="button" class="btn btn-mini btn-warning" onclick="location.href='{{ route('backend.contact.edit', $contact->contact_id) }}'"><i class="icon-pencil"></i> Edit</button>
                  </td>
                </tr>
                @endforeach  
                @endif  
              </tbody>
            </table>

          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
            <h5>Contract list</h5>
          </div>
          <div class="widget-content"> <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>                  
                  <th>Contract No</th>                  
                  <th>Contract Price</th>
                  <th>Contract VAT</th>
                  <th class="width-col10">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(empty($contracts) || count($contracts) < 1)
                <tr><td colspan="4"><h3 align="center">Don't have any data</h3></td>               
                </tr>
                @else  
                  @foreach($contracts as $contract) 
                <tr>
                  
                  <td>{{$contract->contract_no}}</td>                  
                  <td>{{$contract->contract_price}}</td>
                  <td>{{$contract->contract_vat}}</td>
                  <td class="center"> 
                      <button type="button" class="btn btn-mini btn-info" onclick="location.href='{{route('backend.contract.detail', $contract->contract_id)}}'"><i class="icon-eye-open"></i> View</button>
                    <button type="button" class="btn btn-mini btn-warning" onclick="location.href='{{ route('backend.contract.edit', $contract->contract_id) }}'"><i class="icon-pencil"></i> Edit</button>
                  </td>
                </tr>
                 @endforeach  
                @endif  
              </tbody>
            </table></div>
        </div>
      </div>
    </div>
</div>
</div>
@endsection