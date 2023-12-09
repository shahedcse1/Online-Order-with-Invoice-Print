<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PgTtCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */

   
    
    // public function toArray(Request $request): array
    // {
        
    //     // return parent::toArray($request);

    //     return $this->collection->map(function ($pgTt) {

    //         return [
                
    //             'id'            => $pgTt->id,

    //             'user_id'       => $pgTt->user_id,

    //             'tt_type_id'    => $pgTt->tt_type_id,

    //             'tt_name'       => $pgTt->tt_name,

    //             'description'   => $pgTt->description,

    //             'remarks'       => $pgTt->remarks,
    //         ];

    //     })->all();
    // }

    public function toArray($request)
    {

        // return ['data' => $this->collection];

        return parent::toArray($request);
        
    }
}
