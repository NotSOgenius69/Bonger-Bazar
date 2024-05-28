@extends('front.layouts.parentlayout')

@section('frontcontent')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('cart.index') }}">Cart</a></li>
                    <li class="breadcrumb-item">Checkout</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-9 pt-4">
        <div class="container">
        <form id="orderForm" name="orderForm" action="{{ route('cart.processcheckout') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="sub-title">
                        <h2>Shipping Address</h2>
                    </div>
                    <div class="card shadow-lg border-0">
                        <div class="card-body checkout-form">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $user->name}}">
                                    </div>            
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ $user->email}}">
                                    </div>            
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <select name="district" id="district" class="form-control">
                                            <option value="">Select a District</option>
                                            <option value="dhaka">Dhaka</option>
                                            <option value="gazipur">Gazipur</option>
                                            <option value="narayanganj">Narayanganj</option>
                                            <option value="munshiganj">Munshiganj</option>
                                            <option value="manikganj">Manikganj</option>
                                            <option value="narsingdi">Narsingdi</option>
                                            <option value="faridpur">Faridpur</option>
                                            <option value="gopalganj">Gopalganj</option>
                                            <option value="madaripur">Madaripur</option>
                                            <option value="rajbari">Rajbari</option>
                                            <option value="shariatpur">Shariatpur</option>
                                            <option value="tangail">Tangail</option>
                                            <option value="kishoreganj">Kishoreganj</option>
                                            <option value="jamalpur">Jamalpur</option>
                                            <option value="sherpur">Sherpur</option>
                                            <option value="mymensingh">Mymensingh</option>
                                            <option value="netrokona">Netrokona</option>
                                            <option value="chittagong">Chittagong</option>
                                            <option value="coxsbazar">Cox's Bazar</option>
                                            <option value="bandarban">Bandarban</option>
                                            <option value="khagrachari">Khagrachari</option>
                                            <option value="rangamati">Rangamati</option>
                                            <option value="noakhali">Noakhali</option>
                                            <option value="feni">Feni</option>
                                            <option value="lakshmipur">Lakshmipur</option>
                                            <option value="chandpur">Chandpur</option>
                                            <option value="comilla">Comilla</option>
                                            <option value="brahmanbariya">Brahmanbariya</option>
                                            <option value="sylhet">Sylhet</option>
                                            <option value="moulvibazar">Moulvibazar</option>
                                            <option value="habiganj">Habiganj</option>
                                            <option value="sunamganj">Sunamganj</option>
                                            <option value="rajshahi">Rajshahi</option>
                                            <option value="natore">Natore</option>
                                            <option value="naogaon">Naogaon</option>
                                            <option value="chapainawabganj">Chapainawabganj</option>
                                            <option value="pabna">Pabna</option>
                                            <option value="sirajganj">Sirajganj</option>
                                            <option value="bogra">Bogra</option>
                                            <option value="joypurhat">Joypurhat</option>
                                            <option value="rangpur">Rangpur</option>
                                            <option value="gaibandha">Gaibandha</option>
                                            <option value="kurigram">Kurigram</option>
                                            <option value="nilphamari">Nilphamari</option>
                                            <option value="lalmonirhat">Lalmonirhat</option>
                                            <option value="dinajpur">Dinajpur</option>
                                            <option value="thakurgaon">Thakurgaon</option>
                                            <option value="panchagarh">Panchagarh</option>
                                            <option value="khulna">Khulna</option>
                                            <option value="bagerhat">Bagerhat</option>
                                            <option value="satkhira">Satkhira</option>
                                            <option value="jessore">Jessore</option>
                                            <option value="jhenaidah">Jhenaidah</option>
                                            <option value="magura">Magura</option>
                                            <option value="chuadanga">Chuadanga</option>
                                            <option value="meherpur">Meherpur</option>
                                            <option value="narail">Narail</option>
                                            <option value="barishal">Barishal</option>
                                            <option value="bhola">Bhola</option>
                                            <option value="patuakhali">Patuakhali</option>
                                            <option value="pirojpur">Pirojpur</option>
                                            <option value="jhalokati">Jhalokati</option>
                                            <option value="barguna">Barguna</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea name="address" id="address" cols="30" rows="3" placeholder="Address" class="form-control" required>{{ $user->address }}</textarea>
                                    </div>            
                                </div>

                                <div class="col-md-12">
    <div class="mb-3">
        <input type="text" name="apartment" id="apartment" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)" value="{{ isset($customerAddress) ? $customerAddress->apartment : '' }}">
    </div>
</div>

