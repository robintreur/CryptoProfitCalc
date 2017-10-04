@extends('layouts.app')
@section('body-class', 'create')

@section('content')
    <div class="container">
        <section class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <h1 class="underline">Add new crypto</h1>

                <form class="form-horizontal" method="POST" action="/cryptos">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <select class="form-control" id="coin_id" name="coin_id" data-live-search="true" required>
                            @foreach($coins as $coin)
                            <option value="{{$coin->id}}" data-tokens="{{$coin->name}} {{$coin->short_name}}">{{$coin->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input id="number" type="number" step="any" placeholder="number" class="form-control" name="number" required>
                    </div>

                    <div class="form-group">
                        <input id="purchase_price" type="number" step="any" placeholder="Purchase price" class="form-control" name="purchase_price" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    @include('layouts.add')

@endsection
