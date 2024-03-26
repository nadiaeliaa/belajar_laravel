<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Religion;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dataagama()
    {
        $data = Religion::paginate(6);
        return view('dataagama', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambahagama()
    {
        return view('tambahagama');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insertdataagama(Request $request)
    {
        $data = Religion::create($request->all());
        return redirect()->route('dataagama');

    }

    /**
     * Display the specified resource.
     */
    public function tampildataagama(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
