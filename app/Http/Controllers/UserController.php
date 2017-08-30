<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::whereEmail($request->email)->orWhere('name', 'like', $request->name)->first();

        if(!isset($user))
        {
            User::create($request->all());
            return [1];
            // User set
        }else{
            return [0];
            // E-mail or username in use
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request)
    {
        $email_name = $request->all()['emailName'];
        $password = $request->all()['password'];

        if($user = User::where('email', 'like', $email_name)->orWhere('name', 'like', $email_name)->first())
        {
            if (password_verify($password, $user->password))
            {
                $user_data['id'] = $user->id;
                $user_data['name'] = $user->name;
                $user_data['email'] = $user->email;
                $user_data['is_confirmed'] = $user->is_confirmed;
                $user_data['country'] = $user->country->name;
                $user_data['is_visible'] = $user->is_visible;
                return $user_data;
            } else
            {
                return [1];
                // Error "False password"
            }
        }else
        {
            return [0];
            // Error "False validation"
        }
    }
}
