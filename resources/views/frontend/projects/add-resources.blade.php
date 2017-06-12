@extends('layouts.master')

@section('content')
    <div class="container main-container">
        <div class="row">
            @if (session('errors'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach (session('errors') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-12">
                <form class="form-horizontal" role="form" method="POST" action="/projects/add-resources/{{ $project->id }}">
                    {{ csrf_field() }}
                    <div class="row">
                    <h4>ව්‍යාපෘතියේ නම :  {{  $project->name }}</h4>
                    <input type="hidden" id="project_id" name="project_id" value="{{ $project->id }}"/> 
                    </div>
                    <div class="row">
                    	<h6>ව්‍යාපෘතියේ සම්පත්</h6>
                    	<table class="table">
                            <tr>
                            	<th>සම්පත</th>                            	
                            	<th>ප්‍රමාණය</th>
                            	<th>උපයෝජ්‍යතාව</th>
                            	<th>ස්ථානය</th>                            	
                            </tr>
                          
                            @forelse($resources as $resource)
                            <tr>
                            	<td>{{ $resource->name }}</td>
	                            <td>{{ $resource->quantity }}</td>
	                            <td>{{ $resource->availability }}</td>
	                            <td>{{ $resource->location }}</td>
                            	<td>
                            		<button type="button" class="btn" title="Information" onclick="showResourceInfo('{{ $resource->id }}')">
										<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
									</button>
									<button type="button" class="btn" title="Delete" onclick="deleteResource('{{ $resource->id }}','{{ $project->id }}')">
										<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
									</button>									
								</td>
                            </tr>
	                        @empty
	                        <tr>
                            	<td colspan="6"><center>සම්පත් නොමැත</center></td>
                            </tr>
	                        @endforelse
                        </table>
                    </div>
                    <h4>ස්වෙච්චා ව්‍යාපෘති සම්පත් ඇතුලත් කිරීම</h4>
                    
                    <div class="form-group">
                        <label for="resource_name" class="col-lg-2 control-label">නම</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="resource_name" name="resource_name" value="{{ old('resource_name')}}" required >
                            <input type="hidden" class="form-control" id="resource_id" name="resource_id" value="{{ old('resource_id')}}" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-lg-2 control-label">ප්‍රමාණය</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="availability" class="col-lg-2 control-label">උපයෝජ්‍යතාව</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="availability" name="availability" value="{{ old('availability') }}" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="location" class="col-lg-2 control-label">ස්ථානය</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="location" name="location" required>{{ old('location') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="geo_location" class="col-lg-2 control-label">GPS ඛණ්ඩාංක</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="geo_location" name="geo_location" required>{{ old('geo_location') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="other_details" class="col-lg-2 control-label">වෙනත් තොරතුරු</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="other_details" name="other_details" required>{{ old('other_details') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-10 col-md-offset-2">
                            {!! app('captcha')->render(); !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" name="add_resource" class="btn btn-primary">සම්පත් ඇතුළත් කරන්න
                            	<span class="glyphicon glyphicon-plus-sign"></span>
                            </button>
                            <a href="/projects" class="btn btn-primary">ව්‍යාපෘති ලැයිස්තුව
                            	<span class="glyphicon glyphicon-th-list"></span>
                            </a>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.container -->
    <div class="modal fade"  id="resourcesModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="title">සම්පතෙහි විස්තර</h4>
                </div>
                <div class="modal-body">
                    <dl class="dl-horizontal">
                        <dt>නම</dt>
                        <dd id="name"></dd>
                        <dt>වර්ගය</dt>
                        <dd id="type"></dd>
                        <dt>ප්‍රමාණය</dt>
                        <dd id="quantity"></dd>
                        <dt>උපයෝජ්‍යතාව</dt>
                        <dd id="availability"></dd>
                        <dt>ස්ථානය</dt>
                        <dd id="location"></dd>
                        <dt>GPS ඛණ්ඩාංක</dt>
                        <dd id="geo_location"></dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	<form role="form" method="POST" id="deleteResourceForm" action="/projects/delete-resource">
		{{ csrf_field() }}
		<input type="hidden" id="del_resource_id" name="resource_id"/>
		<input type="hidden" id="del_project_id" name="project_id"/>
	</form>
	
    <script type="text/javascript">
		function showResourceInfo(resourceId){
	        $.ajax({
	            type: "GET",
	            url: '/projects/resource/' + resourceId+'/{{$project->id}}',
	            data: {}
	        }).done(function(data) {
	            var modal = $('#resourcesModal');
	
	            if (data.isSuccess) {
	                modal.find('#name').html(data.resource.name);
	                modal.find('#type').html(data.resource.type);
	                modal.find('#quantity').html(data.resource.quantity);
	                modal.find('#availability').html(data.resource.availability);
	                modal.find('#location').html(data.resource.location);
	                modal.find('#geo_location').html(data.resource.geo_location);
	            } else {
	                modal.find('.modal-body').html('<p>Something went wrong. Please try again.</p>');
	            }
	            modal.modal('show');
	        });
		}

		function deleteResource(resource_id,project_id){
			$('#del_resource_id').val(resource_id);
			$('#del_project_id').val(project_id);
			$('#deleteResourceForm').submit();
		}

		$(document).ready(function(){
			$('#resource_name').autocomplete({
				source: function(request, response) {
			        $.ajax({
			            url:  '/resources/search',
			            dataType: "json",
			            data: {
			                name : request.term,
			            },
			            success: function(data) {
				            var result = new Array();
				            for(var i in data.resources){
								result.push({
									"value":data.resources[i].id,
									"label":data.resources[i].name+" ("+data.resources[i].type+")"
								});
				            }
			                response(result);
			            }
			        })},
			    select: function (event, ui) {
				    console.log(ui.item.label);
			        $("#resource_name").val(ui.item.label); 
			        $("#resource_id").val(ui.item.value);
			        return false;
			    }
			});
		});
    </script>
@endsection
