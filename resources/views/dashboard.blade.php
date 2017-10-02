@extends('layouts.app')
@section('body-class', 'dashboard')

@section('content')
<div class="container">
    <section class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @foreach($users as $user)
                <p>
                {{$user->name}} |
                {{$user->email}} |
                {{$user->is_admin}}
                </p>
            @endforeach
        </div>
    </section>
</div>
@endsection
