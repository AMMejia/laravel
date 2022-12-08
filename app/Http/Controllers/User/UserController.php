<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    /**
     * Display one field of the current resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->email_verified_at = now();
            $user->save();
            return response()->json($user, 200);
        } catch (\Exception $exception)
        {
            return response()->json($exception->getMessage(), 203);  
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $user->update($request->except('password'));
        if ($request->password != '') {
            $user->update(["password" => bcrypt($request->password)]);
        }
        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json('Success', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->guard('api')->user();
        //$request->validate(['profile_image' => 'required|mimes:jpeg,jpg,png,gif|max:3000']);
        $user->profile_image = \Storage::url(\Storage::disk('public')->putFile('uploads/profiles', $request->file('profile_image')));
        $user->save();
        return response()->json(__('response.update.success'), 200);
    }

    /**
     * Update the password of current User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request){
        $user = auth()->guard('api')->user();
        if (\Hash::check($request->old_password,  $user->password)) {
            if($request->password === $request->new_password)
            {
                $user->update(["password" => bcrypt($request->password)]);
                return response()->json(__('response.update.success'), 200);
            } else {
                return response()->json(__('Las contraseñas no son iguales'), 403);
            }
        } 
        return response()->json(__('La contraseña anterior no coincide'), 403);
    }

    /**
     * Update the email and name of current User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function changeProfile(Request $request){
        $user = auth()->guard('api')->user();

        $request->validate([
            'name' => 'bail|required|string|min:1',
            'email' => 'email|required|unique:users,email,'.$user->id,
        ]);

        $user->update([
            "name" => $request->name, 
            "email" => $request->email, 
        ]);

        return response()->json(__('response.update.success'), 200);
    } 
       
}
