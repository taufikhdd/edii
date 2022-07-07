<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Auth;
use Form;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:instansi-list|instansi-create|instansi-edit|instansi-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:instansi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:instansi-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:instansi-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nav = "Instansi";
        $instansi_id = Auth::user()->instansi_id;

        $user = Auth::user();
        //check if user has role admin(1)
        $isadmin = $user->hasRole(2);
        $iskabkot = $user->hasRole(3, 4);

        if ($request->ajax()) {
            //function to check if admin, then get all the data from user
            if ($isadmin) {
                $data = Instansi::latest()->get();
            }
            //function to check if user, then get only specified user datas
            else {
                $data = Instansi::latest()->where('id', $instansi_id)->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($row) {
                    $instansi = $row->nama;
                    return $instansi;
                })
                ->addColumn('action', function ($data) {
                    $user = Auth::user();
                    $isadmin = $user->hasRole(2);
                    $btn = '<form action="' . route('instansis.destroy', $data->id) . '" method="POST">
                    ' . csrf_field() . '
                    ' . method_field("DELETE") . '
                    <a href="' . route('instansis.show', $data->id) . '" class="edit btn btn-info btn-sm">Detail</a>';
                    $btn = $btn . ' <a href="' . route('instansis.edit', $data->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    if ($isadmin) {
                        $btn = $btn . ' <button class="edit btn btn-danger btn-sm" type="submit"
                            onclick="return confirm(\'Apakah Anda yakin ingin menghapus ini?\')"
                            >Hapus</button>
                        </form>
                    ';
                    }

                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('instansis.index', compact('nav'));
        //return view('instansis.index',compact('instansis'))
        //    ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nav = "Instansi";
        return view('instansis.create', compact('nav'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama' => 'required',

        ]);

        Instansi::create($request->all());

        return redirect()->route('instansis.index')
            ->with('success', 'Instansi created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function show(Instansi $instansi)
    {
        $nav = "Instansi";
        return view('instansis.show', compact('instansi', 'nav'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function edit(Instansi $instansi)
    {
        $nav = "Instansi";
        return view('instansis.edit', compact('instansi', 'nav'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instansi $instansi)
    {
        request()->validate([
            'nama' => 'required',
        ]);

        $instansi->update($request->all());

        return redirect()->route('instansis.index')
            ->with('success', 'Instansi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instansi $instansi)
    {
        $instansi->delete();

        return redirect()->route('instansis.index')
            ->with('success', 'Instansi deleted successfully');
    }
}
