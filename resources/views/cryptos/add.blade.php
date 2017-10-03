@extends('layouts.app')
@section('body-class', 'crypto')

@section('content')
    <div class="container">
        <section class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <h1 class="underline">Add new crypto</h1>
            </div>
        </section>
    </div>

    @include('layouts.add')

@endsection
