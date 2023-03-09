<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $body = '{"query":"query Query($page: Int, $filter: FilterCharacter, $episodesPage2: Int, $episodesFilter2: FilterEpisode) {\\n  characters(page: $page, filter: $filter) {\\n    info {\\n      prev\\n      pages\\n      next\\n      count\\n    }\\n    results {\\n      created\\n      gender\\n      id\\n      image\\n      name\\n      origin {\\n        id\\n      }\\n      location {\\n        id\\n      }\\n      species\\n      status\\n      episode {\\n        id\\n      }\\n    }\\n  }\\n  episodes(page: $episodesPage2, filter: $episodesFilter2) {\\n    info {\\n      count\\n      next\\n      pages\\n      prev\\n    }\\n    results {\\n      air_date\\n      created\\n      episode\\n      id\\n      name\\n      characters {\\n        id\\n      }\\n    }\\n  }\\n  locations {\\n    results {\\n      created\\n      dimension\\n      id\\n      name\\n      type\\n    }\\n  }\\n}\\n","variables":{}}';

        $response = Http::withBody(
            $body
        )->post('https://rickandmortyapi.com/graphql');

        if(  $response->status()  == 200){
           $data = json_decode( $response->body() );
        }
        else{
            $response->status();
        }
        
        return response()->json(
            $data->data->locations->results[0]
        );



     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
