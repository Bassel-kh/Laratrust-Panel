@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Create a new permission</div>
				<div class="card-body">
					<form action="{{ route('admin.permissions.store') }}" method="post">
						@csrf
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="form-label">Permission name</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group col-md-6">
								<label class="form-label">Permission display name</label>
								<input type="text" name="display_name" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="form-label">Permission Description</label>
							<input type="text" name="description" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary btn-sm">Create new permission</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection