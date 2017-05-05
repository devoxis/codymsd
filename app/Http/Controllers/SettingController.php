<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Claim;
use App\Biographical;

class SettingController extends Controller
{
  	public function index()
    {
		return view('settings.index');
    }

    public function users()
    {
    	$users = User::all();
		return view('settings.users',compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('settings.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('settings.users')
                        ->with('success','User updated successfully');
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('settings.users')
                        ->with('success','User deleted successfully');
    }

    public function reset()
    {
        Claim::where('id','<>',0)->delete();
        Biographical::where('id','<>',0)->delete();
        User::where('role','<>','MANAGER')->delete();
        return redirect()->route('settings')
                        ->with('success','System Data deleted successfully');
    }
}
