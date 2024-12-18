<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(User::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            "name" => "required|string",
            "surname" => "required|string",
            "email" => "required|email|unique:users",
        ], [
            "name.required" => "Name is required",
            "name.string" => "Name must be a string",
            "surname.required" => "Surname is required",
            "surname.string" => "Surname must be a string",
            "email.required" => "Email is required",
            "email.email" => "Email must be a valid email address",
            "email.unique" => "Email already exists",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = new User();
        $user->fill($data);
        $user->save();
        return response()->json($user, 204);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) return response(null, 404);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) return response(null, 404);
        $data = $request->all();
        $validator = Validator::make($data, [
            "name" => "required|string",
            "surname" => "required|string",
            "email" => ["required", "email", Rule::unique("users")->ignore($id)],
        ], [
            "name.required" => "Name is required",
            "name.string" => "Name must be a string",
            "surname.required" => "Surname is required",
            "surname.string" => "Surname must be a string",
            "email.required" => "Email is required",
            "email.email" => "Email must be a valid email address",
            "email.unique" => "Email already exists",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user->update($data);
        return response()->json($user, 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) return response(null, 404);
        $user->delete();
        return response()->json(null, 204);
    }
}
