<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- text-formatter-disabled --}}
<style type="text/tailwindcss">
    .btn{
        @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700 hover:bg-slate-50
    }
    label{
        @apply block text-slate-700 uppercase mb-4
    }
    input,textarea{
        @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
    }
    .error{
        @apply text-red-500 text-sm
    }
</style>
    {{-- text-formatter-enabled --}}
    <script src="//unpkg.com/alpinejs" defer></script>

  </head>
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    @include('flash.success')
    <a href="{{url('/')}}" class="block mb-5 text-3xl text-slate-700 underline decoration-pink-500">Task List</a>

    @yield('main')

</body>
</html>
