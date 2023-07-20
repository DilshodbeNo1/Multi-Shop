@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
      <h4>Product Variants</h4><hr>
      <a href="{{ route('admin.product_variants.add') }}" class="btn btn-info">Information Add</a>
    </div>
    <div class="card-body">
      <div class="section-title">Dark Table</div>
      <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Product ID</th>
            <th scope="col">Variant Id</th>
            <th scope="col">Functions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($infos as $i)
          <tr>
            <th scope="row">{{ $i->id }}</th>
            <td>{{ $i->products->name }}</td>
            <td>{{ $i->variants->name }}</td>
            <th>
                <br><hr><a align="center" href="{{ route('admin.product_variants.edit', $i->id )}}" class="btn btn-info">Edit</a>
                <br><hr> 
                <form action="{{ route('admin.product_variants.destroy', $i->id )}}" method="POST">
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