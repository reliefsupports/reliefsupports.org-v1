@extends('layouts.master')

@section('content')
    <div class="container main-container">
        <div class="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-12">
                <h4>සැපයුම්කරුවන් එකතු කරන්න </h4>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('suppliers.save') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">ආයතනය*</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="organization" value="{{ old('organization') }}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telephone" class="col-lg-2 control-label">ස්ථානය*</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-lg-2 control-label">සබඳතා*</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="contacts" name="contacts" value="{{ old('contacts') }}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-lg-2 control-label">වර්ගය*</label>
                        <div class="col-lg-10">
                            <select name="type_id" id="type" class="form-control">
                                <option value="0"> වර්ගය තෝරන්න </option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}"> {{ $type->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="donation" class="col-lg-2 control-label">ප්‍රමාණය සමඟ මිල*</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="price_details" name="price_details" >{{ old('price_details') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-md-offset-2">
                            {!! app('captcha')->display() !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-primary">සනාථ කරන්න</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.container -->
@endsection