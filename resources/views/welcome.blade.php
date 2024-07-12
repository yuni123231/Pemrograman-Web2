<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendukung Keputusan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-white shadow">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <a href="#" class="text-xl font-bold text-black">SPK Pemilihan Tempat Les</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="hero h-screen bg-blue-500 flex items-center justify-center text-white">
            <div class="container mx-auto px-6 py-4 flex flex-col lg:flex-row items-center">
                <div class="text-center lg:text-left lg:w-1/2">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Sistem Pendukung Keputusan</h1>
                    <p class="text-xl mb-8">Pemilihan Tempat Les Terbaik Menggunakan Metode Weighted Product (WP)</p>
                    <div>
                        <a href="{{ route('login') }}" class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded mr-4">Login</a>
                        <a href="{{ route('register') }}" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">Register</a>
                    </div>
                </div>
                <div class="mt-8 lg:mt-0 lg:w-1/2 text-center">
                    <img src="img/coverdepan.png" alt="Education Image" class="w-3/4 mx-auto lg:w-full">
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white shadow py-4 mt-4">
        <div class="container mx-auto text-center text-gray-700">
            &copy; 2024 Sistem Pendukung Keputusan. All rights reserved.
        </div>
    </footer>
</body>
</html>
