@extends('layouts.app')

@section('content')
<a style = "color:white"
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
<div class="logouser">
</div>
<div class="nameuser">
           {{$auth->name}}
</div>
<div class="genres">

            <div class="block">
               <a href="/home" class="button">Все</a>
            </div>
            @foreach($genres as $genre)
            <div class="block">
               <a href="/genre/{{$genre->id}}" class="button">{{$genre->name}}</a>
            </div>
            @endforeach
            


            <hr />
            <div class="block">
                <a href="/admin-setting" class="button">Настройки</a>
            </div>
</div>
        <!--Контент-->
         <div class="content">
          @foreach($tracks as $track)
          <div class="block track">
           <img style="height:107px; width:107px" src="img/{{$track->image}}">
           <span class="authorname">{{$track->author}} </span>
           <span class="trackname">{{$track->name}}</span>
           <div class="audidiv">
           <audio controls preload="auto" controlsList="nodownload">
           <source src="music/{{$track->path}}" type="audio/mpeg"> 
           </audio>
           </div>
           <button class="delete"  data-id-track="{{$track->id}}"></button>
                      
           @if($track->likes->contains('user_id', $auth->id))
           <button class="likes liked" data-id-track="{{$track->id}}" data-id-user="{{$auth->id}}"></button>
           @else
           <button class="likes like" data-id-track="{{$track->id}}" data-id-user="{{$auth->id}}"></button>
           @endif
           @if($track->dislikes->contains('user_id', $auth->id))
           <button class="dislikes disliked" data-id-track="{{$track->id}}" data-id-user="{{$auth->id}}"></button>
           @else
           <button class="dislikes dislike" data-id-track="{{$track->id}}" data-id-user="{{$auth->id}}"></button>
           @endif


           
           <button class="comments" data-id-track="{{$track->id}}"></button>
            <div class="block-comments" id="{{$track->id}}">
            @foreach($track->comments as $comment)
            <div class="block">
             <strong>{{$comment->user->name}}:</strong>
             <p>{{$comment->text}}</p>
             <p style="color: grey; text-align: right;">{{$comment->created_at}}</p>
             <br />
             <button class="deletec"  data-id="{{$comment->id}}">Удалить</button>
             </div>
             <BR>
            @endforeach
             <form method="post" action="{{ url('/addcomment') }}">
             @csrf
              <label style="color:green">Оставьте свой комментарий....</label><br>
              <textarea rows="10" cols="95 " name="text"></textarea>
              <input type="hidden" value="{{$track->id}}" name="track_id"></input>
              <input type="hidden" value="{{$auth->id}}" name="user_id"></input>
              <input type="submit" value="Отправить" name="send"></input>
              
             </form>
           </div>
           </div>
           @endforeach
        </div>

 <!--Плейлисты-->
 <div class="mini content" > 
    <div class="block track">
           <div class="block">
                <input type="submit" name="register" value="Плейлист" class="button">
            </div>
            <div class="block">
                <input type="submit" name="register" value="Плейлист" class="button">
            </div>
            <div class="block">
                <input type="submit" name="register" value="Плейлист" class="button">
            </div>
         </div>
  <button class="close"></button>
  
 </div>

@endsection
