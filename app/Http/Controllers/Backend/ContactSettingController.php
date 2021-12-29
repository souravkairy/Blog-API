<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    public function contact_info()
    {
        return ContactSetting::find(1);
    }
    public function update_contact_info(request $request)
    {
        $data = ContactSetting::find(1);
        $data['heading'] = $request->heading;
        $data['sub_heading'] = $request->sub_heading;
        $data['address'] = $request->address;
        $data['mobile_number'] = $request->mobile_number;
        $data['email'] = $request->email;
        $save = $data->save();
        if ($save) {
            return "Contact Information Saved";
        } else {
            return "something is wrong";
        }
    }
}
