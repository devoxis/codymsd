@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
   <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}">Home</a></li>
      <li><a href="{{ url('/settings') }}">Settings</a></li>
      <li class="active">Users</li>
    </ol>
   <div class="col-lg-12 ">
    <div class="panel panel-default">

      <div class="panel-heading">
        <h2>Manage Users</h2>
      </div>
      <div class="panel-body">
        

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered table-hover" id="tabledata">
          <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
          </thead>
           <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
              <a class="btn btn-info btn-xs" href="{{ route('users.edit',$user->id) }}">Edit</a>
              @if($user->role <> 'MANAGER')
              {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
              {!! Form::close() !!}
              @endif
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>    
  </div>
</div>
</div>
@endsection