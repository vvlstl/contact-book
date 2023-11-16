<?php

namespace App\Http\Controllers\Contact;

use App\Http\Resources\Contact\ContactResource;
use App\Models\Contact;

class ShowContactController extends BaseController
{
    public function __invoke(Contact $contact){
        return new ContactResource($contact);
    }

}
