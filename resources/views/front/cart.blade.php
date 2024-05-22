
@extends('front.layouts.parentlayout')

@section('frontcontent')
    <main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item">Cart</li>
                </ol>
            </div>
        </div>
    </section>
    @include('admin.message')

        <section class=" section-9 pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table" id="cart">
                                <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cart as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <h2>{{ $item['product_name'] }}</h2>
                                                </div>
                                            </td>
                                            <td>৳{{ $item['price'] }}</td>
                                            <td>
                                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                                    <div class="input-group-btn">
                                                        <form action="{{ route('cart.update') }}" method="POST">
                                                            @csrf
                                                        <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                                        <input type="hidden" name="operation" value="decrement">
                                                        <button type="submit" class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1">
                                                        <i class="fa fa-minus"></i>
                                                        </button>
                                                        </form>
                                                </div>
                                            <input type="text" class="form-control form-control-sm border-0 text-center" value="{{ $item['quantity'] }}" readonly>
                                                <div class="input-group-btn">
                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                    <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                                    <input type="hidden" name="operation" value="increment">
                                                    <button type="submit" class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                            <td>${{ $item['price'] * $item['quantity'] }}</td>
                                            <td>
                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Your cart is empty.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card cart-summery">
                        <div class="sub-title">
                            <h2 class="bg-white">Cart Summery</h3>
                        </div> 
                        <div class="card-body">
                            <div class="d-flex justify-content-between pb-2">
                            <div>Subtotal</div>
                            <div>৳{{ array_sum(array_column($cart, 'total')) }}</div>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                            <div>Shipping</div>
                            <div>৳20</div>
                            </div>
                            <div class="d-flex justify-content-between summery-end">
                            <div>Total</div>
                            <div>৳{{ array_sum(array_column($cart, 'total')) + 20 }}</div>
                            </div>
                            <div class="pt-5">
                            <a href="login.php" class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>     
                    <div class="input-group apply-coupan mt-4">
                        <input type="text" placeholder="Coupon Code" class="form-control">
                        <button class="btn btn-dark" type="button" id="button-addon2">Apply Coupon</button>
                    </div> 
                </div>
            </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('customJs')
close.onclick=()=>{
        alertbox.style.display ="none";
    }
@endsection
