@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-bold mb-4">Suas Mensagens</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Nome do Aluno</th>
                        <th class="px-4 py-2">Data</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userMessages as $message)
                        <tr>
                            <td class="border px-4 py-2">{{ $message->student_name }}</td>
                            <td class="border px-4 py-2">{{ $message->created_at->format('d/m/Y') }}</td>
                            <td class="border px-4 py-2">{{ $message->status_response }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('professors.messages.show', ['professor' => $message->professor_id, 'message' => $message->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue mr-2">Ver</a>
                                <a href="{{ route('messages.edit', $message->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-yellow">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
