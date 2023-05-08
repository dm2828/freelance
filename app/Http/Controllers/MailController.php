<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
  
class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from Deepak.com',
            'body' => 'Welcome email.'
        ];
        $id = auth()->user()->email;
        Mail::to($id)->send(new DemoMail($mailData));
        return redirect('/')->with('success', "Account successfully registered.");
        //dd("Email is sent successfully.");
    }
}