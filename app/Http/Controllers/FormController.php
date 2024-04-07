<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
class FormController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createUser');
    }
      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        $validatedData = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'comment' => 'required',
            'phone' => 'required|min_digits:10',
            'email' => 'required|email|unique:users'
        ]);
        if($validatedData){
        $data = new UserDetail;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->city = $request->city;
        $data->comment = $request->comment;
        $data->save();
        
        return redirect()->back()->with('success', 'User created successfully.');;

    }
    }
}