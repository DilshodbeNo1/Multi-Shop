@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
      <h4>Product Images</h4><hr>
      <a href="{{ route('admin.product_images.add') }}" class="btn btn-info">Information Add</a>
    </div>
    <div class="card-body">
      <div class="section-title">Dark Table</div>
      <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <tr>
              <th>ID</th>
              <th>Product_id</th>
              <th>Image</th>
              <th scope="col">Functions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($infos as $i)
          <tr>
            <th scope="row">{{ $i->id }}</th>
            <th>{{ $i->product->name}}</th>
            <td><img src="/img/{{ $i->image }}" width="150" alt=""></td>  
            <th>
                <br><hr><a align="center" href="{{ route('admin.product_images.edit', $i->id )}}" class="btn btn-info">Edit</a>
                <br><hr>  <form action="{{ route('admin.product_images.destroy', $i->id )}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete">
                          </form> 
                <br><hr>
            </th>
          </tr>             
          @endforeach
        </tbody>
      </table>
      {{ $infos->links() }}
    </div>
  </div>

@endsection