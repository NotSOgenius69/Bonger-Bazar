@extends('admin.layouts.parentlayout')

@section('content')
   	<!-- Content Header (Page header) -->
       <section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Users</h1>
							</div>
						</div>
					</div>
					<div>
					@include('admin.message')
					</div>
					<!-- /.container-fluid -->
		</section>
		<!-- Main content -->
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
											<th width="60">ID</th>
											<th>Name</th>
											<th>Email</th>
											<th>Phone</th>
                                            <th>Address</th>
											<th>role</th>
										</tr>
									</thead>
									<tbody>
                                        @if($users->isNotEmpty())
                                        @foreach($users as $user)
										<tr>
											<td>
												{{ $user->id }}
											</td>
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->phone ? $user->phone : 'No' }}</td>
                                            <td>{{ $user->address ? $user->address : 'No' }}</td>
											<td>{{ ($user->role) == 0 ?  'Admin' : 'User' }}</td>
											
										</tr>
										@endforeach
                                        @endif
									</tbody>
								</table>										
							</div>
							<div class="card-footer clearfix">
								{{ $users->links() }}
							</div>
						</div>
					</div>
					<!-- /.card -->
		</section>
		<!-- /.content -->
@endsection

@section('customJs')

@endsection