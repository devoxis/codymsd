@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
   <div class="col-lg-12 ">
    <div class="panel panel-default">

      <div class="panel-heading">
        <h2>MSD Biographicals</h2>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-12">
          <a class="btn btn-success pull-right" href="{{ route('biographicals.create') }}"> New Biographical</a>
          </div>
          <br><br>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered table-hover" id="tabledata">
          <thead>
          <tr>
            <th>Social Security No</th>
            <th>Surname</th>
            <th>Date of Birth</th>
            <th>Marital Status</th>
            <th>Region</th>
            <th>Monthly Salary</th>
            <th>Action</th>
          </tr>
          </thead>
           <tbody>
          @foreach ($biographicals as $biographical)
          <tr>
            <td>{{ $biographical->social_security_no }}</td>
            <td>{{ $biographical->surname }}</td>
            <td>{{ $biographical->date_of_birth }}</td>
            <td>{{ $biographical->marital_status }}</td>
            <td>{{ $biographical->region }}</td>
            <td>{{ $biographical->monthly_salary }}</td>
            <td>
              <a class="btn btn-info btn-xs" href="{{ route('biographicals.show',$biographical->id) }}">Show</a>
              {!! Form::open(['method' => 'DELETE','route' => ['biographicals.destroy', $biographical->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
              {!! Form::close() !!}
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