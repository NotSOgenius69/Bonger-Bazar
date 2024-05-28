@extends('front.layouts.parentlayout')

@section('frontcontent')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">My Account</a></li>
                    <li class="breadcrumb-item">My Orders</li>
                </ol>
            </div>
        </div>
    </section>
    <section class=" section-11 ">
        <div class="container  mt-5">
            <div class="row">
                @include('admin.message')
                <div class="col-md-3">
                    @include('front.layouts.accountpanel')
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">My Orders</h2>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead> 
                                        <tr>
                                            <th>Orders #</th>
                                            <th>Date Purchased</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($userOrders->isNotEmpty())
                                        @foreach($userOrders as $userOrder)
                                        <tr>
                                            <td>
                                                <a href="order-detail.php">{{ $userOrder->id }}</a>
                                            </td>
                                            <td>{{ $userOrder->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <span class="badge bg-success">Delivered</span>
                                                
                                            </td>
                                            <td>৳{{ $userOrder->grand_total }}</td>
                                        </tr>
                                          @endforeach
                                          @endif                      
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection