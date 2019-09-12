<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Input;

class MailController extends Controller
{
    public function send(Request $request)
    {
        // post id retrive
        $pt=Post::find($request->id);

        // post Author user email retrive
        $user=User::find($pt->user_id);

        //email sending data
        $data=array(
            'msg'=>'hello',
            'email'=> $user->email,
            'name'=>'rushab'
        );



        //send mail to post user
         Mail::to($data['email'])->send(new SendMail($data));


         // retrive email od user login
         $data['email']=Auth::user()->email;

        //send mail to logged  user
            Mail::to($data['email'])->send(new SendMail($data));

         return redirect()->back()->with('success', 'Email sent successfully. Check your email.');
        }





}
