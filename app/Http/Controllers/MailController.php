<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
use App\Models\UserDetail;
class MailController extends Controller
{
    // 
    public function index(Request $request)
    {
        $data = new UserDetail;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->city = $request->city;
        $data->comment = $request->comment;
        $data->save();
        
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

        Mail::to('krishanrathore3497@gmail.com')->send(new DemoMail($mailData));

        return redirect()->back()->with('success', 'Send mail successfully.');
    }
}
