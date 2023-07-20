@extends('layouts.web')

@section('content')



    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">{{ $category->name ?? 'Latest Products'}}</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <form action="" method="get">
                    <!-- Price Start -->
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                    <div class="bg-light p-4 mb-30">
                        <input type="number" name="minPrice" value="{{ request()->minPrice }}">
                        <label>Min Price</label>
                    </div>
                    <div class="bg-light p-4 mb-30">
                        <input type="number" name="maxPrice"  value="{{request()->maxPrice  }}">
                        <label>Max Price</label>
                    </div>
                    <!-- Price End -->
                
                    @foreach ($attributes as $attribute)
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by {{ $attribute->name }}</span></h5>
                        <div class="bg-light p-4 mb-30">                        
                                @foreach ($attribute->variants as $variant)
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" @isset(request()->variant_id) @if(in_array($variant->id, request()->variant_id)) checked @endif @endisset value="{{ $variant->id }}" name="variant_id[]" class="custom-control-input" id="{{ $attribute->name }}-{{ $loop->iteration }}">
                                        <label class="custom-control-label" for="{{ $attribute->name }}-{{ $loop->iteration }}">{{ $variant->name }}</label>
                                        <span class="badge border font-weight-normal">150</span>
                                    </div>
                                @endforeach                           
                        </div>
                    @endforeach
                    <input type="submit" name="filter" class="btn btn-primary" value="Filter">
                </form>
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    @foreach ($products as $product)                        
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100 h-avto " src="/img/{{ $product->image }}" alt="">
                                <div class="product-action">
                                    <form action="{{ route('product.add.cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <button type="submit" class="btn btn-outline-dark btn-square"><i class="fa fa-shopping-cart"></i></button>
                                    </form>                                    
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{ $product->price * (1-$product->discount/100) }}</h5><h6 class="text-muted ml-2"><del>{{ $product->price }}</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    @endforeach
                    <div class="col-12">
                        <nav>
                          <ul class="pagination justify-content-center">
                            {{ $products->links() }}
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

@endsection