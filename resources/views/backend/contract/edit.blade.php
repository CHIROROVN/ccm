@extends('backend.layouts.app')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('backend.contract.index') }}">Contracts List</a> <a href="#" class="current">Edit contact</a> </div>
    <!--<h1>New contact</h1>-->
</div>
<div class="container-fluid"><hr>
  <div class="row-fluid">
    <div class="span12">
       <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Edit contact</h5>
          </div>
           <div class="widget-content nopadding">
              <div class="alert alert-error alert-block" @if ($errors->first('contract_no')) style="display:block" @else style="display:none" @endif id="div_error"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Error!</h4>
                <p id="error_mess">@if ($errors->first('contract_no')) ※{!! $errors->first('contract_no') !!} @endif</p>               
              </div>
            {!! Form::open(array('url' => route('backend.contract.edit',$contract->contract_id),'id'=>'frmEdit', 'method' => 'post','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}            
              <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">Contract No</label>
                  <div class="controls">
                    <input id="contract_no" type="text" name="contract_no" value="{{$contract->contract_no}}" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Company name</label>
                  <div class="controls">
                    <select id="company_id" name="company_id">
                     @foreach($companies as $key=>$company)
                    <option value="{{$company->company_id}}" @if($company->company_id == $contract->company_id) selected @endif>{{$company->company_name}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contract Term</label>
                  <div class="controls">
                    <div  data-date="12-02-2012" class="input-append date datepicker">
                    <input type="text" value="12-02-2012"  data-date-format="mm-dd-yyyy" class="span11" >
                    <span class="add-on"><i class="icon-th"></i></span> </div> ~ 
                    <div  data-date="12-02-2012" class="input-append date datepicker">
                    <input type="text" value="12-02-2012"  data-date-format="mm-dd-yyyy" class="span11" >
                    <span class="add-on"><i class="icon-th"></i></span> </div>
                    
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contract detail 1</label>
                  <div class="controls">
                    <input type="radio" name="file_radio1"  value="1" {if $file_radio1 ==1} checked{/if} >
                     <input type="file" name="contract_detail_realImageName" id="contract_detail_realImageName"/>              
                    <input type="button" id="info1_file_del" class="btn-reset" value="X" title="リセット" onclick="deletePhoto('contract_detail_realImageName')" ><br>
                    <input type="radio" name="file_radio1"  value="2" {if $file_radio1 ==2} checked{/if} >
                      すでにアップロード済みのファイルを使う&nbsp; @if ($contract->contract_detail_real!='') <a href="{{$contract->contract_detail_real}}" target="_blank"> 画像を参照</a>する @else （画像なし） @endif <br>
                    <input type="radio" name="file_radio1"  value="3" >
                      アップロード済みファイルを削除する               
                    
                  </div>
                </div>
               <div class="control-group">
                  <label class="control-label">Contract detail 2 </label>
                  <div class="controls">
                    <input type="radio" name="file_radio2"  value="1" {if $file_radio2 ==1} checked{/if} >
                     <input type="file" name="ontract_detailImageName" id="contract_detailImageName"/>              
                    <input type="button" id="info2_file_del" class="btn-reset" value="X" title="リセット" onclick="deletePhoto('contract_detailImageName')" ><br>
                    <input type="radio" name="file_radio2"  value="2" {if $file_radio2 ==2} checked{/if} >
                      すでにアップロード済みのファイルを使う&nbsp; @if ($contract->contract_detail !='') <a href="{{$contract->contract_detail}}" target="_blank"> 画像を参照</a>する @else （画像なし） @endif <br>
                    <input type="radio" name="file_radio2"  value="3" >
                      アップロード済みファイルを削除する 
                    <!--<input id="contract_detail" type="file" name="contract_detail" />-->
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contract Price</label>
                  <div class="controls">
                    <input id="contract_price" type="text" name="contract_price" value="{{$contract->contract_price}}"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contract VAT</label>
                  <div class="controls">
                    <input id="contract_vat" type="text" name="contract_vat" value="{{$contract->contract_vat}}"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Bill received date</label>
                  <div class="controls">
                    <div  data-date="{{$contract->bill_received_date}}" class="input-append date datepicker">
                    <input type="text" value="{{$contract->bill_received_date}}"  data-date-format="mm-dd-yyyy" class="span11" name="bill_received_date">
                    <span class="add-on"><i class="icon-th"></i></span> </div>                     
                    
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Bill date</label>
                  <div class="controls">
                    <div  data-date="{{$contract->bill_date}}" class="input-append date datepicker">
                    <input type="text" value="{{$contract->bill_date}}"  data-date-format="mm-dd-yyyy" class="span11"  name="bill_date">
                    <span class="add-on"><i class="icon-th"></i></span> </div>                     
                    
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Bill NO</label>
                  <div class="controls">
                    <input id="bill_no" type="text" name="bill_no" value="{{$contract->bill_no}}"/>
                  </div>
                </div>
               
              </div>
              <div class="form-actions">
                <input id="back" class="btn btn-primary" type="reset" value="Reset" />
                <input  class="btn btn-primary" type="button" value="Save" id="btnSubmit" />
                <div id="status"></div>
              </div>                
              <div id="submitted"></div>
              {!! Form::close() !!}           
          </div>  
        </div>  
    </div>
  </div>    
</div>
</div>
 <script type="text/javascript">
$("#btnSubmit").on("click",function() { 
  var flag = true;
  if (!$("#contact_name").val().replace(/ /g, "")) {
      flag = false;
  }  
  if(flag) $( "#frmEdit" ).submit(); 
}); 
function deletePhoto(divId)
 {
     document.getElementById(divId).value ='';
 }
</script>   
@endsection