@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cryptocurrency detail</div>

                    <div class="panel-body">
                        <h1>{{$crypto->coin->name}}</h1>
                        <h3>Winst: €{{$crypto->eur->profit}}</h3>
                        <h5>Munt waarde: €{{$crypto->eur->price}}</h5>
                        <ul>
                            <li>Afkorting: {{$crypto->coin->short_name}}</li>
                            <li>Inkoopprijs: {{$crypto->purchase_price}}</li>
                            <li>Aantal: {{$crypto->number}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
