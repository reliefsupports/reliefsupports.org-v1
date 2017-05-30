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
                    <a href="/donations/add"><button type="button" class="btn btn-primary btn-hg">{{ __('interface.general.add_aid') }} &raquo;</button></a>
                </p>
                @include('frontend.donations.table')
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