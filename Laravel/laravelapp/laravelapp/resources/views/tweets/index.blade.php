@extends('layouts.app')

@section('content')
@foreach($tweets as $tweet)
<div class="twcontent">
     <h3 class="title">{{ $tweet->title }}</h3>
     <p class="tweets">{{ $tweet->tweet }}</p>

     <div class="username">
       <p>投稿者:</p>
       <p>{{ $tweet->user->name }}</p>

       @if($tweet->user->id === Auth::user()->id)
       <a class="edit_btn" href="{{ route('tweets.edit', $tweet->id) }}">編集</a>

       <form method="POST" action="{{ route('tweets.destroy', $tweet->id) }}">
          @csrf
          @method('DELETE')
          <button class="delete_btn" style="display: inline-block;" type="submit">削除</button>
       </form>

       @endif
     </div>

     <div>
        @if($tweet->is_liked_by_auth_user())
          <form method="POST" action="{{ route('likes.destroy') }}">
                 @csrf
              @method('DELETE')
              <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
               <button type="submit">いいね取り消し</button>
           </form>
        @else
          <form method="POST" action="{{ route('likes.store') }}">
                 @csrf
              @method('PUT')
              <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
               <button type="submit">いいね</button>
           </form>
        @endif
     </div>
</div>
@endforeach
@endsection