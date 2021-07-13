@extends('layouts.app')

@section('content')
<div>
    		
    		<!--Форма авторизации-->
    		<div class="block">
    			<form method="POST" action="{{ route('login') }}" class="auth-authform">
                @csrf
    				<input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Логин" class="auth-inputtext">
                    <input id="password" type="password" name="password" placeholder="Пароль" class="auth-inputtext">

    				<div class="block">
                    <button class="auth-button" type="submit">Войти</button>
                    </div>
                    <div class="block">
                    <button class="auth-button" ><a class="auth-button" style ="text-decoration: none" href="/register">Создать аккуант</a></button>
    				</div>
                    
    				
    			</form>
    	</div>



@endsection
