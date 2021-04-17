@extends('layouts.app')

@section('content')
@foreach($tweets as $tweet)
<div>
 <h3>{{ $tweet->title }}</h3>
 <p>{{ $tweet->tweet }}</p>
 <p>投稿者</p>
 <p>{{ $tweet->user_id }}</p>

</div>
@endforeach
@endsection