@extends('layouts.user')

@section('title', 'About')

@section('contents')
<style>
    /* Palet Warna */
    :root {
        --primary-color: #4299e1; /* Biru */
        --secondary-color: #38a169; /* Hijau */
        --text-color: #333; /* Warna Teks Utama */
        --bg-color: #f0f4f8; /* Warna Background Utama */
        --card-bg: #ffffff; /* Warna Background Kartu */
        --shadow-color: rgba(0, 0, 0, 0.1); /* Warna Bayangan */
    }

    /* Header Section */
    .header-section {
        padding: 2rem;
        border-radius: 0.5rem;
        margin-bottom: 2rem;
        text-align: center;
        background-color: var(--bg-color);
    }

    .header-section h1 {
        font-size: 3rem;
        color: var(--text-color);
        margin-bottom: 1rem;
    }

    .header-section p {
        font-size: 1rem;
        color: #555;
    }

    /* Info Cards */
    .info-card {
        background-color: var(--card-bg);
        padding: 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 2px 4px var(--shadow-color);
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

    .info-card p {
        text-align: left;
        color: var(--text-color);
    }

    .info-card img {
        margin-bottom: 1rem;
        max-width: 100px;
        height: auto;
    }

    .info-card a {
        display: inline-block;
        margin-top: 1rem;
        padding: 0.75rem 1.5rem;
        background-color: var(--primary-color);
        color: white;
        border-radius: 0.375rem;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .info-card a:hover {
        background-color: #3182ce;
    }

    /* Grid */
    .grid {
        display: grid;
        grid-gap: 2rem;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .grid {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
    }

    @media (min-width: 768px) {
        .grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (min-width: 1024px) {
        .grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }
</style>

<hr>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="header-section">
            <h1>About</h1>
            <p>Sistem pendukung keputusan pemilihan tempat les ini dibuat berdasarkan metode Weighted Product (WP), 
                    yang diharapkan dapat membantu pengguna dalam memilih tempat les yang sesuai dengan kebutuhan dan 
                    preferensi mereka. Melalui penerapan kriteria dan analisis data, sistem ini memberikan rekomendasi 
                    tempat les berdasarkan faktor-faktor seperti biaya, jarak, fasilitas, keahlian guru, dan kurikulum 
                    yang diajarkan. Dengan adanya sistem ini, pengguna dapat mengoptimalkan waktu mereka dan mendapatkan 
                    rekomendasi yang objektif sesuai dengan kebutuhan yang dimasukkan ke dalam sistem.</p>
        </div>
        
        <div class="info-section">
            <h2 class="text-2xl font-semibold mb-4">Pilihan Tempat Les di Tegal</h2>
            <div class="grid">
                <div class="info-card">
                    <h3 class="text-xl font-semibold mb-2">Neutron</h3>
                    <img class="mx-auto" src="img/neutron.avif" alt="Neutron">
                    <p>
                        <strong>Alamat:</strong> Jalan Kartini No.18, Panggung, Tegal Timur, Kejambon, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52122
                    </p>
                    <p>
                        <strong>No. Telepon:</strong> 0123-456-789
                    </p>
                    <a href="https://neutron.co.id/" class="detail-button">Detail</a>
                </div>

                <div class="info-card">
                    <h3 class="text-xl font-semibold mb-2">Ganesha Operation</h3>
                    <img class="mx-auto" src="img/GO.png" alt="Ganesha Operation">
                    <p>
                        <strong>Alamat:</strong> Jalan KS Tubun No.13, Pekauman, Tegal Barat, Randugunting, Kec. Tegal Sel., Kota Tegal, Jawa Tengah 52125
                    </p>
                    <p>
                        <strong>No. Telepon:</strong> 0811-2386-184
                    </p>
                    <a href="https://ganeshaoperation.com/" class="detail-button">Detail</a>
                </div>

                <div class="info-card">
                    <h3 class="text-xl font-semibold mb-2">Bimbel Lucky</h3>
                    <img class="mx-auto" src="img/lucky.jpg" alt="Bimbel Lucky">
                    <p>
                        <strong>Alamat:</strong> Jl. Industri No.5, Panggung, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52122
                    </p>
                    <p>
                        <strong>No. Telepon:</strong> 0857-4221-0993
                    </p>
                    <a href="https://www.instagram.com/bimbellucky?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="detail-button">Detail</a>
                </div>

                <div class="info-card">
                    <h3 class="text-xl font-semibold mb-2">LBB Primagama</h3>
                    <img class="mx-auto" src="img/lbb.jpg" alt="LBB Primagama">
                    <p>
                        <strong>Alamat:</strong> Jl. Arjuna, Slerok, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52125
                    </p>
                    <p>
                        <strong>No. Telepon:</strong> 0858-6777-7875
                    </p>
                    <a href="https://www.instagram.com/primagama_id/?hl=en" class="detail-button">Detail</a>
                </div>

                <div class="info-card">
                    <h3 class="text-xl font-semibold mb-2">Bimbel Murika Ceria</h3>
                    <img class="mx-auto" src="img/ceria.jpg" alt="Bimbel Murika Ceria">
                    <p>
                        <strong>Alamat:</strong> Jl. Cik Ditiro, RT.01/RW.01, Bandung, Kec. Tegal Sel., Kota Tegal, Jawa Tengah 52137
                    </p>
                    <p>
                        <strong>No. Telepon:</strong> 0813-2644-2864
                    </p>
                    <a href="https://murikaceria.co.id/v2/" class="detail-button">Detail</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
