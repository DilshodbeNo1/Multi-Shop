@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
      <h4>Category</h4><hr>
      <a href="{{ route('admin.category.add') }}" class="btn btn-info">Information Add</a>
    </div>
    <div class="card-body">
      <div class="section-title">Dark Table</div>
      <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <tr>
              <th>ID</th>
              <th>Parent_id</th>
              <th>Name</th>
              <th>Image</th>
              <th>Slug</th>
              <th scope="col">Functions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($category as $c)
          <tr>
            <th scope="row">{{ $c->id }}</th>
            <th>{{ $c->parent->name ?? 'Parent' }}</th>
            <td>{{ $c->name }}</td>
            <td><img src="/img/{{ $c->image }}" width="150" alt=""></td>
            <td>{{ $c->slug }}</td>   
            <th>
                <br><hr><a align="center" href="{{ route('admin.category.edit', $c->id )}}" class="btn btn-info">Edit</a>
                <br><hr>  <form action="{{ route('admin.category.destroy', $c->id )}}" method="POST">
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
      {{ $category->links() }}
    </div>
  </div>

@endsection