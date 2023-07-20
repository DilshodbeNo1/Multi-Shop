@extends('layouts.admin')

@section('content')
<div class="card">
    <form action="{{ route('admin.product_variants.update', $infos->id ) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
       @csrf
       @method('put')
        <div class="card-header">
        <h4>Information Edit from Product Variants</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Product ID</label>
            <div class="col-sm-9">
              <select class="form-control" name="product_id">
                @foreach ($product as $p)
                  <option
                    @if($infos->product_id==$p->id ) selected  @endif
                    value="{{ $p->id }}">{{ $p->name }}
                  </option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Variant ID</label>
          <div class="col-sm-9">
            <select class="form-control" name="variant_id">
              @foreach ($variant as $v)
                <option
                  @if($infos->variant_id==$v->id ) selected  @endif
                  value="{{ $v->id }}">{{ $v->name }}
                </option>
              @endforeach
            </select>
          </div>
      </div>
      </div>
      <div class="card-footer text-right">
        <button class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection