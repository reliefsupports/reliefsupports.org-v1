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
                <h4>අවශ්‍යතා එකතු කරන්න </h4>
                <form class="form-horizontal" role="form" method="POST" action="/needs/add">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">ඔබගේ නම</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="ඉසුරු බුද්ධික" value="{{ old('name') }}" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telephone" class="col-lg-2 control-label">සම්බන්ධ කර ගත හැකි දුරකථන අංක</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="011 2 222 222 / 071 1 234 567" value="{{ old('telephone') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-lg-2 control-label">ඔබගේ ලිපිනය</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="address" name="address" placeholder="නව නුවර පාර, කොතලාවල, කඩුවෙල " required>{{ old('address') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-lg-2 control-label">ආසන්නම නගරය/ප්‍රා.ලේ කොට්ටාසය </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="city" name="city" placeholder="කඩුවෙල " value="{{ old('city') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="needs" class="col-lg-2 control-label">ඔබගේ අවශ්‍යතා </label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="needs" name="needs" placeholder="සනීපාරක්ෂක, වියලි ආහාර" required>{{ old('needs') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="heads" class="col-lg-2 control-label">ඔබ සමග සිටින පිරිස </label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="heads" name="heads" placeholder="10" max="100000" value="{{ old('heads') }}" required>
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