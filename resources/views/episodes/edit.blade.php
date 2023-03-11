@extends('layouts.plantilla') 

@section('title', 'Create Episodes')
@section('action', 'Home')
@section('entity_name', 'episodes')

@section('content')


 <div class="container is-max-desktop has-background-white p-5">
    <h1>Add Episodes</h1>
    
    <form action="{{ route('episodes.update', $episode->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <label for="name" class="label">name:</label>
            <div class="control">
                <input type="text" class="input" name="name" value="{{ old('name', $episode->name) }}"> 
                
                @error('name')
                    <div class="has-text-danger">* {{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="field">
            <label for="episode" class="label">episode:</label>
            <div class="control">
                <input type="text" class="input" name="episode" value="{{ old('episode', $episode->episode) }}"> 
                
                @error('episode')
                    <div class="has-text-danger">* {{ $message }}</div>
                @enderror
            </div>

        <div class="field">
            <label for="air_date" class="label">air date:</label>
            <div class="control">
                <input type="text" class="input" name="air_date" value="{{ old('air_date', $episode->air_date) }}"> 
                
                @error('air_date')
                    <div class="has-text-danger">* {{ $message }}</div>
                @enderror
            </div>

        </div>

        <button type="submit" class="button is-info">Save</button>
    </form>

 </div>
@endsection