@extends('layouts.login')

@section('content')
<div class="follow-list">
<h2>FOllow List</h2>
@foreach($follows as $follow)
<ul>
  <li class="follow-icon">
<img src="{{asset('storage/'.$follow->images) }}" alt="ユーザーアイコン">
  </li>
</ul>
@endforeach

</div>
@endsection