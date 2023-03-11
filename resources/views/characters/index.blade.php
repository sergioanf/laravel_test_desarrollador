@extends('layouts.plantilla') 

@section('title', 'Characters')
@section('entity_name', 'characters')
@section('content')

<div class="container">

    @if (\Session::has('msg'))

        <div class="notification is-warning is-light">
            <button class="delete" onclick="this.parentElement.remove()"></button>
            {!! \Session::get('msg') !!}
        </div>

    @endif

 <h2 class="title has-background-white has-text-black m-0 p-2 is-6 has-background-warning">
    Character List
  </h2>
  
  <h2 class="title has-background-white has-text-black m-0 p-2 is-6">
    <a href="{{ route('locations.index') }}">
        Location list
      </a>
  </h2>

  <h2 class="title has-background-white has-text-black m-0 p-2 is-6">
    <a href="{{ route('episodes.index') }}">
       Episodes list
      </a>
  </h2>


<table class="table is-fullwidth is-bordered is-striped">
    <thead>
      <tr>
        <th class="has-text-centered" scope="col">ID</th>
        <th scope="col">Character</th>
        <th scope="col">Gender</th>
        <th scope="col">Status</th>
        <th scope="col">Species</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($characters as $character)
      <tr>
        <td class="has-text-centered">{{ $character->id }}</td>
        <td class="is-flex">
            <figure class="image is-64x64 my-auto mx-0 character-avatar">
              <img  
                src=" {{ 
                (str_contains($character->image, 'http')) ? $character->image  
                    : 'http://cdn.onlinewebfonts.com/svg/img_546302.png' }}" 
                class="" width="100%" alt="{{$character->name}}">
            </figure>

            <a class="my-auto" href="{{ route('characters.show', $character->id) }}">
                <span class="my-auto pl-4">{{ $character->name }}</span>
                
            </a> 
        </td>
        <td>{{ $character->gender }}</td>
        <td>{{ $character->status }}</td>
        <td>{{ $character->species }}</td>
        <td>
            <div class="is-flex is-justify-content-space-around">
                <a href="{{ route('characters.edit', $character->id) }}">Edit</a>
                
                <form class="is-inline-block ml-4 show_confirm" action="{{ route('characters.destroy', $character) }}" method="POST">
                    @csrf
                    @method('delete')

                    <a class="" 
                        href="{{ route('characters.destroy', $character->id) }}">
                        Delete
                    </a>

                </form>
            </div>
        </td>
      
        
      </tr>
      @endforeach

    </tbody>
  </table>

</div>

@endsection