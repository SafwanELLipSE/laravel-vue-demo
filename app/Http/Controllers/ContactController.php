<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContacts(Request $request){
        $contacts = Contact::all();

        return $contacts;
    }
    public function save_contact(Request $request){
        $contact = new Contact;

        if($request->has('image' && !empty($request->image))){
            $imageName = time(). '.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/gallery'), $imageName);
            $path = ('path/images/gallery'.$imageName);
            $contact->image = $path;
        }

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->bio = $request->bio;
        $contact->contact_no = $request->contact_no;
        $contact->designation = $request->designation;
        
        if($contact->save()){
            return response()->json(['status' => true, 'message' => 'Contact Added Successfilly']);
        }
        else{
            return response()->json(['status' => false, 'message' => 'There is some problem. Please Try again... Thank You....']);
        }
    }
}
