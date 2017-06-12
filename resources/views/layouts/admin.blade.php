@extends('layouts.master')

@section('content')
<div class="container main-container">
<div id="sidenav" class="sidenav">
  <a href="/admin">Admin</a>
  <a href="/admin/resources">Resources</a>
  <a href="#">Users</a>
</div>
<div id="admin-content">
  @yield('admin-content')
</div>
</div>
<!-- /.container -->
@endsection

