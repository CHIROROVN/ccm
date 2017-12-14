<!DOCTYPE html>
<html lang="en">    
<head>
    <title>Chiroro-Net Viet Co., Ltd</title><meta charset="UTF-8" />
    <link rel="icon" href="{{ asset('') }}public/favicon/favicon.png" type="image/gif" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="{{ asset('') }}public/backend/css/bootstrap.min.css" />
	<link rel="stylesheet" href="{{ asset('') }}public/backend/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}public/backend/css/matrix-login.css" />
    <link href="{{ asset('') }}public/backend/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
    <body>

        <div id="loginbox">
            <div class="flash-messages">
                @if($message = Session::get('danger'))

                    <div id="error" class="message">
                        <a id="close" title="Message"  href="javascript:void(0);" onClick="document.getElementById('error').setAttribute('style','display: none;');">&times;</a>
                        <span>{{$message}}</span>
                    </div>

                @elseif($message = Session::get('success'))

                    <div id="success" class="message">
                        <a id="close" title="Message"  href="javascript:void(0);" onClick="document.getElementById('success').setAttribute('style','display: none;');">&times;</a>
                        <span>{{$message}}</span>
                    </div>

                @endif  
            </div>

            {!! Form::open(array('route' => ['backend.users.login'], 'class' => 'form-vertical', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}
				 <div class="control-group normal_text"> <h3>
                    <img src="{{ asset('') }}public/backend/img/logo.png" alt="" /></h3></div>

                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="u_login" placeholder="Username" />
                            @if ($errors->first('u_login'))
                              <div class="error-text">{{$errors->first('u_login')}}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="u_passwd" placeholder="Password" />
                            @if ($errors->first('u_passwd'))
                              <div class="error-text">{{$errors->first('u_passwd')}}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="controls">
                    <div class="control-group normal_text">
                        <button type="submit" class="btn btn-success btn-md">&nbsp;&nbsp;&nbsp;&nbsp; Login &nbsp;&nbsp;&nbsp;&nbsp;</button>
                    </div>
                </div>
                </div>
            {!! Form::close() !!}

        </div>
        
        <script src="{{ asset('') }}public/backend/js/jquery.min.js"></script>  
        <script src="{{ asset('') }}public/backend/js/matrix.login.js"></script> 
    </body>

</html>
