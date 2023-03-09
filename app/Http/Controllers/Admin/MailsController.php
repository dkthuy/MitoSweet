<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\NewsLetters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MailsController extends Controller
{
    public function datacontact()
    {
        $contact = DB::table('contacts')->orderByDesc('id')->paginate(9);
        return view('admin.contact', ['contact' => $contact]);
    }
    public function delcontact($id){
        $contact = Contacts::find($id);
        $contact->delete();
        return redirect('contact')->with('status', 'Xóa thông tin liên hệ thành công!');
    }
    public function datanewsletter()
    {
        $newsletter = DB::table('newsletters')->orderByDesc('id')->paginate(9);
        return view('admin.newsletter', ['newsletter' => $newsletter]);
    }
    public function delnewsletter($id){
        $newsletter = NewsLetters::find($id);
        $newsletter->delete();
        return redirect('newsletter')->with('status', 'Xóa đăng ký nhận tin thành công!');
    }
}
