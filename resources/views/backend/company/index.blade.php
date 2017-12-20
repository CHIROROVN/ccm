@extends('backend.layouts.app')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('backend.dashboard.index')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <span class="current">&nbsp;&nbsp;Companies </span>  </div>
   <!-- <h1>Companies</h1>-->
    <h1><span style="float: right;padding-right:50px "><button class="btn btn-primary" onClick="location.href='{{ route('backend.company.regist') }}'"><i class="icon-plus"></i> Add New Company</button></span></h1>
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
          <div class="widget-title">
             <span class="icon"> <i class="icon-th"></i> </span>
           <!-- <span class="icon"> -->
            <!-- <input type="checkbox" id="title-checkbox" name="title-checkbox" /> -->
            <!-- </span> -->
            <h5>Companies list</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
<<<<<<< HEAD
                  <th><i class="icon-resize-vertical"></i></th>
                  <th>Company name</th>
                  <th>Address</th>
                  <th>MST</th>
                  <th>Contact list</th>
                  <th>Contract list</th>
                  <th></th>
=======
                  <th class="width-col5S">Delete</i></th>
                  <th class="width-col-min13">Company name</th>
                  <th class="width-col-min13">Address</th>
                  <th class="width-col8">MST</th>
                  <th class="width-col8S">Contact list</th>
                  <th class="width-col7S">Meeting list</th>
                  <th class="width-col10">Actions</th>
>>>>>>> d341a75a3ff75d1ba217240c80421850ec4d77c1
                </tr>
              </thead>
              <tbody>
                @if(empty($companies) || count($companies) < 1)
                <tr><td colspan="5"><h3 align="center">該当するデータがありません。</h3></td>               
                </tr>
                @else  
                  @foreach($companies as $company) 
                <tr>
                  <td><button type="button" class="btn btn-mini btn-danger" onclick="btnDelete('{{$company->company_id}}');"><i class="icon-trash"></i> Delete</button></td>
                  <td>{{$company->company_name}}</td>
                  <td>{{$company->company_address}}</td>
                  <td>{{$company->company_mst}}</td>
                  <td> <button type="button" class="btn btn-mini btn-info" onclick="location.href='{{route('backend.company.detail', $company->company_id)}}'"><i class="icon-phone"></i> Contacts list</button></td>
                  <td> <button type="button" class="btn btn-mini btn-info" onclick="location.href='{{route('backend.company.detail', $company->company_id)}}'"><i class="icon-group"></i> Contract list</button></td>
                  <td class="center"> 
                    <button type="button" class="btn btn-mini btn-info" onclick="location.href='{{route('backend.company.detail', $company->company_id)}}'"><i class="icon-eye-open"></i> View</button>
                    <button type="button" class="btn btn-mini btn-warning" onclick="location.href='{{ route('backend.company.edit', $company->company_id) }}'"><i class="icon-pencil"></i> Edit</button>
                  </td>
                </tr>
                @endforeach  
                @endif  
              </tbody>
            </table>
          </div>
        </div>
        {{ $companies->links() }}
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
    
    location.href='{{ asset('manage/company/delete/') }}'+'/'+ id ;
});
</script>  
  @endsection