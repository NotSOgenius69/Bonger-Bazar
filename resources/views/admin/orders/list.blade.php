@extends('admin.layouts.parentlayout')

@section('content')
   	<!-- Content Header (Page header) -->
       <section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Orders</h1>
							</div>
						</div>
					</div>
					<div>
					@include('admin.message')
					</div>
		</section>
        <section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card">
							<div class="card-header">
								<div class="card-tools">
									<div class="input-group input-group" style="width: 250px;">
										<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
					
										<div class="input-group-append">
										  <button type="submit" class="btn btn-default">
											<i class="fas fa-search"></i>
										  </button>
										</div>
									  </div>
								</div>
							</div>
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th>Orders #</th>											
                                            <th>Customer</th>
                                            <th>Email</th>
                                            <th>Phone</th>
											<th>Status</th>
                                            <th>Total</th>
										</tr>
									</thead>
									<tbody>
                                        @if($orders->isNotEmpty())
                                        @foreach($orders as $order)
										<tr>
											<td><a href="order-detail.html">{{ $order->id }}</a></td>
											<td>{{ $order->user->name }}</td>
                                            <td>{{ $order->user->email }}</td>
                                            <td>{{ $order->user->phone }}</td>
                                            <td>
												<span class="badge bg-success">Delivered</span>
											</td>
											<td>৳{{ $order->grand_total }}</td>																			
										</tr>
                                        @endforeach
										@else
										<tr>
                                            <td>Records Not Found</td>
                                           </tr>
                                        @endif
										
									</tbody>
								</table>										
							</div>
							<div class="card-footer clearfix">
                            {{ $orders->links() }}
								 
							</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
				
@endsection

@section('customJs')

@endsection