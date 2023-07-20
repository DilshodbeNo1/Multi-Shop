@extends('layouts.admin')

@section('content')
<div class="card">
    <form action="{{ route('admin.category.update', $category->id ) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
       @csrf
       @method('put')
        <div class="card-header">
        <h4>Information Edit from Category</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Parent_ID</label>
          <div class="col-sm-9">
            <select class="form-control" name="parent_id">
              <option value="">Parent</option>
              @foreach ($parent as $p)
                <option
                  @if($category->parent_id==$p->id ) selected  @endif
                 value="{{ $p->id }}">{{ $p->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" name="name" value="{{ $category->name }}" class="form-control" required="">
              <div class="invalid-feedback">
                What's your name?
              </div>
            </div>
        </div>
        <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">Image</label>
            <br>
            <div class="col-sm-9">
                <input type="file" name="image" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
      </div>
      <div class="card-footer text-right">
        <button class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection