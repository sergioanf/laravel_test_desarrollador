@extends('layouts.plantilla') 

@section('title', 'Create Location')
@section('action', 'Home')
@section('entity_name', 'locations')

@section('content')


 <div class="container is-max-desktop has-background-white p-5">
    <h1>Add Location</h1>
    
    <form action="{{ route('locations.update', $location->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <label for="name" class="label">name:</label>
            <div class="control">
                <input type="text" class="input" name="name" value="{{ old('name', $location->name) }}"> 
                
                @error('name')
                    <div class="has-text-danger">* {{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="field">
            <label for="type" class="label">type:</label>
            <div class="control">
                <input type="text" class="input" name="type" value="{{ old('type', $location->type) }}"> 
                
                @error('type')
                    <div class="has-text-danger">* {{ $message }}</div>
                @enderror
            </div>

        </div>

        <button type="submit" class="button is-info">Save</button>
    </form>

 </div>
@endsection