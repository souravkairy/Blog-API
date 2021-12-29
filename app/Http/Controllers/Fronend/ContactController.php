<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function messages()
    {
        $messages = Message::all();
        return $messages;
    }
    public function store_messages(request $request)
    {
        $data = new Message();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['message'] = $request->message;
        $save =  $data->save();
        if ($save) {
            return "message saved succesfully";
        } else {
            return "something is wrong";
        }
    }
}
