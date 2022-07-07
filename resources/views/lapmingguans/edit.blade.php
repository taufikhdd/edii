@extends('layout.master')

@push('plugin-styles')
{!! Html::style('assets/css/forms/form-widgets.css') !!}
{!! Html::style('assets/css/forms/multiple-step.css') !!}
{!! Html::style('plugins/select2/select2.min.css') !!}
@endpush

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Edit Biodata</h4>
                </div>
                <div class="col-md-6 text-right" style="margin-top: 20px">
                    <a class="btn btn-primary" style="margin-right: 10px" href="{{ route('lapmingguans.index') }}">
                        Kembali</a>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="form-group row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card multiple-form-one px-0 pb-0 mb-3">
                        <h5 class="text-center"><strong>Biodata</strong></h5>
                        <p class="text-center">Isilah seluruh form sesuai dengan data yang diminta</p>
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="msform" action="{{ route('lapmingguans.update', $lapmingguan->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')

                                    <ul id="progressbar">
                                        <li class="active" id="account"><strong>Biodata</strong></li>
                                        <li id="personal"><strong>Pendidikan Terakhir</strong></li>
                                        <li id="payment"><strong>Riwayat Pelatihan</strong></li>
                                        <li id="confirm"><strong>Riwayat Pekerjaan</strong></li>
                                        <li id="confirm"><strong>Finish</strong></li>
                                    </ul>
                                    <fieldset>
                                        <div class="form-card">
                                            <h5 class="fs-title mb-4">Edit Biodata</h5>

                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label class="pay text-primary">Posisi yang
                                                                    dilamar</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" placeholder="Posisi" name="posisi"
                                                                class="form-control mb-3" value="{{ $lapmingguan->posisi }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1"></div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label class="pay text-primary">Nama
                                                                    Lengkap</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" placeholder="Nama Lengkap" name="nama"
                                                                class="form-control mb-3" value="{{ $lapmingguan->nama }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label class="pay text-primary">No.
                                                                    KTP</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="number" placeholder="No. KTP" maxlength="16"
                                                                name="ktp" class="form-control mb-3" value="{{ $lapmingguan->ktp }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1"></div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label class="pay text-primary">Tempat
                                                                    Lahir</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" placeholder="Tempat Lahir"
                                                                name="tpt_lahir" class="form-control mb-3" value="{{ $lapmingguan->tpt_lahir }}"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label class="pay text-primary">Tanggal
                                                                    Lahir</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="date" placeholder="Ada di SIAK"
                                                                name="tgl_lahir" class="form-control mb-3" value="{{ $lapmingguan->tgl_lahir }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1"></div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label class="pay text-primary">Jenis
                                                                    Kelamin</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control placeholder" name="jk" id="jk">
                                                                <option value="">Pilih Jenis Kelamin</option>
                                                                <option value="L">Laki-Laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label
                                                                    class="pay text-primary">Agama</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control placeholder" name="agama"
                                                                id="agama">
                                                                <option value="">Pilih Agama</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen">Kristen</option>
                                                                <option value="Katholik">Katholik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Budha">Budha</option>
                                                                <option value="Konghucu">Konghucu</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1"></div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label class="pay text-primary">Golongan
                                                                    Darah</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control placeholder" name="gol_d"
                                                                id="gol_d">
                                                                <option value="">Pilih Golongan Darah</option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="AB">AB</option>
                                                                <option value="O">O</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label
                                                                    class="pay text-primary">Status</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control placeholder" name="status"
                                                                id="status">
                                                                <option value="">Pilih Status</option>
                                                                <option value="Kawin">Kawin</option>
                                                                <option value="Belum Kawin">Belum Kawin</option>
                                                                <option value="Janda">Janda</option>
                                                                <option value="Duda">Duda</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1"></div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label class="pay text-primary">Alamat
                                                                    KTP</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" placeholder="Alamat KTP"
                                                                name="alamat_ktp" class="form-control mb-3" value="{{ $lapmingguan->alamat_ktp }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label class="pay text-primary">Alamat Tinggal Saat
                                                                    Ini</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" placeholder="Alamat Tinggal Saat Ini"
                                                                name="alamat_tgl" class="form-control mb-3" value="{{ $lapmingguan->alamat_tgl }}"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1"></div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label
                                                                    class="pay text-primary">E-mail</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" placeholder="e-mail" name="email"
                                                                class="form-control mb-3" value="{{ $lapmingguan->email }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label class="pay text-primary">No.
                                                                    Telp</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="number" placeholder="No. Telp" name="telp"
                                                                class="form-control mb-3" value="{{ $lapmingguan->telp }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1"></div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label class="pay text-primary">No. Telp Orang
                                                                    Terdekat Yang Dapat Dihubungi</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="number"
                                                                placeholder="No. Telp Orang Terdekat Yang Dapat Dihubungi"
                                                                name="org_terdekat" class="form-control mb-3" value="{{ $lapmingguan->org_terdekat }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label
                                                                    class="pay text-primary">Skill</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text"
                                                                placeholder="Tuliskan keahlian dan keterampilan yang saat ini anda miliki"
                                                                name="skill" class="form-control mb-3" value="{{ $lapmingguan->skill }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1"></div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label class="pay text-primary">Penghasilan Yang
                                                                    Diharapkan</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="number" placeholder="Penghasilan perbulan"
                                                                name="penghasilan" class="form-control mb-3" value="{{ $lapmingguan->penghasilan }}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="row" style="margin-top: 14px">
                                                        <div class="col-md-12">
                                                            <strong><label class="pay text-primary">Bersedia ditempatkan
                                                                    di Seluruh Kantor Perusahaan</label></strong>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="radio" name="bersedia" value="Y" >Ya</input>
                                                            <input type="radio" name="bersedia" value="N">Tidak</input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span style="margin-top:10px" class="text-danger"><strong>*Semua wajib
                                                    diisi.</strong></span>
                                        </div>
                                        <input type="button" name="previous"
                                            class="previous action-button-previous btn btn-outline-primary"
                                            value="Sebelumnya" />
                                        <input type="button" name="next" class="next action-button btn btn-primary"
                                            value="Selanjutnya" />
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-card">
                                            <h5 class="fs-title mb-4">Edit Pendidikan Terakhir</h5>

                                            <div class="row">
                                                <table class="table table-bordered" id="dynamicAddRemovePendidikan">
                                                    <tr>
                                                        <th>Jenjang Pendidikan Terakhir</th>
                                                        <th>Nama Institusi Akademik</th>
                                                        <th>Jurusan</th>
                                                        <th>Tahun Lulus</th>
                                                        <th>IPK</th>
                                                        <th>Action</th>
                                                    </tr>

                                                    @foreach ($pendidikan as $p)
                                                    <tr>
                                                        <td>
                                                            <select class="form-control" name="addPendidikan[0][jenjang_pend]">
                                                                <option value="SMA">SMA</option>
                                                                <option value="D3">D3</option>
                                                                <option value="D4">D4</option>
                                                                <option value="S1">S1</option>
                                                                <option value="S2">S2</option>
                                                                <option value="S3">S3</option>
                                                            </select>
                                                        </td>



                                                        <td>
                                                            <input type="text" name="addPendidikan[0][nama_pend]"
                                                                placeholder="Nama Institusi" class="form-control" value="{{ $p->nama_pend }}"" />
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                name="addPendidikan[0][jurusan_pend]"
                                                                placeholder="Jurusan" class="form-control" value="{{ $p->jurusan_pend }}" />
                                                        </td>
                                                        <td>
                                                            <input type="number" name="addPendidikan[0][tahun_pend]"
                                                                placeholder="Tahun Lulus" class="form-control" value="{{ $p->tahun_pend }}" />
                                                        </td>
                                                        <td>
                                                            <input type="text" name="addPendidikan[0][ipk_pend]"
                                                                placeholder="IPK" class="form-control" value="{{ $p->ipk_pend }}" />
                                                        </td>
                                                        <td><button type="button" name="add" id="dynamic-apen"
                                                                class="btn btn-primary">Tambah Pendidikan</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </table>


                                            </div>
                                            <span style="margin-top:10px" class="text-danger"><strong>*Semua wajib
                                                    diisi.</strong></span>
                                        </div>
                                        <input type="button" name="previous"
                                            class="previous action-button-previous btn btn-outline-primary"
                                            value="Sebelumnya" />
                                        <input type="button" name="next" class="next action-button btn btn-primary"
                                            value="Selanjutnya" />
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-card">
                                            <h5 class="fs-title mb-4">Edit Riwayat Pelatihan</h5>

                                            <div class="row">
                                                <table class="table table-bordered" id="dynamicAddRemovePelatihan">
                                                    <tr>
                                                        <th>Nama Kursus/Seminar</th>
                                                        <th>Sertifikat</th>
                                                        <th>Tahun</th>
                                                        <th>Action</th>
                                                    </tr>

                                                    @foreach ($pelatihan as $p)

                                                    <tr>
                                                        <td>
                                                            <input type="text" name="addPelatihan[0][nama_pelatihan]"
                                                                placeholder="Nama Kursus/Seminar" class="form-control" value="{{ $p->nama_pelatihan }}" />
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="addPelatihan[0][sertifikat_pelatihan]">
                                                                <option value="Y">Ada</option>
                                                                <option value="T">Tidak Ada</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="addPelatihan[0][tahun_pelatihan]"
                                                                placeholder="Tahun Pelatihan" class="form-control"  value="{{ $p->nama_pelatihan }}"/>
                                                        </td>
                                                        <td><button type="button" name="add" id="dynamic-apel"
                                                                class="btn btn-primary">Tambah Pelatihan</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </table>


                                            </div>
                                            <span style="margin-top:10px" class="text-danger"><strong>*Semua wajib
                                                    diisi.</strong></span>
                                        </div>
                                        <input type="button" name="previous"
                                            class="previous action-button-previous btn btn-outline-primary"
                                            value="Sebelumnya" />
                                        <input type="button" name="next" class="next action-button btn btn-primary"
                                            value="Selanjutnya" />
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-card">
                                            <h5 class="fs-title mb-4">Edit Riwayat Pekerjaan</h5>

                                            <div class="row">
                                                <table class="table table-bordered" id="dynamicAddRemovePekerjaan">
                                                    <tr>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Posisi Terakhir</th>
                                                        <th>Pendapatan Terakhir</th>
                                                        <th>Tahun</th>
                                                        <th>Action</th>
                                                    </tr>

                                                    @foreach ($pekerjaan as $p)
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="addPekerjaan[0][nama_pekerjaan]"
                                                                placeholder="Nama Perusahaan" class="form-control" value="{{ $p->nama_pekerjaan }}"/>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="addPekerjaan[0][posisi_pekerjaan]"
                                                                placeholder="Posisi Terakhir" class="form-control" value="{{ $p->posisi_pekerjaan }}" />
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="addPekerjaan[0][pendapatan_pekerjaan]"
                                                                placeholder="Pendapatan Terakhir" class="form-control" value="{{ $p->pendapatan_pekerjaan }}" />
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="addPekerjaan[0][tahun_pekerjaan]"
                                                                placeholder="Tahun Terakhir" class="form-control"  value="{{ $p->tahun_pekerjaan }}"/>
                                                        </td>
                                                        <td><button type="button" name="add" id="dynamic-apek"
                                                                class="btn btn-primary">Tambah Pekerjaan</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </table>


                                            </div>
                                            <span style="margin-top:10px" class="text-danger"><strong>*Semua wajib
                                                    diisi.</strong></span>
                                        </div>
                                        <input type="button" name="previous"
                                            class="previous action-button-previous btn btn-outline-primary"
                                            value="Sebelumnya" />
                                        <input type="submit" name="next" class="next action-button btn btn-primary"
                                            value="Selesai" onkeypress="this.form.submit()" />
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-card">
                                            <h5 class="fs-title mb-4 text-center">Terima kasih. Data anda sudah diinput di sistem kami. Harap tunggu tim kami menghubungi anda.</h5><br>
                                            <div class="row justify-content-center">
                                                <div class="col-md-3">
                                                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 52 52">
                                                        <circle class="checkmark__circle" cx="26" cy="26" r="25"
                                                            fill="none" />
                                                        <path class="checkmark__check" fill="none"
                                                            d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                    </svg>
                                                </div>
                                            </div> <br><br>
                                            <div class="row justify-content-center">
                                                <div class="col-md-7 text-center">
                                                    <p>Data anda sudah terkirim</p>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
{!! Html::script('assets/js/forms/multiple-step.js') !!}
{!! Html::script('plugins/select2/select2.min.js') !!}
{!! Html::script('assets/js/forms/custom-select2.js') !!}
<script type="text/javascript">
    var i = 0;
    $("#dynamic-apen").click(function () {
        ++i;
        $("#dynamicAddRemovePendidikan").append(
        '<tr><td><select class="form-control" name="addPendidikan[' + i +'][jenjang_pend]"><option value="SMA">SMA</option><option value="D3">D3</option><option value="D4">D4</option><option value="S1">S1</option><option value="S2">S2</option><option value="S3">S3</option></select></td><td><input type="text" name="addPendidikan[' + i +'][nama_pend]" placeholder="Nama Institusi" class="form-control" /></td><td><input type="text" name="addPendidikan[' + i +'][jurusan_pend]" placeholder="Jurusan" class="form-control" /></td><td><input type="number" name="addPendidikan[' + i +'][tahun_pend]" placeholder="Tahun Lulus" class="form-control" /></td><td><input type="text" name="addPendidikan[' + i +'][ipk_pend]" placeholder="IPK" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-apel").click(function () {
        ++i;
        $("#dynamicAddRemovePelatihan").append(
        '<tr><td><input type="text" name="addPelatihan[' + i +'][nama_pelatihan]" placeholder="Nama Kursus/Seminar" class="form-control"/></td><td><select class="form-control" name="addPelatihan[' + i +'][sertifikat_pelatihan]"><option value="Y">Ada</option><option value="T">Tidak Ada</option></select></td><td><input type="number" name="addPelatihan[' + i +'][tahun_pelatihan]" placeholder="Tahun Pelatihan" class="form-control"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-apek").click(function () {
        ++i;
        $("#dynamicAddRemovePekerjaan").append(
            '<tr> <td> <input type="text" name="addPekerjaan[' + i +'][nama_pekerjaan]" placeholder="Nama Perusahaan" class="form-control" /> </td> <td> <input type="text" name="addPekerjaan[' + i +'][posisi_pekerjaan]" placeholder="Posisi Terakhir" class="form-control" /> </select> </td> <td> <input type="number" name="addPekerjaan[' + i +'][pendapatan_pekerjaan]" placeholder="Pendapatan Terakhir" class="form-control" /> </td> <td> <input type="number" name="addPekerjaan[' + i +'][tahun_pekerjaan]" placeholder="Tahun Terakhir" class="form-control" /> </td> <td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button> </td> </tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endpush

@push('custom-scripts')
@endpush
