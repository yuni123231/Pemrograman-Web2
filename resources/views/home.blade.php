@extends('layouts.user')

@section('title', 'Home')

@section('contents')
<style>
    .header-section {
        background-color: #4299e1;
        padding: 2rem 2rem;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: white;
    }

    .header-text {
        max-width: 60%;
    }

    .header-image {
        max-width: 35%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .header-image img {
        width: 60%;
        height: auto;
        object-fit: cover;
    }

    .explore-button {
        background-color: #edf2f7;
        color: black;
        padding: 0.75rem 1.5rem;
        border-radius: 0.375rem;
        transition: background-color 0.3s ease;
    }

    .explore-button:hover {
        background-color: #3182ce;
    }

    .info-section {
        margin-top: 3rem;
    }

    .info-card {
        background-color: white;
        padding: 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        border: 1px solid #cbd5e0;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .info-card h3 {
        margin-bottom: 1rem;
    }

    .info-card img {
        margin-bottom: 1rem;
        max-width: 100px;
        height: auto;
    }
</style>

<hr>
<main>
    <div class="max-w-7xl mx-auto py-3 sm:px-6 lg:px-8"> <!-- Changed py-6 to py-3 -->
        <!-- Header Section -->
        <div class="header-section">
            <div class="header-text">
                <h1 class="text-4xl font-bold mb-4">Selamat Datang di Sistem Pendukung Keputusan Tempat Les</h1>
                <p class="text-lg mb-8">Menggunakan metode Weight Product (WP) untuk membantu Anda memilih tempat les terbaik sesuai kebutuhan.</p>
                <a href="{{ url('/rekomendasi') }}" class="explore-button">Jelajah Sekarang!</a>
            </div>
            <div class="header-image">
                <img src="{{ asset('img/cover.png') }}" alt="Header Image">
            </div>
            
        </div>
        
        <!-- Additional Info Section -->
        <div class="info-section">
            <h2 class="text-2xl font-semibold mb-4">Kenapa Memilih Kami?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="info-card">
                    <img class="mx-auto" src="https://img.icons8.com/?size=100&id=112158&format=png&color=000000" alt="Penilaian Akurat">
                    <h3 class="text-xl font-semibold mb-2">Penilaian Akurat</h3>
                    <p class="text-gray-600">Menggunakan metode Weight Product (WP) untuk memberikan penilaian yang akurat dan objektif.</p>
                </div>
                <div class="info-card">
                    <img class="mx-auto" src="https://img.icons8.com/?size=100&id=31481&format=png&color=000000" alt="Data Terpercaya">
                    <h3 class="text-xl font-semibold mb-2">Data Terpercaya</h3>
                    <p class="text-gray-600">Mengumpulkan data dari berbagai sumber terpercaya untuk memastikan keakuratan informasi.</p>
                </div>
                <div class="info-card">
                    <img class="mx-auto" src="https://img.icons8.com/?size=100&id=YMJjlOMn5LFY&format=png&color=000000" alt="User-Friendly">
                    <h3 class="text-xl font-semibold mb-2">User-Friendly</h3>
                    <p class="text-gray-600">Antarmuka yang ramah pengguna untuk pengalaman yang lebih mudah dan menyenangkan.</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
