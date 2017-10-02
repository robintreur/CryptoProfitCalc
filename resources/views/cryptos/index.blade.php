@extends('layouts.app')
@section('body-class', 'cryptos')

@section('content')
    <div class="overview-container">
        @foreach($data as $cryptos)
            @foreach($cryptos as $crypto)
                <section class="row overview">
                    <div class="col-md-6">
                        <div class="inner text-center">
                            <h1 class="cc {{$crypto->coin->short_name}}">{{$crypto->coin->name}}</h1>
                            <h3>€{{$crypto->eur->profit}}</h3>
                        </div>
                        <a class="btn cryptos-out" href="/cryptos/detail/{{$crypto->id}}">Click here for more detail</a>
                    </div>
                    <div class="col-md-6">
                        <div class="inner text-center change-container">
                            <span>1 hour: <span class="change @if($crypto->change->hour >= 0) high @endif">{{$crypto->change->hour}}%</span></span>
                            <span>1 day: <span class="change @if($crypto->change->day >= 0) high @endif">{{$crypto->change->day}}%</span></span>
                            <span>1 week: <span class="change @if($crypto->change->week >= 0) high @endif">{{$crypto->change->week}}%</span></span>
                        </div>
                    </div>
                </section>
            @endforeach

            @if(!$cryptos)
                <section class="row">
                    <div class="col-md-12 text-center">
                        <h1>Add your first Cryptocoin</h1>
                        <span class="add-new_info"></span>
                    </div>
                </section>
            @endif
        @endforeach
    </div>

    @include('layouts.add')

@endsection
