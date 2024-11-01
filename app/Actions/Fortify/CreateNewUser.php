<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Afiliados;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        
        Validator::make($input, [
            'identificationNac' => ['required', 'string', 'max:1'],
            'identificationNumber' => ['required', 'string', 'max:12'],
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        
        $user = User::create([
            'identificationNac' => $input['identificationNac'],
            'identificationNumber' => $input['identificationNumber'],
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => $input['role'],
            'password' => Hash::make($input['password']),
        ]);
        
        return $user;

/*        return User::create([
            'name' => $input['name'],
            'cedula' => $input['cedula'],
            'tipocedula' => $input['tipocedula'],
            'celular' => $input['celular'],
            'email' => $input['email'],
            'role_id' => $input['role_id'],
            'direccion' => $input['direccion'],
            'tipo_usuario' => $input['role_id'],
            'password' => Hash::make($input['password']),
        ]);
        */
        
    }
}





