<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Curs;
use App\Classes\Utilities;
use App\Http\Resources\CursResource;
use Illuminate\Database\QueryException;

class CursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curs::all();
        return CursResource::collection($cursos);
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
            $response = (new CursResource($curs))
                        ->response()
                        ->setStatusCode(201);
        } catch (QueryException $ex) {
            $mensaje = Utilities::errorMessage($ex);
            
            $response = \response()
                        ->json(['error' => $mensaje, 400]);
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Curs $curs
     * @return Illuminate\Http\Response
     */
    public function show(Curs $curs)
    {
        $curs = Curs::with('cicle')->find($curs->id);
        return new CursResource($curs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  App\Models\Curs $curs
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
            $response = (new CursResource($curs))
                        ->response()
                        ->setStatusCode(201);
        } catch (QueryException $ex) {
            $mensaje = Utilities::errorMessage($ex);
            
            $response = \response()
                        ->json(['error' => $mensaje, 400]);
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Curs $curs
     * @return Illuminate\Http\Response
     */
    public function destroy(Curs $curs)
    {
        try {
            $curs->delete();
            $response = \response()
                        ->json(['missatge' => 'Registre esborrat correctament', 200]);
        } catch (QueryException $ex) {
            $mensaje = Utilities::errorMessage($ex);
            $response = \response()
                        ->json(['error' => $mensaje, 400]);
        }

        return $response;
    }
}
