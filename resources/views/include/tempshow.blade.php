@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard/dashboard_1.css') }}">
@endpush

@section('content')
<!--  Navbar Ends / Breadcrumb Area  -->
<!-- Main Body Starts -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('failed'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif
<!-- Your Content Here -->
<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <h4>Detail {{ $nav }}</h4>
        <div class="widget-header">
            <div class="row">
                <div class="col-md-6">
                    <div style="margin-left: 16px; margin-top:10px">
                        <strong>
                            @if (Auth::user()->instansi_id == 1)
                            <p>Dinas Sosial, Kependudukan dan Pencatatan Sipil Provinsi Jambi</p>
                            @else
                            <p>{{ $laporan->instansis->nama }}</p>
                            @endif
                        </strong>
                        <p><strong>Periode :</strong> {{ $nbulan }}/{{ $ftahun }}</p>
                        <p><strong>Status : </strong>
                            @php
                            if (Auth::user()->instansi_id == 1) {
                            echo '<span class="badge badge-success">Sudah ditandatangani</span>';

                            } else if ($laporan->status == 'Belum Terkirim'){
                            echo '<span class="badge badge-danger">Belum ditandatangani</span>';

                            } else {
                            echo '<span class="badge badge-success">Sudah ditandatangani</span>';
                            }
                            @endphp
                        </p>
                        <p><strong>Kelengkapan : </strong>
                            @if ($s1 == 1 && $s2 == 1 && $s3 == 1 && $s4 == 1)
                            <span class="badge badge-success">Sudah Lengkap</span>
                            @else
                            <span class="badge badge-danger">Belum Lengkap</span>

                            Minggu ke-
                            @if ($s1 == 1)
                            <span class="badge badge-success">1</span>
                            @else
                            <span class="badge badge-danger">1</span>
                            @endif
                            @if ($s2 == 1)
                            <span class="badge badge-success">2</span>
                            @else
                            <span class="badge badge-danger">2</span>
                            @endif
                            @if ($s3 == 1)
                            <span class="badge badge-success">3</span>
                            @else
                            <span class="badge badge-danger">3</span>
                            @endif
                            @if ($s4 == 1)
                            <span class="badge badge-success">4</span>
                            @else
                            <span class="badge badge-danger">4</span>
                            @endif

                        <p style="font-size:12px ;color:red">*Angka kelengkapan berwarna merah berarti data di
                            minggu tersebut belum di input. Harap lengkapi data sebelum akhir bulan.</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 row" style="display: flex; justify-content: flex-end">
                    @yield('download')
                    <a class="btn btn-primary" style="margin-bottom:auto" onclick="history.back()">Kembali</a>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            @yield('isi')
        </div>
    </div>
</div>
<!-- Main Body Ends -->
@endsection
