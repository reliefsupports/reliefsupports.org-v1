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
                    <a href="/camps/add"><button type="button" class="btn btn-primary btn-hg btn-mobile-block">මෙතනින් කදවුරු එකතු කරන්න</button></a>
                </p>
                <table class="table table-responsive" id="camps-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ග්‍රාම නිළධාරි වසම</th>
                        <th>ග්‍රාම නිළධාරිගේ නම</th>
                        <th>කදවුරු පිහිටි ස්ථානය</th>
                        <th>පවුල් ගණන</th>
                        <th>ග්‍රාම නිළධාරිගේ දුරකථන</th>
                        <th>ඇතුල්කලේ</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($camps as $camp)
                    <tr>
                        <th scope="row">{{ $camp->id }}</th>
                        <td data-xs-label="ග්‍රාම නිළධාරි වසම">{{ $camp->region }}</td>
                        <td data-xs-label="ග්‍රාම නිළධාරිගේ නම">{{ str_limit($camp->name, 150) }}</td>
                        <td data-xs-label="කදවුරු පිහිටි ස්ථානය">{{ str_limit($camp->location, 150) }}</td>
                        <td data-xs-label="පවුල් ගණන">{{ $camp->families }}</td>
                        <td data-xs-label="ග්‍රාම නිළධාරිගේ දුරකථන">{{ $camp->telephone }}</td>
                        <td data-xs-label="ඇතුල්කලේ">{{ $camp->created_at }}</td>
                        <!-- <td><button type="button" class="btn btn-primary read-camp" data-id="{{ $camp->id }}">Read full</button></td> -->
                        <td>
                            <button type="button" class="btn btn-primary read-camp" data-id="{{ $camp->id }}">
                                <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                            </button>
                        </td>
                        <td>
                            <a target="_blank" href="/entry/camp/{{$camp->id}}">
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
                @if($camps && $camps->links())
                {{ $camps->links() }}
                @endif
            </div>
        </div>

    </div><!-- /.container -->

    <div class="modal fade"  id="campModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="title"></h4>
                </div>
                <div class="modal-body">
                    <dl class="dl-horizontal">
                        <dt>ග්‍රාම නිළධාරි වසම</dt>
                        <dd id="name"></dd>
                        <dt>ග්‍රාම නිළධාරිගේ නම</dt>
                        <dd id="camp"></dd>
                        <dt>කදවුරු පිහිටි ස්ථානය</dt>
                        <dd id="address"></dd>
                        <dt>පවුල් ගණන</dt>
                        <dd id="city"></dd>
                        <dt>ග්‍රාම නිළධාරිගේ දුරකථන</dt>
                        <dd id="telephone"></dd>
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