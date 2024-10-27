@extends('layout')
@section('title', 'Fornecedores')
@section('content')

<div class="container mx-auto">
    <div class="mb-4 mt-10 flex justify-between items-center">
        <div class="flex-grow mr-4">
            <input type="text" id="search" placeholder="Pesquisar fornecedor por nome" class="border border-gray-300 px-4 py-2 rounded w-3/6" onkeyup="filterSuppliers()" />
        </div>
        <a href="{{ route('suppliers/create') }}" class="bg-blue-500 text-white px-8 py-2 rounded hover:bg-blue-700 transition">Cadastrar Novo Fornecedor</a>
    </div>
    <div class="overflow-auto max-h-[650px] relative">
        <table class="min-w-full border border-gray-300" id="suppliers-table">

            <thead class="bg-blue-500 text-white sticky top-0 z-10">
                <tr>
                    <th class="border px-4 py-2">Nome</th>
                    <th class="border px-4 py-2">CNPJ</th>
                    <th class="border px-4 py-2">Localização</th>
                    <th class="border px-4 py-2">Telefone</th>
                    <th class="border px-4 py-2">E-mail</th>
                    <th class="border px-2 py-2 w-1/12 text-center">Editar</th>
                    <th class="border px-2 py-2 w-1/12 text-center">
                        <input type="checkbox" id="select-all" onclick="toggleSelectAll()" class="transform scale-125" />
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach($suppliers as $index => $supplier)
                <tr class="{{ $index % 2 == 0 ? 'bg-gray-200' : 'bg-white' }}" data-name="{{ strtolower($supplier->name) }}">
                    <td class="border px-4 py-2"> {{ $supplier->name }} </td>
                    <td class="border px-4 py-2"> {{ $supplier->cnpj }} </td>
                    <td class="border px-4 py-2"> {{ $supplier->location }} </td>
                    <td class="border px-4 py-2"> {{ $supplier->phone }} </td>
                    <td class="border px-4 py-2"> {{ $supplier->email }} </td>
                    <td class="border px-2 py-2 w-1/12 text-center">
                        <a href="" class="bg-yellow-500 text-white px-2 py-1 rounded inline-flex hover:bg-yellow-700 transition"><x-eva-edit-outline style="height: 20px; width: 20px;" /></a>
                    </td>
                    <td class="border px-2 py-2 w-1/12 text-center">
                        <input type="checkbox" name="selected_ids[]" value="{{ $supplier->id }}" class="transform scale-125 select-item" onclick="toggleDeleteButton()" />
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <div class="mt-4 mr-12 flex justify-end">
        <button type="submit" id="delete-button" class="bg-red-500 text-white px-4 py-2 rounded opacity-50 cursor-not-allowed hover:bg-red-700 transition" disabled>
            <x-monoicon-delete style="height: 24px; width: 24px;"/>
        </button>
    </div>
</div>

<script>
    function toggleSelectAll() {
        const selectAllCheckbox = document.getElementById('select-all');
        const checkboxes = document.querySelectorAll('.select-item');

        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
        toggleDeleteButton();
    }

    function toggleDeleteButton() {
        const checkboxes = document.querySelectorAll('.select-item');
        const deleteButton = document.getElementById('delete-button');

        const isAnyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        deleteButton.disabled = !isAnyChecked;
        deleteButton.classList.toggle('opacity-50', !isAnyChecked);
        deleteButton.classList.toggle('cursor-not-allowed', !isAnyChecked);
    }

    function filterSuppliers() {
        const searchInput = document.getElementById('search').value.toLowerCase();
        const rows = document.querySelectorAll('#suppliers-table tbody tr');

        rows.forEach(row => {
            const supplierName = row.getAttribute('data-name');
            row.style.display = supplierName.includes(searchInput) ? '' : 'none';
        });
    }

</script>

@endsection
