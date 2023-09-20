<?php

use App\ECommerce\Static\Models\Paragraph;
use App\ECommerce\Static\Models\WebImage;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$webImages = WebImage::all();
$webParagraphs = Paragraph::all();
$contactDetails = ContactUs::first();

Route::group([
    'namespace'     => 'App\Http\Controllers\Web',
    'controller'    => 'ClientController',
], function (){

    Route::get('/', 'index');
    Route::get('/profile', 'profile');

    Route::get('/register', 'register');
    Route::post('/store', 'store')->name('store');
    Route::get('/verify/{email}', 'verify');

    Route::get('/login', 'login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');

    Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
    Route::post('/reset-password/{update?}', 'resetPassword')->name('reset-password');
    Route::get('/update-password-view/{email}', 'emailViewForm')->name('update-password-view');
    Route::post('/update-password', 'updatePassword')->name('update-password');

    Route::get('/logout', 'logout');
});

Route::group([
    'namespace'     => 'App\Http\Controllers\Web',
    'controller'    => 'ClientProductController',
], function (){

    Route::get('products/{subCategory?}', 'index')->name('products.index');
    Route::get('products/{product}/show', 'show')->name('products.show');

});

Route::get('contact-us', function () use ($webImages, $webParagraphs, $contactDetails){

    return view('Web.Static.contact-us', [
        'webImages'      => $webImages,
        'webParagraphs'  => $webParagraphs,
        'contactDetails' => $contactDetails
    ]);

});

Route::get('about-us', function () use ($webImages, $webParagraphs, $contactDetails){

    return view('Web.Static.about-us', [
        'webImages'      => $webImages,
        'webParagraphs'  => $webParagraphs,
        'contactDetails' => $contactDetails
    ]);
});

