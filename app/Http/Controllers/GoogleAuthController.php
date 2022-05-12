<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try{
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id',$user->id)->first();

            if($findUser){
                Auth::login($findUser);
                return redirect()->intended('dashboard');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('mypass')
                ]);
                Auth::login($newUser);

                //return view('auth.usertype');
                
                return redirect()->intended('dashboard');

                //return redirect()->intended('das');
                //return view('usertype');
            }

        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function updateUserType(Request $request, $google_id)
    {
        $data = user::find($google_id);


        $data->userType = $request->userType;
        
        $data->save();
        
        //Auth::login($newUser);
        //return redirect()->intended('dashboard');
        return view('dashboard');
    }


    
}
