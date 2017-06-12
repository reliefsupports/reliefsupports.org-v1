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
                <h4>ස්වෙච්චා ව්‍යාපෘති ඇතුලත් කිරීම</h4>
                <form class="form-horizontal" role="form" method="POST" action="{{ url("/projects/add")}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">ව්‍යාපෘතියේ නම</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-lg-2 control-label">විස්තර</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" id="description" name="description" value="{{ old('description') }}" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="purpose" class="col-lg-2 control-label">අරමුණ</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="purpose" name="purpose" required>{{ old('purpose') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-lg-2 control-label">ව්‍යාපෘති ලිපිනය </label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="address" name="address" required>{{ old('address') }}</textarea>
                        </div>
                    </div>
                          <div class="form-group">
                        <label for="website" class="col-lg-2 control-label">වෙබ් අඩවිය</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">විද්‍යුත් තැපැල</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="other" class="col-lg-2 control-label">වෙනත් තොරතුරු</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="other" name="other" required>{{ old('other') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-10 col-md-offset-2">
                            {!! app('captcha')->render(); !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-primary">ඊළඟ 
                            	<span class="glyphicon glyphicon-chevron-right"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.container -->
@endsection
