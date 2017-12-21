@extends('backend.layouts.app')
@section('content')
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      format: 'yyyy-m-d'
    });
  } );
  $( function() {
    $( "#datepicker1" ).datepicker({
      format: 'yyyy-m-d'
    });
  } );
  $( function() {
    $( "#bill_received_date" ).datepicker({
      format: 'yyyy-m-d'
    });
  } );
  $( function() {
    $( "#bill_date" ).datepicker({
      format: 'yyyy-m-d'
    });
  } );
  </script>
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('backend.dashboard.index') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('backend.contract.index') }}">Contracts</a> <span class="current"> &nbsp; Edit Contract</span> </div>
    <!--<h1>New contact</h1>-->
</div>
<div class="container-fluid"><hr>
  <div class="row-fluid">
    <div class="span12">
       <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Edit Contract</h5>
          </div>
           <div class="widget-content nopadding">
              <div class="alert alert-error alert-block" @if ($errors->first('contract_no') || $errors->first('contract_detail_real') || $errors->first('contract_detail')) style="display:block" @else style="display:none" @endif id="div_error"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Error!</h4>
                <p id="error_mess">@if ($errors->first('contract_no')) ※{!! $errors->first('contract_no') !!} @endif
                   @if ($errors->first('contract_detail_real')) <br>※{!! $errors->first('contract_detail_real') !!} @endif 
                   @if ($errors->first('contract_detail')) <br>※{!! $errors->first('contract_detail') !!} @endif 
                </p>               
              </div>
            {!! Form::open(array('url' => route('backend.contract.edit',$contract->contract_id),'id'=>'frmEdit', 'method' => 'post','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}            
              <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">Contract No <span class="required">※</span></label>
                  <div class="controls">
                    <input id="contract_no" type="text" name="contract_no" value="{{$contract->contract_no}}" class="span3" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Company</label>
                  <div class="controls">
                    <select id="company_id" name="company_id" class="span3">
                     @foreach($companies as $key=>$company)
                    <option value="{{$company->company_id}}" @if($company->company_id == $contract->company_id) selected @endif>{{$company->company_name}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Contract Term</label>
                  <div class="controls">
                    <div  data-date="{{$contract->contract_term_from}}" class="input-append date datepicker">
                    <input type="text" value="{{$contract->contract_term_from}}"  data-date-format="yyyy-m-d" class="span11" id="datepicker" name="contract_term_from">
                    <span class="add-on"><i class="icon-th"></i></span> </div> 
                    &nbsp;&nbsp; ~  
                    <div  data-date="{{$contract->contract_term_from}}" class="input-append date datepicker">
                    <input type="text" value="{{$contract->contract_term_from}}"  data-date-format="yyyy-m-d" class="span11" id="datepicker1" name="contract_term_to">
                    <span class="add-on"><i class="icon-th"></i></span> </div>
                    
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contract detail 1</label>
                  <div class="controls">
                    <input type="radio" name="file_radio1"  value="1" @if($file_radio1 ==1) checked @endif >
                     <input type="file" name="contract_detail_realImageName" id="contract_detail_realImageName"/>              
                    <input type="button" id="info1_file_del" class="btn-reset" value="X" title="Reset" onclick="deletePhoto('contract_detail_realImageName')" ><br>
                    <input type="radio" name="file_radio1"  value="2" @if($file_radio1 ==2) checked @endif>
                      Use already uploaded files&nbsp; @if ($contract->contract_detail_real!='') <a href="{{$contract->contract_detail_real}}" target="_blank"> Browse file</a> @else （No file） @endif <br>
                    <input type="radio" name="file_radio1"  value="3" @if($file_radio1 ==3) checked @endif>
                      Delete uploaded files           
                    
                  </div>
                </div>
               <div class="control-group">
                  <label class="control-label">Contract detail 2 </label>
                  <div class="controls">
                    <input type="radio" name="file_radio2"  value="1" @if($file_radio2 ==1) checked @endif >
                     <input type="file" name="contract_detailImageName" id="contract_detailImageName"/>              
                    <input type="button" id="info2_file_del" class="btn-reset" value="X" title="Reset" onclick="deletePhoto('contract_detailImageName')" ><br>
                    <input type="radio" name="file_radio2"  value="2" @if($file_radio2 ==2) checked @endif >
                      Use already uploaded files&nbsp; @if ($contract->contract_detail !='') <a href="{{$contract->contract_detail}}" target="_blank"> Browse file</a> @else （No file） @endif <br>
                    <input type="radio" name="file_radio2"  value="3" @if($file_radio2 ==3) checked @endif>
                      Delete uploaded files 
                    
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contract Price</label>
                  <div class="controls">
                    <input id="contract_price" type="text" name="contract_price" value="{{$contract->contract_price}}" class="span3"/> VND
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contract VAT</label>
                  <div class="controls">
                    <input id="contract_vat" type="text" name="contract_vat" value="{{$contract->contract_vat}}" class="span1"/> %
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Bill received date</label>
                  <div class="controls">
                    <div  data-date="{{$contract->bill_received_date}}" class="input-append date datepicker">
                    <input type="text" value="{{$contract->bill_received_date}}"  data-date-format="mm-dd-yyyy" class="span11" name="bill_received_date" id="bill_received_date">
                    <span class="add-on"><i class="icon-th"></i></span> </div>                     
                    
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Bill date</label>
                  <div class="controls">
                    <div  data-date="{{$contract->bill_date}}" class="input-append date datepicker">
                    <input type="text" value="{{$contract->bill_date}}"  data-date-format="mm-dd-yyyy" class="span11"  name="bill_date" id="bill_date">
                    <span class="add-on"><i class="icon-th"></i></span> </div>                    
                    
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Bill NO</label>
                  <div class="controls">
                    <input id="bill_no" type="text" name="bill_no" value="{{$contract->bill_no}}" class="span5"/>
                  </div>
                </div>
               
              </div>
              <div class="form-actions">
                
                <button type="button" class="btn btn-success" id="btnSubmit"><i class="icon-save"  ></i> Save</button>
                  <button type="reset" class="btn btn-default"><i class="icon-refresh"></i> Reset</button>
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
  if (!$("#contract_no").val().replace(/ /g, "")) {
    $("#error_mess").html('<?php echo $error['error_contract_no_required'];?>');
    $("#div_error").css('display','block');   
    $('#contract_no').focus();  
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