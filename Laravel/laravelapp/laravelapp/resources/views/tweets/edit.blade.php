@extends('layouts.app')

@section('content')

<div class="create">
<h3>編集</h3>
<form action="{{ route('tweets.update') }}" method="POST">
@csrf
      @if (count($errors) > 0)
      <p>入力に問題があります。再入力して下さい。</p>
      @endif
  <p>タイトル</p>
  @error('title')
                 <div class="error">
                    <p>エラー:</p>
                    <p>{{$message}}</p>
                 </div>
                @enderror
  <input class="input_title" type="text" name="title" value="{{ $tweet->title }}">


  <p>ツイート</p>
  @error('tweet')
                 <div class="error">
                    <p>エラー:</p>
                    <p>{{$message}}</p>
                 </div>
                @enderror
  <textarea class="input_tweet" name="tweet" value="{{ $tweet->tweet }}"></textarea>

  <button type="submit" value="投稿">更新</button>
</form>

</div>

@endsection