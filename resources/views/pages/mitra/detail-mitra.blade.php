@extends('layouts.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row gy-4">
            <!-- Mitra Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- Mitra Card -->
                <div class="card mb-4">
                    <div class="card-body pt-4">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                @if ($mitra->picture_profile)
                                    <img class="img-fluid rounded-3 mb-3" src="{{ $mitra->picture_profile }}" height="120"
                                        width="120" alt="{{ $mitra->name }}" />
                                @else
                                    <div class="avatar avatar-xl mb-3">
                                        <span class="avatar-initial bg-label-primary rounded-3">
                                            {{ strtoupper(substr($mitra->name ?? 'U', 0, 2)) }}
                                        </span>
                                    </div>
                                @endif
                                <div class="user-info text-center">
                                    <h5>{{ $mitra->name ?? 'Tidak ada informasi' }}</h5>
                                    <span class="badge bg-label-primary rounded-pill">{{ ucfirst($mitra->level) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center flex-wrap my-4 gap-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar">
                                    <div class="avatar-initial bg-label-primary rounded-3">
                                        <i class="ri-profile-line ri-24px"></i>
                                    </div>
                                </div>
                                <div>
                                    <span class="d-block text-muted small">Kode Mitra</span>
                                    <span class="fw-semibold">{{ $mitra->code ?? 'Tidak ada informasi' }}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar">
                                    <div class="avatar-initial bg-label-info rounded-3">
                                        <i class="ri-door-lock-box-line ri-24px"></i>
                                    </div>
                                </div>
                                <div>
                                    <span class="d-block text-muted small">Kode Referral</span>
                                    <span class="fw-semibold">{{ $mitra->referral_code ?? 'Tidak ada informasi' }}</span>
                                </div>
                            </div>
                        </div>

                        <h5 class="pb-3 border-bottom mb-4">Detail Akun</h5>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <span class="fw-medium text-heading me-2">Username:</span>
                                    <span>{{ $mitra->username ?? 'Tidak ada informasi' }}</span>
                                </li>
                                <li class="mb-3">
                                    <span class="fw-medium text-heading me-2">Email:</span>
                                    <span>{{ $mitra->email ?? 'Tidak ada informasi' }}</span>
                                </li>
                                <li class="mb-3">
                                    <span class="fw-medium text-heading me-2">Status:</span>
                                    <span class="badge bg-label-{{ $mitra->status === 'active' ? 'success' : 'danger' }}">
                                        {{ ucfirst($mitra->status) ?? 'Tidak ada informasi' }}
                                    </span>
                                </li>
                                <li class="mb-3">
                                    <span class="fw-medium text-heading me-2">NIK:</span>
                                    <span>{{ $mitra->NIK ?? 'Tidak ada informasi' }}</span>
                                </li>
                                <li class="mb-3">
                                    <span class="fw-medium text-heading me-2">Phone:</span>
                                    <span>{{ $mitra->phone_number ?? 'Tidak ada informasi' }}</span>
                                </li>
                                <li class="mb-3">
                                    <span class="fw-medium text-heading me-2">Tempat dan Tanggal Lahir:</span>
                                    <span>{{ $mitra->birth_place && $mitra->birth_date ? $mitra->birth_place . ', ' . $mitra->birth_date->format('d M Y') : 'Tidak ada informasi' }}</span>
                                </li>
                                <li class="mb-3">
                                    <span class="fw-medium text-heading me-2">Jenis Kelamin:</span>
                                    <span>{{ $mitra->sex ? ($mitra->sex === 'L' ? 'Male' : 'Female') : 'Tidak ada informasi' }}</span>
                                </li>
                                <li class="mb-3">
                                    <span class="fw-medium text-heading me-2">Alamat:</span>
                                    <span>{{ $mitra->address ?? 'Tidak ada informasi' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Mitra Card -->
            </div>
            <!--/ Mitra Sidebar -->

            <!-- Mitra Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0 d-flex align-items-center">
                            <i class="ri-bank-card-line me-2"></i> Informasi Bank
                        </h5>
                    </div>
                    <div class="card-body py-3">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Bank:</span>
                                <span class="text-muted">{{ $mitra->bank ?? 'Tidak ada informasi' }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium text-heading me-2">Nomor Akun Bank:</span>
                                <span class="text-muted">{{ $mitra->bank_number ?? 'Tidak ada informasi' }}</span>
                            </li>
                            <li class="mb-0">
                                <span class="fw-medium text-heading me-2">Pemilik Rekening:</span>
                                <span class="text-muted">{{ $mitra->bank_name ?? 'Tidak ada informasi' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Network Info -->
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Informasi Koneksi</h5>
                    </div>
                    <div class="card-body py-4">
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-label-primary rounded">
                                            <i class="ri-star-s-line ri-24px"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="d-block text-muted small">Kategori</span>
                                        <span class="fw-semibold">{{ $mitra->code_category ?? 'Tidak ada informasi' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-label-info rounded">
                                            <i class="ri-community-line ri-24px"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="d-block text-muted small">Cabang</span>
                                        <span class="fw-semibold">{{ $mitra->code_cabang ?? 'Tidak ada informasi' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-label-success rounded">
                                            <i class="ri-organization-chart ri-24px"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="d-block text-muted small">Upline</span>
                                        @if($mitra->parent)
                                            <span class="fw-semibold">{{ $mitra->parent->name }}</span>
                                            <small class="d-block text-muted">{{ $mitra->parent->code }}</small>
                                        @else
                                            <span class="fw-semibold">Tidak ada informasi</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-label-warning rounded">
                                            <i class="ri-map-pin-5-line ri-24px"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="d-block text-muted small">Provinisi - Kota</span>
                                        <span class="fw-semibold">
                                            {{ $mitra->code_province && $mitra->code_city ? 
                                               $mitra->code_province . ' - ' . $mitra->code_city : 
                                               'Tidak ada informasi' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Network Info -->
            
                <!-- Documents -->
                @if($mitra->picture_ktp || $mitra->picture_profile)
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Dokumen</h5>
                        </div>
                        <div class="card-body py-2">
                            <div class="row g-4">
                                @if($mitra->picture_ktp)
                                    <div class="col-md-6">
                                        <div class="card border shadow-none h-100">
                                            <div class="card-body text-center p-4">
                                                <img src="{{ $mitra->picture_ktp }}" 
                                                     alt="KTP" 
                                                     class="img-fluid rounded mb-3"
                                                     style="max-height: 150px; width: auto;">
                                                <h6 class="mb-0">KTP</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($mitra->picture_profile)
                                    <div class="col-md-6">
                                        <div class="card border shadow-none h-100">
                                            <div class="card-body text-center p-4">
                                                <img src="{{ $mitra->picture_profile }}" 
                                                     alt="Profile" 
                                                     class="img-fluid rounded mb-3"
                                                     style="max-height: 150px; width: auto;">
                                                <h6 class="mb-0">Foto Profile</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                <!-- /Documents -->
            </div>
            <!--/ Mitra Content -->
        </div>

        <!-- Back Button -->
        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back
            </a>
        </div>
    </div>
@endsection
