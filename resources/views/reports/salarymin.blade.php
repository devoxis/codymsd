@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}">Home</a></li>
      <li><a href="{{ url('/reports') }}">Reports</a></li>
      <li class="active">Report by Salary (Min)</li>
  </ol>

</div>
<div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading"><h4>Reports</h4></div>
          <div class="panel-body">
             <form method="POST" action="/reports/salarymin" class="form">
              {{ csrf_field() }}
              <div class="row">
                <div class="form-group {{ $errors->has('salary') ? 'has-error' : '' }} col-sm-4">
                  {!! Form::Label('salary', 'Salary:') !!}
                   {!! Form::text('salary', '900',array('class' => 'form-control','readonly'=>'true')) !!}
                  {!! $errors->first('salary', '<span class="help-block">:message</span>') !!}
                   <input type="hidden"
                  class="form-control"
                  id="run"
                  name="run"
                  value="yes">
                </div>
              </div>

              

          <div class="row">
                <div class="form-group col-sm-6">
                  <button type="submit" class="btn btn-primary">Run</button>
              </div>
          </div>
  </form>
</div>
</div>
</div>
@if(isset($details))
<div class="col-lg-12 ">
    <div class="panel panel-default">

      <div class="panel-heading">
        <h4>Report Details</h4>
      </div>
      <div class="panel-body">
        <table class="table table-bordered table-hover" id="tabledata">
          <thead>
          <tr>
            <th>Social Security No</th>
            <th>Surname</th>
            <th>Date of Birth</th>
            <th>Marital Status</th>
            <th>Region</th>
            <th>Monthly Salary</th>
            <th>Claim No</th>
            <th>Claim Date</th>
            <th>Claimed Amount</th>
          </tr>
          </thead>
           <tbody>
          @foreach ($details as $detail)
          <tr>
            <td>{{ $detail->social_security_no }}</td>
            <td>{{ $detail->surname }}</td>
            <td>{{ $detail->date_of_birth }}</td>
            <td>{{ $detail->marital_status }}</td>
            <td>{{ $detail->region }}</td>
            <td>{{ $detail->monthly_salary }}</td>
            <td>{{ $detail->claim_no }}</td>
            <td>{{ $detail->claim_date }}</td>
            <td>{{ $detail->total_claimed_amount }}</td>
            
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>    
  </div>
@endif
</div>
</div>
@endsection