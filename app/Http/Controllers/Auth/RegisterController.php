<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Jamiicare\Roles\RolesRepository;
use Jamiicare\Users\UsersRepository;

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

    /*
     * Inject the required dependencies
     */
    protected $usersRepository;
    protected $rolesRepository;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @param UsersRepository $usersRepository
     * @param RolesRepository $rolesRepository
     */
    public function __construct(
        UsersRepository $usersRepository,
        RolesRepository $rolesRepository
    )
    {
        $this->middleware('guest');
        $this->usersRepository = $usersRepository;
        $this->rolesRepository = $rolesRepository;
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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Jamiicare\User
     */
    protected function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);

        $user = $this->usersRepository->save($data);

        $role = $this->rolesRepository->getRoleById(2); //basic user

        $this->usersRepository->attachRole($user, $role);

        return $user;
    }
}
