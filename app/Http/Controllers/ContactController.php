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

        if($request->has('image') && !empty($request->image)){
            $nameImage = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('image/gallery'), $nameImage);
            $path = ('image/gallery/' . $nameImage);
            $contact->image = $path;
        }
        $contact->name = $request->name; 
        $contact->email = $request->email;
        $contact->bio = $request->bio;
        $contact->contact_no = $request->contact_no;
        $contact->designation = $request->designation;

        if($contact->save()){
            return response()->json(['status'=>true, 'message' => 'Contact Added Successfully!!.']);
        }else{
            return response()->json(['status' => false, 'message' => 'There is some Problem, Please Try again.']);
        }
    }
    public function deleteContact($id){
        $contact = Contact::find($id);
        if ($contact->delete()) {
            return response()->json(['status' => true, 'message' => 'Contact deleted Successfully!!.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Something Went wrong.']);
        }
    }
    public function get_contact($id){
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function update_contact(Request $request, $id)
    {
        $contact = Contact::where('id',$id)->first();

        if ($request->has('image') && !empty($request->image)) {
            $nameImage = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('image/gallery'), $nameImage);
            $path = ('image/gallery/' . $nameImage);
            $contact->image = $path;
        }
        
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->bio = $request->bio;
        $contact->contact_no = $request->contact_no;
        $contact->designation = $request->designation;


        if ($contact->save()) {
            return response()->json(['status' => true, 'message' => 'Contact Updated Successfully!!.']);
        } else {
            return response()->json(['status' => false, 'message' => 'There is some Problem, Please Try again.']);
	}
    }
}
