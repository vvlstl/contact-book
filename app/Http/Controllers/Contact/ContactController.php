<?php

namespace App\Http\Controllers\Contact;

use App\Http\Resources\Contact\ContactResource;
use App\Models\Contact;

class ContactController extends BaseController
{
    public function __invoke(){
        $contacts = Contact::all();
        return ContactResource::collection($contacts);
    }

}

