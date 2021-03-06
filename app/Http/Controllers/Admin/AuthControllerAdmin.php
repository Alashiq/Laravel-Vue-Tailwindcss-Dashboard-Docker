<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\AdminResource;

class AuthControllerAdmin extends Controller
{
    
public function index(Request $request){
    return $request->user()->role;
    return 'hello';
}

    // Add New Admin
    public function store(Request $request)
    {
        if (Validator::make($request->all(), [
            'phone' => 'unique:admins',
        ])->fails()) {
            return response()->json(["success" => false, "message" => "اسم الدخول محجوز مسبقا"], 400);
        }
        $admin = Admin::create([
            'phone' => $request['phone'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'role_id' => $request['role_id'],
            'password' => Hash::make($request['password']),
        ]);
        return response()->json(['success' => true, 'message' => 'تم إنشاء هذا الحساب بنجاح'], 200);
    
    }



    // Login Admin
    public function login(Request $request)
    {
        $admin = Admin::with('role')->where('phone', $request->phone)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {

            return response()->json(['success' => false, 'message' => 'إسم المستخدم أو كلمة المرور غير صحيحة'], 401);
        }

        if ($admin->state == 0) {
            return response()->json(['success' => false, 'message' => 'هذا الحساب غير مفعل قم بالتواصل مع المسؤول لتفعيل حسابك'], 400);
        } elseif ($admin->state == 2)
            return response()->json(['success' => false, 'message' => 'هذا الحساب محظور ولا يمكن استخدامه مجددا'], 400);

            $admin->token=$admin->createToken('website', ['role:admin'])->plainTextToken;
        return response()->json([
            'success' => true,
            'message' => 'تم تسجيل الدخول بنجاح',
            'user' => new AdminResource($admin),
        ]);
    }

}