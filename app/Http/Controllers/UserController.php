<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $user_email = User::whereEmail($request->email)->first();
        $user_name = User::whereName($request->name)->first();

        if($user_name)
        {
            return ['register_error' => 'Username in use'];
        }elseif($user_email)
        {
            return ['register_error' => 'E-mail in use'];
        }else{
            $input = $request->all();
            $confirmation_key = random_int(0, 10000);
            $input['confirmation_key'] = $confirmation_key;

            $send_data = [];
            $send_data['name'] = $request->name;
            $send_data['email'] = $request->email;
            $send_data['link'] = $request->url() . '/email_confirmation/' . $request->email . '/' .  $confirmation_key;

            Mail::send('emails.verify', ['send_data' => $send_data], function($message) use ($send_data)
            {
                $message->from('luketic.damir@gmail.com', 'Video collection admin');
                $message->to($send_data['email'], $send_data['name'])->subject('Video collection - e-mail confirmation');
            });

            User::create($input);
            return [1];
            // User set
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
        $name_email = $request->all()['nameEmail'];
        $password = $request->all()['password'];

        if($user = User::where('email', 'like', $name_email)->orWhere('name', 'like', $name_email)->first())
        {
            if (password_verify($password, $user->password))
            {
                $user_data = [];
                $user_data['id'] = $user->id;
                $user_data['name'] = $user->name;
                $user_data['email'] = $user->email;
                $user_data['is_confirmed'] = $user->is_confirmed;
                $user_data['country'] = isset($user->country->name) ? $user->country->name : null;
                $user_data['is_visible'] = $user->is_visible;
                return $user_data;
            } else
            {
                return [1];
//                 Error "False password"
            }
        }else
        {
            return [0];
//             Error "False validation"
        }
    }

    public function email_confirmation(Request $request, $email, $key){
        $user  = User::whereEmail($email)->whereConfirmationKey($key)->first();
        if($user)
        {
            $user->update(['is_confirmed' => 1]);

            $set_user = [];
            $set_user['id'] = $user->id;
            $set_user['name'] = $user->name;
            $set_user['email'] = $user->email;
            $set_user['is_confirmed'] = $user->is_confirmed;
            $set_user['country'] = $user->country;
            $set_user['is_visible'] = $user->is_visible;

            return redirect('http://localhost:4200/email_confirmed/1');
        }else{
            return redirect('http://localhost:4200/email_confirmed/0');
        }
    }
}
