<?php

namespace App\Http\Resources;

use App\Http\Resources\CursResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CicleResource extends JsonResource {
    /**
     * Transform the resource into an array
     * 
     * @param Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        // return [
        //     "sigles"=> $this->sigles,
        //     "curs"  => CursResource::collection($this->cursos)
        // ];
    }
}