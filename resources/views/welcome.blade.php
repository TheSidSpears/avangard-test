@extends('layouts.app')

@section('title', 'Main')

@section('body')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Test task
            </div>

            <div class="links">
                <a href="{{ route('temperature', 'bryansk')}}">Weather in bryansk</a>
                <a href="{{ route('order.index') }}">Orders</a>
            </div>
        </div>
    </div>
@endsection