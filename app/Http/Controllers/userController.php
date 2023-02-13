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
        $user = DB::table('usuario-materia')
            ->join('materias', 'materias.id', '=', 'usuario-materia.idMateria')
            ->join('usuarios', 'usuarios.id', '=', 'usuario-materia.idUsuario')
            ->where('usuario-materia.idUsuario', (int)$id)
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

        DB::table('usuarios')->insert([
            'nombre' => $name,
            'apellido' => $lastname,
            'email' => $email,
            'clave' => $password,
            'telefono' => $phone
        ]);

        $id = DB::getPdo()->lastInsertId();

        foreach ($matters as &$matter) {
            $newMatter = (int)addslashes($matter);

            DB::table('usuario-materia')->insert([
                'idUsuario' => $id,
                'idMateria' => $newMatter
            ]);
        }

        return redirect('/');
    }

    public function deleteUser($id){
        DB::table('usuarios')->where('id', (int)$id)->delete();
        DB::table('usuario-materia')->where('idUsuario', (int)$id)->delete();

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

        DB::table('usuario-materia')->where('idUsuario', (int)$id)->delete();

        foreach ($matters as &$matter) {
            $newMatter = (int)addslashes($matter);

            DB::table('usuario-materia')->insert([
                'idUsuario' => $id,
                'idMateria' => $newMatter
            ]);
        }

        return redirect('/');
    }

    public function getMatters(){
        $matters = DB::table('materias')->get();

        return $matters;
    }

    public function getMattersByUser($id){

        $matters = DB::table('usuario-materia')
            ->join('materias', 'materias.id', '=', 'usuario-materia.idMateria')
            ->select('materias.nombre')
            ->where('usuario-materia.idUsuario', (int)$id)
            ->get();

        return $matters;
    }
}
