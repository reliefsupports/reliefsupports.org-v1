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
                <h4>ප්‍රවාහන පහසුකම් එකතු කරන්න </h4>
                <form class="form-horizontal" role="form" method="POST" action="/transports/add">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">ඔබගේ නම</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telephone" class="col-lg-2 control-label">සම්බන්ධ කර ගත හැකි දුරකථන අංක</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-lg-2 control-label">ඔබගේ ලිපිනය</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="address" name="address" required>{{ old('address') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-lg-2 control-label">ආසන්නම නගරය/ප්‍රා.ලේ කොට්ටාසය </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="availability" class="col-lg-2 control-label">ගමන් කල හැකි ස්ථාන (ඔනැම ප්‍රදේශයකට හෝ නිශ්චිත ප්‍රදේශයකට)</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="availability" name="availability" required>{{ old('availability') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="time_possibility" class="col-lg-2 control-label">ලබා දිය හැකි කාලය</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="time_possibility" name="time_possibility" required>{{ old('time_possibility') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-lg-2 control-label">වාහන වර්ගය</label>
                        <div class="col-lg-2">
                            <select id="type" name="type" class="form-control">
                                <option value="කාර්">කාර්</option>
                                <option value="වෑන්">වෑන්</option>
                                <option value="ට්‍රක්">ට්‍රක්</option>
                                <option value="බස්">බස්</option>
                                <option value="4x4">4x4</option>
                                <option value="යතුරු පැදි">යතුරු පැදි</option>
                                <option value="ත්‍රී රෝද රථ">ත්‍රී රෝද රථ</option>
                                <option value="වෙනත්">වෙනත්</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="is_fuel" class="col-lg-2 control-label">ඉන්ධන සමග</label>
                        <div class="col-lg-2">
                            <select id="is_fuel" name="is_fuel"  class="form-control">
                                <option value="ඔව්">ඔව්</option>
                                <option value="නැත">නැත</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-md-offset-2">
                            {!! app('captcha')->display(); !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.container -->
@endsection