@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-full md:w-2/3 lg:w-1/2">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="text-3xl mb-6 text-center font-bold">{{ __('Dashboard') }}</div>

                    @if (session('status'))
                        <div class="group relative">
                            <div
                                class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 transition duration-300 opacity-0 invisible group-hover:opacity-100 group-hover:visible"
                                role="alert"
                            >
                                {{ session('status') }}
                                <a href="{{ route('logout') }}" class="text-red-500 font-bold ml-2">Sair</a>
                            </div>
                        </div>
                    @endif

                    <p class="mb-4">{{ __('Bem-vindo! Você está logado.') }}</p>

                    <!-- Adicione os links ou botões abaixo -->
                    <div class="mt-8 flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4">
                        <a href="{{ route('professors.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 focus:outline-none focus:shadow-outline-blue whitespace-no-wrap">
                            {{ __('Novo Professor') }}
                        </a>
                        <a href="{{ route('messages.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300 focus:outline-none focus:shadow-outline-green whitespace-no-wrap">
                            {{ __('Nova Mensagem') }}
                        </a>
                        <a href="{{ route('messages.professor') }}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded transition duration-300 focus:outline-none focus:shadow-outline-teal whitespace-no-wrap">
                            {{ __('Suas Mensagens') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
