@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="{{ url('/admin/settings') }}" class="current">Settings</a> 
        </div>
        <h1>Form validation</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Update Password</h5>
                        </div>
                        <div class="widget-content nopadding">
                        @if(Session::has('flash_message_error'))
                            <div class="alert alert-error alert-block" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Acțiune nereușită!</strong> <br/> {!! session('flash_message_error') !!}
                            </div>   
                        @endif    
                        @if(Session::has('flash_message_success'))
                            <div class="alert alert-success alert-block" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Acțiune reușită!</strong> <br/> {!! session('flash_message_error') !!}
                            </div>   
                        @endif   
                            <form class="form-horizontal" method="post" action="{{ url('admin/update_pwd') }}" name="password_validate" id="password_validate" novalidate="novalidate">
                                {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Current Password</label>
                                    <div class="controls">
                                        <input type="password" name="current_pwd" id="current_pwd" />
                                        <span id="check_pwd"></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">New Password</label>
                                    <div class="controls">
                                        <input type="password" name="new_pwd" id="new_pwd" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Confirm password</label>
                                    <div class="controls">
                                        <input type="password" name="confirm_pwd" id="confirm_pwd" />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Update Password" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<!-- Scripts -->
    <script type='text/javascript'>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    </script>
<!-- End-Scripts -->

@endsection