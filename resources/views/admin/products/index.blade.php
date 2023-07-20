@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
      <h3>Products</h3><hr>
      <a href="{{ route('admin.products.add') }}" class="btn btn-info">Information Add</a>
    </div>
    <div class="card-body">
      <div class="section-title">Dark Table</div>
      <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Functions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($info as $i)
          <tr>
            <th scope="row">{{ $i->id }}</th>
            <td>{{ $i->name }}</td>
            <th>
                <br><hr><a align="center" href="{{ route('admin.products.view', $i->id) }}" class="btn btn-success">View</a>
                <br><hr><a align="center" href="{{ route('admin.products.edit', $i->id )}}" class="btn btn-info">Edit</a><br><hr>  
                <form action="{{ route('admin.products.destroy', $i->id )}}" method="POST">
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
      {{ $info->links() }}
    </div>
  </div>

@endsection