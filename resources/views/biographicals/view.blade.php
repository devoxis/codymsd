@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
    
          <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/biographicals') }}">MSD Biographicals</a></li>
            <li class="active">Biographical of {{$biographical->surname}}</li>
          </ol>
    
  </div>
        <div class="row">
           
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Biographical Details</h4></div>
                    <div class="panel-body">
                        <div class="list-group">
                            <h4 class="list-group-item-heading">{{$biographical->surname}}</h4>
                            <blockquote class="list-group-item-text" style="font-size: 14px">
                                <dl>
                                  <dt>Social Security No</dt>
                                  <dd>{{$biographical->social_security_no}}</dd>
                                </dl>
                                 <dl>
                                  <dt>Date of Birth</dt>
                                  <dd>{{$biographical->date_of_birth}}</dd>
                                </dl>
                                 <dl>
                                  <dt>Marital Status</dt>
                                  <dd>{{$biographical->marital_status}}</dd>
                                </dl>
                                 <dl>
                                  <dt>Region</dt>
                                  <dd>{{$biographical->region}}</dd>
                                </dl>
                                 <dl>
                                  <dt>Monthly Salary</dt>
                                  <dd>{{$biographical->monthly_salary}}</dd>
                                </dl>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-12">
                <div class="row text-center">
          
          <a class="btn btn-success" href="{{ route('claims.new',$biographical->id) }}"> New Claim</a>
         
          <br><br>
        </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Claims <span class="badge">{{count($claims)}}</span></h4></div>
                    <div class="panel-body">

                        <table class="table table-bordered table-hover">
                          <tr>
                            <th>Claim No</th>
                            <th>Claim Date</th>
                            <th>Claimed Amount</th>
                            <th>Action</th>
                          </tr>
                          @foreach ($claims as $claim)
                          <tr>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection