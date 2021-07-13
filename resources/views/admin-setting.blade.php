@extends('layouts.app')

@section('content')
<button class="admin-add-music">Добавить музыку</button>
<div class="block">
               <a href="/home" class="button">Назад</a>
               <a href="/exportfile" class="button">Отчет по трекам</a>
            </div>
            
        <button class="admin-roles" ><a  class="auth-button" style ="text-decoration: none" href="/admin-setting-roles">Выдача прав автора</a></button>
          <!--Форма загрузки трека-->
        <div class="block">
          <form  method="post" action="{{ url('/loadmusic') }}" class="admin-panel-trackform" enctype="multipart/form-data"> 
          @csrf
            <input type="text" name="name" placeholder="Имя автора" class="admin-panel-inputtrackauthor">
            <input type="text" name="author" placeholder="Название трека" class="admin-panel-inputtrackname"> 
            <select class="admin-genere-select" name ="genre_id">
            @foreach($genres as $genre)
            <option  value="{{$genre->id}}">{{$genre->name}}</option>
            @endforeach
            </select>
            <input type="file" name="file" placeholder="Загрузите свою музыку" class="admin-panel-inputtrackfile">
            <div class="admin-panel-file-loading"></div>

            <input type="file" name="fileimg" placeholder="Загрузите изображение" class="admin-panel-inputtrackfilem"> 
            <div class="admin-panel-file-loadingm"></div>

            <div class="block">
                <input type="submit" name="add" value="Готово" class="admin-panel-add-track">
            </div>
          </form>
      </div>
      @endsection