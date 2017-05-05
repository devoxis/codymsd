@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
   <div class="col-lg-12 ">
    <div class="panel panel-default">

      <div class="panel-heading">
        <h2>MSD Claims</h2>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-12">
          <a class="btn btn-success pull-right" href="{{ route('claims.create') }}"> New Claim</a>
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
            <th>Claim No</th>
            <th>Claim Date</th>
            <th>Claimed Amount</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($claims as $claim)
          <tr>
            <td>{{ $claim->social_security_no }}</td>
            <td>{{ $claim->claim_no }}</td>
            <td>{{ $claim->claim_date }}</td>
            <td>{{ $claim->total_claimed_amount }}</td>
            <td>
              <a class="btn btn-info btn-xs" href="{{ route('claims.show',$claim->id) }}">Show</a>
              {!! Form::open(['method' => 'DELETE','route' => ['claims.destroy', $claim->id],'style'=>'display:inline']) !!}
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