@extends('layouts.app')

@section('content')
@foreach($tweets as $tweet)
<div class="twcontent">
     <h3 class="title">{{ $tweet->title }}</h3>
     <p class="tweets">{{ $tweet->tweet }}</p>

     <div class="username">
       <p>投稿者:</p>
       <p>{{ $tweet->user->name }}</p>
       <a href="{{ route('tweets.edit') }}">編集</a>
     </div>
</div>
@endforeach
@endsection