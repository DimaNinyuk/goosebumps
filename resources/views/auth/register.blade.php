@extends('layouts.app')

@section('content')
<div>
    		<!--Шапка-->
    		<div class="header">
    			<div class="title">
    			GOOSEBUMPS
	    		</div>
    		</div>
    		<!--Форма авторизации-->
    		<div class="block">
    			<form method="POST" action="{{ route('register') }}" class="auth-authform">
                @csrf
                    <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Имя" class="auth-inputtext">
    				<input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Логин" class="auth-inputtext">
                    <input id="password" type="password" name="password" placeholder="Пароль" class="auth-inputtext">
                    <input id="password-confirm" type="password" name="password_confirmation" placeholder="Повторить пароль" class="auth-inputtext">

    				<div class="block">
                    <button class="auth-button" type="submit">Регистрация</button>
                    </div>
                    <div class="block">
                    <button class="auth-button" ><a class="auth-button" style ="text-decoration: none" href="/login">Войти</a></button>
    				</div>
                    
    				
    			</form>
    	</div>




@endsection
