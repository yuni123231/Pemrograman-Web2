@extends('layouts.user')

@section('title', 'Rekomendasi Tempat Les')

@section('contents')
<style>
    .form-section {
        background-color: #f8fafc;
        padding: 2rem 1rem;
        border-radius: 0.5rem;
        margin-bottom: 2rem;
        max-width: 600px;
        margin: auto;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-section h2 {
        margin-bottom: 1.5rem;
        text-align: center;
        font-size: 1.5rem;
        color: #2d3748;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: #2d3748;
    }

    .form-group select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #cbd5e0;
        border-radius: 0.375rem;
        font-size: 1rem;
        color: #2d3748;
    }

    .submit-button {
        background-color: #4299e1;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.375rem;
        border: none;
        width: 100%;
        transition: background-color 0.3s ease;
        font-size: 1rem;
        font-weight: bold;
    }

    .submit-button:hover {
        background-color: #3182ce;
    }

    .recommendation-section {
        background-color: #fff;
        padding: 2rem 1rem;
        border-radius: 0.5rem;
        margin-bottom: 2rem;
        max-width: 600px;
        margin: auto;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .recommendation-section h2 {
        margin-bottom: 1.5rem;
        text-align: center;
        font-size: 1.5rem;
        color: #2d3748;
    }

    .recommendation {
        margin-bottom: 1.5rem;
        padding: 1rem;
        border: 1px solid #cbd5e0;
        border-radius: 0.375rem;
        background-color: #f7fafc;
        transition: transform 0.3s ease;
    }

    .recommendation:hover {
        transform: translateY(-5px);
        background-color: #e2e8f0;
    }

    .recommendation h3 {
        margin-bottom: 0.5rem;
        font-size: 1.25rem;
        color: #2d3748;
    }

    .recommendation p {
        margin: 0.25rem 0;
        color: #4a5568;
    }

    .recommendation strong {
        font-weight: bold;
    }
</style>

<div class="form-section">
    <h2>Form Rekomendasi Pemilihan Tempat Les</h2>
    <form action="{{ route('submit.rekomendasi') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="biaya">Biaya</label>
            <select id="biaya" name="biaya" required>
                <option value="" disabled selected>Pilih Biaya</option>
                <option value="murah">Murah</option>
                <option value="sedang">Sedang</option>
                <option value="mahal">Mahal</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jarak">Jarak</label>
            <select id="jarak" name="jarak" required>
                <option value="" disabled selected>Pilih Jarak</option>
                <option value="dekat">Dekat</option>
                <option value="sedang">Sedang</option>
                <option value="jauh">Jauh</option>
            </select>
        </div>

        <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <select id="fasilitas" name="fasilitas" required>
                <option value="" disabled selected>Pilih Fasilitas</option>
                <option value="lengkap">Lengkap</option>
                <option value="cukup">Cukup</option>
                <option value="kurang">Kurang</option>
            </select>
        </div>

        <div class="form-group">
            <label for="keahlian_guru">Keahlian Guru</label>
            <select id="keahlian_guru" name="keahlian_guru" required>
                <option value="" disabled selected>Pilih Keahlian Guru</option>
                <option value="tinggi">Tinggi</option>
                <option value="sedang">Sedang</option>
                <option value="rendah">Rendah</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kurikulum">Kurikulum</label>
            <select id="kurikulum" name="kurikulum" required>
                <option value="" disabled selected>Pilih Kurikulum</option>
                <option value="internasional">Internasional</option>
                <option value="nasional">Nasional</option>
                <option value="lokal">Lokal</option>
            </select>
        </div>

        <button type="submit" class="submit-button">Submit</button>
    </form>
</div>

@if(isset($recommendations))
<div class="recommendation-section">
    <h2>Hasil Rekomendasi</h2>
    @foreach($recommendations as $recommendation)
    <div class="recommendation">
        <h3>{{ $recommendation['name'] }}</h3>
        <p><strong>Alamat:</strong> {{ $recommendation['address'] }}</p>
        <p><strong>Biaya:</strong> {{ $recommendation['biaya'] }}</p>
        <p><strong>Jarak:</strong> {{ $recommendation['jarak'] }}</p>
        <p><strong>Fasilitas:</strong> {{ $recommendation['fasilitas'] }}</p>
        <p><strong>Keahlian Guru:</strong> {{ $recommendation['keahlian_guru'] }}</p>
        <p><strong>Kurikulum:</strong> {{ $recommendation['kurikulum'] }}</p>
    </div>
    @endforeach
</div>
@endif
@endsection
