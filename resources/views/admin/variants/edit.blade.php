@extends('layouts.admin')

@section('content')
<div class="card">
    <form action="{{ route('admin.variants.update', $infos->id ) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
       @csrf
       @method('put')
        <div class="card-header">
        <h4>Information Edit from Attribute</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Attribute ID</label>
            <div class="col-sm-9">
              <select class="form-control" name="attribute_id">
                @foreach ($attribute as $a)
                  <option
                    @if($infos->attribute_id==$a->id ) selected  @endif
                    value="{{ $a->id }}">{{ $a->name }}
                  </option>
                @endforeach
              </select>
            </div>               
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label"> Name</label>
          <div class="col-sm-9">
            <input type="text" name="name" value="{{ $infos->name }}" class="form-control" required="">
            <div class="invalid-feedback">
              What's your name?
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