<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $status_code = 200;

    // User Sign Up
    public function userSignUp(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                "first_name" => "required",
                "last_name" => "required",
                "email" => "required|email",
                "password" => "required",
                "address" => "required",
                "province" => "required",
                "postal_code" => "required"
            ]
        );
        if ($validator->fails()) {
            return response()->json(["status" => "failed", "message" => "validation_error", $validator->errors()]);
        }

        $id = 0;
        $user_id = 0;
        $role = "user";

        $userDataArray = array(
            "id" => $id,
            "user_id" => $user_id,
            "role" => $role,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" => md5($request->password),
            "address" => $request->address,
            "province" => $request->province,
            "postal_code" => $request->postal_code
        );

        $user_status = User::where("email", $request->email)->first();

        if (!is_null($user_status)) {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! email already registered"]);
        }

        $user = User::create($userDataArray);

        if (!is_null($user)) {
            return response()->json(["status" => $this->status_code, "success" => true, "message" => "Registration completed successfully", "data" => $user]);
        } else {
            return response()->json(["status" => "failed", "success" => false, "message" => "failed to register"]);
        }
    }

    // User Login
    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                "email" => "required|email",
                "password" => "required"
            ]
        );

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_error" => $validator->errors()]);
        }

        // Check if the entered email exists in the database
        $email_status = User::where("email", $request->email)->first();

        // If the email exists then check password for the same email
        if (!is_null($email_status)) {
            $password_status = User::where("email", $request->email)->where("password", md5($request->password))->first();

            // If the password is correct
            if (!is_null($password_status)) {
                $user = $this->userDetail($request->email);
                return response()->json(["status" => $this->status_code, "success" => true, "message" => "You have logged in successfully", "data" => $user]);
            } else {
                return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Incorrect password."]);
            }
        } else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Email doesn't exist."]);
        }
    }

    // User Detail
    public function userDetail($email)
    {
        $user = array();
        if ($email != "") {
            $user = User::where("email", $email)->first();
            return $user;
        }
    }
}
