<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacto::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy(Contacto $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'El mensaje se eliminó con éxito.');
    }
}
