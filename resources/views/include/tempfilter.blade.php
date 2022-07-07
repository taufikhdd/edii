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
                <div class="col-md-12">
                    <h4>Data {{ $nav }}</h4>
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

                        <form action="{{ route(''.$url.'.filter') }}" method="POST" style="margin-top: 20px;">
                            @csrf
                            <div id="basicAccordionIconRotateThree" class="collapse show"
                                aria-labelledby="basicAccordionIconheadingRotateThree">
                                <div class="card-body">
                                    <div class="form-group row" style="margin-bottom: 0px">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Bulan</label>
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                            <select class="form-control multiple" id="bulan" name="bulan">
                                                <option selected disabled value="">--Pilih Bulan--</option>
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
                                    <div class="form-group row" style="margin-bottom: 0px">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Tahun</label>
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                            <select class="form-control multiple" name="tahun" id="tahun">
                                                <option selected disabled value="">--Pilih Tahun--</option>
                                                <?php
                                                $i = 2021; // Set your website start date
                                                $curYear = date('Y'); // Keeps the second year updated
                                                //echo $copyYear . ($copyYear != $curYear ? '-' . $curYear : '');
                                                while ($i <= $curYear) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                    $i++;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <center>

                                        @if (Auth::user()->instansi_id == 1)
                                        <button class="btn btn-warning" id="prov" name="prov" value="1" style="margin-top: 20px" type="submit">Lihat Keseluruhan Data Provinsi Jambi
                                        </button>
                                        @else
                                        <button class="btn btn-primary" style="margin-top: 20px" type="submit">Lihat Data
                                        </button>
                                        @endif

                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p class="text-center text-primary"><small> </small></p>
    @push('plugin-scripts')
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
                            d.bulan = $('#bulan').val();
                            d.tahun = $('#tahun').val();
                        }
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'instansi_id',
                            name: 'instansi_id'
                        },
                        {
                            data: 'bulan',
                            name: 'bulan'
                        },
                        {
                            data: 'tahun',
                            name: 'tahun'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                    ]
                });

                $('#bulan').change(function() {
                    table.draw();
                });
                $('#tahun').change(function() {
                    table.draw();
                });

            });
        </script>
    @endpush
@endsection
