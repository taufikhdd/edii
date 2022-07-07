<?php

namespace App\Http\Controllers;

use App\Models\Lapmingguan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Pelatihan;

use Auth;
use DB;
use Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class LapmingguanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:lapmingguan-list|lapmingguan-create|lapmingguan-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:lapmingguan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:lapmingguan-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nav = "Biodata";
        $instansi_id = Auth::user()->instansi_id;
        //dd($instansi_id);
        $user = Auth::user();
        //check if user has role admin(1)
        $isadmin = $user->hasRole(2);
        //dd($isadmin);

        if ($request->ajax()) {
            //function to check if admin, then get all the data from user
            if ($isadmin) {
                $data = Lapmingguan::when($request->get('nama'), function ($query) use ($request) {
                    $nama = $request->get('nama', []);
                    $query = $query->whereIn('nama', $nama);
                })
                    ->when($request->get('posisi'), function ($query) use ($request) {
                        $posisi = $request->get('posisi', []);
                        $query = $query->whereIn('posisi', $posisi);
                    })
                    ->orderBy('posisi', 'desc')->orderBy('nama', 'desc')
                    ->get();
            }
            //function to check if user, then get only specified user datas
            else {
                $data = Lapmingguan::when($request->get('nama'), function ($query) use ($request) {
                        $nama = $request->get('nama', []);
                        $query = $query->whereIn('nama', $nama);
                    })
                    ->when($request->get('posisi'), function ($query) use ($request) {
                        $posisi = $request->get('posisi', []);
                        $query = $query->whereIn('posisi', $posisi);
                    })

                    ->orderBy('posisi', 'desc')->orderBy('nama', 'desc')
                    ->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function ($row) {
                    $nama = $row->nama;
                    return $nama;
                })
                ->addColumn('tpt_lahir', function ($row) {
                    $waktu = $row->tpt_lahir;
                    return $waktu;
                })
                ->addColumn('tgl_lahir', function ($row) {
                    $waktu = $row->tgl_lahir;
                    return Carbon::parse($waktu)->locale('id')->translatedFormat('l, j F Y');
                })
                ->addColumn('posisi', function ($row) {
                    $posisi = $row->posisi;
                    return $posisi;
                })
                ->addColumn('action', function ($data) {
                    $user = Auth::user();
                    //super admin = 2
                    $isadmin = $user->hasRole([2, 3]);
                    //kadis = 4
                    $iskadis = $user->hasRole(4);
                    $status = $data->status;

                    //detail button
                    $btn = '<a href="' . route('lapmingguans.show', $data->id) . '" class="edit btn btn-info btn-sm">Detail</a>';
                    //edit button
                    $btn = $btn . ' <a href="' . route('lapmingguans.edit', $data->id) . '" class="edit btn btn-warning btn-sm">Edit</a>';
                    //delete button
                    if ($isadmin) {
                        $btn = $btn . '
                        <form action="' . route('lapmingguans.destroy', $data->id) . '" method="POST">
                    ' . csrf_field() . '
                    ' . method_field("DELETE") . '
                        <button class="edit btn btn-danger btn-sm" style="margin-top:5px" type="submit"
                            onclick="return confirm(\'Apakah Anda yakin ingin menghapus ini?\')"
                            >Hapus</button></form>';
                    }
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('lapmingguans.index', compact('instansi_id', 'nav'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nav = "Biodata";
        $link = "lapmingguans";
        $instansi_id = Auth::user()->instansi_id;
        return view('lapmingguans.create', compact('instansi_id', 'nav', 'link'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = new Lapmingguan();
        $input->posisi = $request->posisi;
        $input->nama = $request->nama;
        $input->ktp = $request->ktp;
        $input->tpt_lahir = $request->tpt_lahir;
        $input->tgl_lahir = $request->tgl_lahir;
        $input->jk = $request->jk;
        $input->agama = $request->agama;
        $input->gol_d = $request->gol_d;
        $input->status = $request->status;
        $input->alamat_ktp = $request->alamat_ktp;
        $input->alamat_tgl = $request->alamat_tgl;
        $input->email = $request->email;
        $input->telp = $request->telp;
        $input->org_terdekat = $request->org_terdekat;
        $input->skill = $request->skill;
        $input->bersedia = $request->bersedia;
        $input->penghasilan = $request->penghasilan;

        $user = "4";
        $input->user_id = $user;

        //dd($input);
        $input->save();

        foreach ($request->addPendidikan as $key => $value) {
            $value['lapmingguan_id'] = $input->id;
            Pendidikan::create($value);
        }

        foreach ($request->addPelatihan as $key => $value) {
            $value['lapmingguan_id'] = $input->id;
            Pelatihan::create($value);
        }

        foreach ($request->addPekerjaan as $key => $value) {
            $value['lapmingguan_id'] = $input->id;
            Pekerjaan::create($value);
        }

        return redirect()->route('lapmingguans.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lapmingguan  $lapmingguan
     * @return \Illuminate\Http\Response
     */
    public function show(Lapmingguan $lapmingguan)
    {
        $nav = "Biodata";
        $pendidikan = Pendidikan::where('lapmingguan_id', $lapmingguan->id)->get();
        $pelatihan = Pelatihan::where('lapmingguan_id', $lapmingguan->id)->get();
        $pekerjaan = Pekerjaan::where('lapmingguan_id', $lapmingguan->id)->get();
        return view('lapmingguans.show', compact('lapmingguan', 'nav', 'pendidikan', 'pelatihan', 'pekerjaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lapmingguan  $lapmingguan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapmingguan $lapmingguan)
    {
        $nav = "Biodata";
        $pendidikan = Pendidikan::where('lapmingguan_id', $lapmingguan->id)->get();
        $pelatihan = Pelatihan::where('lapmingguan_id', $lapmingguan->id)->get();
        $pekerjaan = Pekerjaan::where('lapmingguan_id', $lapmingguan->id)->get();
        return view('lapmingguans.edit', compact('lapmingguan', 'nav', 'pendidikan', 'pelatihan', 'pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lapmingguan  $lapmingguan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lapmingguan $lapmingguan)
    {
        $input = $request->all();
        foreach ($input as &$value) {
            if (empty($value)) {
                $value = 0;
            }
        }

        $lapmingguan->update($input);

        return redirect()->route('lapmingguans.index')
            ->with('success', 'Data berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lapmingguan  $lapmingguan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lapmingguan $lapmingguan)
    {
        $lapmingguan->delete();

        return redirect()->route('lapmingguans.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
