<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cta;
use Illuminate\Http\Request;

class CtaController extends Controller
{
    public function cta_section()
    {
        return Cta::find(1);
    }
    public function update_cta_section(request $request)
    {
        $data = Cta::find(1);
        $data['heading'] = $request->heading;
        $data['sub_heading'] = $request->sub_heading;
        $data['btn_link'] = $request->btn_link;
        $data['btn_text'] = $request->btn_text;
        $fileNameone = $request->file('image')->getClientOriginalName();
        $fileName = $fileNameone;
        $path = 'image' . "/";
        $destinationPath = $path; // upload path
        $request->file('image')->move($destinationPath, $fileName);
        $data['image'] = 'image/' . $fileName;
        $save = $data->save();
        if ($save) {
            return "Cta data saved successfully";
        } else {
            return "Something wrong";
        }
    }
}
