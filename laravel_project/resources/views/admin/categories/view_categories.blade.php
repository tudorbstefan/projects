@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend_css/view.css') }}"/>
<!-- End-CSS -->

<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> 
        <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Acasă</a> 
        <a href="{{ url('/admin/view_category') }}" class="current">Vizualizare categorii</a> 
    </div>    
  <h1>Vizualizare categorii</h1>
  </div>
  <div class="container-fluid">
    <hr>
    @if(Session::has('flash_message_success_edit'))
        <div class="alert alert-success alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Acțiune reușită!</strong> {!! session('flash_message_success_edit') !!}
        </div>   
    @endif  
    @if(Session::has('flash_message_success_delete'))
        <div class="alert alert-success alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Acțiune reușită!</strong> {!! session('flash_message_success_delete') !!}
        </div>   
    @endif 
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Vizualizare categorii</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID categorie</th>
                  <th>Nume categorie</th>
                  <th>Părinte categorie</th>
                  <th>URL categorie</th>
                  <th>Acțiuni</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr class="gradeX">
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->parent_id }}</td>
                  <td>{{ $category->url }}</td>
                  <td class="edit-delete">
                    <a href="{{ url('/admin/edit_category/'.$category->id) }}" class="btn btn-primary btn-mini center">Modifică</a>
                    <a id="deleteButton" href="{{ url('/admin/delete_category/'.$category->id) }}" class="btn btn-danger btn-mini">Șterge</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
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