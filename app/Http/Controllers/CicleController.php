<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Cicle;
use App\Classes\Utilities;
use Illuminate\Database\QueryException;

class CicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $cicles = Cicle::paginate(5);
        #$cicles=[];
        return view('cicles.index', compact('cicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Illuminate\Http\Request  $request
     * @return Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->session()->flashInput($request->input());
        return view('cicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cicle = new Cicle;
        $cicle->sigles = $request->input('sigles');
        $cicle->nom = $request->input('nom');
        $cicle->descripcio = $request->input('desc');
        $cicle->actiu = $request->input('actiu');

        try {
            $cicle->save();
        } catch (QueryException $ex) {
            $mensaje = Utilities::errorMessage($ex);
            
            $request->session()->flash('error', $mensaje);
            return redirect('/cicle/create')->withInput();
        }
        
        return redirect('/cicle');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cicle  $cicle
     * @return \Illuminate\Http\Response
     */
    public function show(Cicle $cicle)
    {
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  App\Models\Cicle  $cicle
     * @return Illuminate\Http\Response
     */
    public function edit(Request $request, Cicle $cicle)
    {
        $request->session()->flashInput($request->input());
        return view('cicles.edit', compact('cicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  App\Models\Cicle  $cicle
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $cicle = Cicle::find($id);
        $cicle->sigles = $request->input('sigles');
        $cicle->nom = $request->input('nom');
        $cicle->descripcio = $request->input('desc');
        $cicle->actiu = $request->input('actiu');

        try {
            $cicle->save();
        } catch (QueryException $ex) {
            $mensaje = Utilities::errorMessage($ex);
            
            $request->session()->flash('error', $mensaje);
            return action([App\Http\Controllers\CicleController::class, 'edit'], ['cicle' => $cicle->id]);
        }
        
        return redirect('/cicle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Cicle  $cicle
     * @return Illuminate\Http\Response
     */
    public function destroy(Cicle $cicle)
    {
        $cicle->delete();
        return redirect()->action([CicleController::class, 'index']);
    }
}
