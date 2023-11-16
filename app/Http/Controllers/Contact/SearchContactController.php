<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class SearchContactController extends Controller
{
    public function __invoke(Request $request, Contact $query)
    {
        $name = $request->input('name');
        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }
        $name = $query->get();
        return response()->json($name);
    }
}
