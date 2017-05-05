@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
    
          <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/claims') }}">MSD Claims</a></li>
            <li class="active">Claim for {{$biographical->surname}}</li>
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
                            <hr>
                            <blockquote class="list-group-item-text" style="font-size: 14px">
                                <dl>
                                  <dt>Claim No</dt>
                                  <dd>{{$claim->claim_no}}</dd>
                                </dl>
                                 <dl>
                                  <dt>Claim Date</dt>
                                  <dd>{{$claim->claim_date}}</dd>
                                </dl>
                                 <dl>
                                  <dt>Total Claimed Amount</dt>
                                  <dd>{{$claim->total_claimed_amount}}</dd>
                                </dl>
                                
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection