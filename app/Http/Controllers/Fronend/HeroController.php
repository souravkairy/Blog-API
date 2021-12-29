<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function hero()
    {
        return Hero::find(1);
    }
    public function update_hero(request $request)
    {
        $hero = Hero::find(1);
        $hero['heading'] = $request->heading;
        $hero['sub_heading'] = $request->sub_heading;
        $hero['text'] = $request->text;
        $hero['btn_link_one'] = $request->btn_link_one;
        $hero['btn_link_two'] = $request->btn_link_two;
        if ($request->file('image') == !null) {
            $file = $request->file('image');
            $path = $file->hashName('image');
            Storage::disk('public')->put($path, file_get_contents($file));
            $hero->image = $path;
        }
        $store = $hero->save();
        if (!$store) {
            return response()->json([
                "message" => "Something wrong!"
            ], 400);
        }
        return response()->json([
            "message" => "Hero Section updated successfully",
            "hero" => $hero
        ]);
    }
}
