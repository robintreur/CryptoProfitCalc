@extends('layouts.app')
@section('body-class', 'welcome')

@section('content')
<div class="container">
    <section class="row">
        <div class="col-md-12 text-center">
            <h1>Quick overview of all your crypto profits</h1>
            <span class="sub">Create an account for free</span>
            <section>
                <a class="btn btn-primary" href="{{ route('register') }}">Create account</a>
                <a class="btn btn-link" href="{{ route('login') }}">Or login</a>
            </section>
        </div>
        <img src="/img/cryptos-screen.png"class="screenshot" />
    </section>
</div>
@endsection
