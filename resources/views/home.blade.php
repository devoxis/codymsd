@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="panel panel-default">

                            <div class="panel-body">
                               
                                <center>
                                    {!! $chart->render() !!}
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">

                            <div class="panel-body">
                               
                                <center>
                                    {!! $chart1->render() !!}
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">

                            <div class="panel-body">
                               
                                <center>
                                    {!! $chart2->render() !!}
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">

                            <div class="panel-body">
                               
                                <center>
                                    {!! $chart3->render() !!}
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
