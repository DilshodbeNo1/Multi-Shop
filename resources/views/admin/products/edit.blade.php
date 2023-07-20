@extends('layouts.admin')

@section('content')
<div class="card">
    <form action="{{ route('admin.products.update', $info->id ) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
       @csrf
       @method('put')
        <div class="card-header">
        <h4>Information Edit from Products</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Category</label>
          <div class="col-sm-9">
            <select class="form-control" name="category_id">
              @foreach ($category as $c)
                <option
                  @if($info->category_id==$c->id ) selected  @endif
                  value="{{ $c->id }}">{{ $c->name }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Name</label>
          <div class="col-sm-9">
            <input type="text" name="name" value="{{ $info->name }}" class="form-control" required="">
            <div class="invalid-feedback">
              What's your name?
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Description</label>
          <div class="col-sm-9">
            <textarea name="description"class="form-control" required="" cols="30" rows="10">{{ $info->description }}" </textarea>
            <div class="invalid-feedback">
              Write about description?
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Price</label>
          <div class="col-sm-9">
            <input type="text" name="price"  value="{{ $info->price }}"  class="form-control" required="">
            <div class="invalid-feedback">
              What's it cost?
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Discount</label>
          <div class="col-sm-9">
            <input type="text" name="discount"  value="{{ $info->discount }}"  class="form-control" required="">
            <div class="invalid-feedback">
              What's your name?
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Quantity</label>
          <div class="col-sm-9">
            <input type="number" name="quantity"  value="{{ $info->quantity }}"  class="form-control" required="">
            <div class="invalid-feedback">
              How many is it?
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Body</label>
          <div class="col-sm-9">
            <input type="text" name="body"  value="{{  $info->body  }}"  class="form-control" required="">
            <div class="invalid-feedback">
              Write about it?
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