@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}">Home</a></li>
      <li class="active">Reports</li>
    </ol>
    
  </div>
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading"><h4>Reports</h4></div>
        <div class="panel-body">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Report per Region</div>
                    <div class="panel-body text-center">
                        <a href="/reports/region" class="btn btn-default btn-sm">Run Report</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Report per Marital Status</div>
                    <div class="panel-body text-center">
                        <a href="/reports/marital" class="btn btn-default btn-sm">Run Report</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Report by Date</div>
                    <div class="panel-body text-center">
                        <a href="/reports/date" class="btn btn-default btn-sm">Run Report</a>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Report by Monthly Salary</div>
                    <div class="panel-body text-center">
                        <a href="/reports/salary" class="btn btn-default btn-sm">Run Report</a>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Report by Monthly Salary (Max)</div>
                    <div class="panel-body text-center">
                        <a href="/reports/salarymax" class="btn btn-default btn-sm">Run Report</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Report by Monthly Salary (Min)</div>
                    <div class="panel-body text-center">
                        <a href="/reports/salarymin" class="btn btn-default btn-sm">Run Report</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection