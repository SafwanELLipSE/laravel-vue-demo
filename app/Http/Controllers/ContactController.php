<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContacts(Request $request){
        $contacts = Contact::all();
    }
}