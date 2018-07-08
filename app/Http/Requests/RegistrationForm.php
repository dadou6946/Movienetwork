<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\WelcomeNew;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }

    public function persist()
    {
        // Création d'un user, et encryptage du mdp
        $user = User::create([
            'name' => $this['name'],
            'email' => $this['email'],
            'password' => bcrypt($this['password'])
            ]);

        // Log it
        auth()->login($user);

        // Envoi d'un mail de bienvenue
        Mail::to($user)->send(new WelcomeNew($user));

    }
}
