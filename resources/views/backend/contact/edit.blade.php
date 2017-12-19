@extends('backend.layouts.app')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('backend.contact.index') }}">Contacts List</a> <a href="#" class="current">Edit Contact</a> </div>
    <!--<h1>New contact</h1>-->
</div>
<div class="container-fluid"><hr>
  <div class="row-fluid">
    <div class="span12">
       <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Edit Contact</h5>
          </div>
           <div class="widget-content nopadding">
              <div class="alert alert-error alert-block" @if ($errors->first('contact_name')) style="display:block" @else style="display:none" @endif id="div_error"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Error!</h4>
                <p id="error_mess">@if ($errors->first('contact_name')) ※{!! $errors->first('contact_name') !!} @endif
                                  @if ($errors->first('contact_email')) <br>※{!! $errors->first('contact_email') !!} @endif
                </p>               
              </div>
            {!! Form::open(array('url' => route('backend.contact.edit',$contact->contact_id),'id'=>'frmEdit', 'method' => 'post','class'=>'form-horizontal')) !!}            
              <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">Contact name</label>
                  <div class="controls">
                    <input id="contact_name" type="text" name="contact_name" value="{{$contact->contact_name}}" class="span6"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Company name</label>
                  <div class="controls">
                    <select id="company_id" name="company_id" class="span6">
                     @foreach($companies as $key=>$company)
                    <option value="{{$company->company_id}}" @if($company->company_id == $contact->company_id) selected @endif>{{$company->company_name}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contact Email</label>
                  <div class="controls">
                    <input id="contact_address" type="text" name="contact_email" value="{{$contact->contact_email}}" class="span6"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contact tel</label>
                  <div class="controls">
                    <input id="contact_tel" type="text" name="contact_tel" value="{{$contact->contact_tel}}" class="span6"/>
                  </div>
                </div>
               <div class="control-group">
                  <label class="control-label">Contact title</label>
                  <div class="controls">
                    <input id="contact_title" type="text" name="contact_title" value="{{$contact->contact_title}}" class="span6"/>
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
  $error ='';
  if (!$("#contact_name").val().replace(/ /g, "")) {
    $error = '<?php echo $error['error_contact_name_required'];?>';                        
    $("#div_error").css('display','block');   
    $('#contact_name').focus();
    flag = false;
  }  
  if (!$("#contact_email").val().replace(/ /g, "")) {
    $error = $error + '<br><?php echo $error['error_contact_email_required'];?>';                      
    $("#div_error").css('display','block');   
    $('#contact_email').focus();
    flag = false;
  }else{
      var sEmail = $('#contact_email').val();
      if (!validateEmail(sEmail)) {
        $error = $error + '<br><?php echo $error['error_contact_email_invalid'];?>';                             
        $("#div_error").css('display','block');   
        $('#contact_email').focus();
        flag = false;
      }
  }
  if(flag) $( "#frmEdit" ).submit(); 
  else   
    $("#error_mess").html($error);
  
}); 
function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}
</script>   
@endsection