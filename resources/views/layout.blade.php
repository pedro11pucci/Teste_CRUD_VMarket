<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="flex justify-center bg-[#0088CC] p-7">
        <ul class="flex items-center gap-4">
            <li>
                <a href="{{ route('suppliers') }}" class="text-white font-bold px-16 py-3 rounded-lg hover:bg-slate-100 hover:text-[#0088CC] transition">
                    Fornecedores
                </a>
            </li>
            <li>
                <a href="{{ route('products') }}" class="text-white font-bold px-16 py-3 rounded-lg hover:bg-slate-100 hover:text-[#0088CC] transition">
                    Produtos
                </a>
            </li>
        </ul>
    </nav>

    @yield('content')

</body>
</html>