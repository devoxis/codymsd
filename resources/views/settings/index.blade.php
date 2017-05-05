@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}">Home</a></li>
      <li class="active">Settings</li>
    </ol>
    
  </div>
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading"><h4>Settings</h4></div>
        <div class="panel-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                  <p>{{ $message }}</p>
                </div>
            @endif
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body text-center">
                        <a href="/settings/users" class="btn btn-default btn-sm">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Clear All Data</div>
                    <div class="panel-body text-center">
                        <a href="/settings/reset" class="btn btn-default btn-sm">Clear Data</a>
                    </div>
                </div>
            </div>
           
        </div>
      </div>
    </div>

  </div>
</div>
@endsection