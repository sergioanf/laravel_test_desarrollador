@extends('layouts.plantilla') 

@section('title', 'Episodes')
@section('entity_name', 'episodes')

@section('content')

<div class="container">

    @if (\Session::has('msg'))

        <div class="notification is-warning is-light">
            <button class="delete" onclick="this.parentElement.remove()"></button>
            {!! \Session::get('msg') !!}
        </div>

    @endif



<h2 class="title has-background-white has-text-black m-0 p-2 is-6">
  <a href="{{ route('characters.index') }}">
    Characters list
  </a>
</h2>

<h2 class="title has-background-white has-text-black m-0 p-2 is-6">
  <a href="{{ route('locations.index') }}">
    Locations list
  </a>
</h2>

<h2 class="title has-background-white has-text-black m-0 p-2 is-6 has-background-warning">Episodes list</h2>


<table class="table is-fullwidth is-bordered is-striped">
    <thead>
      <tr>
        <th class="has-text-centered" scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Episod</th>
        <th scope="col">Air date</th>
        <th scope="col">Created at</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($episodes as $episode)
      <tr>
        <td class="has-text-centered">{{ $episode->id }}</td>
        <td>
          <a href="{{ route('episodes.show', $episode->id) }}">
            {{ $episode->name }}
          </a>
        </td>
        <td>{{ $episode->episode }}</td>
        <td>{{ $episode->air_date }}</td>
        <td>{{ $episode->created }}</td>
        <td>
            <div class="is-flex is-justify-content-space-around">
                <a href="{{ route('episodes.edit', $episode->id) }}">Edit</a>
                
                <form class="is-inline-block ml-4 show_confirm" action="{{ route('episodes.destroy', $episode) }}" method="POST">
                    @csrf
                    @method('delete')

                    <a class="" 
                        href="{{ route('episodes.destroy', $episode->id) }}">
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