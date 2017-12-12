@extends('backend.layouts.app')
@section('content')
<div id="content-header">
  <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('backend.company.index') }}">Companies List</a> <a href="#" class="current">New Company</a> </div>
    <h1>New Company</h1>
</div>
<div class="container-fluid"><hr>
  <div class="row-fluid">
    <div class="span12">
       <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Form wizard &amp; validation</h5>
          </div>
        </div>  
    </div>
  </div>    
</div>
@endsection