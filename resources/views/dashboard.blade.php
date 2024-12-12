@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-logistics-dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endsection

@section('content')
    <div class="row g-6">
        <div class="col-md-12 col-xxl-8">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-md-6 order-2 order-md-1">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Selamat Datang <span
                                    class="fw-bold">{{ $loggedInMitra->name }}!</span> 🎉</h4>
                            <p class="mb-0">Anda telah melakukan penjualan sebesar <span
                                    class="fw-bold">{{ $ujrohPercentage }}%</span> lebih banyak minggu ini dibandingkan
                                minggu lalu.</p>
                            <p>Periksa badge baru Anda di profil Anda.</p>
                            <a href=#3" class="btn btn-primary">Lihat Profil</a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-end order-1 order-md-2">
                        <div class="card-body pb-0 px-0 pt-2">
                            <img src="{{ $loggedInMitra->picture_profile ?? asset('assets/img/illustrations/illustration-john-light.png') }}"
                                height="186" class="scaleX-n1-rtl" alt="Lihat Profil" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-2 col-sm-6">
            <div class="card h-100 shadow-sm border-start border-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                        <div class="avatar">
                            <div class="avatar-initial bg-label-info rounded-3">
                                <i class="ri-user-line ri-24px"></i> <!-- Ikon Mitra -->
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="mb-0 text-success me-1">+{{ $mitraPercentage }}%</p>
                            <i class="ri-arrow-up-s-line text-success"></i>
                        </div>
                    </div>
                    <div class="card-info mt-5">
                        <h5 class="mb-1">{{ number_format($totalMitra) }}</h5>
                        <p>Total Mitra</p>
                        <div class="badge bg-label-primary rounded-pill">Last 4 Month</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-2 col-sm-6">
            <div class="card h-100 shadow-lg border-start border-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                        <div class="avatar">
                            <div class="avatar-initial bg-label-warning rounded-3">
                                <i class="ri-user-3-line ri-24px"></i> <!-- Ikon Customer -->
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="mb-0 text-danger me-1">+{{ $customerPercentage }}%</p>
                            <i class="ri-arrow-up-s-line text-danger"></i>
                        </div>
                    </div>
                    <div class="card-info mt-5">
                        <h5 class="mb-1">{{ number_format($totalCustomer) }}</h5>
                        <p>Total Customer</p>
                        <div class="badge bg-label-warning rounded-pill">Last 4 Month</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Statistik -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-border-shadow-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded-3 bg-label-primary">
                                <i class="ri-team-line ri-24px"></i>
                            </span>
                        </div>
                        <h4 class="mb-0">{{ $totalJamaah }}</h4>
                    </div>
                    <h6 class="mb-0 fw-normal">Total Jamaah Aktif</h6>
                    <p class="mb-0">
                        <span class="me-1 fw-medium {{ $jamaahPercentage >= 0 ? 'text-success' : 'text-danger' }}">
                            <i class="ri-{{ $jamaahPercentage >= 0 ? 'arrow-up' : 'arrow-down' }}-s-line ri-24px me-1"></i>
                            {{ abs($jamaahPercentage) }}%
                        </span>
                        <small class="text-muted">dari minggu lalu</small>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card card-border-shadow-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded-3 bg-label-danger">
                                <!-- Ikon untuk status "belum" -->
                                <i class="ri-time-line ri-24px"></i>
                            </span>
                        </div>
                        <h4 class="mb-0">{{ $statusBelum }}</h4>
                    </div>
                    <h6 class="mb-0 fw-normal">Jamaah Belum Berangkat</h6>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card card-border-shadow-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded-3 bg-label-warning">
                                <!-- Ikon untuk status "sedang" -->
                                <i class="ri-roadster-line ri-24px"></i>
                            </span>
                        </div>
                        <h4 class="mb-0">{{ $statusSedang }}</h4>
                    </div>
                    <h6 class="mb-0 fw-normal">Jamaah Sedang Berangkat</h6>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded-3 bg-label-success">
                                <!-- Ikon untuk status "sudah" -->
                                <i class="ri-checkbox-circle-line ri-24px"></i>
                            </span>
                        </div>
                        <h4 class="mb-0">{{ $statusSudah }}</h4>
                    </div>
                    <h6 class="mb-0 fw-normal">Jamaah Sudah Berangkat</h6>
                </div>
            </div>
        </div>


        <!-- Status Pembayaran Overview -->
        <div class="col-xxl-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Status Pembayaran Overview</h5>
                </div>
                <div class="card-body">
                    <div class="progress-wrapper mb-4">
                        <div id="statusPembayaranChart"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach ($statusPembayaran as $key => $status)
                                    <tr>
                                        <td class="ps-0">
                                            <div class="d-flex align-items-center">
                                                <div class="badge rounded p-2 me-2 bg-label-{{ $status['color'] }}">
                                                    <i class="{{ $status['icon'] }} ri-lg"></i>
                                                </div>
                                                <span>{{ $status['label'] }}</span>
                                            </div>
                                        </td>
                                        <td class="text-end">{{ $status['count'] }} Jamaah</td>
                                        <td class="text-end pe-0">{{ $status['percentage'] }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Program Overview -->
        <div class="col-lg-6 col-xxl-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0">Program Mendatang</h5>
                </div>
                <div class="card-body">
                    <div id="programOverviewChart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <script>
        // Theme Colors
        const config = {
            colors: {
                primary: '#5A8DEE',
                success: '#39DA8A',
                warning: '#FDAC41',
                info: '#00CFDD',
                gray: '#6E6B7B'
            }
        };

        // Status Pembayaran Chart
        const statusPembayaranData = @json($statusPembayaran);

        const statusPembayaranOptions = {
            series: Object.values(statusPembayaranData).map(s => s.percentage),
            chart: {
                height: 320,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        size: '60%',
                    },
                    track: {
                        margin: 10,
                    },
                    dataLabels: {
                        name: {
                            fontSize: '22px',
                        },
                        value: {
                            fontSize: '16px',
                        },
                        total: {
                            show: true,
                            label: 'Total',
                            formatter: function(w) {
                                return Object.values(statusPembayaranData).reduce((a, b) => a + b.count, 0) +
                                    ' Jamaah';
                            }
                        }
                    }
                }
            },
            labels: Object.values(statusPembayaranData).map(s => s.label),
            colors: [config.colors.primary, config.colors.success, config.colors.warning],
        };

        const statusPembayaranChart = new ApexCharts(
            document.querySelector("#statusPembayaranChart"),
            statusPembayaranOptions
        );
        statusPembayaranChart.render();

        // Program Overview Chart
        const programData = @json($upcomingPrograms);

        const programOptions = {
            series: [{
                name: 'Jamaah',
                data: programData.map(p => p.jamaah_count)
            }],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    endingShape: 'rounded',
                    borderRadius: 5,
                }
            },
            dataLabels: {
                enabled: false
            },
            colors: [config.colors.primary],
            xaxis: {
                categories: programData.map(p => p.name),
                labels: {
                    style: {
                        fontSize: '12px'
                    },
                    rotate: -45,
                    trim: true,
                    maxHeight: 120
                }
            },
            yaxis: {
                title: {
                    text: 'Jumlah Jamaah'
                }
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " Jamaah";
                    }
                }
            }
        };

        const programChart = new ApexCharts(
            document.querySelector("#programOverviewChart"),
            programOptions
        );
        programChart.render();
    </script>
@endsection
