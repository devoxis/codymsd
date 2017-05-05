@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}">Home</a></li>
      <li><a href="{{ url('/settings') }}">Settings</a></li>
      <li><a href="{{ url('/settings/users') }}">Manage Users</a></li>
      <li class="active">Edit a User</li>
  </ol>

</div>
<div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>User Details</h4></div>
          <div class="panel-body">
             {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
              <div class="row">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} col-sm-4">
                  {!! Form::Label('name', 'Name:') !!}
                   {!! Form::text('name', null,array('class' => 'form-control')) !!}
                  {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                </div>
              </div>
              <div class="row">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} col-sm-4">
                  {!! Form::Label('email', 'Email:') !!}
                   {!! Form::text('email', null,array('class' => 'form-control','readonly'=>'true')) !!}
                  {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
              </div>
              <div class="row">
                <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }} col-sm-4">
                  {!! Form::Label('role', 'Role:') !!}
                  {!! Form::select('role', ['CAPTURER'=>'CAPTURER','MANAGER'=>'MANAGER'], $user->role,array('class' => 'form-control')) !!}
                  {!! $errors->first('role', '<span class="help-block">:message</span>') !!}
                  
                </div>
              </div>

          <div class="row">
                <div class="form-group col-sm-6">
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </div>
  </form>
</div>
</div>
</div>

</div>
</div>
@endsection