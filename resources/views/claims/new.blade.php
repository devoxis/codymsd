@extends('layouts.app')

@section('content')
<div class="container">
 
   <div class="col-lg-12 ">
  <div class="row">
    
          <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/claims') }}">MSD Claims</a></li>
            <li class="active">New Claim for {{$biographical->surname}} </li>
          </ol>
    
  </div>
  <div class="row">
  <div class="panel panel-default">
    <div class="panel-heading">
    <h5>Capture New MSD Claim</h5>
    </div>
    <div class="panel-body">
    <form method="POST" action="/claims" class="form">
      {{ csrf_field() }}
      <div class="row">
        <div class="form-group {{ $errors->has('surname') ? 'has-error' : '' }} col-sm-8">
          {!! Form::Label('surname', 'Surname:') !!}
           {!! Form::Label('surname', $biographical->surname, array('placeholder' => 'Surname','class' => 'form-control','readonly'=>'true')) !!}
          <input type="hidden"
          class="form-control"
          id="social_security_no"
          name="social_security_no"
          value="{{ $biographical->social_security_no }}"
          required>
          <input type="hidden"
          class="form-control"
          id="monthly_salary"
          name="monthly_salary"
          value="{{ $biographical->monthly_salary }}"
          required>
        </div>
      </div>
      <div class="row">
        <div class="form-group {{ $errors->has('claim_date') ? 'has-error' : '' }} col-sm-4">
          {!! Form::Label('claim_date', 'Claim Date:') !!}
           {!! Form::date('claim_date', \Carbon\Carbon::now(),array('class' => 'form-control')) !!}
          {!! $errors->first('claim_date', '<span class="help-block">:message</span>') !!}
        </div>
      </div>
      
     
      <div class="row">
        <div class="form-group col-sm-6">
          <button type="submit" class="btn btn-primary">Save Claim</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  </div>
</div>
</div>

@endsection        
