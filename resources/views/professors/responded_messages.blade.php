@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-4">
        <h2 class="text-2xl font-bold mb-4">Todas as Mensagens Respondidas</h2>
        <table class="table-auto w-full border-collapse border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Nome do Aluno</th>
                    <th class="border px-4 py-2">Data</th>
                    <th class="border px-4 py-2">Professor</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td class="border px-4 py-2">{{ $message->student_name }}</td>
                        <td class="border px-4 py-2">{{ $message->created_at->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2">{{ $message->professor->name }}</td>
                        <td class="border px-4 py-2 text-center">
                            <p>{{ $message->getStatusAttribute() }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('professors.messages.show', ['professor' => $message->professor_id, 'message' => $message->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-sm focus:outline-none focus:shadow-outline-blue">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
