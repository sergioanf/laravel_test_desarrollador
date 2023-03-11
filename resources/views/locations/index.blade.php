@extends('layouts.plantilla') 

@section('title', 'Locations')
@section('entity_name', 'locations')

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

<h2 class="title has-background-white has-text-black m-0 p-2 is-6 has-background-warning">Locations list</h2>


<table class="table is-fullwidth is-bordered is-striped">
    <thead>
      <tr>
        <th class="has-text-centered" scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Type</th>
        <th scope="col">Created at</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($locations as $location)
      <tr>
        <td class="has-text-centered">{{ $location->id }}</td>
        <td>{{ $location->name }}</td>
        <td>{{ $location->type }}</td>
        <td>{{ $location->created_at }}</td>
        <td>
            <div class="is-flex is-justify-content-space-around">
                <a href="{{ route('locations.edit', $location->id) }}">Edit</a>
                
                <form class="is-inline-block ml-4 show_confirm" action="{{ route('locations.destroy', $location) }}" method="POST">
                    @csrf
                    @method('delete')

                    <a class="" 
                        href="{{ route('locations.destroy', $location->id) }}">
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