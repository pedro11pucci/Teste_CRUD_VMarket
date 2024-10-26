@extends('layout')
@section('title', 'Fornecedores')
@section('content')

<div class="container mx-auto">
    <div class="mb-4 mt-4 flex justify-end">
        <a href="" class="bg-blue-500 text-white px-8 py-2 rounded">Cadastrar Novo Fornecedor</a>
    </div>

    <table class="min-w-full border border-gray-300">
        <tbody>
            @foreach($suppliers as $supplier)
            <tr>
                <td class="border px-4 py-2 w-5/6">
                    {{ $supplier->name }}
                </td>
                <td class="border px-4 py-2 w-1/6">
                    <a href="" class="bg-yellow-500 text-white px-2 py-1 rounded inline-flex"><x-eva-edit-outline style="height: 24px; width: 24px;"/></a>
                    <a href="" class="bg-red-500 text-white px-2 py-1 rounded inline-flex"><x-monoicon-delete style="height: 24px; width: 24px;"/></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection