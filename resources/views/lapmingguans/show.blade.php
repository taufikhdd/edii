@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard/dashboard_1.css')}}">
@endpush

@section('content')
<!--  Navbar Ends / Breadcrumb Area  -->
<!-- Main Body Starts -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message}}</p>
</div>
@endif

@if ($message = Session::get('failed'))
<div class="alert alert-danger">
    <p>{{ $message}}</p>
</div>
@endif
<!-- Your Content Here -->
<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <h4>Detail Laporan</h4>
        <div class="widget-header">
            <div class="row">
                <div class="col-md-6">
                    <div style="margin-left: 16px; margin-top:10px">
                        <p style="font-size: 26px"><strong>{{ $lapmingguan->nama}}</strong></p>
                        <p><strong>Tempat Tanggal Lahir : </strong>{{$lapmingguan->tpt_lahir}}, {{
                            Carbon\Carbon::parse($lapmingguan->tgl_lahir)->locale('id')->translatedFormat('j F Y')}}
                        </p>
                        <p><strong>Posisi : </strong><span class="badge badge-success">{{$lapmingguan->posisi}}</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 row" style="display: flex; justify-content: flex-end">
                    <a class="btn btn-primary" style=" margin-bottom:auto "
                        href="{{ route('lapmingguans.index')}}">Kembali</a>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive">
                <table class="table mb-0 table">
                    <thead style="background-color: #2262c6">
                        <tr>
                            <th style="color: white">Biodata Pelamar</th>
                            <th style="color: white"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="color: #2262c6">Posisi :</td>
                            <td>{{ $lapmingguan->posisi }}</td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">Nama :</td>
                            <td>{{ $lapmingguan->nama }}</td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">No. KTP :</td>
                            <td>{{ $lapmingguan->ktp }}</td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">Tempat Tanggal Lahir :</td>
                            <td>{{ $lapmingguan->tpt_lahir }}, {{
                                Carbon\Carbon::parse($lapmingguan->tgl_lahir)->locale('id')->translatedFormat('j F Y')}}
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">Jenis Kelamin :</td>
                            <td>{{ $lapmingguan->jk }}</td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">Agama :</td>
                            <td>{{ $lapmingguan->agama }}</td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">Golongan Darah :</td>
                            <td>{{ $lapmingguan->gol_d }}</td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">Status :</td>
                            <td>{{ $lapmingguan->status }}</td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">Alamat KTP:</td>
                            <td>{{ $lapmingguan->alamat_ktp }}</td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">Alamat Tinggal :</td>
                            <td>{{ $lapmingguan->alamat_tgl }}</td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">e-Mail :</td>
                            <td>{{ $lapmingguan->email }}</td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">No. Telp :</td>
                            <td>{{ $lapmingguan->telp }}</td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">No. HP Orang Terdekat yang dapat dihubungi :</td>
                            <td>{{ $lapmingguan->org_terdekat }}</td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">Skill :</td>
                            <td>{{ $lapmingguan->skill }}</td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">Bersedia ditempatkan diseluruh kantor perusahaan :</td>
                            <td>@if($lapmingguan->bersedia == "Y")
                                <span class="badge badge-success">Ya</span>
                                @else
                                <span class="badge badge-danger">Tidak</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #2262c6">Penghasilan yang diharapkan :</td>
                            <td>
                                Rp.{{ number_format($lapmingguan->penghasilan, 0, '', '.');}},-
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table mb-0 table" style="margin-top: 30px">
                    <tbody>
                        <tr class="table-active" style="background:#2262c6;color:white">
                            <th>Pendidikan Terakhir</td>
                            <th colspan="5"></th>
                        </tr>
                        <tr class="table-active">
                            <th style="color: #2262c6">Jenjang Pendidikan Terakhir</th>
                            <th style="color: #2262c6">Nama Institusi Akademik</th>
                            <th style="color: #2262c6">Jurusan </th>
                            <th style="color: #2262c6">Tahun Lulus </th>
                            <th style="color: #2262c6">IPK </th>
                        </tr>
                        @foreach ($pendidikan as $p)
                        <tr>

                            <td>{{ $p->jenjang_pend }}</td>
                            <td>{{ $p->nama_pend }}</td>
                            <td>{{ $p->jurusan_pend }}</td>
                            <td>{{ $p->tahun_pend }}</td>
                            <td>{{ $p->ipk_pend }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table mb-0 table" style="margin-top: 30px">
                    <tbody>
                        <tr class="table-active" style="background:#2262c6;color:white">
                            <th>Riwayat Pelatihan</td>
                            <th colspan="3"></th>
                        </tr>
                        <tr class="table-active">
                            <th style="color: #2262c6">Nama Kursus Seminar </th>
                            <th style="color: #2262c6">Sertifikat </th>
                            <th style="color: #2262c6">Tahun </th>
                        </tr>
                        @foreach ($pelatihan as $p)
                        <tr>

                            <td>{{ $p->nama_pelatihan }}</td>
                            <td>@if($p->sertifikat_pelatihan == "Y")
                                Ada
                                @else
                                Tidak Ada
                                @endif
                            </td>
                            <td>{{ $p->tahun_pelatihan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table mb-0 table" style="margin-top: 30px">
                    <tbody>
                        <tr class="table-active" style="background:#2262c6;color:white">
                            <th>Pendidikan Terakhir</td>
                            <th colspan="5"></th>
                        </tr>
                        <tr class="table-active">
                            <th style="color: #2262c6">Nama Perusahaan</th>
                            <th style="color: #2262c6">Posisi Terakhir</th>
                            <th style="color: #2262c6">Pendapatan Terakhir</th>
                            <th style="color: #2262c6">Tahun Terakhir</th>
                        </tr>
                        @foreach ($pekerjaan as $p)
                        <tr>

                            <td>{{ $p->nama_pekerjaan }}</td>
                            <td>{{ $p->posisi_pekerjaan }}</td>
                            <td>
                                Rp.{{ number_format($p->pendapatan_pekerjaan, 0, '', '.');}},-
                            </td>
                            <td>{{ $p->tahun_pekerjaan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Main Body Ends -->
@endsection
