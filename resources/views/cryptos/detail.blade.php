@extends('layouts.app')
@section('body-class', 'crypto')

@section('content')
    <div class="container">
        <section class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <h1 class="underline cc {{$crypto->coin->short_name}}">{{$crypto->coin->name}}</h1>
                <div class="lined body">
                    <h3>Winst: €{{$crypto->eur->profit}}</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Munt waarde: €{{$crypto->eur->price}}</h5>
                            <ul>
                                <li>Afkorting: {{$crypto->coin->short_name}}</li>
                                <li>Inkoopprijs: {{$crypto->purchase_price}}</li>
                                <li>Aantal: {{$crypto->number}}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5>Change:</h5>
                            <ul>
                                <li>1 hour: <span class="change @if($crypto->change->hour >= 0) high @endif">{{$crypto->change->hour}}%</span></li>
                                <li>1 day: <span class="change @if($crypto->change->day >= 0) high @endif">{{$crypto->change->day}}%</span></li>
                                <li>1 week: <span class="change @if($crypto->change->week >= 0) high @endif">{{$crypto->change->week}}%</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row endbody">
                    <div class="col-md-12">
                        <a href="{{ route('crypto.edit', $crypto->id) }}" class="edit btn btn-half">Edit {{$crypto->coin->name}}</a>
                        <form class="form-horizontal" method="POST" action="{{ route('crypto', $crypto->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="remove btn btn-half">Delete {{$crypto->coin->name}}</button>
                        </form>
                        <a href="{{ route('cryptos')}}" class="btn btn-back">Back to overview</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('layouts.add')

@endsection
