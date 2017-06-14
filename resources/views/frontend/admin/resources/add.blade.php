@extends('layouts.master') @section('content')
<div class="container main-container">
	<div class="row">
		@if (session('errors'))
		<div class="alert alert-danger">
			<ul>
				@foreach (session('errors') as $error)
				<li>{{ $error }}</li> @endforeach
			</ul>
		</div>
		@endif
		<div class="col-md-12">
			<h4>Add Resource</h4>
			<form class="form-horizontal" role="form" method="POST"
				action="{{ url("/admin/resources/add") }}">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name" class="col-lg-2 control-label">Name</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="name" name="name"
							value="{{ old('name') }}" required>
					</div>
				</div>
				<div class="form-group">
					<label for="type" class="col-lg-2 control-label">Type</label>
					<div class="col-lg-10">
						<select class="form-control" id="type" name="type">
						@foreach($resourceTypes as $value)
							<option value="{{ $value }}" 
								@if( $value == old('value') )
									selected="selected" 
								@endif
							>{{ $value }}</option>
						@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-10 col-md-offset-2">{!!
						app('captcha')->render(); !!}</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</form>
		</div>
		<!-- /.col-md-12 -->
	</div>
	<!-- /.row -->

</div>
<!-- /.container -->
@endsection
