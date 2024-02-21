@extends('layouts.app')

@section('titulo', 'Login')
    
@section('contenido')
<div class="py-8 px-4 mx-auto max-w-2xl lg:py-20">
    <form method="POST" class="bg-white rounded-lg shadow-lg p-6">
        @csrf            
        <div class="mb-6">
            <span class="block text-sm font-medium text-slate-700">Email</span>
            <div class="relative w-full">
                <input wire:model="email" type="text" name="email" id="email" class="input input-bordered w-full" required/>
            </div>
        </div>
    
        <div class="mb-6">
            <span class="block text-sm font-medium text-slate-700">Password</span>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa-solid fa-lock" style="color: #3575e3;"></i>
                </div>
                <input wire:model="password" type="password" name="password" id="password" class="input input-bordered w-full" required/>
            </div>
        </div>
    
        @error('message')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">
                {{ $message }}
            </p>
        @enderror
    
        <button type="submit" class="btn btn-success text-white">
            Iniciar sesión
        </button>
    </form>
</div>
@endsection