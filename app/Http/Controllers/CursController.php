<?php

namespace App\Http\Controllers;

use App\Models\Curs;
use App\Models\Cicle;
use App\Classes\Utilities;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class CursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Illuminate\Http\Request  $request
     * @return Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $selId = $request->input('comboCicle');
        $check = $request->input('checkActiu');
        
        $cicles = Cicle::where('actiu', 1)->orderBy('nom', 'asc')->get();
        $cursos = new Curs;
        
        if ($selId != 0) {
            $cursos = $cursos->whereBelongsTo(Cicle::find($selId));
        }
        if ($check == 'actiu') {
            $cursos = $cursos->where('actiu', 1);
        }
        $cursos = $cursos->paginate(6);

        $request->session()->flashInput($request->input());
        return view('cursos.index', compact('cursos', 'cicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Illuminate\Http\Request  $request
     * @return Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $insert = true;
        $cicles = Cicle::where('actiu', true)->orderBy('nom', 'asc')->get();
        if (!Session::has('error')) {
            $request->session()->flashInput($request->input());
        }
        //return view('cursos.form', compact('cicles', 'insert'));
        return view('cursos.curs', compact('cicles', 'insert'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curs = new Curs;
        $curs->sigles    = $request->input('sigles');
        $curs->nom       = $request->input('nom');
        $curs->cicles_id = $request->input('cicle');
        $curs->actiu     = $request->input('actiu');
        
        try {
            $curs->save();
            $response = redirect()->action([CursController::class, 'index']);
        } catch (QueryException $ex) {
            $mensaje = Utilities::errorMessage($ex);
            //$request->session()->flashInput($request->input());
            $request->session()->flash('error', $mensaje);
        $response = redirect()->action([CursController::class, 'create'])->withInput(/*$request->input()*/);
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Curs  $curs
     * @return Illuminate\Http\Response
     */
    public function show(Curs $curs)
    {
        return Curs::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Curs  $curs
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function edit(Request $request, Curs $curs)
    {
        $insert=false;
        $cicles = Cicle::where('actiu', true)->orderBy('nom', 'asc')->get();
        $request->session()->flashInput($request->input());
        return view('cursos.curs', compact('curs', 'cicles', 'insert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Models\Curs  $curs
     * @param  Illuminate\Http\Request  $request
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, Curs $curs)
    {
        $curs->sigles    = $request->input('sigles');
        $curs->nom       = $request->input('nom');
        $curs->cicles_id = $request->input('cicle');
        $curs->actiu     = $request->input('actiu');

        try {
            $curs->save();
        } catch (QueryException $ex) {
            $mensaje = Utilities::errorMessage($ex);

            $request->session()->flash('error', $mensaje);
            return redirect()->back()->withInput();
        }
        return redirect('/curs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Curs  $curs
     * @param  Illuminate\Http\Request  $request
     * @return Illuminate\Http\Response
     */
    public function destroy(Request $request, Curs $curs)
    {
        try {
            $curs->delete();
        } catch (QueryException $ex) {
            $mensaje = Utilities::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
        }
        return redirect()->action([CursController::class, 'index'])->withInput();
    }
}
