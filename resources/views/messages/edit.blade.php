@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-bold mb-4">Editar Mensagem</h2>
        <form method="POST" action="{{ route('messages.update', $message->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="student_name" class="block text-gray-700 text-sm font-bold mb-2">Nome do Aluno:</label>
                <input type="text" name="student_name" class="w-full px-3 py-2 border rounded-md @error('student_name') border-red-500 @enderror" value="{{ $message->student_name }}" required>
            </div>
            <div class="mb-4">
                <label for="birth_date" class="block text-gray-700 text-sm font-bold mb-2">Data de Nascimento:</label>
                <input type="date" name="birth_date" class="w-full px-3 py-2 border rounded-md @error('birth_date') border-red-500 @enderror" value="{{ $message->birth_date }}" required>
            </div>
            <div class="mb-4">
                <label for="city" class="block text-gray-700 text-sm font-bold mb-2">Cidade:</label>
                <input type="text" name="city" class="w-full px-3 py-2 border rounded-md @error('city') border-red-500 @enderror" value="{{ $message->city }}" required>
            </div>
            <div class="mb-4">
                <label for="state" class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                <input type="text" name="state" class="w-full px-3 py-2 border rounded-md @error('state') border-red-500 @enderror" value="{{ $message->state }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">E-mail:</label>
                <input type="email" name="email" class="w-full px-3 py-2 border rounded-md @error('email') border-red-500 @enderror" value="{{ $message->email }}" required>
            </div>
            <div class="mb-4">
                <label for="whatsapp" class="block text-gray-700 text-sm font-bold mb-2">Whatsapp:</label>
                <input type="text" name="whatsapp" class="w-full px-3 py-2 border rounded-md @error('whatsapp') border-red-500 @enderror" value="{{ $message->whatsapp }}" required>
            </div>
            <div class="mb-4">
                <label for="professor_id" class="block text-gray-700 text-sm font-bold mb-2">Selecione o Professor:</label>
                <select name="professor_id" class="w-full px-3 py-2 border rounded-md @error('professor_id') border-red-500 @enderror" required>
                    @foreach ($professors as $professor)
                        <option value="{{ $professor->id }}" {{ $message->professor_id == $professor->id ? 'selected' : '' }}>{{ $professor->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 focus:outline-none focus:shadow-outline-blue">Atualizar Mensagem</button>
        </form>
    </div>
@endsection
