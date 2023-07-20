@extends('layouts.admin')

@section('content')
<div class="card">
    <form action="{{ route('admin.product_images.update', $infos->id ) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
       @csrf
       @method('put')
        <div class="card-header">
        <h4>Information Edit from Product Images</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Product ID</label>
          <div class="col-sm-9">
            <input type="number" name="product_id" value="{{ $infos->product_id }}" class="form-control" required="">
            <div class="invalid-feedback">
              Please choose Parent_ID
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