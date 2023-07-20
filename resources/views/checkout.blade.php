@extends('layouts.web')

@section('content')



    <!-- Checkout Start -->
    <div class="container-fluid">
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Region</label>
                            <input class="form-control" type="text" name="region" placeholder="Andjan">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="addres" placeholder="Example Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" name="phone" placeholder="+123 456 789">
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        @foreach (Cart::getContent() as $item)
                            <div class="d-flex justify-content-between">
                                <p>{{ $item->name }}</p>
                                <p>${{ $item->GetPriceSum() }}</p>
                            </div>
                            <input type="hidden" name="product_id[]" value="{{ $item->id }}">
                            <input type="hidden" name="quantity[]" value="{{ $item->quantity }}">
                            <input type="hidden" name="amount[]" value="{{ $item->GetPriceSum() }}">
                        @endforeach 
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        {{-- <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$</h6>
                        </div> --}}
                        {{-- <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div> --}}
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>${{ \Cart::getTotal() }}</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="cash" name="payment_type" id="paypal">
                                <label class="custom-control-label" for="paypal">Bank</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="card" name="payment_type" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Karta</label>
                            </div>
                        </div>
                        <input type="hidden" name="total_sum" value="{{ \Cart::getTotal() }}">
                        <button class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- Checkout End -->



@endsection