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
                    <a href="/donations/add"><button type="button" class="btn btn-primary btn-hg">මෙතනින් ආධාර එකතු කරන්න</button></a>
                </p>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>නම</th>
                        <th>ආධාරය</th>
                        <th>ලිපිනය</th>
                        <th>නගරය</th>
                        <th>දුරකථන</th>
                        <th>ඇතුල්කලේ</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($donations as $donation)
                    <tr>
                        <th scope="row">{{ $donation->id }}</th>
                        <td>{{ $donation->name }}</td>
                        <td>{{ str_limit($donation->donation, 150) }}</td>
                        <td>{{ str_limit($donation->address, 150) }}</td>
                        <td>{{ $donation->city }}</td>
                        <td>{{ $donation->telephone }}</td>
                        <td>{{ $donation->created_at }}</td>
                        <td>
                            <button style="float:left"  type="button" class="btn btn-primary read-donation" data-id="{{ $donation->id }}">Read full</button>
                            <div style="float:right" class="addthis_toolbox" addthis:title="{{ $donation->donation  }} #FloodSL">
                                <a class="addthis_button_twitter"></a>
                                <a class="addthis_button_facebook"></a>
                                <a class="addthis_button_compact"></a>
                            </div>
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
