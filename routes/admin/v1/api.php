<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Admin\AuthControllerAdmin;



Route::get('/notAuth', function (Request $request) {
    return response()->json(["success" => false, "message" => "انت لم تسجل دخولك أو انتهت الجلسة الخاصة بك"], 401);
});


    # # # # # # # # # # # # # # # Admin Not Auth # # # # # # # # # # # # # # # 

Route::controller(AuthControllerAdmin::class)->prefix('auth')->group(function () {
    Route::post('/signup', 'store');
    Route::post('/login', 'login');
});
    # # # # # # # # # # # # # # # End Admin Not Auth # # # # # # # # # # # # # # # 



        Route::get('/', function(){
            return 'hello';
        })->middleware(['auth:sanctum', 'type.admin']);
        
  