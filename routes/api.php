<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SliderController;
use Illuminate\Support\Facades\Route;


// Product API routes
Route::get("/product", [ProductController::class, "viewProduct"]);
Route::post("/product/add", [ProductController::class, "addProduct"]);
Route::post("/product/update/{id}", [ProductController::class, "updateProduct"]);
Route::post("/product/delete/{id}", [ProductController::class, "deleteProduct"]);



// Slider API routes
Route::get("/slider", [SliderController::class, "viewSlider"]);
Route::post("/slider/add", [SliderController::class, "addSlider"]);
Route::post("/slider/update/{id}", [SliderController::class, "updateSlider"]);
Route::post("/slider/delete/{id}", [SliderController::class, "deleteSlider"]);


// Cart API routes
Route::get("/cart", [CartController::class, "viewCart"]);
Route::post("/cart/add", [CartController::class, "addCart"]);
Route::post("/cart/delete/{id}", [CartController::class, "deleteCart"]);



// Order API routes
Route::get("/order", [OrderController::class, "viewOrder"]);
Route::post("/order/add", [OrderController::class, "addOrder"]);
Route::post("/order/delete/{id}", [OrderController::class, "deleteOrder"]);



// Registration API routes
Route::get("/admin_get_members_access", [MemberController::class, "adminGetMembersAccess"]);
Route::post("/register", [MemberController::class, "register"]);
Route::post("/login", [MemberController::class, "login"]);
Route::get("/get_members", [MemberController::class, "get_members"]);
