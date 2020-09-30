@extends('layouts.app')

@section('title', 'Current temperature')

@section('body')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Current temperature in {{ $city }} is {{ $currentTemperature }}℃
            </div>

            <div class="links">
                <a href="{{ route('index') }}">Go back</a>
            </div>
        </div>
    </div>
@endsection