<div class="col-md-4">
    <div class="mb-3">
        <input type="text" name="city" id="city" class="form-control" placeholder="City" value="{{ isset($customerAddress) ? $customerAddress->city : '' }}" required>
    </div>
</div>

<div class="col-md-4">
    <div class="mb-3">
        <input type="text" name="state" id="state" class="form-control" placeholder="State(optional)" value="{{ isset($customerAddress) ? $customerAddress->state : '' }}">
    </div>
</div>

<div class="col-md-4">
    <div class="mb-3">
        <input type="text" name="zip" id="zip" class="form-control" placeholder="Zip" value="{{ isset($customerAddress) ? $customerAddress->zip : '' }}" required>
    </div>
</div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No." value="{{ $user->phone }}" required>
                                    </div>            
                                </div>
                                

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea name="order_notes" id="order_notes" cols="30" rows="2" placeholder="Order Notes (optional)" class="form-control"></textarea>
                                    </div>            
                                </div>

                            </div>
                        </div>
                    </div> 
                </div>
                
                <div class="col-md-4">
                    <div class="sub-title">
                        <h2>Order Summery</h3>
                    </div>                    
                    <div class="card cart-summery">
                        <div class="card-body">
                            @php
                                $cart = Session::get('cart', []);
                                $totalPrice = 0;
                                $shipping = 0;
                            @endphp
                            @foreach ($cart as $item)
                                    <div class="d-flex justify-content-between pb-2">
                                        <div class="h6">{{ $item['product_name'] }} X {{ $item['quantity'] }}</div>
                                        <div class="h6">৳{{ $item['total'] }}</div>
                                    </div>
                                @php
                                $totalPrice += $item['total'];
                                @endphp
                            @endforeach
                                <div class="d-flex justify-content-between summery-end">
                                    <div class="h6"><strong>Subtotal</strong></div>
                                        <div class="h6"><strong>৳{{ $totalPrice }}</strong></div>
                                </div>
                                @if(isset($customerAddress))
                                @if($customerAddress->district == 'dhaka')
                                  @php
                                      $shipping = $shippingCharges->where('place','dhaka')->first()->price;
                                  @endphp
                                @else
                                  @php
                                      $shipping = $shippingCharges->where('place','outside')->first()->price;
                                  @endphp
                                @endif
                                @endif
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="h6"><strong>Shipping</strong></div>
                                        <div class="h6"><strong>৳{{$shipping}}</strong></div>
                                </div>
                                <div class="d-flex justify-content-between mt-2 summery-end">
                                    <div class="h5"><strong>Total</strong></div>
                                        <div class="h5"><strong>৳{{ $totalPrice + $shipping }}</strong></div>
                                    </div>
                        </div>
                    </div>
                    
                    <div class="card payment-form">
                <h3 class="card-title h5 mb-3">Payment Method</h3>
    <div class="card-body p-0">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked>
            <label class="form-check-label" for="cod">Cash on Delivery</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="payment_method" id="stripe" value="stripe">
            <label class="form-check-label" for="stripe">Stripe</label>
        </div>
    </div>
</div>

<div class="card payment-form">
    
    <div class="card-body p-0" id="payment-details" style="display: none;">
    <h3 class="card-title h5 mb-3">Payment Details</h3>
        <div class="mb-3">
            <label for="card_number" class="mb-2">Card Number</label>
            <input type="text" name="card_number" id="card_number" placeholder="Valid Card Number" class="form-control" >
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="expiry_date" class="mb-2">Expiry Date</label>
                <input type="text" name="expiry_date" id="expiry_date" placeholder="MM/YYYY" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="cvv" class="mb-2">CVV Code</label>
                <input type="text" name="cvv" id="cvv" placeholder="123" class="form-control" > 
            </div>
        </div>
        
    </div>
    <div class="pt-4">
            
            <button type="submit" class="btn-dark btn btn-block w-100" >Pay Now</button>
    </div>
</div>

                          
                    <!-- CREDIT CARD FORM ENDS HERE -->
                    
                </div>
            </div>
        </form>
        </div>
    </section>
</main>
@endsection

@section('customJs')
document.addEventListener('DOMContentLoaded', function() {
    const codRadio = document.getElementById('cod');
    const stripeRadio = document.getElementById('stripe');
    const paymentDetailsDiv = document.getElementById('payment-details');
   
    codRadio.addEventListener('change', togglePaymentDetails);
    stripeRadio.addEventListener('change', togglePaymentDetails);

    function togglePaymentDetails() {
        if (stripeRadio.checked) {
            paymentDetailsDiv.style.display = 'block';
        } else {
            paymentDetailsDiv.style.display = 'none';
        }
    }
    

});



@endsection