@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-bold mb-4">Enviar Mensagem</h2>
        <form method="POST" action="{{ route('messages.store') }}" class="max-w-lg mx-auto">
            @csrf
            <div class="mb-4">
                <label for="student_name" class="block text-gray-700 text-sm font-bold mb-2">Nome do Aluno:</label>
                <input type="text" name="student_name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:shadow-outline-blue" required>
            </div>
            <div class="mb-4">
                <label for="birth_date" class="block text-gray-700 text-sm font-bold mb-2">Data de Nascimento:</label>
                <input type="date" name="birth_date" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:shadow-outline-blue" required>
            </div>
            <div class="mb-4">
                <label for="city" class="block text-gray-700 text-sm font-bold mb-2">Cidade:</label>
                <input type="text" name="city" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:shadow-outline-blue" required>
            </div>
            <div class="mb-4">
                <label for="state" class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                <input type="text" name="state" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:shadow-outline-blue" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">E-mail:</label>
                <input type="email" name="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:shadow-outline-blue" required>
            </div>
            <div class="mb-4">
                <label for="whatsapp" class="block text-gray-700 text-sm font-bold mb-2">Whatsapp:</label>
                <input type="text" name="whatsapp" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:shadow-outline-blue" required>
            </div>
            <div class="mb-4">
                <label for="professor_id" class="block text-gray-700 text-sm font-bold mb-2">Selecione o Professor:</label>
                <select name="professor_id" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:shadow-outline-blue" required>
                    @foreach ($professors as $professor)
                        <option value="{{ $professor->id }}">{{ $professor->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue">Enviar Mensagem</button>
        </form>
    </div>
@endsection
