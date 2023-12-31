@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-6 flex justify-center items-center h-screen">
        <div class="text-center">
            <h2 class="text-3xl font-bold mb-4">Mensagem Respondida</h2>
            <p class="mb-8">A mensagem foi marcada como respondida.</p>
            <a href="{{ route('messages.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded transition duration-300 focus:outline-none focus:shadow-outline-blue mt-6">
                Voltar para a Lista de Mensagens
            </a>
        </div>
    </div>
@endsection
