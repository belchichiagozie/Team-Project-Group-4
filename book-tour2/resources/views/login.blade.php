@extends('layouts.loginnav')

@section('content')
<div class="flex justify-between flex-row">
        <div class="hidden md:block">
        </div>
        <div class="pageStyle" id="prods">
            <div>
            </div>
            <div class="loginpage">
            </div>
        </div>
    </div>


    <div class="flex font-bold flex-col sm:flex-row rounded-2xl inset-20 shadow-[rgba(0,0,15,0.5)_10px_5px_4px_0px]">
        <div class="border border-solid border-2 rounded-2xl w-max hidden sm:block sm:flex sm:flex-col sm:items-center sm:justify-center sm:w-[300px] md:w-[400px] lg:w-[500px] bg-cyan-700">
        @if(session('message'))
            <div class="p-4 bg-yellow-200 text-yellow text-xl rounded-md mb-4">{{ session('message') }}</div>
        @endif
        <div class="text-3xl p-8 text-white flex justify-center items-center">
                Welcome Back!
            </div>
            <div>Don't have an account?</div>
            <button class="bg-green-500 p-4">
                <a class="text-white" href="/mainregister">
                    <h2>Register Here</h2>
                </a>
            </button>
        </div>

        <form method="POST" action="/mainlogin" class="bg-slate-800 rounded-2xl w-[300px] sm:w-[300px] md:w-[400px] lg:w-[500px] border border-solid border-2 flex max-w-2xl flex-col gap-4 lg:gap-8 text-black">
        @csrf
            <div class="p-8 sm:p-10 md:p-12 lg:p-16 text-3xl text-white flex flex-col justify-center items-center">
                <img class="w-40 h-40" src="/images/logotr.png" alt="Book-tour logo"/>
                <span class="flex flex-col justify-center items-center">
                    <h1>BookTour:</h1>
                    <span class="text-xs"></span>
                </span>
            </div>
            <div class="p-8 flex flex-col justify-center">
                <div class="mb-2 block text-white">
                    <label for="email1" class="form-label">Your email</label>
                </div>
                <input name="email" id="email1" type="email" class="form-input" placeholder="name@email.com" required/>
            </div>
            <div class="pb-8 px-8 flex flex-col justify-center">
                <div class="mb-2 block text-white">
                    <label for="password1" class="form-label">Your password</label>
                </div>
                <input name="password" id="password1" type="password" class="form-input" required/>
            </div>
            <div class="flex items-center justify-center gap-2">
                <input name="remember" id="remember" type="checkbox" class="form-checkbox"/>
                <label for="remember" class="text-white form-label">Remember me</label>
            </div>
            <div class="flex items-center justify-center p-2 sm:p-4 md:p-6 lg:p-8">
                <button type="submit" class="w-max bg-[#b2cdd8] rounded-lg text-black border border-solid p-2 submit-button">Submit</button>
            </div>
        </form>
        
        <div class="sm:hidden border border-2 rounded-2xl">
            <div class="p-8 text-white bg-cyan-700 border rounded-2xl flex flex-col justify-center items-center">
                <h1 class="text-3xl">Welcome Back!</h1>
                <div>Don't have an account?</div>
                <button class="bg-green-500 p-4">
                    <a class="text-white" href="/mainregister">
                        <h2>Register Here</h2>
                    </a>
                </button>
            </div>
        </div>
    </div>
    @if($errors->any())
    <div class="text-black alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection