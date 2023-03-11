<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Http\Requests\StoreLocation; 


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $locations = Location::orderBy('id', 'desc')->get();
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocation $request)
    {
     
        $location = Location::create( $request->all() );

        return redirect()->route('locations.show', $location->id);
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $location = Location::find( $id );
        return  view('locations.show', compact('location')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $location = Location::find( $id );
        return  view('locations.edit', compact('location')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $location = Location::find($id);
       
        $location->update( $request->all() );

        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Location::find($id)->delete();
  
        return redirect()->route('locations.index')
            ->with('msg', 'Location deleted successfully');
    }
}
