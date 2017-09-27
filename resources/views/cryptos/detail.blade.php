@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-md-6">
                <h1 class="cc {{$crypto->coin->short_name}}">{{$crypto->coin->name}}</h1>
                <h3>Winst: €{{$crypto->eur->profit}}</h3>
                <h5>Munt waarde: €{{$crypto->eur->price}}</h5>
                <ul>
                    <li>Afkorting: {{$crypto->coin->short_name}}</li>
                    <li>Inkoopprijs: {{$crypto->purchase_price}}</li>
                    <li>Aantal: {{$crypto->number}}</li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="inner text-center change-container">
                    <h2>Change:</h2>
                    <span>1 hour: <span class="change @if($crypto->change->hour >= 0) high @endif">{{$crypto->change->hour}}%</span></span>
                    <span>1 day: <span class="change @if($crypto->change->day >= 0) high @endif">{{$crypto->change->day}}%</span></span>
                    <span>1 week: <span class="change @if($crypto->change->week >= 0) high @endif">{{$crypto->change->week}}%</span></span>
                </div>
            </div>
        </div>
    </div>
@endsection
