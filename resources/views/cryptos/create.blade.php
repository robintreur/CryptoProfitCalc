@extends('layouts.app')
@section('body-class', 'create')

@section('content')
    <div class="container">
        <section class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <h1 class="underline">Add new crypto</h1>

                <form class="form-horizontal" method="POST" action="{{ route('cryptos') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('coin_id') ? ' has-error' : '' }}">
                        <select class="form-control" id="coin_id" name="coin_id">
                            @foreach($coins as $coin)
                            <option value="{{$coin->id}}" data-symbol="{{$coin->short_name}}">{{$coin->name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('coin_id'))
                            <span class="help-block">
                            <strong>{{ $errors->first('coin_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group number-group{{ $errors->has('number') ? ' has-error' : '' }}" style="margin-right: 0;">
                                <i class="cc BTC"></i>
                                <input id="number" type="number" step="any" placeholder="E.g. 0.007894" class="form-control with-icon" name="number">
                                <label for="number">Number of coins</label>

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('purchase_price') ? ' has-error' : '' }}" style="margin-left: 0;">
                                <i class="EUR"></i>
                                <input id="purchase_price" type="number" step="any" placeholder="E.g. 107.50" class="form-control with-icon" name="purchase_price">
                                <label for="purchase_price">Purchase price</label>

                                @if ($errors->has('purchase_price'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('purchase_price') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    @include('layouts.add')

@endsection
