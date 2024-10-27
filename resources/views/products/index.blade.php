@extends('layout')
@section('title', 'Produtos')
@section('content')

<div class="container mx-auto">
    <div class="mb-4 mt-10 flex justify-between items-center">
        <div class="flex-grow mr-4">
            <input type="text" id="search" placeholder="Pesquisar produto por nome" class="border border-gray-300 px-4 py-2 rounded w-3/6" onkeyup="filterProducts()" />
        </div>
        <a href="" class="bg-blue-500 text-white px-8 py-2 rounded hover:bg-blue-700 transition">Cadastrar Novo Produto</a>
    </div>
    <div class="overflow-auto max-h-[650px] relative">
        <table class="min-w-full border border-gray-300" id="products-table">

            <thead class="bg-blue-500 text-white sticky top-0 z-10">
                <tr>
                    <th class="border px-4 py-2">Nome</th>
                    <th class="border px-4 py-2">Código</th>
                    <th class="border px-4 py-2">Descrição</th>
                    <th class="border px-4 py-2">Preço</th>
                    <th class="border px-4 py-2">Fornecedores</th>
                    <th class="border px-2 py-2 w-1/12 text-center">Editar</th>
                    <th class="border px-2 py-2 w-1/12 text-center">
                        <input type="checkbox" id="select-all" onclick="toggleSelectAll()" class="transform scale-125" />
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $index => $product)
                <tr class="{{ $index % 2 == 0 ? 'bg-gray-200' : 'bg-white' }}" data-name="{{ strtolower($product->name) }}">
                    <td class="border px-4 py-2"> {{ $product->name }} </td>
                    <td class="border px-4 py-2"> {{ $product->code }} </td>
                    <td class="border px-4 py-2"> {{ $product->description }} </td>
                    <td class="border px-4 py-2"> {{ $product->price }} </td>
                    <td class="border px-4 py-2"> {!! $product->suppliers->pluck('name')->implode('<br>') !!} </td>
                    <td class="border px-2 py-2 w-1/12 text-center">
                        <a href="{{ route('products/edit', $product->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded inline-flex hover:bg-yellow-700 transition"><x-eva-edit-outline style="height: 20px; width: 20px;" /></a>
                    </td>
                    <td class="border px-2 py-2 w-1/12 text-center">
                        <input type="checkbox" name="selected_ids[]" value="{{ $product->id }}" class="transform scale-125 select-item" onclick="toggleDeleteButton()" />
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <form id="delete-form" action="{{ route('products/delete') }}" method="POST">
        @csrf
        @method('DELETE') 
        <input type="hidden" id="selected-ids" name="selected_ids" value="">
    
        <div class="mt-4 mr-12 flex justify-end">
            <button type="submit" id="delete-button" class="bg-red-500 text-white px-4 py-2 rounded opacity-50 cursor-not-allowed hover:bg-red-700 transition" disabled>
                <x-monoicon-delete style="height: 24px; width: 24px;"/>
            </button>
        </div>
    </form>
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

    function updateSelectedIds() {
        const deleteForm = document.getElementById('delete-form');
        const selectedIdsInput = document.getElementById('selected-ids');

        if (selectedIdsInput) {
            const checkboxes = document.querySelectorAll('.select-item:checked');
            const selectedIds = Array.from(checkboxes).map(checkbox => checkbox.value);
            
            selectedIdsInput.value = selectedIds.join(',');
        }
    }

    function toggleDeleteButton() {
        const checkboxes = document.querySelectorAll('.select-item');
        const deleteButton = document.getElementById('delete-button');

        if (deleteButton) {
            const isAnyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            deleteButton.disabled = !isAnyChecked;
            deleteButton.classList.toggle('opacity-50', !isAnyChecked);
            deleteButton.classList.toggle('cursor-not-allowed', !isAnyChecked);
        }

        updateSelectedIds();
    }

    function filterProducts() {
        const searchInput = document.getElementById('search').value.toLowerCase();
        const rows = document.querySelectorAll('#products-table tbody tr');

        rows.forEach(row => {
            const productName = row.getAttribute('data-name');
            row.style.display = productName.includes(searchInput) ? '' : 'none';
        });
    }

</script>

@endsection
