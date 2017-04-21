<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('guest', ['except' => 'logout']);
       // $this->middleware('is_admin', ['except' => 'auth/login']);
    }

     /**
     * Allows only one user per session.
     *
     */
/*    public function authenticated(Request $request,User $user){
        $previous_session = $user->session_id;

        if ($previous_session) {
            \Session::getHandler()->destroy($previous_session);
        }

        Auth::user()->session_id = \Session::getId();
        Auth::user()->save();
        return redirect()->intended($this->redirectPath());
    }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'type' => 'required',
        ]);
    }

     /**
     * Get a validator for an incoming edit User request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
            'type' => 'required',
        ]);
    }

     /**
     * Get a validator for an incoming delete User request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorDelete(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email',
            'name'=> 'required'
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => $data['type'],
            'status'=> 1
        ]);
    }

   public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->create($request->all());

        return redirect('registerUser')->with('message', 'El usuario ha sido creado exitosamente');;
    }

    public function showEditUserWindow()
    {
        return view('auth.edit');
    }

    public function findUserByEmail(Request $request)
    {
        $userEmail= $request->input('email');

        $user= User::where('email', $userEmail)->first();

        if($user==null)
        {
             return ['error_status' => 'Usuario no encontrado'];
        }

        return $user->toJson();

    }

    public function editUser (Request $request)
    {
        $currentUserEmail= $request->input('email');
        $currentUser= User::where('email', $currentUserEmail)->first();

        if($currentUser== null)
        {
             return redirect ('editUser')->with('error_status', 'EL usuario que desea editar no se encuentra en la base de datos');
        }

        $validator = $this->validatorEdit($request->all());

        if ($validator->fails())
        {
             return redirect('editUser')->withInput()->withErrors($validator);
        }

        $currentUser->name= $request->input('name');
        $currentUser->email= $request->input('emailToChange');
        $currentUser->password= bcrypt($request->input('password'));
        $currentUser->type= $request->input('type');

        $currentUser->save();

        return redirect('editUser')->with('message', 'El usuario ha sido editado exitosamente');;

    }

     public function showDeleteUserWindow()
    {
        return view('auth.delete');
    }

     public function deleteUser (Request $request)
    {
        $currentUserEmail= $request->input('email');
        $currentUser= User::where('email', $currentUserEmail)->first();

        if($currentUser== null)
        {
             return  redirect('deleteUser')->with('error_status', 'EL usuario que desea eliminar no se encuentra en la base de datos');
        }

        $validator = $this->validatorDelete($request->all());

        if ($validator->fails())
        {
            dd("entro aqui");
             return redirect('deleteUser')->with('error_status', 'Debe buscar un usuario valido antes de eliminar');
        }

        $currentUser->status= 0;

        $currentUser->save();

        return redirect('deleteUser')->with('message', 'El usuario ha sido eliminado exitosamente');

    }

}
