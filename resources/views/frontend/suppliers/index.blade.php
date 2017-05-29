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
                    <a href="/donations/add"><button type="button" class="btn btn-primary btn-hg">මෙතනින් සැපයුම්කරුවන් එකතු කරන්න</button></a>
                </p>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ආයතනය</th>
                        <th>ස්ථානය</th>
                        <th>සබඳතා</th>
                        <th>වර්ගය</th>
                        <th>ප්‍රමාණය සමඟ මිල</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($suppliers as $supplier)
                    <tr>
                        <th scope="row">{{ $supplier->id }}</th>
                        <td>{{ $supplier->organization }}</td>
                        <td>{{ $supplier->location }}</td>
                        <td>{{ $supplier->contacts }}</td>
                        <td>{{ $supplier->type->name }}</td>
                        <td>{{ $supplier->price_details }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12" style="text-align: center">
              {{--  @if($suppliers && $suppliers->links())
                {{ $suppliers->links() }}
                @endif--}}
            </div>
        </div>

    </div><!-- /.container -->

@endsection