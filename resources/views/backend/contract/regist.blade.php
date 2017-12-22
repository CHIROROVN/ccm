@extends('backend.layouts.app')
@section('content')
<script>
  $( function() {
    $( "#contract_term_from" ).datetimepicker({
      timepicker:false,
      format: 'Y-m-d'
    });
  } );
  $( function() {
    $( "#contract_term_to" ).datetimepicker({
      timepicker:false,
      format: 'Y-m-d'
    });
  } );
  $( function() {
    $( "#bill_received_date" ).datetimepicker({
      timepicker:false,
      format: 'Y-m-d'
    });
  } );
  $( function() {
    $( "#bill_date" ).datetimepicker({
      timepicker:false,
      format: 'Y-m-d'
    });
  } );
  </script>
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('backend.dashboard.index') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('backend.contract.index') }}">Contracts</a> <span class="current"> &nbsp; New Contract</span> </div>
    <h1>New Contract</h1>
</div>
<div class="container-fluid"><hr>
  <div class="row-fluid">
    <div class="span12">
       <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>New Contact</h5>
          </div>
           <div class="widget-content nopadding">
              <div class="alert alert-error alert-block" @if ($errors->first('contract_no') || $errors->first('contract_detail_real') || $errors->first('contract_detail')) style="display:block" @else style="display:none" @endif id="div_error"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Error!</h4>
                <p id="error_mess">@if ($errors->first('contract_no')) ※{!! $errors->first('contract_no') !!} @endif
                                   @if ($errors->first('contract_detail_real')) <br>※{!! $errors->first('contract_detail_real') !!} @endif 
                                   @if ($errors->first('contract_detail')) <br>※{!! $errors->first('contract_detail') !!} @endif 
                </p>               
              </div>
            {!! Form::open(array('url' => route('backend.contract.regist'),'id'=>'frmRegist', 'method' => 'post','class'=>'form-horizontal' ,'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}            
              <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">Contract NO <span class="required">※</span></label>
                  <div class="controls">
                    <input id="contract_no" type="text" name="contract_no" value="{{old('contract_no')}}" class="span3"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Company</label>
                  <div class="controls">
                    <select id="company_id" name="company_id" class="span3">
                     @foreach($companies as $key=>$company)
                    <option value="{{$company->company_id}}">{{$company->company_name}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contract Term</label>
                  <div class="controls">
                    <div data-date="{{old('contract_term_from')}}" class="input-append date datepicker">
                  <input type="text" id="contract_term_from" name="contract_term_from" class="span11"><span class="add-on"><i class="icon-th"></i></span>
                  </div>
                  &nbsp;&nbsp; ~  
                  <div data-date="{{old('contract_term_to')}}" class="input-append date datepicker">
                  <input type="text" id="contract_term_to" name="contract_term_to" class="span11"><span class="add-on"><i class="icon-th"></i></span>
                  </div>
                  @if ($errors->has('meeting_date'))
                  <span class="help-block">
                      <strong>{{ $errors->first('meeting_date') }}</strong>
                  </span>
                  @endif
                  </div>               
                    
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contract detail 1</label>
                  <div class="controls">
                    <input id="contract_detail_real" type="file" name="contract_detail_real" />
                    <span class="help-block" id="error_contract_detail_real"></span>
                  </div>
                </div>
               <div class="control-group">
                  <label class="control-label">Contract detail 2 </label>
                  <div class="controls">
                    <input id="contract_detail" type="file" name="contract_detail" />
                    <span class="help-block" id="error_contract_detail"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contract Price</label>
                  <div class="controls">
                    <input id="contract_price" type="text" name="contract_price" value="{{old('contract_price')}}" class="span3"/> VND
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contract VAT</label>
                  <div class="controls">
                    <input id="contract_vat" type="text" name="contract_vat" value="{{old('contract_vat')}}" class="span1"/> %
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Bill received date</label>
                  <div class="controls">
                    <div  data-date="{{old('bill_received_date')}}" class="input-append date datepicker">
                    <input type="text" value="{{old('bill_received_date')}}"  data-date-format="mm-dd-yyyy" class="span11" name="bill_received_date" id="bill_received_date">
                    <span class="add-on"><i class="icon-th"></i></span> </div>                     
                    
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Bill date</label>
                  <div class="controls">
                    <div  data-date="{{old('bill_date')}}" class="input-append date datepicker">
                    <input type="text" value="{{old('bill_date')}}"  data-date-format="mm-dd-yyyy" class="span11"  name="bill_date" id="bill_date">
                    <span class="add-on"><i class="icon-th"></i></span> </div>            
                    
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Bill NO</label>
                  <div class="controls">
                    <input id="bill_no" type="text" name="bill_no" value="{{old('bill_no')}}" class="span3"/>
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
  if($("#contract_term_from").val().replace(/ /g, "") && $("#contract_term_to").val().replace(/ /g, "")){
      var start_date  = $("#contract_term_from").val(); 
      var end_date    = $("#contract_term_to").val();
      if(new Date(start_date) >= new Date(end_date))
      {
         $("#error_mess").html('<?php echo $error['error_contract_term'];?>');
         $("#div_error").css('display','block');
         flag = false;            
      }
  }
  if ($("#contract_detail_real").val().replace(/ /g, "")) {
     if(!validate($("#contract_detail_real").val())){          
        $("#error_mess").html('<?php echo $error['error_contract_detail_real_mimes'];?>');
        $("#div_error").css('display','block');
        flag = false; 
     } 
  } 
  if ($("#contract_detail").val().replace(/ /g, "")) {
     if(!validate($("#contract_detail").val())){          
        $("#error_mess").html('<?php echo $error['error_contract_detail_mimes'];?>');
        $("#div_error").css('display','block');
        flag = false; 
     } 
  } 

  if(flag) $( "#frmRegist" ).submit(); 
}); 
 
function validate(fileupload){  
  var reg = /(.*?)\.(doc|pdf|docx)$/;
  if(!fileupload.match(reg))       return false;
  else return true;
}
</script>   
@endsection