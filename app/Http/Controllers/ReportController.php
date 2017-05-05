<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biographical;
use App\Claim;

class ReportController extends Controller
{
    public function index()
    {
		return view('reports.index');
    }

    public function region(Request $request)
    {
    	if(isset($request->run))
    	{
    		$details = Claim::where('biographicals.region',$request->region)->join('biographicals', 'biographicals.social_security_no', '=', 'claims.social_security_no')->get();

    		return view('reports.region',compact('details'));
    	}else{
    		return view('reports.region');
    	}
		
    }
    public function marital(Request $request)
    {
    	if(isset($request->run))
    	{
    		$details = Claim::where('biographicals.marital_status',$request->marital_status)->join('biographicals', 'biographicals.social_security_no', '=', 'claims.social_security_no')->get();
    		
    		return view('reports.marital',compact('details'));
    	}else{
    		return view('reports.marital');
    	}
		
    }

    public function date(Request $request)
    {
    	if(isset($request->run))
    	{
    		$details = Claim::whereBetween('claims.claim_date',[$request->date_from,$request->date_to])->join('biographicals', 'biographicals.social_security_no', '=', 'claims.social_security_no')->get();
    		
    		return view('reports.date',compact('details'));
    	}else{
    		return view('reports.date');
    	}
		
    }
    public function salary(Request $request)
    {
    	if(isset($request->run))
    	{
    		$details = Claim::whereBetween('biographicals.monthly_salary',[$request->salary_from,$request->salary_to])->join('biographicals', 'biographicals.social_security_no', '=', 'claims.social_security_no')->get();
    		
    		return view('reports.salary',compact('details'));
    	}else{
    		return view('reports.salary');
    	}
		
    }
    public function salarymax(Request $request)
    {
    	if(isset($request->run))
    	{
    		$details = Claim::where('claims.total_claimed_amount',$request->salary)->join('biographicals', 'biographicals.social_security_no', '=', 'claims.social_security_no')->get();
    		
    		return view('reports.salarymax',compact('details'));
    	}else{
    		return view('reports.salarymax');
    	}
		
    }
    public function salarymin(Request $request)
    {
    	if(isset($request->run))
    	{
    		$details = Claim::where('claims.total_claimed_amount',$request->salary)->join('biographicals', 'biographicals.social_security_no', '=', 'claims.social_security_no')->get();
    		
    		return view('reports.salarymin',compact('details'));
    	}else{
    		return view('reports.salarymin');
    	}
		
    }
}
