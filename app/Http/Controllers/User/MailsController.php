<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Mail\NewsLetters as MailNewsLetters;
use App\Models\Contacts;
use App\Models\NewsLetters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailsController extends Controller
{
    public function sendmail(Request $request)
    {
        $data = [
            'name'    => $request->name,
            'email'   => $request->email,
            'title'   => $request->title,
            'detail'  => $request->detail
        ];
        $contact = new Contacts();
        $contact->name    = $request->name;
        $contact->email   = $request->email;
        $contact->title   = $request->title;
        $contact->detail  = $request->detail;
        $contact->save();

        if ($contact->save() == true) {
            $mail = 'mitosweets.demo@gmail.com';
            Mail::to($mail)->send(new ContactMail($data));
            return redirect()->route('contact')->with('status', 'Gửi mail thành công!');
        }else{
            return redirect()->route('contact')->with('fail', 'Không gửi được!');
        }
    }
    public function newsletter(Request $request)
    {
        $data = [
            'email'    => $request->email,
        ];
        $newsletter = new NewsLetters();
        $newsletter->email    = $request->email;
        $newsletter->save();

        if ($newsletter->save() == true) {
            $mail = 'mitosweets.demo@gmail.com';
            Mail::to($mail)->send(new MailNewsLetters($data));
            return redirect()->back();
        }
    }
}
