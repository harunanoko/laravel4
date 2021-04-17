@extends('layouts.app')

@section('content')

<div>
<form action="" method="POST">
@csrf
  <p>タイトル</p>
  <input type="text" name="title" value="">

  <p>ツイート</p>
  <input type="text" name="tweet" Value="">

  <button type="submit" value="更新">
</form>

</div>

@endsection