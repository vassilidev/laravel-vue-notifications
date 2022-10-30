@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card my-4">
            <div class="card-body">
                {{ __('My dashboard') }}
                <hr>
                <create-notification/>
            </div>
        </div>
    </div>
@endsection