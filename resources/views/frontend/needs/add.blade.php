@extends('layouts.master')

@section('content')
    <div class="container main-container">
        <div class="row">
            @if (session('errors'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach (session('errors') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-12">
                <h4>{{ __('interface.general.add_needs') }}</h4>
                <form class="form-horizontal" role="form" method="POST" action="/needs/add">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">{{ __('interface.general.your') }} {{ __('interface.details.name') }}</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telephone" class="col-lg-2 control-label">{{ __('interface.details.contactable_phone') }}</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-lg-2 control-label">{{ __('interface.general.your') }} {{ __('interface.details.address') }}</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="address" name="address" required>{{ old('address') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-lg-2 control-label">{{ __('interface.details.town_dsd') }}</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="needs" class="col-lg-2 control-label">{{ __('interface.general.your') }} {{ __('interface.main_menu.needs') }}</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="needs" name="needs" required>{{ old('needs') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="heads" class="col-lg-2 control-label">{{ __('interface.details.group_size') }}</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="heads" name="heads" max="100000" value="{{ old('heads') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-md-offset-2">
                            {!! app('captcha')->display(); !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-primary">{{ __('interface.general.submit') }}</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.container -->
@endsection