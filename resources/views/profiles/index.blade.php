@extends('layouts.app')

@section('content')
    @foreach ($profiles as $profile)
        <p> {{$profile->id}}
            {{$profile->user_id}}
            {{$profile->firstname }}
            {{ $profile->lastname }} -
            {{ $profile->mobile }}
            <a href="edit-profile/{{$profile->id}}" ><button class="btn btn-danger" href="profile-edit">Edit</button></a>
        </p>
    @endforeach
@endsection




