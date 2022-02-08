@extends('layout')
@section('body')
<ul>
    <li>
        <a href="{{ route('register') }}" class="btn btn-success">ثبت نام</a><br><br>
    </li>
    <li>
        <a href="{{ route('login') }}" class="btn btn-secondary">ورود</a><br><br>
    </li>
    <li>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-warning">خروج</button>
            </form>
            <hr>
    </li>
</ul>

@if (session()->has('message'))
<div class="alert alert-{{session('message_level')}}">
{{ session('message') }}
</div>
@endif
@foreach ($posts as $post)

<ul>
    <li>
        <a href="{{ Route('post.show',$post->name) }}">{{ $post->name }}</a>
    </li>
    <li>
        {{ $post->user->name }}
    </li>
</ul>

@endforeach
@endsection
