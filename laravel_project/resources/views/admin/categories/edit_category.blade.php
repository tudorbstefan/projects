@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Acasă</a> 
      <a href="#" class="current">Modifică categoria</a> 
    </div>    
  <h1>Edit Category</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Category <em>{{ $categoryDetails -> id }}, {{ $categoryDetails -> name }}</em></h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/edit_category/'.$categoryDetails->id) }}" name="edit_category" id="edit_category" novalidate="novalidate">
              {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Nume</label>
                <div class="controls">
                  <input type="text" name="category_name" id="category_name" value="{{ $categoryDetails -> name }}">
                </div>
              </div>
              <div class="control-group">
              <label class="control-label">Părinte</label>
                <div class="controls">
                  <select name="category_parent" id="category_parent">
                        <option value="0">Categoria părinte</option>
                        @foreach($levels as $val)
                            <option value="{{ $val->id }}" @if($val->id == $categoryDetails->parent_id)
                              selected @endif>{{ $val->name }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Descriere</label>
                <div class="controls">
                  <textarea name="category_description" id="category_description">{{ $categoryDetails -> description }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">URL</label>
                <div class="controls">
                  <input type="text" name="category_url" id="category_url" value="{{ $categoryDetails -> url }}">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Save edit" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection