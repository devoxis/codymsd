<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biographical;
use App\Claim;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $claims = Claim::all();
        return view('claims.index',compact('claims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newclaim($id)
    {
        //
        $biographical = Biographical::find($id);
        return view('claims.new',compact('biographical'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'social_security_no'=> 'required',
            'claim_date'=> 'required'
        ]);

        //Code for saving biographical
        $total_claimed_amount = $request->monthly_salary * 3;
        if($total_claimed_amount > 39000){
            $total_claimed_amount = 39000.00;
        }

        $request->request->add(['total_claimed_amount' => $total_claimed_amount]);
        //dd($request);
        $claim = Claim::create($request->all());
        $i = strlen($claim->id);
        $zeros = "";
        $i = 3 - $i;
        for($x=0;$x<$i;$x++){
            $zeros .= "0";
        }
        
        $claim->claim_no = "MSD_".$zeros.$claim->id;

        $claim->save();

        return redirect()->route('biographicals.index')
                        ->with('success','Biographical created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $claim = Claim::find($id);
        $biographical = Biographical::where('social_security_no',$claim->social_security_no)->first();
        
        return view('claims.view',compact('biographical','claim'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Claim::find($id)->delete();
        return redirect()->route('claims.index')
                        ->with('success','Claim deleted successfully');
    }
}
