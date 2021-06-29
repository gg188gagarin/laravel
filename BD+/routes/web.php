<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'welcome' => Post::all()
    ]);
    });



Route::get('posts/{post}', function ($slug) {
                                                                // Find a post by its slug and pass it to a view called "post"
    $post = Post::find($slug);

    ddd($post);

    return view('post', [
        'post' => $post
    ]);
});


                                                                //Caching and timing

//Route::get('post/{post}', function ($slug) {
//    $path = __DIR__ . "/../resources/posts/{$slug}.html";
//
//    if (!file_exists($path)) {
//        return redirect('/');
//    }                                                          //check if file exist//

//    $post = cache()->remember("posts.{$slug}", 5, function () use ($path){   // now()->addMinutes(20) === u can write just: "1200" . its 1200 seconds= 20 minutes
//        var_dump( 'file_get_contents');
//        return file_get_contents($path);
//    });

///    $post = file_get_contents($path);

//    return view('post', [                                       ////passed to the few
//        'post' => $post
//    ]);
//})->where('post', '[A-z_\-]+');
                                        ////->whereAlpha('post', '[A-z]+');

