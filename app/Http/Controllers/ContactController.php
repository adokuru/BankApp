<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->paginate(10);
        return view('admin.contact.index', compact('contacts'));
    }
    public function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->msg_subject = $request->msg_subject;
        $contact->phone_number = $request->phone_number;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', 'Your message has been sent successfully');
    }
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.show', compact('contact'));
    }
}
