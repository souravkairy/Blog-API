<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function social_link()
    {
        $social_link = SocialLink::all();
        return $social_link;
    }
    public function update_social_link(Request $request)
    {
        $id = 1;
        $social_link = SocialLink::find($id);
        $social_link->facebook = $request->facebook ??  $social_link->facebook;
        $social_link->twitter = $request->twitter ?? $social_link->twitter;
        $social_link->linkedin = $request->linkedin ?? $social_link->linkedin;

        $store = $social_link->save();
        if (!$store) {
            return response()->json([
                "message" => "Something wrong!"
            ], 400);
        }
        return response()->json([
            "message" => "Social Links updated successfully",
            "links" => $social_link
        ]);
    }
}
