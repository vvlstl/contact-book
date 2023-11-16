<?php

namespace App\Http\Controllers\Contact;

use App\Http\Requests\Contact\UpdateRequest;

class UpdateContactController extends BaseController
{
    public function __invoke(UpdateRequest $request, $id){
        $data = $request->validated();
        $this->service->update($id, $data);
    }
}
