@extends('backend.layouts.app')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Contacts</a> </div>
   <!-- <h1>Companies</h1>-->
    <h1><span style="float: right;padding-right:50px "><button class="btn btn-primary" onClick="location.href='{{ route('backend.contact.regist') }}'">新規登録</button></span></h1>
  </div>
  <div class="container-fluid">
    <div class="flash-messages">
      @if($message = Session::get('danger'))
        <div id="error" class="message">
          <a id="close" title="Message"  href="#" onClick="document.getElementById('error').setAttribute('style','display: none;');">&times;</a>
            <span>{{$message}}</span>
        </div>
        @elseif($message = Session::get('success'))
        <div id="success" class="message">
          <a id="close" title="Message"  href="javascript::void(0);" onClick="document.getElementById('success').setAttribute('style','display: none;');">&times;</a>
            <span>{{$message}}</span>
        </div>
        @endif  
    </div> 
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon">
            <input type="checkbox" id="title-checkbox" name="title-checkbox" />
            </span>
            <h5>Contacts list</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                  <th>Contact name</th>
                  <th>Company name</th>
                  <th>Contact email</th>
                  <th>Contact Tel</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @if(empty($contacts) || count($contacts) < 1)
                <tr><td colspan="5"><h3 align="center">該当するデータがありません。</h3></td>               
                </tr>
                @else  
                  @foreach($contacts as $contact) 
                <tr>
                  <td><input name="btnDelete" id="btnDelete" value="削除" type="button" class="btn btn-primary btn-xs" onclick="btnDelete('{{$contact->contact_id}}');"></td>
                  <td>{{$contact->contact_name}}</td>
                  <td>{{$contact->contact_email}}</td>
                  <td>{{$contact->contact_email}}</td>
                  <td>{{$contact->contact_tel}}</td>
                  <td class="center"> <input onclick="location.href='{{ route('backend.contact.edit', $contact->contact_id) }}'" value="編集" type="button" class="btn btn-primary btn-xs"></td>
                </tr>
                @endforeach  
                @endif  
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- start: Delete Coupon Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="myModalLabel">Warning!</h3>
            </div>
            <div class="modal-body">
                <h4>Are you sure you want to DELETE?</h4>

            </div>
            <!--/modal-body-collapse -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnDelteYes" href="#">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
            <!--/modal-footer-collapse -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
  $('#btnDelete').on('click', function (e) {    
    var id = $(this).closest('tr').data('id');
    $('#myModal').data('id', id).modal('show');
});
function btnDelete($id)
 {
      var id = $id;
    $('#myModal').data('id', id).modal('show');
 } 
$('#btnDelteYes').click(function () {
    var id = $('#myModal').data('id');   
    
    location.href='{{ asset('manage/contact/delete/') }}'+'/'+ id ;
});
</script>  
  @endsection