@extends('layouts.master') @section('content')
<div class="container main-container">
	<div class="row">
		<div class="col-md-12">
			@if (session('message'))
			<div class="alert alert-success">{{ session('message') }}</div>
			@endif
			<h4>ස්වෙච්චා ව්‍යාපෘතින්</h4>
			<p style="float: right;">
				<a href="/projects/add"><button type="button"
						class="btn btn-primary btn-hg btn-mobile-block">මෙතනින් නව ව්‍යාපෘතීන්
						එකතු කරන්න</button></a>
			</p>
			<table class="table table-responsive" id="projects-table">
				<thead>
					<tr>
						<th>#</th>
						<th>නම / විස්තර</th>
						<th>අරමුණ</th>
						<th>සාමාජිකයින්</th>
						<th>සම්පත්</th>
						<th>ක්‍රියාමාර්ග</th>
					</tr>
				</thead>
				<tbody>
					@foreach($projects as $project)
					<tr>
						<th scope="row">{{ $project->id }}</th>
						<td data-xs-label="නම / විස්තරය">
							<p><b>{{ $project->name }} : </b>
							{{ $project->description }} </p>
						</td>
						<td data-xs-label="අරමුණ">{{ $project->purpose }}</td>
						<td data-xs-label="සාමාජිකයින් ගණන">{{ sizeof($project->members) }}</td>
						<td data-xs-label="සම්පත්"><ul>
							@forelse($project->resources as $resource)
								<li>{{ $resource->resource->name }} ({{ $resource->resource->type }}) x 
								{{ $resource->quantity }} @ {{ $resource->location }}</li>
							@empty
								<li>සම්පත් නොමැත</li>
							@endforelse
							</ul>
						</td>
						<td>
							<button type="button" class="btn btn-primary" title="තොරතුරු">
								<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
							</button>
							<a href="/projects/add-members/{{$project->id}}" class="btn btn-primary" title="සාමාජිකයින්">
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							</a>
							<a href="/projects/add-resources/{{$project->id}}" class="btn btn-primary" title="සම්පත්">
								<span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.col-md-12 -->
	</div>
	<!-- /.row -->

	<div class="row">
		<div class="col-md-12" style="text-align: center">@if($projects &&
			$projects->links()) {{ $projects->links() }} @endif</div>
	</div>

</div>
<!-- /.container -->

@endsection
