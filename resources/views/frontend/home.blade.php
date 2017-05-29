@extends('layouts/master')

@section('content')
    <div class="container">

        <!-- Main component for a primary marketing message or call to action -->
        <div class="well hero">
            <h3>{{ __('information.frontpage.welcome') }}</h3>
            <p>{{ __('information.frontpage.aim') }}</p>
            <p>
                <a class="btn btn-lg btn-primary" href="/donations/add" role="button">{{ __('interface.general.add_aid') }} &raquo;</a>
                <a class="btn btn-lg btn-primary" href="/needs/add" role="button">{{ __('interface.general.add_needs') }} &raquo;</a>
            </p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4>{{ __('interface.general.latest') }} {{ __('interface.main_menu.needs') }}</h4>
                @include('frontend.needs.table')
                <p>
                    <a class="btn btn-lg btn-primary" href="/needs/" role="button">{{ __('interface.general.see_all_needs') }}  &raquo;</a>
                </p>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <h4>{{ __('interface.general.latest') }} {{ __('interface.main_menu.aid') }}</h4>
                @include('frontend.donations.table')
                <p>
                    <a class="btn btn-lg btn-primary" href="/donations/" role="button">{{ __('interface.general.see_all_aid') }} &raquo;</a>
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
                        <dt>නම</dt>
                        <dd id="name"></dd>
                        <dt>අවශ්‍යතා</dt>
                        <dd id="needs"></dd>
                        <dt>ලිපිනය</dt>
                        <dd id="address"></dd>
                        <dt>නගරය</dt>
                        <dd id="city"></dd>
                        <dt>දුරකථන අංක</dt>
                        <dd id="telephone"></dd>
                        <dt>පිරිස</dt>
                        <dd id="heads"></dd>
                        <dt>ඇතුල්කලේ</dt>
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
                        <dt>නම</dt>
                        <dd id="name"></dd>
                        <dt>ආධාරය</dt>
                        <dd id="donation"></dd>
                        <dt>ලිපිනය</dt>
                        <dd id="address"></dd>
                        <dt>නගරය</dt>
                        <dd id="city"></dd>
                        <dt>දුරකථන අංක</dt>
                        <dd id="telephone"></dd>
                        <dt>අමතර විස්තර </dt>
                        <dd id="information"></dd>
                        <dt>ඇතුල්කලේ</dt>
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
