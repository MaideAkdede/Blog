<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use MailchimpMarketing\ApiClient;
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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/register',
    [RegisterController::class, 'create'])
    ->middleware('guest');
Route::post('/register',
    [RegisterController::class, 'store'])
    ->middleware('guest');
// seul un utilisateur authentifié peut se Log Out
Route::post('/logout',
    [SessionController::class, 'destroy'])
    ->middleware('auth');
// Afficher formulaire de Login qui n'est accessible que au utilisateur non connecté
Route::get('/login',
    [SessionController::class, 'create'])
    ->middleware('guest');
//
Route::get('/dashboard',
    [SessionController::class, 'show'])
    ->middleware('auth');
//
Route::post('/sessions',
    [SessionController::class, 'store'])
    ->middleware('guest');
// Comments
Route::post('/posts/{post}/comments',
    [\App\Http\Controllers\PostCommentController::class, 'store'])
    ->middleware('auth');
//Mailchimp
Route::get('/mc', function () {
    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => config('services.mailchimp.server-prefix'),
    ]);

    $response = $mailchimp->lists->addListMember('80f765bb88', [
        "email_address" => "maide.akdede@student.hepl.be",
        "status" => "subscribed",
    ]);
    ddd($response);
});
// Mailchimp Newsletter Post Add
Route::post('/newsletter', NewsletterController::class);
// Get the Form to add a Post
Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->middleware('admins');
// Post datas into db
Route::post('/admin/posts', [AdminPostController::class, 'store'])->middleware('admins');
// View All Posts Page to Edit
Route::get('/admin/posts', [AdminPostController::class, 'index'])->middleware('admins');
// Edit page
Route::get('/admin/posts/{post:slug}/edit', [AdminPostController::class, 'edit'])->middleware('admins');
Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admins');
