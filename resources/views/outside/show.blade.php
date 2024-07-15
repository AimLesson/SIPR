<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RuangKominfo</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Custom CSS for background image -->
    <style>
        body {
            background-image: url('{{ asset('asset/bg.png')}}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
            /* Smooth scrolling */
        }
    </style>
</head>

<body class="font-sans antialiased">
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white shadow-sm rounded-lg">
            <img src='{{ asset('storage/'.$room->image) }}' alt="{{ $room->name }}" class="w-full h-64 object-cover rounded-lg">
            <div class="mt-6">
                <h1 class="text-3xl font-semibold text-gray-800">{{ $room->nama_ruang }}</h1>
                <p class="mt-4 text-gray-600">{{ $room->deskripsi }}</p>
                <p class="mt-2 text-gray-600"><strong>Status:</strong> {{ $room->status }}</p>
                <div class="flex p-3">
                    <a href="{{ route('booking.create', ['room_id' => $room->id]) }}" class="mt-6 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Buat Jadwal
                    </a>
                    <a href="/" class="ms-3 mt-6 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">                        
                        Kembali
                    </a>    
                </div>               
            </div>
        </div>
    </div>
</div>
<footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a
                href="https://flowbite.com/" class="hover:underli   ne">RuangKominfo</a>. All Rights Reserved.
        </span>
        <div id="datetime" class="text-sm text-gray-500 sm:text-center dark:text-gray-400 mt-3 md:mt-0 hidden md:block"></div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>