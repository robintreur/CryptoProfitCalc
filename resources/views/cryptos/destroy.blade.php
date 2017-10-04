@extends('layouts.app')
@section('body-class', 'destroy')

@section('content')
    <div class="container">
        <section class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <h1 class="underline">Delete: <span class="cc {{$crypto->coin->short_name}}">{{$crypto->coin->name}}</span></h1>


            </div>
        </section>
    </div>

    @include('layouts.add')

@endsection
