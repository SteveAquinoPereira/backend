<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUserRequest;
use App\User;
USE DB;

class UserController extends Controller
{
    /**
     * AQUI MOSTRAMOS TODOS LOS RECURSOS PERTENECIENTES A UN MODELO
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $id_user = auth()->user()->id_user;
        $user_type = auth()->user()->id_user_type01;
        $accepted = auth()->user()->accepted;

      if($accepted){
 
           switch($user_type){

            case 1:
            
                $personalData = DB::table('users')
                ->select('id_user','avatar','first_name','last_name')->where('id_user',$id_user)->get();

                $sectionsData = DB::table('sections')->select('id_section','section_name')->get();

                $subjectsData = DB::table('subjects')->select('id_subject','subject_name')->get();

                $usersData = DB::table('users')
                ->join('user_types','id_user_type','id_user_type01')
                ->select('id_user','avatar','first_name','last_name','accepted','id_user_type01','id_section01')->where('accepted',false)->get();

                return response(['personalData' => $personalData,
                                 'usersData' => $usersData,
                                 'sectionsData' => $sectionsData,
                                 'subjectsData' => $subjectsData]);

            break;

            case 2:

                $personalData = DB::table('users')
                ->select('id_user','avatar','first_name','last_name')->where('id_user',$id_user)->get();

                $subjectsData = DB::table('users')
                ->join('sections','id_section','id_section02')
                ->join('section_subject','id_teacher','id_user')
                ->join('subjects','id_subject','id_subject01')
                ->select('id_subject','subject_name')
                ->where('id_user',$id_user)->get();

                return response(['personalData' => $personalData, 'subjectsData' => $subjectsData, 'sectionsData' => $sectionsData]);

            break;

            case 3:

            $personalData = DB::table('users')
                ->select('id_user','avatar','first_name','last_name')->where('id_user',$id_user)->get();

            $subjectsData = DB::table('users')
                ->join('sections','id_section','id_section01')
                ->join('section_subject','id_section02','id_section')
                ->join('subjects','id_subject','id_subject01')
                ->select('id_subject','subject_name')
                ->where('id_user',$id_user)->get();

            $sectionsData = DB::table('users')
                ->join('sections','id_section','id_section01')
                ->select('id_section','section_name')
                ->where('id_user',$id_user)->get();

            return response(['personalData' => $personalData, 'subjectsData' => $subjectsData, 'sectionsData' => $sectionsData]);

            break;

            default:
            return response('No tienes ningun roll asignado');

           }

       }else{
        return response('Sin Autorizacion',401);
       }

       
    }

    /**
     * AQUI ALMACENAMOS LOS ATRIBUTOS DE NUESTRO RECURSO USUARIO
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
        $id_user = auth()->user()->id_user;
        $userData = DB::table('users')
            ->select('avatar','first_name','last_name','phone_number','address','email')->where('id_user',$id_user)->get();
            return $userData;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept(StoreUserRequest $request,$id_user)
    {

        $user = User::find($id_user);
        $user->id_section01 = $request->id_section;
        $user->id_user_type01 = $request->id_user_type;
        $user->accepted = 1;
        $user->save();
        return response('Usuario Aceptado',200);
    }

    public function update(Request $request,$id_user){
        $id_user = auth()->user()->id_user;
        $user = User::find($id_user);

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            $user->avatar = $name;
        }

        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->save();
        return response('Datos Actualizados correctamente',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        $user = User::find($id_user);
        $user->delete();
        return response('Usuario Eliminado Satisfactoriamente',200);
    }
}
