<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function create()
    {
        return view('admin.contact.create');
    }

    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }


   public function edit($id)
{
    $contact = Contact::findOrFail($id);
    return view('admin.contact.edit', compact('contact'));
}

    public function update(Request $request)
    {   
        
        $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:50',
            'zip_code' => 'nullable|string|max:20',
            'phone_number' => 'required|string|max:20',
            'email' => 'nullable|email|max:100',
            'website' => 'nullable|url|max:100',
            'fax' => 'nullable|string|max:20',
            'social_facebook' => 'nullable|url|max:100',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('admin.contact.index')->with('success', 'School contact updated successfully.');
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:50',
            'state' => 'nullable|string|max:50',
            'zip_code' => 'nullable|string|max:20',
            'phone_number' => 'required|string|max:20',
            'email' => 'nullable|email|max:100',
            'website' => 'nullable|url|max:100',
            'fax' => 'nullable|string|max:20',
            'social_facebook' => 'nullable|url|max:100',
        ]);

        Contact::create($request->all());

        return redirect()->route('admin.contact.index')->with('success', 'School contact created successfully.');
    }

    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contact.index')->with('success', 'School contact deleted successfully.');
    }
}