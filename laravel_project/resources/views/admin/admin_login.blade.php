<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Admin Login</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- CSS -->
            <link rel="stylesheet" href="{{ asset('assets/css/backend_css/bootstrap.min.css') }}"/>
            <link rel="stylesheet" href="{{ asset('assets/css/backend_css/bootstrap-responsive.min.css') }}"/>
            <link rel="stylesheet" href="{{ asset('assets/css/backend_css/login_admin.css') }}"/>
            <link href="{{ asset('assets/fonts/backend_fonts/css/font-awesome.css') }}" rel="stylesheet"/>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'/>
        <!-- End-CSS -->

    </head>
    <body>
        <div id="loginbox">    
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Autentificare nereușită!</strong> <br/> {!! session('flash_message_error') !!}
                </div>   
            @endif    
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Acțiune reușită!</strong> <br/> {!! session('flash_message_error') !!}
                </div>   
            @endif     
            @if(Session::has('flash_message_restrict'))
                <div class="alert alert-error alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Acces interzis!</strong> <br/> {!! session('flash_message_restrict') !!}
                </div>   
            @endif 
            <form id="loginform" class="" method="post" action="{{ url('/admin') }}"> 
                {{ csrf_field() }}
				 <div class="control-group normal_text"><h3>Admin login</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="email" name="email" placeholder="Username"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password"/>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Login"/></span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address"/>
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info">Reecover</a></span>
                </div>
            </form>
        </div>

        <!-- Scripts -->
            <script src="{{ asset('assets/js/backend_js/jquery.min.js') }}"></script>  
            <script src="{{ asset('assets/js/backend_js/login_admin.js') }}"></script> 
            <script src="{{ asset('assets/js/backend_js/bootstrap.min.js') }}"></script>
            <script type='text/javascript'>
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                }, 4000);
            </script>
        <!-- End-Scripts -->
    </body>

</html>
