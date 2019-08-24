<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/homes';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nik' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'notelpon' => ['required', 'string', 'max:255'],

        ]);


    }

 /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $data = [
            "maxAttempt"=> "0",
            "phoneNum"=> "085350439065",
            "expireIn"=> "300",
            "content"=> "Masukan nomor verifikasi anda{{otp}}",
            "digit"=> "6"
        ];

        $payload = json_encode($data);

        // Prepare new cURL resource
        $ch = curl_init('https://api.thebigbox.id/sms-otp/1.0.0/otp/t5AJCw3EJIEebn2Ha2juqEesKMut4Sp6');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

        // Set HTTP Header for POST request
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:t5AJCw3EJIEebn2Ha2juqEesKMut4Sp6',
            'Accept:application/json',
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload))
        );

        // Submit the POST request
        $result = curl_exec($ch);

        // Close cURL session handle
        curl_close($ch);

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nik' => $data['nik'],
            'alamat' => $data['alamat'],
            'notelpon' => $data['notelpon'],

        ]);



    }

    public function test(){

         $data = [
            "maxAttempt"=> "0",
            "phoneNum"=> "085350439065",
            "expireIn"=> "300",
            "content"=> "Masukan nomor verifikasi anda {{otp}}",
            "digit"=> "6"
        ];

        $payload = json_encode($data);

        // Prepare new cURL resource
        $ch = curl_init('https://api.thebigbox.id/sms-otp/1.0.0/otp/t5AJCw3EJIEebn2Ha2juqEesKMut4Sp6');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

        // Set HTTP Header for POST request
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'x-api-key:t5AJCw3EJIEebn2Ha2juqEesKMut4Sp6',
            'Accept:application/json',
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload))
        );

        // Submit the POST request
        $result = curl_exec($ch);

        // Close cURL session handle
        curl_close($ch);
    }
}
