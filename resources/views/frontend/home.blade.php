@extends('layouts/master')

@section('content')
    <div class="container">

        <!-- Main component for a primary marketing message or call to action -->
        <div class="well hero">
            <h3>ආයුබෝවන්!!!</h3>
            <p>අයහපත් කාලගුණ තත්වය හේතුවෙන් ආපදාවට පත්වූ ඔබේ අවශ්‍යතා සහ මේ මොහොතේ ඔවුන්ට උපකාර කිරීමට සූදානම් ඔබත් මුනගැස්සවීම සඳහා මෙම වෙබ් අඩවිය නිර්මාණය කර ඇත.
                මෙම සේවාව 100% නොමිලේ වන අතර හුදෙක් ආධාර කලමනාකරණයට පහසුකවක් සැලසිම අපේ අරමුණයි. නුදුරු දිනයන් තුළ තවත් විශේෂාංග අතුළත් වනු ඇත.</p>
            <p>
                <a class="btn btn-lg btn-primary" href="/donations/add" role="button">ආධාර එකතු කරන්න &raquo;</a>
                <a class="btn btn-lg btn-primary" href="/needs/add" role="button">අවශ්‍යතා එකතු කරන්න &raquo;</a>
            </p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4>නවතම අවශ්‍යතා </h4>
                <table class="table table-responsive" id="needs-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>නම</th>
                        <th>අවශ්‍යතා</th>
                        <th>ලිපිනය</th>
                        <th>නගරය</th>
                        <th>දුරකථන</th>
                        <th>පිරිස</th>
                        <th>ඇතුල්කලේ</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($needs) > 0)
                        @foreach($needs as $need)
                            <tr>
                                <th scope="row">{{ $need->id }}</th>
                                <td>{{ $need->name }}</td>
                                <td>{{ str_limit($need->needs, 150) }}</td>
                                <td>{{ str_limit($need->address, 200) }}</td>
                                <td>{{ $need->city }}</td>
                                <td>{{ $need->telephone }}</td>
                                @if($need->heads && $need->heads > 0)
                                <td>{{ $need->heads }}</td>
                                @else
                                <td>N/A</td>
                                @endif
                                <td>{{ $need->created_at }}</td>
                                <td><button type="button" class="btn btn-primary read-needs" data-id="{{ $need->id }}">Read full</button></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

                <p>
                    <a class="btn btn-lg btn-primary" href="/needs/" role="button">සියලුම  අවශ්‍යතා මෙතනින්  &raquo;</a>
                </p>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <h4>නවතම ආධාර </h4>
                <table class="table table-responsive" id="donations-table">
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
                            <td><button type="button" class="btn btn-primary read-donation" data-id="{{ $donation->id }}">Read full</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <p>
                    <a class="btn btn-lg btn-primary" href="/donations/" role="button">සියලුම  ආධාර මෙතනින්  &raquo;</a>
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