@extends('layouts.app1')

@section('content')
<div class="container">
  <header class="section-header">
    <div class="tbl">
      <div class="tbl-row">
        <div class="tbl-cell">
          <h4>Edit Tuition Fee Credit Unit</h4>
          <ol class="breadcrumb breadcrumb-simple">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/tfcu') }}">Tuition Fee Credit Units</a></li>
            <li class="active">Edit a Tuition Fee Credit Unit </li>
          </ol>
        </div>
      </div>
    </div>
  </header>
  <div class="box-typical box-typical-padding">
    <h5>TFCU  Details</h5>
    {!! Form::model($weighting, ['method' => 'PATCH','route' => ['tfcu.update', $weighting->id]]) !!}
    <div class="row">
      <div class="form-group {{ $errors->has('institution_id') ? 'has-error' : '' }} col-sm-8">
        {!! Form::Label('institution_id', 'Institution:') !!}
        {!! Form::select('institution_id', $institutions, $weighting->institution_id, ['class' => 'select2']) !!}

        {!! $errors->first('institution_id', '<span class="help-block">:message</span>') !!}
      </div>
    </div>
    <div class="row">
      <div class="form-group {{ $errors->has('academic_year_id') ? 'has-error' : '' }} col-sm-8">
        {!! Form::Label('academic_year_id', 'Academic Year:') !!}
        {!! Form::select('academic_year_id', $years, $weighting->academic_year_id, ['class' => 'select2']) !!}

        {!! $errors->first('academic_year_id', '<span class="help-block">:message</span>') !!}
      </div>
    </div>
    <div class="row">
      <div class="form-group {{ $errors->has('weighting_value_id') ? 'has-error' : '' }} col-sm-8">
        {!! Form::Label('weighting_value_id', 'Weighting Type:') !!}
        <select class="select2" name="weighting_value_id">
          @foreach($values as $value)
          <option value="{{$value->id}}" {{ $weighting->weighting_value_id == $value->id ? "selected" : "" }}>{{$value->weightingtype->type}} - {{$value->value}}</option>
          @endforeach
        </select>

        {!! $errors->first('weighting_value_id', '<span class="help-block">:message</span>') !!}
      </div>
    </div>
    <div class="row">
      <div class="form-group {{ $errors->has('weight') ? 'has-error' : '' }} col-sm-5">
        <label for="code">Weight:</label>

        <input type="text"
        class="form-control"
        id="weight"
        name="weight"
        placeholder="Weight"
        value="{{ $weighting->weight }}"
        required>

        {!! $errors->first('weight', '<span class="help-block">:message</span>') !!}
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-6">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection        
