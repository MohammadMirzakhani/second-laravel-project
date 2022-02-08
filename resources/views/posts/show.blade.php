@extends('layout')
@section('body')

<ul>
    <li>
        {{$post->name}}
    </li>
    <li>
        {{$post->body}}
    </li>
    <li>
         @if ($post->path!=null)
            <img src="{{asset($post->path) }}" width="100">
         @else
            <p>عکسی برای خود انتخاب نکردید</p>
         @endif
    </li>
    <li>
        <a href="{{ route('post.edit',$post->name) }}">ویرایش</a>
    </li>
</ul>
<img src="{{asset('storage/2910069_468.jpg')}}" alt="">
@endsection
