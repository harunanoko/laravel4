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

     <div class="likes">
        @if($tweet->is_liked_by_auth_user())
          <form method="POST" action="{{ route('likes.destroy', $tweet->id) }}">
                 @csrf
              @method('DELETE')
              <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
               <button class="unlikes-button" type="submit"><i class="fas fa-heart"></i></button>
               <span>{{ $tweet->like->count() }}</span>
           </form>
        @else
          <form method="POST" action="{{ route('likes.update', $tweet->id) }}">
                 @csrf
              @method('PUT')
              <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
               <button class="likes-button" type="submit"><i class="far fa-heart"></i></button>
               <span>{{ $tweet->like->count() }}</span>
           </form>
        @endif
     </div>

</div>
@endforeach
@endsection