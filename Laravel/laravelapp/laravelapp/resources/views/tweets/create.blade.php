@extends('layouts.app')

@section('content')

<div>
<form action="{{ route('tweets.store') }}" method="POST">
@csrf
  <p>タイトル</p>
  <input type="text" name="title" value="">

  <p>ツイート</p>
  <input type="text" name="tweet" Value="">

  <button type="submit" value="投稿">投稿</button>
</form>

</div>

@endsection