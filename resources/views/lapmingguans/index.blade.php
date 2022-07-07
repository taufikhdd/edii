@extends('layout.master')


@section('content')
    @push('plugin-styles')
        {!! Html::style('plugins/table/datatable/datatables.css') !!}
        {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
        {!! Html::style('plugins/select2/select2.min.css') !!}
        {!! Html::style('assets/css/forms/form-widgets.css') !!}
    @endpush

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

    <!-- BASIC -->
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">

            <div class="row justify-content-center align-items-center" style="margin-bottom: 25px">
                <div class="col-md-6">
                    <h4>Data {{ $nav }}</h4>
                </div>
                <div class="col-md-6 text-right">
                    @can('lapmingguan-create')
                        <a class="btn btn-success" href="{{ route('lapmingguans.create') }}"> Tambah Data Baru</a>
                    @endcan
                </div>

                <div class="col-md-12 mb-2 pt-4" style="margin-top: 10px">
                    <div class="card">
                        <div class="card-header" id="basicAccordionIconheadingRotateThree">
                            <section class="mb-0 mt-0">
                                <div role="menu" class="" data-toggle="collapse"
                                    data-target="#basicAccordionIconRotateThree" aria-expanded="false"
                                    aria-controls="basicAccordionIconRotateThree">
                                    <i class="las la-search font-20"></i> <strong>Filter Data</strong> <i
                                        class="las la-angle-down has-rotate"></i>
                                    <div class="icons"></div>
                                </div>
                            </section>
                        </div>
                        <div id="basicAccordionIconRotateThree" class="collapse show"
                            aria-labelledby="basicAccordionIconheadingRotateThree">
                            <div class="card-body">
                                <div class="form-group row" style="margin-bottom: 0px">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">Nama<a
                                            style="color: red">*</a></label>
                                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                        <select class="form-control multiple" id="nama" name="nama" multiple="multiple">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom: 0px">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">Posisi<a
                                            style="color: red">*</a></label>
                                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                        <select class="form-control multiple" id="posisi" name="posisi" multiple="multiple">
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>

                                <a style="color: red;">*Bisa dipilih lebih dari satu.</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="table-responsive mb-4">
                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th style="width: 4px">NO.</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Posisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <p class="text-center text-primary"><small> </small></p>
    @push('plugin-scripts')
        {!! Html::script('plugins/table/datatable/datatables.js') !!}
        {!! Html::script('plugins/select2/select2.min.js') !!}
        {!! Html::script('assets/js/forms/custom-select2.js') !!}
    @endpush

    @push('custom-scripts')
        <script type="text/javascript">
            $(function() {

                var table = $('.yajra-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('lapmingguans.index') }}",
                        type: 'GET',
                        data: function(d) {
                            d.minggu = $('#nama').val();
                            d.bulan = $('#posisi').val();
                        }
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'tpt_lahir',
                            name: 'tpt_lahir'
                        },
                        {
                            data: 'tgl_lahir',
                            name: 'tgl_lahir'
                        },
                        {
                            data: 'posisi',
                            name: 'posisi'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                    ]
                });

                $('#nama').change(function() {
                    table.draw();
                });
                $('#posisi').change(function() {
                    table.draw();
                });
            });
        </script>
    @endpush
@endsection
