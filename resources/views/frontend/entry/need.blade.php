@extends('layouts.master')
@section('content')
    <div class="modal-body">
                    <dl class="dl-horizontal">
                     @foreach($entry as $e)
                        <h1>Need #{{$e->id}}</h1>
                        <dl class="dl-horizontal">
                        <dt>නම</dt>
                        <dd id="name">{{$e->name}}</dd>
                        <dt>අවශ්‍යතා</dt>
                        <dd id="needs">{{$e->needs}}</dd>
                        <dt>ලිපිනය</dt>
                        <dd id="address">{{$e->address}}</dd>
                        <dt>නගරය</dt>
                        <dd id="city">{{$e->city}}</dd>
                        <dt>දුරකථන අංක</dt>
                        <dd id="telephone">{{$e->telephone}}</dd>
                        <dt>පිරිස</dt>
                        <dd id="heads">{{$e->heads}}</dd>
                        <dt>ඇතුල්කලේ</dt>
                        <dd id="added">{{$e->created_at}}</dd>
                    </dl>
                     @endforeach
                    </dl>
                </div>
                </div>