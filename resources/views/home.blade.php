@extends('layout.master')

@push('plugin-styles')
{!! Html::style('assets/css/dashboard/dashboard_1.css') !!}
{!! Html::style('plugins/flatpickr/flatpickr.css') !!}
{!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
{!! Html::style('assets/css/elements/tooltip.css') !!}
@endpush

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="widget-heading">
                    <div>
                        <h5 class="">Pengumuman</h5>
                        <span class="w-numeric-title">Untuk Admin Kabupaten/Kota</span>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="mb-2 border-bottom border-light pb-2">
                        <span class="text-primary font-15">Update Aplikasi SIGISA</span>
                        <span class="float-right text-success-teal font-12"><i class="las la-clock"></i>09 April
                            2022</span>
                        <p class="font-12 mb-0 mt-10 text-muted">
                            Aplikasi SIGISA saat ini sudah bisa digunakan untuk <span class="text-danger font-12">
                                melihat statistik dan juga mencetak berbagai jenis output laporan bulanan dari berbagai
                                bidang (Dafduk/Capil/Piak).</span>
                            Silahkan akses langsung dari menu Laporan Bulanan dan pilih kategori jenis laporan yang
                            ingin dibuat.
                            Jika ada pertanyaan dan saran bisa didiskusikan langsung di grup koordinasi laporan
                            WhatsApp. <br><br>Terima kasih.
                        </p>

                    </div>
                    <div class="mb-2 border-bottom border-light pb-2">
                        <span class="text-primary font-15">Pengisian Data Pelayanan</span>
                        <span class="float-right text-success-teal font-12"><i class="las la-clock"></i> {{ __('09 Maret
                            2022') }}</span>
                        <p class="font-12 mb-0 mt-10 text-muted">Pengisian data harap disesuaikan dengan laporan
                            manual yang telah dikirimkan ke Provinsi sebelumnya dimulai dari bulan <span
                                class="text-danger font-12">Januari 2022 minggu
                                ke-1 sampai dengan saat ini.</span>
                            <br><br>Terima kasih.
                        </p>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection


@push('plugin-scripts')
{!! Html::script('plugins/flatpickr/flatpickr.js') !!}
{!! Html::script('assets/js/dashboard/dashboard_1.js') !!}
@endpush
