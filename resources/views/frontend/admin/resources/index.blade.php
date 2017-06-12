@extends('layouts.admin') 
@section('admin-content')
<div class="row">
	<div class="col-md-12">
		@if (session('message'))
		<div class="alert alert-success">{{ session('message') }}</div>
		@endif
		<p style="float: right;">
			<a href="/admin/resources/add"><button type="button"
					class="btn btn-primary btn-hg btn-mobile-block">මෙතනින් සම්පත්
					එකතු කරන්න</button></a>
		</p>
		<table class="table table-responsive" id="needs-table">
			<thead>
				<tr>
					<th>#</th>
					<th>නම</th>
					<th>වර්ගය</th>
					<th>ක්‍රියාමාර්ග</th>
				</tr>
			</thead>
			<tbody>
				@foreach($resources as $resource)
				<tr>
					<th scope="row">{{ $resource->id }}</th>
					<td data-xs-label="නම">{{ $resource->name }}</td>
					<td data-xs-label="වර්ගය">{{ $resource->type }}</td>
					<td>&nbsp;</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.col-md-12 -->
</div>
<!-- /.row -->

<div class="row">
	<div class="col-md-12" style="text-align: center">@if($resources &&
		$resources->links()) {{ $resources->links() }} @endif</div>
</div>



@endsection
