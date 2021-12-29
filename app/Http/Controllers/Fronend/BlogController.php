<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function posts()
    {
        $all_blog = Blog::all();
        return $all_blog;
    }
    public function post($id)
    {
        $fetch_post = Blog::find($id);
        return $fetch_post;
    }
    public function store_post(request $request)
    {
        $post = new Blog;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->author = $request->author;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $file = $request->file('image');
        $path = $file->hashName('image');
        Storage::disk('public')->put($path, file_get_contents($file));
        $post->image = $path;
        $post->created_at = date('Ymd');
        $post->status = 1;

        $store = $post->save();

        if (!$store) {
            return response()->json([
                "message" => "Something wrong!"
            ], 400);
        }
        return response()->json([
            "message" => "Post saved successfully",
            "post" => $post
        ]);
    }
    public function update_post(request $request)
    {
        $id = $request->id;
        $fetch_post = Blog::find($id);
        $fetch_post['title'] = $request->title;
        $fetch_post['text'] = $request->text;
        $data['author'] = $request->author;
        $fileNameone = $request->file('image')->getClientOriginalName();
        $fileName = $fileNameone;
        $path = 'image' . "/";
        $destinationPath = $path; // upload path
        $request->file('image')->move($destinationPath, $fileName);
        $fetch_post['image'] = 'image/' . $fileName;
        $fetch_post['created_at'] = date('Ymd');
        $fetch_post['status'] = 1;
        $fetch_post->save();
        return "Blog Updated Successfully";
    }
    public function update_status($id)
    {



        // $data['status'] = 1;
        // $update = $data->save;
        $data = Blog::find($id);
        $data['status'] = $data['status'] == 0 ? 1 : 0;
        $save = $data->save();

        // $update = Blog::where('id', $id)->update(['status' => 1]);
        // } else {
        //     $update = Blog::where('id', $id)->update(['status' => 2]);
        // }

        if (!$save) {
            return response()->json([
                "message" => "Something wrong!"
            ], 400);
        }
        return response()->json([
            "message" => "Status changed successfully",
            "status" => $data
        ]);
    }
    public function destroy_post($id)
    {
        $fetch_post = Blog::find($id);
        $image_path = $fetch_post->image;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $delete = $fetch_post->delete();
        if (!$delete) {
            return response()->json([
                "message" => "Something wrong!"
            ], 400);
        }
        return response()->json([
            "message" => "Post Deleted successfully",
        ]);
    }
}
