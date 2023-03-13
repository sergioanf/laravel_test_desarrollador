<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Location;
use App\Http\Requests\StoreCharacter; 
use App\Services\CharacterService;


class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = [];

        if( ! CharacterService::isDataLoaded() ){ 
            $data = CharacterService::fetch();
        
            if( $data ){
                $episodes = CharacterService::saveEpisodes( $data->episodes->results );
                $locations = CharacterService::saveLocations( $data->locations->results );
                $characters = CharacterService::saveCharacters( $data->characters->results );
            }
        }
        else {
           $characters = Character::orderBy('id', 'desc')->get();
           
        }

        return view('characters.index', compact('characters'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::orderBy('id', 'desc')->get();
        return view('characters.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCharacter $request)
    {
        $character = Character::create( $request->all() );

        return redirect()->route('characters.show', $character->id);
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $character = Character::find( $id );
        return  view('characters.show', compact('character')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $character = Character::find( $id );
        $locations = Location::orderBy('id', 'desc')->get();
        return  view('characters.edit', compact('character', 'locations')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCharacter $request, string $id)
    {
        $character = Character::find($id);
       
        $character->update( $request->all() );

        return redirect()->route('characters.index');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Character::find($id)->delete();
  
        return redirect()->route('characters.index')
            ->with('msg', 'Character deleted successfully');
    }
    

    /**
     * Fetch the characters data from an external API
     */
    public function fetchRemoteData()
    {
        $data= (object) array('data' => null);
    
       
        //$character->save();

    }
    
    
}
