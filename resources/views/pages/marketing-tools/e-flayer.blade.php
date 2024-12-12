@extends('layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-academy.css') }}" />
    <style>
        .badge {
            font-size: 0.85rem;
            padding: 0.4rem 0.75rem;
        }

        .overlay-hover {
            transition: opacity 0.3s ease;
        }

        .card:hover .overlay-hover {
            opacity: 1 !important;
        }

        .content-wrapper i {
            font-size: 1rem;
            vertical-align: middle;
        }
    </style>
@endsection
@section('content')
    <div class="card mb-6">
        <div class="card-header d-flex flex-wrap justify-content-between gap-4">
            <div class="card-title mb-0 me-1">
                <h5 class="mb-0">E-Flayer Marketing</h5>
                <p class="mb-0 text-body">Klik gambar untuk melihat ukuran penuh & download</p>
            </div>
        </div>
        <div class="card-body mt-1">
            <div class="row gy-6 mb-6">
                @forelse($eflayers as $flayer)
                    <div class="col-sm-6 col-lg-4">
                        <div class="card p-2 h-100 shadow-none border rounded-3">
                            <div class="rounded-4 text-center mb-3 position-relative">
                                <a href="{{ $flayer->picture }}" target="_blank" class="d-block"
                                    download="{{ $flayer->name }}">
                                    <img class="img-fluid rounded" src="{{ $flayer->picture }}" alt="{{ $flayer->name }}" />
                                    <div
                                        class="overlay-hover position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-25 rounded opacity-0">
                                        <i class="ri-download-2-line text-white ri-2x"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body p-3 pt-0">
                                <h5 class="mb-3">{{ $flayer->name }}</h5>
                                @if ($flayer->content)
                                    @php
                                        $content = $flayer->formatted_content;
                                    @endphp

                                    {{-- Badges Info --}}
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        @if ($content['pesawat'])
                                            <div class="badge bg-label-info">
                                                <i class="ri-plane-line me-1"></i>{{ $content['pesawat'] }}
                                            </div>
                                        @endif
                                        @if ($content['durasi'])
                                            <div class="badge bg-label-primary">
                                                <i class="ri-time-line me-1"></i>{{ $content['durasi'] }} Hari
                                            </div>
                                        @endif
                                        @if ($content['tanggal'])
                                            <div class="badge bg-label-success">
                                                <i class="ri-calendar-line me-1"></i>{{ $content['tanggal'] }}
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Hotel Info --}}
                                    <div class="mb-3">
                                        <div class="row g-2">
                                            @foreach ($content['hotels'] as $hotel)
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center">
                                                        <i class="ri-hotel-line me-2"></i>
                                                        <div>
                                                            <small class="text-muted d-block">{{ $hotel['lokasi'] }}</small>
                                                            <span>{{ $hotel['nama'] }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- Quick Info --}}
                                    <div class="bg-label-primary rounded p-2 mb-3">
                                        <div class="d-flex gap-3">
                                            <div>
                                                <i class="ri-check-line text-primary"></i>
                                                {{ count($content['fasilitas']) }} Fasilitas
                                            </div>
                                            <div>
                                                <i class="ri-information-line text-primary"></i>
                                                Cicilan Tersedia
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Tidak ada e-flayer tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            {{ $eflayers->links('vendor.pagination.custom') }}
        </div>
    </div>
@endsection
