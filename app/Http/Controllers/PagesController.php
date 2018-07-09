<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex() {
       return view('pages.welcome');
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
}
