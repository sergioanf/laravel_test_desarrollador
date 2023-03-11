<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Http\Requests\StoreEpisode; 

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $episodes = Episode::orderBy('id', 'desc')->get();
        return view('episodes.index', compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('episodes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEpisode $request)
    {
        $episode = Episode::create( $request->all() );

        return redirect()->route('episodes.show', $episode->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $episode = Episode::find( $id );
        return  view('episodes.show', compact('episode')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $episode = Episode::find( $id );
        return  view('episodes.edit', compact('episode')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEpisode $request, string $id)
    {
        $episode = Episode::find($id);
       
        $episode->update( $request->all() );

        return redirect()->route('episodes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Episode::find($id)->delete();
  
        return redirect()->route('episodes.index')
            ->with('msg', 'Episode deleted successfully');
    }
}
