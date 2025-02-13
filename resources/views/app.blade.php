<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"> 
        {{-- → Menentukan bahwa UTF-8 digunakan sebagai encoding karakter halaman web. --}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <meta name="viewport"> Elemen meta yang digunakan untuk mengatur tampilan halaman di berbagai ukuran layar.
        width=device-width → Menyesuaikan lebar tampilan agar sesuai dengan lebar layar perangkat.
        initial-scale=1 → Mengatur zoom awal halaman ke skala 1.0 (tidak diperbesar atau diperkecil).--}}

        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        {{-- Elemen <title> digunakan untuk menampilkan judul halaman di browser.
        Kata kunci inertia digunakan oleh Inertia.js untuk mengelola judul halaman secara dinamis--}}

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        {{-- link rel="preconnect" href="https://fonts.bunny.net"> --}}
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @viteReactRefresh
        @vite(['resources/js/app.jsx', "resources/js/Pages/{$page['component']}.jsx"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
