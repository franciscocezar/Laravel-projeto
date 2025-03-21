<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;
use App\Notifications\InvoicePaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('site.contact.index');
    }

    public function form(ContactFormRequest $request){

        //dd($request->all());
        $contact = Contact::create($request->all());
        Notification::route('mail', config('mail.from.address'))
        ->notify(new InvoicePaid($contact));
        

        return redirect()->route('site.contact')->with([
            'success' => true, 
            'message' => 'O contato foi criado com sucesso!']);

    }

}
