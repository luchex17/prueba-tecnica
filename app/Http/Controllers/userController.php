<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getUsers(){
        $users = DB::table('usuarios')->get();

        return $users;
    }

    public function getUser($id){
        $user = DB::table('usuario_materia')
            ->join('materias', 'materias.id', '=', 'usuario_materia.idmateria')
            ->join('usuarios', 'usuarios.id', '=', 'usuario_materia.idusuario')
            ->where('usuario_materia.idusuario', $id)
            ->get();

        return $user;
    }

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function createUser(Request $request){
        $name = addslashes($request->nombre);
        $lastname = addslashes($request->apellido);
        $email = addslashes($request->email);
        $phone = addslashes($request->telefono);
        $password = Hash::make($request->newPassword);
        $matters = $request->materias;

        $user = DB::table('usuarios')->insert([
            'nombre' => $name,
            'apellido' => $lastname,
            'email' => $email,
            'clave' => $password,
            'telefono' => $phone
        ]);

        $id = DB::table('usuarios')->get()->last()->id;

        foreach ($matters as &$matter) {
            $newMatter = addslashes($matter);

            DB::table('usuario_materia')->insert([
                'idusuario' => $id,
                'idmateria' => $newMatter
            ]);
        }

        return redirect('/');
    }

    public function deleteUser($id){
        DB::table('usuarios')->where('id', $id)->delete();
        DB::table('usuario_materia')->where('idusuario', $id)->delete();

        return true;
    }

    public function updateUser(Request $request, $id){
        $name = addslashes($request->nombre);
        $lastname = addslashes($request->apellido);
        $email = addslashes($request->email);
        $phone = addslashes($request->telefono);
        $matters = $request->materias;

        DB::table('usuarios')
              ->where('id', $id)
              ->update([
                'nombre' => $name,
                'apellido' => $lastname,
                'email' => $email,
                'telefono' => $phone
            ]);

        DB::table('usuario_materia')->where('idusuario', $id)->delete();

        foreach ($matters as &$matter) {
            $newMatter = addslashes($matter);

            DB::table('usuario_materia')->insert([
                'idusuario' => $id,
                'idmateria' => $newMatter
            ]);
        }

        return redirect('/');
    }

    public function getMatters(){
        $matters = DB::table('materias')->get();

        return $matters;
    }

    public function getMattersByUser($id){

        $matters = DB::table('usuario_materia')
            ->join('materias', 'materias.id', '=', 'usuario_materia.idmateria')
            ->select('materias.nombre')
            ->where('usuario_materia.idusuario', $id)
            ->get();

        return $matters;
    }
}
