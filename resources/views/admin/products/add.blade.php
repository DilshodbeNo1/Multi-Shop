@extends('layouts.admin')

@section('content')
<div class="card">
    <form action="{{ route('admin.products.create') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
       @csrf
       @method('put')
        <div class="card-header">
        <h4>Information Add to the Products</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Category_ID</label>
          <div class="col-sm-9">
            <select name="category_id" class="form-control" required="">
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">
              Please choose Category
            </div>
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
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Description</label>
          <div class="col-sm-9">
            <textarea name="description" class="form-control" required="" cols="30" rows="10"></textarea>
            <div class="invalid-feedback">
              Write about description?
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Price</label>
          <div class="col-sm-9">
            <input type="text" name="price" class="form-control" required="">
            <div class="invalid-feedback">
              What's it cost?
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Discount</label>
          <div class="col-sm-9">
            <input type="text" name="discount" class="form-control" required="">
            <div class="invalid-feedback">
              What's your name?
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Quantity</label>
          <div class="col-sm-9">
            <input type="number" name="quantity" class="form-control" required="">
            <div class="invalid-feedback">
              How many is it?
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Body</label>
          <div class="col-sm-9">
            <input type="text" name="body" class="form-control" required="">
            <div class="invalid-feedback">
              Write about it?
            </div>
          </div>
        </div>
        <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">Image</label>
            <br>
            <div class="col-sm-9">
                <input type="file" name="image" required="" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div><br>
        <div class="form-group">
          <h2>Attributes</h2>
          @foreach ($attribute as $a)
              <div class="row">
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="">{{ $loop->iteration }}. {{ $a->name }}</label>
                    <input type="checkbox" name="attribute_id[]" value="{{ $a->id }}" > 
                  </div>
                </div>
                <div class="col-lg-9" style="display: flex;">
                  @foreach ($a->variants as $v)
                  <div class="" style="margin-right:50px">
                    <input type="checkbox" name="variant_id[]" value="{{ $v->id }}" >
                    <label class="">{{ $v->name }}</label>
                  </div>
                  @endforeach
                </div>
              </div>
          @endforeach
        </div>    
        <div class="form-group mb-0 row">
          <label class="col-sm-3 col-form-label">Other Images</label>
          <br>
          <div class="col-sm-9">
              <input type="file" name="images[]"  class="custom-file-input" multiple id="customFile">
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