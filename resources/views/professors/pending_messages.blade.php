@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-bold mb-4">{{ __('Mensagens Pendentes') }}</h2>
        <div class="table-responsive">
            <table class="w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b">{{ __('Nome do Aluno') }}</th>
                        <th class="py-2 px-4 border-b">{{ __('Data') }}</th>
                        <th class="py-2 px-4 border-b">{{ __('Professor') }}</th>
                        <th class="py-2 px-4 border-b">{{ __('Matéria') }}</th>
                        <th class="py-2 px-4 border-b">{{ __('Status') }}</th>
                        <th class="py-2 px-4 border-b">{{ __('Ações') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $message->student_name }}</td>
                            <td class="py-2 px-4">{{ $message->created_at->format('d/m/Y') }}</td>
                            <td class="py-2 px-4">{{ $message->professor->name }}</td>
                            <td class="py-2 px-4">{{ $message->professor->matter->name ?? ' Não há materia cadastrada' }}</td>
                            <td class="py-2 px-4 text-left">
                                <p>{{ $message->status }}</p>
                            </td>
                            <td class="py-2 px-4">
                                <a href="{{ route('professors.messages.show', ['professor' => $message->professor_id, 'message' => $message->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline-blue">
                                    {{ __('Ver') }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-2 px-4">{{ __('Nenhuma mensagem pendente disponível.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
