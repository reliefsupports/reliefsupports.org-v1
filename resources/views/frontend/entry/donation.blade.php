@extends('layouts.master')
@section('content')
    <div class="modal-body">
                    <dl class="dl-horizontal">
                     @foreach($entry as $e)
                        <h1>Doanation #{{$e->id}}</h1>
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
                     @endforeach
                    </dl>
                </div>
                </div>