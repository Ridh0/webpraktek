@extends('layouts.app')
@section('content')
<div class="content">
	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column mb-2 flex-md-row">
				<div>
					<style>
						.badge{
							border: 0px solid #ddd;
						}
					</style>
					<h2 class="text-white pb-2 fw-bold">Welcome !
						<span class="badge bg-success">
								{{auth()->user()->name}}
						</span>
					</h2>
				</div>

			</div>
		</div>
	</div>
	<div class="page-inner mt--5">
		<div class="row mt--2">
			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-users"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Pasien</p>
									<h4 class="card-title">{{$countpasien}}</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-vial"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Pelayanan</p>
									<h4 class="card-title">{{$countpelayanan}}</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-user-plus"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Pendaftaran</p>
									<h4 class="card-title">{{$countpendaftaran}}</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>
@endsection