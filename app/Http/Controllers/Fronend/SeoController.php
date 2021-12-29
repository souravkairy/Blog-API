<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeoController extends Controller
{
    public function seo()
    {
        $seo = Seo::all();
        return $seo;
    }
    public function update_seo(Request $request)
    {
        $id = 1;
        $seo = Seo::find($id);
        $seo->meta_title = $request->meta_title ??  $seo->meta_title;
        $seo->meta_description = $request->meta_description ?? $seo->meta_description;
        $seo->canonical_link = $request->canonical_link ?? $seo->canonical_link;
        $seo->site_name = $request->site_name ?? $seo->site_name;

        if ($request->file('seo_image') == !null) {
            $file = $request->file('seo_image');
            $path = $file->hashName('seo_image');
            Storage::disk('public')->put($path, file_get_contents($file));
            $seo->seo_image = $path;
        }
        $store = $seo->save();
        if (!$store) {
            return response()->json([
                "message" => "Something wrong!"
            ], 400);
        }
        return response()->json([
            "message" => "seo data updated successfully",
            "seo" => $seo
        ]);
    }
}
