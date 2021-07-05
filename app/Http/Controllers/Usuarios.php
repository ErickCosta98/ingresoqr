<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class Usuarios extends Controller
{
    //

    public function gUser(Request $request){
        $request->validate(['nombre' => ['required', 'string', 'max:255'],
        'apelPat' => ['required', 'string', 'max:255'],
        'apelMat' => ['required', 'string', 'max:255'],
        'Usuario' => ['required', 'string', 'max:20', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
        User::create([
            'nombre' => $request['nombre'],
            'apelPat' =>  $request['apelPat'],
            'apelMat'=> $request['apelMat'],
            'usuario' => $request['usuario'],
            'password' => Hash::make($request['contraseña']),
        ]);
        return redirect()->route('home');
    }

    public function authLog(Request $request){
        $credenciales = $request->validate([
            'usuario' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8'],
        ]);
       if(Auth::attempt(['usuario' => $credenciales['usuario'], 'password' => $credenciales['password']])){
        $status =   User::select()->where('usuario',$credenciales['usuario'])->value('estatus');
        $request->session()->regenerate();
        if($status!=1){
            throw ValidationValidationException::withMessages([
                'usuario' => __('auth.failed')
            ]);
        }
        return redirect()->route('home');
        }
        throw ValidationValidationException::withMessages([
            'usuario' => __('auth.failed')
        ]);
        
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();

        return redirect('/');
    }

    public function userList(){
        $users = User::paginate();

        return view('userList',compact('users'));
    }

    public function userEdit($id){
        $user = User::find($id);
        // return $user;
        return view('editUser',compact('user'));
    }

    public function userUpdate(Request $request ,User $user ){

        $user->nombre = $request->nombre;
        $user->apelPat = $request->apelPat;
        $user->apelMat = $request->apelMat;

        $user->save();
    return redirect()->route('userList');
    }

    public function userUpdatePassword(Request $request){
        User::where('id',$request['id'])->update(['password' => Hash::make($request['contraseña'])]);
    return redirect()->route('userEdit',$request->id);
    }

    public function userDelete($id){
        User::where('id',$id)->update(['estatus' => '0']);
        return redirect()->route('userList');
    }
    public function userActive($id){
        User::where('id',$id)->update(['estatus' => '1']);
        return redirect()->route('userList');
    }
}
