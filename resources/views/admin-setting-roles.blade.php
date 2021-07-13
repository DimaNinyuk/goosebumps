@extends('layouts.app')

@section('content')
<button class="admin-roles-add-roles">Выдача прав</button>
          <!--Форма загрузки трека-->
        <div class="block">
       
          <form method="post" action="{{ url('/setroles') }}" class="admin-roles-trackform">
          @csrf
           <!--Жанры-->
            <select class="admin-roles-select-user" name ="id">
            @foreach($usersetrole as $user)
            <option  value="{{$user->id}}">{{$user->name}} id = {{$user->id}} role = {{$user->roles->first()->role->name}}</option>
            @endforeach
            </select>

            <div class="block">
                <input type="submit" name="add-role" value="Выдать права автора" class="admin-roles-add-role">
            </div>
            <div class="block">
                <input type="submit" name="delete-role" value="Удалить права автора" class="admin-roles-delete-role">
            </div>
          </form>
      </div>
      @endsection