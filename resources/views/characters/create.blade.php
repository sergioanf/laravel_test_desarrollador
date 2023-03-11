@extends('layouts.plantilla') 

@section('title', 'Create Characters')
@section('action', 'Home')
@section('entity_name', 'characters')

@section('content')


 <div class="container is-max-desktop has-background-white p-5">
    <h1>Add Character</h1>
    
    <form action="{{ route('characters.store') }}" method="POST">
        @csrf

        <div class="field">
            <label for="name" class="label">name:</label>
            <div class="control">
                <input type="text" class="input" name="name"> 
                
                @error('name')
                    <div class="has-text-danger">* {{ $message }}</div>
                @enderror
            </div>

        </div>

        <br>

        <div class="field">
            <label for="species" class="label">specie:</label>
            <input type="text" class="input" name="species"> 

            @error('species')
              <div class="has-text-danger">* {{ $message }}</div>
            @enderror
        </div>


        <br>

        <div class="field">
            <label for="gender" class="label">gender:</label>
            <input type="text" class="input" name="gender"> 

            @error('gender')
                 <div class="has-text-danger">* {{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="field">
            <label for="status" class="label">status:</label>
            <input type="text" class="input" name="status"> 

            @error('status')
                 <div class="has-text-danger">* {{ $message }}</div>
            @enderror

        </div>

        <div class="field">
            <label for="image" class="label">image url:</label>
            <input type="text" class="input" name="image"> 
            @error('image')
                  <div class="has-text-danger">* {{ $message }}</div>
            @enderror
        </div>

        <br>

        <div class="field`">
            <label for="location" class="label">location:</label>

            <div class="select">
                <select name="location_id">
                    <option value=''>Select location</option>
                    @foreach ( $locations as $index => $location) 
                        <option value='{{$location->id}}'>{{$location->name}}</option>
                    @endforeach                
                </select>
            </div>
            
            @error('location_id')
                  <div class="has-text-danger">* {{ $message }}</div>
            @enderror
         </div>

        <br>
        <br>

        <button type="submit" class="button is-info">Save</button>
    </form>

 </div>
@endsection