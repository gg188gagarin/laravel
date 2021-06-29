<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Testing\File;

class Post
{
    public static function all()
    {
        $files= \Illuminate\Support\Facades\File::files(resource_path("posts/"));

        return array_map(function ($file){
            return $file->getContents();
        }, $files);
    }

    public static function find($slug)
    {
                                                                                         //base_path(); //get the path to the base of the iinstal
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();                                          //if could not find the post, then cached & returned            //return redirect('/');

        }
        return cache()->remember("posts.{$slug}", 5, function () use ($path) {   // now()->addMinutes(20) === u can write just: "1200" . its 1200 seconds= 20 minutes
            return file_get_contents($path);
        });


    }
}
//fn ()=> file_get_contents($path)
