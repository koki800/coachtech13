<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function confirm(Request $request)
    {
        $validate_rule = [
            'fullname' => 'required',
            'email' => 'required|email',
            'postcode' => 'required|size:8',
            'address' => 'required',
            'opinion' => 'required|max:120',
        ];
        $this->validate($request, $validate_rule);
        $items = $request -> all();
        Contact::create($items);
        return view('confirm',['items' => $items]);
    }

    public function delete0(Request $request)
    { 
        Contact::find($request->id)->delete();
        return back();
    }

    public function register(Request $request)
    { 
        return view('register');
    }

     public function ad_system()
     {
        $items = Contact::Paginate(10);
        return view('ad_system',['items' => $items]);
    }

    public function search(Request $request)
    { 
        $info = Contact::where('name',$request->name)->where('gender',$request->gender)->where('updated_at',$request->updated_at)->where('email',$request->email)->get();
        $items = $info::Paginate(10);
        return view('ad_system',['items' => $items]);
    }

    public function delete(Request $request)
    { 
        Contact::find($request->id)->delete();
        return redirect('/ad_system');
    }
}
