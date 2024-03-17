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
    <form method="POST" action="/register" class="bg-slate-800 rounded-2xl w-[300px] sm:w-[300px] md:w-[400px] lg:w-[500px] border border-solid border-2 flex max-w-2xl flex-col gap-4 lg:gap-8 text-black">
    @csrf
        <div class="p-8 sm:p-10 md:p-12 lg:p-16 text-3xl text-white flex flex-col justify-center items-center">
            <img class="w-40 h-40" src="/images/logotr.png" alt="Site logo"/>
            <h1>Create Your Account</h1>
        </div>
        <div class="p-8 flex flex-col justify-center">
            <label for="name" class="mb-2 block text-white form-label">Name</label>
            <input name="name" id="name" type="text" class="form-input" placeholder="Your Name" required/>
        </div>
        <div class="p-8 flex flex-col justify-center">
            <label for="email" class="mb-2 block text-white form-label">Email</label>
            <input name="email" id="email" type="email" class="form-input" placeholder="name@email.com" required/>
        </div>
        <div class="p-8 flex flex-col justify-center">
            <label for="password" class="mb-2 block text-white form-label">Password</label>
            <input name="password" id="password" type="password" class="form-input" required/>
        </div>
        <div class="p-8 flex flex-col justify-center">
            <label for="password_confirmation" class="mb-2 block text-white form-label">Confirm Password</label>
            <input name="password_confirmation" id="password_confirmation" type="password" class="form-input" required/>
        </div>
        <div class="flex items-center justify-center p-2 sm:p-4 md:p-6 lg:p-8">
            <button type="submit" class="w-max bg-[#b2cdd8] rounded-lg text-black border border-solid p-2 submit-button">Register</button>
        </div>
    </form>

    <div class="sm:hidden border border-2 rounded-2xl">
        <div class="p-8 text-white bg-cyan-700 border rounded-2xl flex flex-col justify-center items-center">
            <h1 class="text-3xl">Welcome!</h1>
            <div>Already have an account?</div>
            <button class="bg-green-500 p-4">
                <a class="text-white" href="/mainlogin">
                    <h2>Login Here</h2>
                </a>
            </button>
        </div>
    </div>
</div>
@endsection