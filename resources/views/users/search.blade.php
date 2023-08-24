@extends('layouts.login')

@section('content')
        <div class="search">
          <form action="{{ url('/search') }}" method="GET">
           <input type="text" name="keyword" placeholder="ユーザー名">
           <button type="submit" class="btn"><img src="./images/search.png"></button>
          </form>
          @if(!empty($keyword))
           <p class="search-key">検索ワード:{{$keyword}}</p>
           @endif
        </div>
        <!-- 検索ワード -->
           

<div class="user-list">
  @if(isset($users))
  <table class="users-table">
    @foreach ($users as $user)
    @if(($user->username !==Auth::user()->username))
    <tr>
      <td><img src="./images/{{$user->images}}" alt="ユーザーアイコン"></td>
      <td>{{$user->username}}</td>
      <td class=follow-button>
        @if(auth()->user()->isFollowing($user->id))
        <form action="{{ route('unfollow',['user'=> $user->id])}} " method="post">
          @csrf
          <input type="submit" name="button" class="unfollow-button" value="フォロー解除">
        </form>
        @else
        <form action="{{ route('follow',['user'=>$user->id]) }}" method="post">
          @csrf
          <input type="submit" name="follow" class="followbutton" value="フォローする">
        </form>
        @endif
      </td>
    </tr>
    @endif
    @endforeach

        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('js/script.js')}}"></script>
  </table>
  @endif
    <div class="pagination">
  {!! $users->links() !!}
    </div>
</div>
@endsection
