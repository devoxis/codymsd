<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biographical;
use App\Claim;

class BiographicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $biographicals = Biographical::all();
        return view('biographicals.index',compact('biographicals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('biographicals.create');
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
            'surname'=> 'required',
            'date_of_birth'=> 'required',
            'marital_status'=> 'required',
            'region'=> 'required',
            'monthly_salary'=> 'required'
        ]);

        //Code for saving biographical
        $social_security_no = mt_rand(10000, 99999);

        while (Biographical::where('social_security_no', $social_security_no)->count() == 1){
            $social_security_no = mt_rand(10000, 99999);
        }

        $request->request->add(['social_security_no' => $social_security_no]);
        
        Biographical::create($request->all());


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
        $biographical = Biographical::find($id);
        $claims = Claim::where('social_security_no',$biographical->social_security_no)->get();
        
        return view('biographicals.view',compact('biographical','claims'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biographical = Biographical::find($id);
        return view('biographicals.edit',compact('biographical'));
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
        $this->validate($request, [
            'social_security_no'=> 'required',
            'surname'=> 'required',
            'date_of_birth'=> 'required',
            'marital_status'=> 'required',
            'region'=> 'required',
            'monthly_salary'=> 'required'
        ]);

        Biographical::find($id)->update($request->all());
        return redirect()->route('biographicals.index')
                        ->with('success','Biographical updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Biographical::find($id)->delete();
        return redirect()->route('biographicals.index')
                        ->with('success','Biographical deleted successfully');
    }
}
