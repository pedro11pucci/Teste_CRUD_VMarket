@extends('layout')
@section('title', 'Cadastrar Fornecedor')
@section('content')

<div class="container mx-auto flex justify-center mt-10">
    <div class="bg-gray-100 p-6 rounded-md" style="max-width: 1100px; min-height: 600px; width: 100%;">
        <div class="mb-4 flex justify-end">
            <a href="{{ route('suppliers') }}" class="bg-gray-500 text-white px-8 py-2 rounded hover:bg-gray-700 transition">Voltar</a>
        </div>

        <form action="{{ route('suppliers/store') }}" method="POST">
            @csrf

            <div class="flex mb-4">
                <div class="w-1/2 pr-2">
                    <label for="name" class="block text-lg font-medium text-gray-700 mb-4">Nome</label>
                    <input type="text" id="name" name="name" required class="border border-gray-300 px-4 py-2 rounded w-full" placeholder="Nome do fornecedor" />
                </div>
                <div class="w-1/2 pl-2">
                    <label for="cnpj" class="block text-lg font-medium text-gray-700 mb-4">CNPJ</label>
                    <input type="text" id="cnpj" name="cnpj" required class="border border-gray-300 px-4 py-2 rounded w-full @error('cnpj') border-red-500 @enderror" placeholder="CNPJ do fornecedor" value="{{ old('cnpj') }}" />
                    @error('cnpj')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 mt-10">
                <label for="location" class="block text-lg font-medium text-gray-700 mb-4">Localização</label>
                <input type="text" id="location" name="location" required class="border border-gray-300 px-4 py-2 rounded w-full" placeholder="Localização do fornecedor" />
            </div>

            <div class="flex mb-4 mt-10">
                <div class="w-1/2 pr-2">
                    <label for="phone" class="block text-lg font-medium text-gray-700 mb-4">Telefone</label>
                    <input type="text" id="phone" name="phone" required class="border border-gray-300 px-4 py-2 rounded w-full" placeholder="Telefone do fornecedor" />
                </div>
                <div class="w-1/2 pl-2">
                    <label for="email" class="block text-lg font-medium text-gray-700 mb-4">E-mail</label>
                    <input type="email" id="email" name="email" required class="border border-gray-300 px-4 py-2 rounded w-full" placeholder="E-mail do fornecedor" />
                </div>
            </div>

            <div class="flex justify-end mt-16">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Cadastrar Fornecedor</button>
            </div>
        </form>

    </div>
</div>

@endsection
