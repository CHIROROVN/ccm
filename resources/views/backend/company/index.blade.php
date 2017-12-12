@extends('backend.layouts.app')
@section('content')
<div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Company</a> </div>
    <h1>Companies</h1>
    <span style="float: right;padding-right:50px "><button class="btn btn-primary" onClick="location.href='{{ route('backend.company.regist') }}'">新規登録</button></span>
</div>  
<div class="container-fluid">
  <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Companies List </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Company name</th>
                  <th>Address</th>
                  <th>MST</th>                  
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @if(empty($companies) || count($companies) < 1)
                <tr><td colspan="5"><h3 align="center">該当するデータがありません。</h3></td>               
                </tr>
                @else  
                  @foreach($companies as $company)  
                    <tr class="odd gradeX">
                      <td><input name="btnDelete" id="btnDelete" value="削除" type="button" class="btn btn-primary btn-xs" onclick="btnDelete('{{$company->company_id}}');"></td>
                      <td>{{$company->company_name}}</td>
                      <td>{{$company->company_address}}</td>
                      <td class="center"> {{$company->company_mst}}</td>
                      <td class="center"><input onclick="location.href='{{ route('backend.company.edit', $company->company_id) }}'" value="編集" type="button" class="btn btn-primary btn-xs"></td>
                    </tr> 
                  @endforeach  
                @endif                
              </tbody>
            </table>
          </div>
        </div>
    </div>    
</div>
  @endsection