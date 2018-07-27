<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Post;
use Mail;


class PagesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
       return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout() {
        $first = 'Alex';
        $last = 'Curtis';
//        $full = $first. " " .$last;
        $fullname = $first. " " .$last;
        $email = 'sharbel.cosa@gmail.com';

        /* Passing array of data*/
        $data =[];
        $data['email'] = $email;
        $data['fullname'] = $fullname;
        return view('pages.about')->withData($data);

//        return view('pages.about')->with("fullname", $full);
/* same as above  */
//        return view('pages.about')->withFullname($fullname)->withEmail($email);
    }

    public function getContact() {
        return view('pages.contact');
    }

    public function postContact(Request $request) {
       $this->validate($request, [
               'email' => 'required|email',
           'subject' => 'min:3',
           'message' => 'min:10'
           ]);

       $data = array(
           'email' => $request->email,
           'subject' => $request->subject,
           'bodyMessage' => $request->message
       );

       Mail::send('emails.contact', $data, function($message) use ($data){
        $message->from($data['email']);
        $message->to('hello@sharbelchris');
        $message->subject($data['subject']);
       });


        return redirect('/')->with('success', 'Your Email is Successfully sent!');
    }
}
