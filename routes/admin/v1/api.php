<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Admin\AuthControllerAdmin;



Route::get('/notAuth', function (Request $request) {
    return response()->json(["success" => false, "message" => "انت لم تسجل دخولك أو انتهت الجلسة الخاصة بك"], 401);
});



    # # # # # # # # # # # # # # # Auth # # # # # # # # # # # # # # # 
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/signup', [AuthControllerAdmin::class, 'store']);
       Route::post('/login', [AuthControllerAdmin::class, 'login']);
    });
    # # # # # # # # # # # # # # # End Auth # # # # # # # # # # # # # # # 



        Route::get('/', function(){
            return 'hello';
        })->middleware(['auth:sanctum', 'type.admin']);
        
  