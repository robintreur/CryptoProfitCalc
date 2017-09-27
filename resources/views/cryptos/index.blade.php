@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cryptocurrency overview</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul>
                            @foreach($data as $cryptos)
                                @foreach($cryptos as $crypto)
                                    <h1>€{{$crypto->eur->profit}} - {{$crypto->coin->name}}</h1>
                                    <a class="btn btn-primary" href="/cryptos/detail/{{$crypto->id}}">Detail</a>
                                    <hr>
                                @endforeach
                            @endforeach
                            {{--@foreach ($cryptos as $crypto)--}}
                                {{--<li><a href="cryptos/detail/{{$crypto->id}}">{{$crypto->id}}: {{$crypto->coin->name}}<br>price:{{$dataArray[$crypto->coin->short_name]['price_usd']}}</a></li>--}}
                            {{--@endforeach--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
