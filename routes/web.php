<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/example', function () {
    return Inertia::render('Example');
})->name('example');

Route::get('/', function () {
    return Inertia::render('Landing/Home');
})->name('home');

Route::get('/about-us', function () {
    return Inertia::render('Landing/AboutUs');
})->name('about-us');

Route::get('/our-services', function () {
    return Inertia::render('Landing/OurServices');
})->name('our-services');

Route::get('/our-gallery', function () {
    return Inertia::render('Landing/OurGallery');
})->name('our-gallery');

Route::get('/contact-us', function () {
    return Inertia::render('Landing/ContactUs');
})->name('contact-us');

Route::get('/example', function () {
    return Inertia::render('Example');
})->name('example');


Route::middleware(['auth:sanctum', 'verified'])->get('/notices', function () {
    return Inertia::render('Notices/Index');
})->name('notices');

Route::middleware(['auth:sanctum', 'verified'])->get('/services', function () {
    return Inertia::render('Services/Index');
})->name('services');

Route::middleware(['auth:sanctum', 'verified'])->get('/gallery', function () {
    return Inertia::render('Gallery/Index');
})->name('gallery');

Route::get('/find/{page}/{folder?}', function ($page, $folder = null) {

    $directory = base_path() . '/resources/images/' . $page . ($folder ? '/' . $folder : '');
    $dirint = dir($directory);
    $images = array();
    while (($archivo = $dirint->read()) !== false) {
        if ($archivo != "." && $archivo != "..") {
            array_push($images, $archivo);
        }
    }
    $dirint->close();
    return json_encode($images);
});

Route::get('/src/{page}/{folder?}/{filename}', function ($page, $folder = "null", $filename) {
    try {
        $path = '';
        if ($folder == "null") {
            $path = base_path() . '/resources/images/' . $page . '/' . $filename;
        } else {
            $path = base_path() . '/resources/images/' . $page . '/' . $folder . '/' . $filename;
            //$path = storage_path() . '/app/' . $folder . '/' . $filename;
        }
        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;


    } catch (Throwable $th) {
        return $th->getMessage();
    }
});
