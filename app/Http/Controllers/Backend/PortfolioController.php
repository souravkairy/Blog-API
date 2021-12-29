<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function portfolio()
    {
        return Portfolio::all();
    }
    public function store_portfolio(Request $request)
    {

        $data = new Portfolio;
        $data->heading = $request->heading;
        $data->sub_heading = $request->sub_heading;
        $data->link = $request->link;

        $file = $request->file('image'); 
        $path = $file->hashName('image');
        Storage::disk('public')->put($path, file_get_contents($file));
        $data->image = $path;
         
        $save = $data->save();

        if (!$save) {
            return response()->json([
                "message" => "Something wrong!"
            ], 400);
        }
        return response()->json([
            "message" => "Portfolio saved successfully",
            "portfolio" => $data
        ]);
    }

    public function destroy_portfolio($id)
    {
        $fetch_post = Portfolio::find($id);
        $image_path = $fetch_post->image;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $delete = $fetch_post->delete();
        if ($delete) {
            return "Portfolio Deleted Successfully";
        } else {
            return "something wrong";
        }
    }
}
