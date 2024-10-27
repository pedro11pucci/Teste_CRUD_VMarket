@extends('layout')
@section('title', 'Cadastrar Produto')
@section('content')

<div class="container mx-auto flex justify-center mt-10">
    <div class="bg-gray-100 p-6 rounded-md" style="max-width: 1100px; min-height: 600px; width: 100%;">
        <div class="mb-4 flex justify-end">
            <a href="{{ route('products') }}" class="bg-gray-500 text-white px-8 py-2 rounded hover:bg-gray-700 transition">Voltar</a>
        </div>

        <form action="{{ route('products/update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="flex mb-4">
                <div class="w-1/2 pr-2">
                    <label for="name" class="block text-lg font-medium text-gray-700 mb-4">Nome</label>
                    <input type="text" id="name" name="name" required class="border border-gray-300 px-4 py-2 rounded w-full" placeholder="Nome do produto" value="{{ $product->name }}" />
                </div>
                <div class="w-1/2 pl-2">
                    <label for="code" class="block text-lg font-medium text-gray-700 mb-4">Código</label>
                    <input type="text" id="code" name="code" required placeholder="Código do fornecedor" class="border border-gray-300 px-4 py-2 rounded w-full @error('code') border-red-500 @enderror" value="{{ old('code', $product->code) }}" />
                    @error('code')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 mt-10">
                <label for="description" class="block text-lg font-medium text-gray-700 mb-4">Descrição</label>
                <textarea id="description" name="description" required class="border border-gray-300 px-4 py-2 rounded w-full" placeholder="Descrição do produto" rows="4">{{ old('description', $product->description) }}</textarea>
            </div>           

            <div class="flex mb-4 mt-10">
                <div class="w-1/2 pr-2">
                    <label for="price" class="block text-lg font-medium text-gray-700 mb-4">Preço</label>
                    <input type="number" id="price" name="price" required class="border border-gray-300 px-4 py-2 rounded w-full" placeholder="Preço do produto" value="{{ $product->price }}" />
                </div>
                <div class="w-1/2 pl-2">
                    <label for="products" class="block text-lg font-medium text-gray-700 mb-4">Fornecedores</label>
                    <select id="products" name="suppliers[]" class="border border-gray-300 px-4 py-2 rounded w-full" multiple>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ $product->suppliers->contains($supplier->id) ? 'selected' : '' }}>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end mt-16">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Cadastrar Produto</button>
            </div>
        </form>

    </div>
</div>

@endsection
