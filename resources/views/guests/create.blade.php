@extends('layouts.app')

@section('content')
<style>
    /* CSS Internal untuk Tampilan Form */
    .container-custom {
        width: 100%;
        max-width: 1200px; /* Lebar maksimum standar */
        margin-left: auto;
        margin-right: auto;
        padding: 1rem;
    }

    .form-container {
        max-width: 32rem; /* Mirip dengan max-w-xl */
        margin-left: auto;
        margin-right: auto;
        background-color: white;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* shadow-lg */
    }

    .form-title {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
        color: #1f2937;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-label {
        display: block;
        color: #374151;
        font-size: 0.875rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .form-input {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        appearance: none;
        border: 1px solid #d1d5db;
        border-radius: 0.25rem;
        width: 100%;
        padding: 0.5rem 0.75rem;
        color: #374151;
        line-height: 1.25;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .form-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5); /* focus:ring-2 focus:ring-blue-500 */
    }

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .btn {
        font-weight: bold;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        border: none;
        cursor: pointer;
        transition: background-color 0.15s ease-in-out;
    }

    .btn-primary {
        background-color: #2563eb;
        color: white;
    }
    .btn-primary:hover {
        background-color: #1d4ed8;
    }
    .btn-primary:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
    }

    .btn-link {
        display: inline-block;
        font-weight: bold;
        font-size: 0.875rem;
        color: #6b7280;
        text-decoration: none;
    }
    .btn-link:hover {
        color: #1f2937;
    }

    /* Styling untuk Error Validation */
    .alert-error {
        background-color: #fee2e2;
        border: 1px solid #f87171;
        color: #b91c1c;
        padding: 1rem;
        border-radius: 0.25rem;
        margin-bottom: 1rem;
    }

    .alert-title {
        font-weight: bold;
        display: block;
        margin-bottom: 0.25rem;
    }

    .alert-message {
        display: inline;
    }

    .alert-list {
        margin-top: 0.5rem;
        list-style-type: disc;
        padding-left: 1.5rem;
    }
</style>

<div class="container-custom">
    <div class="form-container">
        <h1 class="form-title">Tambah Tamu Baru</h1>
        
        {{-- Penanganan Error Validasi --}}
        @if ($errors->any())
            <div class="alert-error">
                <strong class="alert-title">Oops!</strong>
                <span class="alert-message">Ada beberapa masalah dengan input Anda.</span>
                <ul class="alert-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('guests.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                       class="form-input">
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email (Opsional):</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" 
                       class="form-input">
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">Telepon (Opsional):</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" 
                       class="form-input">
            </div>

            <div class="form-group">
                <label for="quota" class="form-label">Kuota Tamu:</label>
                <input type="number" name="quota" id="quota" value="{{ old('quota', 1) }}" min="1" required 
                       class="form-input">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Simpan Tamu
                </button>
                <a href="{{ route('guests.index') }}" class="btn-link">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection