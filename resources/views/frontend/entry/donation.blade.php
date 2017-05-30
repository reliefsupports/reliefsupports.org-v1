@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            @foreach($entry as $e)
                <div class="panel-heading">
                    <h3 class="panel-title">Donation #{{$e->id}}</h3>
                    <button class="btn btn-default pull-right" id="share" data-clipboard-text="http://reliefsupports.org/entry/donation/{{ $e->id }}">Share</button>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>නම</dt>
                        <dd id="name">{{$e->name}}</dd>
                        <dt>ආධාරය</dt>
                        <dd id="donation">{{$e->donation}}</dd>
                        <dt>ලිපිනය</dt>
                        <dd id="address">{{$e->address}}</dd>
                        <dt>නගරය</dt>
                        <dd id="city">{{$e->city}}</dd>
                        <dt>දුරකථන අංක</dt>
                        <dd id="telephone">{{$e->telephone}}</dd>
                        <dt>අමතර විස්තර </dt>
                        <dd id="information">{{$e->information}}</dd>
                        <dt>ඇතුල්කලේ</dt>
                        <dd id="added">{{$e->created_at}}</dd>
                    </dl>
                </div>
            @endforeach
        </div>
    </div>