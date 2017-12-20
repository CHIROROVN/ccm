@extends('backend.layouts.app')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('backend.company.index') }}">Companies</a> <span class="current">&nbsp;&nbsp;Edit Company</span> </div>
    <!--<h1>New Company</h1>-->
</div>
<div class="container-fluid"><hr>
  <div class="row-fluid">
    <div class="span12">
       <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Edit Company</h5>
          </div>
           <div class="widget-content nopadding">
              <div class="alert alert-error alert-block" @if ($errors->first('company_name')) style="display:block" @else style="display:none" @endif id="div_error"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Error!</h4>
                <p id="error_mess">@if ($errors->first('company_name')) ※{!! $errors->first('company_name') !!} @endif</p>               
              </div>
            {!! Form::open(array('url' => route('backend.company.edit',$company->company_id),'id'=>'frmEdit', 'method' => 'post','class'=>'form-horizontal')) !!}            
              <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">Company name <span class="required">※</span></label>
                  <div class="controls">
                    <input id="company_name" type="text" name="company_name" value="{{$company->company_name}}" class="span6"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Company Address</label>
                  <div class="controls">
                    <input id="company_address" type="text" name="company_address" value="{{$company->company_address}}" class="span6"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Company MST</label>
                  <div class="controls">
                    <input id="company_mst" type="text" name="company_mst" value="{{$company->company_mst}}" class="span6"/>
                  </div>
                </div>
               
              </div>
              <div class="form-actions">                
                <button type="button" class="btn btn-success" id="btnSubmit"><i class="icon-save"></i> Save</button>
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
  if (!$("#company_name").val().replace(/ /g, "")) {
    $("#error_mess").html('<?php echo $error['error_company_name_required'];?>');                     
    $("#div_error").css('display','block');   
    $('#company_name').focus();
      flag = false;
  }  
  if(flag) $( "#frmEdit" ).submit(); 
}); 
</script>   
@endsection