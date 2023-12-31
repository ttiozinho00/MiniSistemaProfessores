<!-- resources/views/professors/create.blade.php -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX=" crossorigin="anonymous" referrerpolicy="no-referrer" />

@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-4">Cadastrar Professor</h1>
    <form method="POST" action="{{ route('professors.store') }}" class="max-w-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-bold text-gray-700">Nome:</label>
            <input type="text" name="name" class="w-full px-4 py-2 border rounded-md @error('name') border-red-500 @enderror" required>
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue">
            <i class="fas fa-check"></i> Enviar
        </button>
    </form>
</div>
@endsection
