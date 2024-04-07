<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserDetail;
use Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\DemoMail;
class UserDetailController extends Controller

{
    //
    // ... (your existing code)
    
    public function addUser(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required',
            'comment' => 'required',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|email|unique:users',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($validatorData->fails()) {
            return response()->json(['errors' => $validatorData->errors()], 422);
        }else{

        // return $request;
    $data = new UserDetail;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->city = $request->city;
    $data->comment = $request->comment;

    if ($files = $request->file('img_name')) {
        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            $imageNames[] = $filename;
        }
        // return $imageNames;
        $data->img_name = $imageNames;
    }

    // $data->save();

    $mailData = [
        'title' => 'Mail from Rathore.com',
        'body' => [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'comment' => $request->comment,
        ]
    ];

    // Replace 'your_application_specific_password' with the generated application-specific password
    $applicationSpecificPassword = 'qjaf qapx radv veri';

    config([
        'mail.mailers.smtp.username' => 'krishanrathore3497@gmail.com',
        'mail.mailers.smtp.password' => $applicationSpecificPassword,
    ]);

    // Mail::to('krishanrathore3497@gmail.com')->send(new DemoMail($mailData));

    return redirect()->back()->with('success', 'Send mail successfully.');
}
}


// ... (your existing code)

        public function show()
        {
            $users = UserDetail::all();
        return response()->json($users);
}
        public function add(Request $request)
        {
            // return $request;
            // $validatorData = 
            // $users = UserDetail::all();
        // return response()->json(['data'=> $request->all]);
        }
}
        


