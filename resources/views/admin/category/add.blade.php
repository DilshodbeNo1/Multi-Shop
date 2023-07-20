@extends('layouts.admin')

@section('content')
<div class="card">
    <form action="{{ route('admin.category.create') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
       @csrf
       @method('put')
        <div class="card-header">
        <h4>Information Add to the Category</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Parent_ID</label>
          <div class="col-sm-9">
            <select class="form-control" name="parent_id">
              <option value="">Parent</option>
              @foreach ($parentCategories as $parent)
                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" name="name" class="form-control" required="">
              <div class="invalid-feedback">
                What's your name?
              </div>
            </div>
        </div>
        <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">Image</label>
            <br>
            <div class="col-sm-9">
                <input type="file" name="image" required="" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
                <div class="invalid-feedback">
                  Please choose a file?
                </div>
              </div>
        </div>
      </div>
      <div class="card-footer text-right">
        <button class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection