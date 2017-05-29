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
                    <a href="/transports/add"><button type="button" class="btn btn-primary btn-hg">මෙතනින් ප්‍රවාහන දත්ත එකතු කරන්න</button></a>
                </p>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>නම</th>
                        <th>දුරකථන</th>
                        <th>ලිපිනය</th>
                        <th>නගරය</th>
                        <th>වර්ගය</th>
                        <th>ඇතුල්කලේ</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transports as $transport)
                    <tr>
                        <th scope="row">{{ $transport->id }}</th>
                        <td>{{ $transport->name }}</td>
                        <td>{{ $transport->telephone }}</td>
                        <td>{{ $transport->address }}</td>
                        <td>{{ $transport->city }}</td>
                        <td>{{ $transport->type }}</td>
                        <td>{{ $transport->created_at }}</td>
                        <td><button type="button" class="btn btn-primary read-transports" data-id="{{ $transport->id }}">Read full</button></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12" style="text-align: center">
                @if($transports && $transports->links())
                {{ $transports->links() }}
                @endif
            </div>
        </div>

    </div><!-- /.container -->

    <div class="modal fade"  id="transportModal" tabindex="-1" role="dialog">
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
                        <dt>දුරකථන අංක</dt>
                        <dd id="telephone"></dd>
                        <dt>ලිපිනය</dt>
                        <dd id="address"></dd>
                        <dt>නගරය</dt>
                        <dd id="city"></dd>
                        <dt>හැකි ස්ථාන</dt>
                        <dd id="availability"></dd>
                        <dt>හැකි කාලය</dt>
                        <dd id="time_possibility"></dd>
                        <dt>වර්ගය</dt>
                        <dd id="type"></dd>
                        <dt>ඉන්ධන සමග</dt>
                        <dd id="is_fuel"></dd>
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