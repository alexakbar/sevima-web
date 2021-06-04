@extends('superadmin.template')
@section('content')
<div class="content-wrapper">
  <div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
      <div class="page-title d-flex">
        <h4> <span class="font-weight-semibold">Home</span></h4>
        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
        	<div class="card-header">
        	</div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-3">
                <a href="">
                  <div class="card bg-primary">
                    <div class="card-body">
                      <div class="d-flex">
                        Total User
                        </div>
                      <div>
                        <h3 class="font-weight-semibold mb-0"><b>{{$users->count()}}</b></h3>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-3">
                <a href="">
                  <div class="card bg-warning">
                    <div class="card-body">
                      <div class="d-flex">
                        Total Post
                        </div>
                        <div>
                        <h3 class="font-weight-semibold mb-0"><b>{{$posts}}</b></h3>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-3">
                <a href="">
                  <div class="card bg-success">
                    <div class="card-body">
                      <div class="d-flex">
                        Total Comment
                      </div>
                      <div>
                        <h3 class="font-weight-semibold mb-0"><b>{{$comments}}</b></h3>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-3">
                <a href="">
                  <div class="card bg-danger">
                    <div class="card-body">
                      <div class="d-flex">
                        Total Like
                      </div>
                      <div>
                      <h3 class="font-weight-semibold mb-0"><b>{{$likes}}</b></h3>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="content">

				<!-- Basic datatable -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Daftar User</h5>
					</div>
					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>fullname</th>
								<th>username</th>
								<th>email</th>
                <th>phone</th>
								<th>number of posts</th>
                <th>number of likes</th>
								<th>number of comment</th>
							</tr>
						</thead>
						<tbody>
              <?php foreach ($users as $key => $user): ?>
							<tr>
								<td>{{$user->fullname}}</td>
                <td>{{$user->username}}</td>
								<td>{{$user->email}}</td>
                <td>{{$user->phone == null ? "-" : $user->phone}}</td>
                <td>{{$user->post->count()}}</td>
                <td>{{$user->like->count()}}</td>
								<td>{{$user->comment->count()}}</td>
							</tr>
              <?php endforeach; ?>
						</tbody>
					</table>
				</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('superuser_asset/global_assets/js/demo_pages/form_layouts.js')}}"></script>
<script src="{{asset('superuser_asset/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('superuser_asset/global_assets/js/demo_pages/datatables_basic.js')}}"></script>
<script src="{{asset('superuser_asset/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('superuser_asset/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
@endsection
