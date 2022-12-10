<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    public function __construct()
    {
        View::share('modelName', 'Contact');
        View::share('routeName', 'contacts');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        $columns = [
            [
                'title' => 'ID',
                'data'  => 'id'
            ],
            [
                'title' => 'Name',
                'data'  => 'name'
            ],
            [
                'title' => 'Email',
                'data'  => 'email'
            ],
            [
                'title' => 'Subject',
                'data'  => 'subject'
            ],
        ];
        return view('admin.contacts.index', compact('contacts', 'columns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success_message', 'Contacts deleted successfully');
    }
}
