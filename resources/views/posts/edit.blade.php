@extends('layout')
@section('title')
ویرایش پست
@endsection
@section('body')
 {!! Form::open(['method'=>'PUT','route'=>['post.update',$post->name]]) !!}
<div class="form-group">
    {!! Form::label('title','عنوان') !!}
    {!! Form::text('title',$post->name,['class'=>'form-control']) !!}<br>
    {!! Form::label('body','توضیحات') !!}
    {!! Form::textarea('body',$post->body,['class'=>'form-control']) !!}<br>
@can('edit_Post',$post)
{!! Form::submit('ذخیره',['class'=>'btn btn-primary']) !!}<br>
@endcan
</div>
@can('edit_Post',$post)
{!! Form::close() !!}
{!! Form::open(['route'=>['post.destroy',$post->name],'method'=>'DELETE']) !!}<br>
<div class="form-group">
    {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
</div>
@endcan
{!! Form::close() !!}
{{-- <form action="{{ route('post.update',$post->name) }}" method="put">
  @method('put')
  @csrf
  <br>
  <input type="text" name="title">
  <br><br>
  <textarea name="body" id="" cols="30" rows="10"></textarea>
  <br><br>
  <input type="submit" name="ارسال" value="ارسال">
</form> --}}
@endsection

