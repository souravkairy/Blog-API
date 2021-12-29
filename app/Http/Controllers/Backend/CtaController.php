<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CtaController extends Controller
{
    public function cta_section()
    {
        return Cta::find(1);
    }
    public function update_cta_section(request $request)
    {

        $cta = Cta::find(1);
        $cta['heading'] = $request->heading ?? $cta->heading;
        $cta['sub_heading'] = $request->sub_heading ?? $cta->sub_heading;
        if ($request->file('image') == !null) {
            $file = $request->file('image');
            $path = $file->hashName('image');
            Storage::disk('public')->put($path, file_get_contents($file));
            $cta->image = $path;
        }
        $store = $cta->save();
        if (!$store) {
            return response()->json([
                "message" => "Something wrong!"
            ], 400);
        }
        return response()->json([
            "message" => "Hero Section updated successfully",
            "cta" => $cta
        ]);
    }
}
