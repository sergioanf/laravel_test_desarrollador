<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\Character;
use App\Models\Episode;
use App\Models\Location;
 
class CharacterService
{ 

    static public function isDataLoaded(){

        return Character::find(20) != null; 
    }
    static public function fetch() {

       //graphql query, generado en postman
       $body = '{"query":"query Query($page: Int, $filter: FilterCharacter, $episodesPage2: Int, $episodesFilter2: FilterEpisode) {\\n  characters(page: $page, filter: $filter) {\\n    info {\\n      prev\\n      pages\\n      next\\n      count\\n    }\\n    results {\\n      created\\n      gender\\n      id\\n      image\\n      name\\n      location {\\n        id\\n      }\\n      species\\n      status\\n      episode {\\n        id\\n      }\\n    }\\n  }\\n  episodes(page: $episodesPage2, filter: $episodesFilter2) {\\n    info {\\n      count\\n      next\\n      pages\\n      prev\\n    }\\n    results {\\n      air_date\\n      created\\n      episode\\n      id\\n      name\\n      characters {\\n        id\\n      }\\n    }\\n  }\\n  locations {\\n    results {\\n      created\\n      dimension\\n      id\\n      name\\n      type\\n    }\\n  }\\n}\\n","variables":{}}';

       $response = Http::withBody(
           $body
       )->post('https://rickandmortyapi.com/graphql');

       if(  $response->status()  == 200){
          $data = json_decode( $response->body() );
       }
       else{
           dd($response->status());
       }
       return $data->data;
    }
    
    static public function saveEpisodes( $episodes ){

        foreach ($episodes as $key => $value) {
            

            $value->episode_id = $value->id;
            unset( $value->id );

            $created = Carbon::parse( $value->created );
            $value->created = $created->format('Y-m-d H:i:s') ;   

            $air_date = Carbon::parse( $value->air_date );
            $value->air_date = $air_date->format('Y-m-d H:i:s') ; 

            //dd( (array) $value  );
             $episode = new Episode( (array) $value );
             $episode->save();
             
        }
        return Episode::all();
    }
    static public function saveLocations( $locations ){

        foreach ($locations as $key => $value) {

            $value->location_id = $value->id;
            unset( $value->id );

            $created = Carbon::parse( $value->created );
            $value->created = $created->format('Y-m-d H:i:s') ;   

            //dd( (array) $value  );
             $location = new Location( (array) $value );
             $location->save();
             
        }
        return Location::all();
    }

    static public function saveCharacters( $characters ){
       
        foreach ($characters as $key => $value) {
            
            $created = Carbon::parse( $value->created );
            $value->created = $created->format('Y-m-d H:i:s') ;    

            unset( $value->id );

            $episodes = CharacterService::getCharacterEpisodes( $value->episode );
            unset( $value->episode );
            
            $value->location_id = $value->location->id < 20 ? $value->location->id : null;
            unset( $value->location );

            // print_r( (array)$value  );return ;
            
            $character = new Character( (array)$value );
            $character = new Character( (array)$value );
           
            $character->save();

            $character->episodes()->attach( $episodes );

     
        }

        return Character::all();
    }

    static private function getCharacterEpisodes( $rawEpisodes ){

        $episodes =  array_map( function($el){
            if($el->id < 20) return $el->id;                
        }, $rawEpisodes);


        $episodes =  array_filter( $episodes , function($el){
            if ($el !== NULL && $el !== FALSE && $el !== "") return $el;         
        });
        
        return  $episodes;
    }

} 