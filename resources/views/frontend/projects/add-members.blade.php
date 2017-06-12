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
                <form class="form-horizontal" role="form" method="POST" action="/projects/add-members/{{ $project->id }}">
                    {{ csrf_field() }}
                    <div class="row">
                    <h4>ව්‍යාපෘතියේ නම :  {{  $project->name }}</h4>
                    <input type="hidden" id="project_id" name="project_id" value="{{ $project->id }}"/> 
                    </div>
                    <div class="row">
                    	<h6>ව්‍යාපෘතියේ සාමාජිකයින්</h6>
                    	<table class="table">
                            <tr>
                            	<th>නම</th>                            	
                            	<th>දුරකථනය</th>
                            	<th>විද්‍යුත් තැපැල</th>
                            	<th>ලිපිනය</th>                            	
                            	<th>ස්ථානය</th>
                            	<th>තවත් විස්තර</th>
                            </tr>
                          
                            @forelse($members as $member)
                            <tr>
                            	<td>{{ $member->first_name }} {{ $member->last_name }} (
                            		@php
                            			switch($member->type){
                            				case "1-LEADER" : echo "Leader";break;
                            				case "2-CO-LEADER" : echo "Co Leader";break;
                            				case "3-MEMBER" : echo "Member";break;
                            			}
                            		@endphp
                            		)
	                            	</td>
	                            	<td>{{ $member->contacts }}</td>
	                            	<td>{{ $member->email }}</td>
	                            	<td>{{ $member->address }}</td>
	                            	<td>{{ $member->location }}</td>
	                            	<td>
	                            		<button type="button" class="btn" title="Information" onclick="showMemberInfo('{{ $member->id }}')">
											<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn" title="Delete" onclick="deleteMember('{{ $member->id }}','{{ $project->id }}')">
											<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
										</button>									
									</td>
	                            </tr>
	                            @empty
	                            <tr>
                            		<td colspan="6"><center>සාමාජිකයින් නොමැත</center></td>
                            	</tr>
	                            @endforelse
                        </table>
                    </div>
                    <h4>ස්වෙච්චා ව්‍යාපෘති සාමාජිකයින් ඇතුලත් කිරීම</h4>
                    <div class="form-group">
                        <label for="type" class="col-lg-2 control-label">සාමාජික ප්‍රවර්ගය</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="type" name="type">
                            	<option value="1-LEADER">ව්‍යාපෘති නායක</option>
                            	<option value="2-CO-LEADER">ව්‍යාපෘති අනුනායක</option>
                            	<option value="3-MEMBER">සාමාජික</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="col-lg-2 control-label">නම</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-lg-2 control-label">වාසගම</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">විද්‍යුත් තැපැල</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-lg-2 control-label">ලිපිනය</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="address" name="address" >{{ old('address') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contacts" class="col-lg-2 control-label">දුරකතන අංක</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="contacts" name="contacts" >{{ old('contacts') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="website" class="col-lg-2 control-label">වෙබ් අඩවිය</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="skype" class="col-lg-2 control-label">ස්කයිප්</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="skype" name="skype" value="{{ old('skype') }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="location" class="col-lg-2 control-label">ස්ථානය</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="geo_location" class="col-lg-2 control-label">GPS ඛණ්ඩාංක</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="geo_location" name="geo_location" value="{{ old('geo_location') }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-md-offset-2">
                            {!! app('captcha')->render(); !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" name="add_member" class="btn btn-primary">සාමාජිකයෙකු ඇතුළත් කරන්න
                            	<span class="glyphicon glyphicon-plus-sign"></span>
                            </button>
                            <a href="/projects/add-resources/{{$project->id}}" class="btn btn-primary">ඊළඟ
                            	<span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.container -->
    <div class="modal fade"  id="membersModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="title">සාමාජිකයාගේ විස්තර</h4>
                </div>
                <div class="modal-body">
                    <dl class="dl-horizontal">
                        <dt>නම</dt>
                        <dd id="first_name"></dd>
                        <dt>වාසගම</dt>
                        <dd id="last_name"></dd>
                        <dt>සාමාජික ප්‍රවර්ගය</dt>
                        <dd id="type"></dd>
                        <dt>විද්‍යුත් තැපැල</dt>
                        <dd id="email"></dd>
                        <dt>ලිපිනය</dt>
                        <dd id="address"></dd>
                        <dt>දුරකථන අංක</dt>
                        <dd id="contacts"></dd>
                        <dt>වෙබ් අඩවිය</dt>
                        <dd id="website"></dd>
                        <dt>ස්කයිප්</dt>
                        <dd id="skype"></dd>
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
	<form role="form" method="POST" id="deleteMemberForm" action="/projects/delete-member">
		{{ csrf_field() }}
		<input type="hidden" id="del_member_id" name="member_id"/>
		<input type="hidden" id="del_project_id" name="project_id"/>
	</form>
	
    <script type="text/javascript">
		function showMemberInfo(memberId){
	        $.ajax({
	            type: "GET",
	            url: '/projects/member/' + memberId,
	            data: {}
	        }).done(function(data) {
	            var modal = $('#membersModal');
	
	            if (data.isSuccess) {
	                modal.find('#first_name').html(data.member.first_name);
	                modal.find('#last_name').html(data.member.last_name);
	                modal.find('#address').html(data.member.address);
	                modal.find('#contacts').html(data.member.contacts);
	                modal.find('#type').html(data.member.type);
	                modal.find('#email').html(data.member.email);
	                modal.find('#website').html(data.member.website);
	                modal.find('#skype').html(data.member.skype);
	                modal.find('#location').html(data.member.location);
	                modal.find('#geo_location').html(data.member.geo_location);
	            } else {
	                modal.find('.modal-body').html('<p>Something went wrong. Please try again.</p>');
	            }
	            modal.modal('show');
	        });
		}

		function deleteMember(member_id,project_id){
			$('#del_member_id').val(member_id);
			$('#del_project_id').val(project_id);
			$('#deleteMemberForm').submit();
		}
    </script>
@endsection
