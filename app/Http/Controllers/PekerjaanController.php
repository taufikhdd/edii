<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Http\Requests\StorePekerjaanRequest;
use App\Http\Requests\UpdatePekerjaanRequest;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePekerjaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePekerjaanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePekerjaanRequest  $request
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePekerjaanRequest $request, Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pekerjaan $pekerjaan)
    {
        //
    }
}
