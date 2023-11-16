<?php

namespace App\Http\Controllers\Contact;

use App\Http\Requests\Contact\StoreRequest;

class StoreNewContactController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
    }
}
