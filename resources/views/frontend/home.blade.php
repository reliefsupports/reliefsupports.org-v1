@extends('layouts/master')

@section('content')

    <div class="container">

        <!-- Main component for a primary marketing message or call to action -->
        <div class="well hero">
            <h3>{{ __('layout.greet') }}</h3>
            {!!__('layout.intro')!!}
            <p>
                <a class="btn btn-lg btn-primary" href="{{ url("/donations/add")}}" role="button">{{ __('layout.button.add-aid') }}</a>
                <a class="btn btn-lg btn-primary" href="{{ url("/needs/add") }}" role="button">{{ __('layout.button.add-request') }}</a>
            </p>
        </div>
        <div class="well hero">
            {!! Form::open(['url' => 'search-donations-needs','id'=>'reports']) !!}  
           <!-- Example single danger button -->

             <div class="row">
                <div class="col-sm-2">{!! Form::select('type', array('all'=>'සියලු', 'donations' => 'ආධාර', 'needs' => 'අවශ්‍යතා'), '1', array("class"=>"btn btn-lg btn-primary selectpicker")) !!}</div>
                <div class="col-sm-8"><input name="search" type="text"  class="form-control" placeholder="{{ __('layout.search-placeholder')}}" value="{{ Input::old('search')}}"></div>
                <div class="col-sm-2"><button  class="btn btn-lg btn-primary" type="submit" type="button">{{ __('layout.button.search') }}</button></div>
             </div> 
            {!! Form::close() !!}
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>{{ __('layout.latest_needs') }}</h4>
                <table class="table table-responsive" id="needs-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('layout.table.name') }}</th>
                        <th>{{ __('layout.table.needs') }}</th>
                        <th>{{ __('layout.table.address') }}</th>
                        <th>{{ __('layout.table.city') }}</th>
                        <th>{{ __('layout.table.tel') }}</th>
                        <th>{{ __('layout.table.ppl') }}</th>
                        <th>{{ __('layout.table.entered_by') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($needs) > 0)
                        @foreach($needs as $need)
                            <tr>
                                <th scope="row">{{ $need->id }}</th>
                                <td data-xs-label="නම">{{ $need->name }}</td>
                                <td data-xs-label="අවශ්‍යතා">{{ str_limit($need->needs, 150) }}</td>
                                <td data-xs-label="ලිපිනය">{{ str_limit($need->address, 200) }}</td>
                                <td data-xs-label="නගරය">{{ $need->city }}</td>
                                <td data-xs-label="දුරකථන">{{ $need->telephone }}</td>
                                @if($need->heads && $need->heads > 0)
                                <td data-xs-label="පිරිස">{{ $need->heads }}</td>
                                @else
                                <td data-xs-label="පිරිස">Not provided</td>
                                @endif
                                <td data-xs-label="ඇතුල්කලේ">{{ $need->created_at }}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary read-needs"
                                        data-id="{{ $need->id }}"
                                    >
                                        <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                                    </button>
                                    <!-- <button type="button" class="btn btn-primary read-needs" data-id="{{ $need->id }}">Read full</button> -->
                                </td>
                                <td>
                                    <a target="_blank" href="/entry/need/{{$need->id}}">
                                        <button type="button" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-share" aria-hidden="true"></span>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

                <p>
                    <a class="btn btn-lg btn-primary" href="{{ url("/needs/") }}" role="button">{{ __('layout.all_needs') }}</a>
                </p>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <h4>{{ __('layout.latest_donations') }}</h4>
                <table class="table table-responsive" id="donations-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('layout.table.name') }}</th>
                        <th>{{ __('layout.table.donation') }}</th>
                        <th>{{ __('layout.table.address') }}</th>
                        <th>{{ __('layout.table.city') }}</th>
                        <th>{{ __('layout.table.tel') }}</th>
                        <th>{{ __('layout.table.entered_by') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($donations as $donation)
                        <tr>
                            <th scope="row">{{ $donation->id }}</th>
                            <td data-xs-label="නම">{{ $donation->name }}</td>
                            <td data-xs-label="ආධාරය">{{ str_limit($donation->donation, 150) }}</td>
                            <td data-xs-label="ලිපිනය">{{ str_limit($donation->address, 150) }}</td>
                            <td data-xs-label="නගරය">{{ $donation->city }}</td>
                            <td data-xs-label="දුරකථන">{{ $donation->telephone }}</td>
                            <td data-xs-label="ඇතුල්කලේ">{{ $donation->created_at }}</td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-primary read-donation"
                                    data-id="{{ $donation->id }}"
                                >
                                    <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                                </button>
                            </td>
                            <td>
                                <a target="_blank" href="/entry/donation/{{$donation->id}}">
                                    <button type="button" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-share" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <p>
                    <a class="btn btn-lg btn-primary" href="{{ url("donations") }}" role="button">{{ __('layout.all_donations') }}</a>
                </p>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div>

    <div class="modal fade"  id="needsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="title"></h4>
                </div>
                <div class="modal-body">
                    <dl class="dl-horizontal">
                        <dt>{{ __('layout.table.name') }}</dt>
                        <dd id="name"></dd>
                        <dt>{{ __('layout.table.needs') }}</dt>
                        <dd id="needs"></dd>
                        <dt>{{ __('layout.table.address') }}</dt>
                        <dd id="address"></dd>
                        <dt>{{ __('layout.table.city') }}</dt>
                        <dd id="city"></dd>
                        <dt>{{ __('layout.table.tels') }}</dt>
                        <dd id="telephone"></dd>
                        <dt>{{ __('layout.table.ppl') }}</dt>
                        <dd id="heads"></dd>
                        <dt>{{ __('layout.table.entered_by') }}</dt>
                        <dd id="added"></dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade"  id="donationModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="title"></h4>
                </div>
                <div class="modal-body">
                    <dl class="dl-horizontal">
                        <dt>{{ __('layout.table.name') }}</dt>
                        <dd id="name"></dd>
                        <dt>{{ __('layout.table.donation') }}</dt>
                        <dd id="donation"></dd>
                        <dt>{{ __('layout.table.address') }}</dt>
                        <dd id="address"></dd>
                        <dt>{{ __('layout.table.city') }}</dt>
                        <dd id="city"></dd>
                        <dt>{{ __('layout.table.tels') }}</dt>
                        <dd id="telephone"></dd>
                        <dt>{{ __('layout.table.extra_info') }}</dt>
                        <dd id="information"></dd>
                        <dt>{{ __('layout.table.entered_by') }}</dt>
                        <dd id="added"></dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
