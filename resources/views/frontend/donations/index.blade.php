@extends('layouts.master')

@section('content')
    <div class="container main-container">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <p style="float: right;">
                    <a href="/donations/add"><button type="button" class="btn btn-primary btn-hg btn-mobile-block">{{ __('layout.button.add-aid') }}</button></a>
                </p>
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
                        <!-- <td><button type="button" class="btn btn-primary read-donation" data-id="{{ $donation->id }}">Read full</button></td> -->
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
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12" style="text-align: center">
                @if($donations && $donations->links())
                {{ $donations->links() }}
                @endif
            </div>
        </div>

    </div><!-- /.container -->

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
                        <dt>{{ __('layout.table.tel') }}</dt>
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
