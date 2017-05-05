<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Claim;
use App\Biographical;
use Charts;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$chart = Charts::multi('bar', 'material')
        $data = Claim::select(DB::raw('count(claims.id) as aggregate, MONTH(claim_date) as claim_date'))->groupBy(DB::raw('MONTH(claim_date)'))->get();
        $chart = Charts::database($data, 'bar', 'highcharts')
            ->preaggregated(true)
            ->elementLabel("Month of Claims")
            ->title("Claims for January to October 2016")
            ->dimensions(0, 300)
            ->labels($data->pluck('claim_date'))
            ->values($data->pluck('aggregate'))
            ->responsive(true);
       // dd($chart);


        $data1 = Claim::select(DB::raw('SUM(total_claimed_amount), MONTH(claim_date) as claim_date'))->groupBy(DB::raw('MONTH(claim_date)'))->get();
        $chart1 = Charts::database($data1, 'area', 'morris')
            ->elementLabel("Amount Claimed (N$)")
            ->title("Claim Amounts for Period")
            ->dimensions(0, 300) 
            ->template("material")
            ->responsive(true)
            ->dateColumn('claim_date')
            ->labels($data->pluck('claim_date'))
            ->values($data->pluck('aggregate'));

        $data2 = Biographical::select(DB::raw('count(*) as no_of_people, marital_status'))
                     ->where('monthly_salary', '>', 13000)
                     ->groupBy('marital_status')
                     ->get();
        $chart2 = Charts::database($data2, 'bar', 'highcharts')
                     ->preaggregated(true)
                    ->elementLabel("Marital Status")
                    ->title("Claimants who have salaries greater than N$13,000.00")
                    ->dimensions(0, 300)
                    ->labels($data2->pluck('marital_status'))
                    ->values($data2->pluck('no_of_people'))
                    ->responsive(true);

        $data3 = Biographical::select(DB::raw('count(*) as no_of_people, marital_status'))
                     ->where('monthly_salary', '<', 13000)
                     ->groupBy('marital_status')
                     ->get();

        $chart3 = Charts::database($data3, 'bar', 'highcharts')
                     ->preaggregated(true)
                    ->elementLabel("Marital Status")
                    ->title("Claimants who have salaries less than N$13,000.00")
                    ->dimensions(0, 300)
                    ->labels($data3->pluck('marital_status'))
                    ->values($data3->pluck('no_of_people'))
                    ->responsive(false);
                     

        return view('home', ['chart' => $chart, 'chart1' => $chart1, 'chart2' => $chart2, 'chart3' => $chart3]);
    }
}
