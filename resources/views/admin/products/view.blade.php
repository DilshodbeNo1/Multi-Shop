@extends('layouts.admin')

@section('content')

<h2 align="center">
    Product Information in {{ $info->id }}-ID   
</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Quantity</th>
            <th>Body</th>
            <th>Slug</th>
            <th>Image</th>     
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>{{ $info->id }}</th>
            <td>{{ $info->category->name }}</td>
            <th>{{ $info->name }}</th>
            <th>{{ $info->description }}</th>
            <th>{{ $info->price }}</th>
            <th>{{ $info->discount }}</th>
            <th>{{ $info->quantity }}</th>
            <th>{{ $info->body }}</th>
            <th>{{ $info->slug }}</th>
            <td><img src="/img/{{ $info->image }}" width="75" alt=""></td>          
        </tr>
    </tbody>
</table>
@endsection