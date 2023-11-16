<?php

namespace App\Servises\Contact;

use App\Models\Contact;

class Service
{
 public function store($data){
     $fullNameParts = [$data['name'], $data['surname'], $data['patronymic']];
     $data['name'] = implode(' ', array_filter($fullNameParts));
     unset($data['surname'], $data['patronymic']);

     $contact = Contact::create($data);
     return response([]);
 }

 public function update($id, $data){
     $contact = Contact::find($id);
     $contact->update($data);
     return response([]);

 }
}
