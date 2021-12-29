<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ContactSettingController;
use App\Http\Controllers\Backend\CtaController;
use App\Http\Controllers\Backend\HeroController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\SeoController;
use App\Http\Controllers\Backend\SocialLinkController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
// Route::group(['prefix' => 'admin', 'middleware' => 'auth:sanctum'], function () {
Route::group(['prefix' => 'admin'], function () {
    Route::get('/posts', [BlogController::class, 'posts']);
    Route::get('/posts/{id}', [BlogController::class, 'post']);
    Route::post('/posts/store', [BlogController::class, 'store_post']);
    Route::get('/posts/update/status/{id}', [BlogController::class, 'update_status']);
    Route::put('/posts/update', [BlogController::class, 'update_post']);
    Route::delete('/posts/destory/{id}', [BlogController::class, 'destroy_post']);

    Route::get('/messages', [ContactController::class, 'messages']);
    Route::post('/messages', [ContactController::class, 'store_messages']);
    Route::get('/messages/{id}', [ContactController::class, 'message']);
    Route::delete('/messages/{id}', [ContactController::class, 'destroy_message']);

    Route::get('/cta', [CtaController::class, 'cta_section']);
    Route::post('/cta', [CtaController::class, 'update_cta_section']);

    Route::get('/contact-info', [ContactSettingController::class, 'contact_info']);
    Route::post('/contact-info', [ContactSettingController::class, 'update_contact_info']);

    Route::get('/hero', [HeroController::class, 'hero']);
    Route::post('/hero', [HeroController::class, 'update_hero']);

    Route::get('/portfolios', [PortfolioController::class, 'portfolio']);
    Route::post('/portfolios', [PortfolioController::class, 'store_portfolio']);
    Route::delete('/portfolios/{id}', [PortfolioController::class, 'destroy_portfolio']);
    
    Route::get('/seo', [SeoController::class, 'seo']);
    Route::post('/seo', [SeoController::class, 'update_seo']);

    Route::get('/social-link', [SocialLinkController::class, 'social_link']);
    Route::post('/social-link', [SocialLinkController::class, 'update_social_link']);
});
Route::group(['prefix' => 'user'], function () {
    Route::get('/hero', [HeroController::class, 'hero']);
    Route::get('/cta', [CtaController::class, 'cta_section']);
    Route::get('/posts', [BlogController::class, 'posts']);
    Route::get('/posts/{id}', [BlogController::class, 'post']);
    Route::post('/messages', [ContactController::class, 'store_messages']);
    Route::get('/contact-info', [ContactSettingController::class, 'contact_info']);
    Route::get('/portfolios', [PortfolioController::class, 'portfolio']);
    Route::get('/seos', [SeoController::class, 'seo']);
    Route::get('/social-link', [SocialLinkController::class, 'social_link']);
});
