@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 flex flex-col items-center justify-center"> <!-- Adiciona flex, items-center e justify-center para centralizar vertical e horizontalmente -->
        <h2 class="text-3xl font-bold mb-4">Detalhes da Mensagem</h2>
        <div class="text-left"> <!-- Adiciona text-left para justificar o texto -->
            <p><strong>Nome do Aluno:</strong> {{ $message->student_name }}</p>
            <p><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($message->birth_date)->format('d/m/Y') }}</p>
            <p><strong>Cidade:</strong> {{ $message->city }}</p>
            <p><strong>Estado:</strong> {{ $message->state }}</p>
            <p><strong>E-mail:</strong> {{ $message->email }}</p>
            <p><strong>Whatsapp:</strong> {{ $message->whatsapp }}</p>
            <p><strong>Status:</strong> {{ $message->status_response === 'pendente' ? 'Pendente' : 'Respondido' }}</p>
            <p><strong>Professor:</strong> {{ $message->professor ? $message->professor->name : 'N/A' }}</p>
        </div>
        
        <div class="flex justify-center mt-4">
            @if($message->status_response === 'pendente')
                <form action="{{ route('messages.markAsResponded', ['message' => $message->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300 focus:outline-none focus:shadow-outline-green mr-2">Marcar como Respondida</button>
                </form>
            @endif

            <a href="{{ route('messages.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 focus:outline-none focus:shadow-outline-blue">Voltar para Lista</a>
        </div>
    </div>
@endsection
