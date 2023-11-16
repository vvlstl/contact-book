<?php

namespace App\Http\Controllers\Contact;

use App\Models\Contact;

class DeleteContactController extends BaseController
{
    public function __invoke(Contact $contact){
        $contact->delete();
        return response([]);
    }
}
