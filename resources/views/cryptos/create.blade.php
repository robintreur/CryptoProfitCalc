@extends('layouts.app')
@section('body-class', 'create')

@section('content')
    <div class="container">
        <section class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <h1 class="underline">Add new crypto</h1>

                <form class="form-horizontal" method="POST" action="/cryptos">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('coin_id') ? ' has-error' : '' }}">
                        <select class="form-control" id="coin_id" name="coin_id">
                            @foreach($coins as $coin)
                            <option value="{{$coin->id}}">{{$coin->name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('coin_id'))
                            <span class="help-block">
                            <strong>{{ $errors->first('coin_id') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                        <input id="number" type="number" step="any" placeholder="number" class="form-control" name="number">

                        @if ($errors->has('number'))
                            <span class="help-block">
                            <strong>{{ $errors->first('number') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('purchase_price') ? ' has-error' : '' }}">
                        <input id="purchase_price" type="number" step="any" placeholder="Purchase price" class="form-control" name="purchase_price">

                        @if ($errors->has('purchase_price'))
                            <span class="help-block">
                            <strong>{{ $errors->first('purchase_price') }}</strong>
                        </span>
                        @endif
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
