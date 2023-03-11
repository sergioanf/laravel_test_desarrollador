@extends('layouts.plantilla') 

@section('title', 'Create Characters')
@section('action', 'Save')
@section('entity_name', 'characters')

@section('content')


 <div class="container is-max-desktop has-background-white p-5">
    <h1>Edit {{ $character->name }}</h1>
    
    <form action="{{ route('characters.update', $character->id) }}" method="POST">
        @csrf
        @method('put')

        <div class="field">
            <label for="name" class="label">name:</label>
            <div class="control">
                <input type="text" class="input" name="name" 
                value="{{ old('name', $character->name) }}"> 
            </div>
        </div>

        <br>

        <div class="field">
            <label for="species" class="label">specie:</label>
            <input type="text" class="input" name="species"
            value="{{ old('species', $character->species) }}"> 
        </div>

        <br>

        <div class="field">
            <label for="gender" class="label">gender:</label>
            <input type="text" class="input" name="gender"
            value="{{ old('gender', $character->gender) }}"> 
        </div>
        <br>

        <div class="field">
            <label for="status" class="label">status:</label>
            <input type="text" class="input" name="status"
            value="{{ old('status', $character->status) }}"> 
        </div>

        <br>
        <div class="field">
            <label for="image" class="label">image url:</label>
            <input type="text" class="input" name="image"
            value="{{ old('image', $character->image) }}"> 
        </div>

        <br>
        
        <div class="field`">
            <label for="location" class="label">location:</label>

            <div class="select">
                <select name="location_id">

                    @foreach ( $locations as $key => $val) 
                        
                    @if ( old('id', $character->location_id) == $val->id )
                        <option value="{{ $val->id }}" selected>{{ $locations[$key]->name }}</option>
                    @else
                        <option value="{{ $val->id}}">{{ $val->name }}</option>
                    @endif
 
                    @endforeach                
                </select>
            </div>
            
            @error('location_id')
                  <div class="has-text-danger">* {{ $message }}</div>
            @enderror
         </div>

         <br>

        <button type="submit" class="button is-primary">Guardar</button>
    </form>

 </div>
@endsection