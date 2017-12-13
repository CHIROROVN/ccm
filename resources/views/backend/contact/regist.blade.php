@extends('backend.layouts.app')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('backend.contact.index') }}">Contacts List</a> <a href="#" class="current">New Contact</a> </div>
    <!--<h1>New Company</h1>-->
</div>
<div class="container-fluid"><hr>
  <div class="row-fluid">
    <div class="span12">
       <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>New Company</h5>
          </div>
           <div class="widget-content nopadding">
              <div class="alert alert-error alert-block" style="display:none" id="div_erro"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Error!</h4>
                <p id="error_mess">@if ($errors->first('company_name')) ※{!! $errors->first('company_name') !!} @endif</p>               
              </div>
            {!! Form::open(array('url' => route('backend.contact.regist'),'id'=>'frmRegist', 'method' => 'post','class'=>'form-horizontal')) !!}            
              <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">Contact name</label>
                  <div class="controls">
                    <input id="contact_name" type="text" name="contact_name" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Company name</label>
                  <div class="controls">
                    <select id="company_id" name="company_id">
                     
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contact email</label>
                  <div class="controls">
                    <input id="contact_email" type="text" name="contact_email" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contact tel</label>
                  <div class="controls">
                    <input id="contact_tel" type="text" name="contact_tel" />
                  </div>
                </div>
               <div class="control-group">
                  <label class="control-label">Contact title</label>
                  <div class="controls">
                    <input id="contact_title" type="text" name="contact_title" />
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
  if (!$("#company_name").val().replace(/ /g, "")) {
      flag = false;
  }  
  if(flag) $( "#frmRegist" ).submit(); 
}); 
</script>   
@endsection