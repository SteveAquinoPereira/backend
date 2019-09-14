<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use DB;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evaluation = new Evaluation();
        $evaluation->evaluation_type = $request->evaluation_type;
        $evaluation->percentage = $request->percentage;
        $evaluation->id_subject03 = $request->id_subject;
        $evaluation->id_cut01 = $request->id_cut;
        $evaluation->save();
        return response('Evaluacion Creada Satisfactoriamente',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEvaluations($id_section,$id_subject,$id_user)
    {
        $cuts = DB::table('cuts')->select('id_cut','cut_name')->get();

        $evaluations = DB::table('users')
        ->join('sections','id_section','id_section01')
        ->join('section_subject','id_section02','id_section')
        ->join('subjects','id_subject','id_subject01')
        ->join('evaluations','id_subject02','id_subject')
        ->join('evaluation_user','id_evaluation01','id_evaluation')
        ->select('id_cut01','id_evaluation','evaluation_type','percentage','grade')
        ->where(['id_section01' => $id_section,'id_subject03' => $id_subject,'id_user' => $id_user])->get();
        
        $users = DB::table('users')->select('first_name','last_name')->where('id_user',$id_user);

        $subjects = DB::table('subjects')->select('subject_name')->where('id_subject',$id_subject);

        $sections = DB::table('sections')->select('section_name')->where('id_section',$id_section);

        return response(['evaluations' => $evaluations, 'cuts' => $cuts, 'users'=> $users,
         'subjects' => $subjects, 'sections' => $sections]);
    }

    public function getEvaluations($id_user,$id_section,$id_subject)
    {
        $cuts = DB::table('cuts')->select('id_cut','cut_name')->get();

        $evaluations = DB::table('users')
        ->join('sections','id_section','id_section01')
        ->join('section_subject','id_section02','id_section')
        ->join('subjects','id_subject','id_subject01')
        ->join('evaluations','id_subject02','id_subject')
        ->join('evaluation_user','id_evaluation01','id_evaluation')
        ->select('id_cut01','id_evaluation','evaluation_type','percentage','grade')
        ->where(['id_section01' => $id_section,'id_subject03' => $id_subject,'id_user' => $id_user])->get();
        
        $users = DB::table('users')->select('first_name','last_name')->where('id_user',$id_user);

        $subjects = DB::table('subjects')->select('subject_name')->where('id_subject',$id_subject);

        $sections = DB::table('sections')->select('section_name')->where('id_section',$id_section);

        return response(['evaluations'=>$evaluations,'cuts' => $cuts, 'users'=> $users,
         'subjects' => $subjects, 'sections' => $sections]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_evaluation)
    {
        $evaluation = Evaluation::find($id_evaluation);
        $evaluation->delete();
        return response('Evaluacion Eliminada Satisfactoriamente',200);
    }
}
