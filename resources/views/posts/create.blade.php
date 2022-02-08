@extends('layout')
@section('title')
ساخت پست جدبد
@endsection
@section('body')
@if (session()->has('message'))
<div class="alert alert-{{session('message_level')}}">
{{ session('message') }}
</div>
@endif
{!! Form::open(['route'=>'post.store','files'=>true]) !!}
<div class="form-group col-6 ">
    {!! Form::label('title','عنوان') !!}
    {!! Form::text('title',null,['class'=>"form-control "]) !!}
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    {!! Form::label('body','توضیحات') !!}
    {!! Form::textarea('body',null,['class'=>"form-control col-2"]) !!}
        @error('body')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <div class="alert alert-warning col-2">{!! Form::label('Image',' عکس را انتخاب کنید') !!}</div>
    {!! Form::file('Image',null,['class'=>"form-control "]) !!}
         @error('Image')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        <br><br>
    {!! Form::submit('ذخیره',['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
{{-- <form action="{{ route('post.store') }}" method="POST">
  @csrf
  <input type="text" name="title">
  <br><br>
  <textarea name="body" id="" cols="30" rows="10"></textarea>
  <br><br>
  <input type="submit" name="ارسال" value="ارسال">
</form> --}}
@endsection

