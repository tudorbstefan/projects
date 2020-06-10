@extends('layouts.adminLayout.admin_design')
@section('content')

    <style>
        .select2-choice {
            width: 209px;
        }
    </style>    

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
        <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Acasă</a> 
        <a href="{{ url('/admin/add_category') }}" class="current">Adăugare categorie</a> 
    </div>  
    <h1>Adăugare categorie</h1>
  </div>
  <div class="container-fluid">
    <hr>
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Acțiune reușită!</strong> {!! session('flash_message_success') !!}
        </div>   
    @endif  
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Adăugare categorie</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/add_category') }}" name="add_category" id="add_category" novalidate="novalidate">
              {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Nume</label>
                <div class="controls">
                  <input type="text" name="category_name" id="category_name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Părinte</label>
                <div class="controls">
                    <select name="category_parent" id="category_parent">
                        <option value="0">Categoria părinte</option>
                        @foreach($levels as $val)
                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Descriere</label>
                <div class="controls">
                  <textarea name="category_description" id="category_description"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">URL</label>
                <div class="controls">
                  <input type="text" name="category_url" id="category_url">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Category" class="btn btn-success">
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