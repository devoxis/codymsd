<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Claim;
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
        $chart = Charts::database(Claim::all(), 'area', 'morris')
            ->elementLabel("# of Claims")
            ->title("Claims for Period")
            ->dimensions(0, 300)
            ->responsive(true)
            ->dateColumn('claim_date')
            ->groupByMonth();
        $chart1 = Charts::database(Claim::all(), 'area', 'morris')
            ->elementLabel("Amount Claimed (N$)")
            ->title("Claim Amounts for Period")
            ->dimensions(0, 300) 
            ->template("material")
            ->responsive(true)
            ->dateColumn('claim_date')
            ->aggregateColumn('total_claimed_amount','sum')
            ->groupByMonth();
        $data = Claim::select(DB::raw('distinct claims.social_security_no'),'total_claimed_amount')->where('biographicals.monthly_salary','>=',13000)->join('biographicals', 'biographicals.social_security_no', '=', 'claims.social_security_no')->get();
        $chart2 = Charts::create('bar', 'morris')
                     ->title('Claimants who has salary N$13000 or more')
                     ->dimensions(0, 300) 
                     ->elementLabel('Claimed Amount (N$)')
                     ->labels($data->pluck('social_security_no'))
                     ->values($data->pluck('total_claimed_amount'))
                     ->responsive(true);
        $data1 = Claim::select(DB::raw('distinct claims.social_security_no'),'total_claimed_amount')->where('biographicals.monthly_salary','<=',300)->join('biographicals', 'biographicals.social_security_no', '=', 'claims.social_security_no')->get();
        $chart3 = Charts::create('bar', 'morris')
                     ->title('Claimants who has salary N$300 or less')
                     ->dimensions(0, 300) 
                     ->elementLabel('Claimed Amount (N$)')
                     ->labels($data1->pluck('social_security_no'))
                     ->values($data1->pluck('total_claimed_amount'))
                     ->responsive(true);
                     

        return view('home', ['chart' => $chart, 'chart1' => $chart1, 'chart2' => $chart2, 'chart3' => $chart3]);
    }
}
