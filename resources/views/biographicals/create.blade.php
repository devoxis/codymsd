@extends('layouts.app')

@section('content')
<div class="container">
 
   <div class="col-lg-12 ">
  <div class="row">
    
          <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/biographicals') }}">MSD Biographicals</a></li>
            <li class="active">Add a Biographical </li>
          </ol>
    
  </div>
  <div class="row">
  <div class="panel panel-default">
    <div class="panel-heading">
    <h5>Capture New MSD Biographical</h5>
    </div>
    <div class="panel-body">
    <form method="POST" action="/biographicals" class="form">
      {{ csrf_field() }}
      <div class="row">
        <div class="form-group {{ $errors->has('academic_year_id') ? 'has-error' : '' }} col-sm-8">
          {!! Form::Label('surname', 'Surname:') !!}
           {!! Form::text('surname', null, array('placeholder' => 'Surname','class' => 'form-control')) !!}
          {!! $errors->first('surname', '<span class="help-block">:message</span>') !!}
        </div>
      </div>
      <div class="row">
        <div class="form-group {{ $errors->has('academic_year_id') ? 'has-error' : '' }} col-sm-4">
          {!! Form::Label('date_of_birth', 'Date of Birth:') !!}
           {!! Form::date('date_of_birth', \Carbon\Carbon::now(),array('class' => 'form-control')) !!}
          {!! $errors->first('date_of_birth', '<span class="help-block">:message</span>') !!}
        </div>
      </div>
      <div class="row">
        <div class="form-group {{ $errors->has('academic_year_id') ? 'has-error' : '' }} col-sm-4">
          {!! Form::Label('marital_status', 'Marital Status:') !!}
          {!! Form::select('marital_status', ['Single'=>'Single','Married'=>'Married'], null,array('class' => 'form-control')) !!}
          {!! $errors->first('marital_status', '<span class="help-block">:message</span>') !!}
        </div>
      </div>
      <div class="row">
        <div class="form-group {{ $errors->has('academic_year_id') ? 'has-error' : '' }} col-sm-4">
          {!! Form::Label('region', 'Region:') !!}
          {!! Form::select('region', ['Kunene'=>'Kunene',
            'Omusati'=>'Omusati',
            'Oshana'=>'Oshana',
            'Ohangwena'=>'Ohangwena',
            'Oshikoto'=>'Oshikoto',
            'Kavango West'=>'Kavango West',
            'Kavango East'=>'Kavango East',
            'Zambezi'=>'Zambezi',
            'Erongo'=>'Erongo',
            'Otjozondjupa'=>'Otjozondjupa',
            'Omaheke'=>'Omaheke',
            'Khomas'=>'Khomas',
            'Hardap'=>'Hardap',
            'Karas'=>'Karas'], null,array('class' => 'form-control')) !!}
            
          {!! $errors->first('region', '<span class="help-block">:message</span>') !!}
        </div>
      </div>
      <div class="row">
        <div class="form-group {{ $errors->has('academic_year_id') ? 'has-error' : '' }} col-sm-4">
          {!! Form::Label('monthly_salary', 'Monthly Salary:') !!}
           {!! Form::text('monthly_salary', null, array('placeholder' => 'Monthly Salary','class' => 'form-control')) !!}
          {!! $errors->first('monthly_salary', '<span class="help-block">:message</span>') !!}
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
