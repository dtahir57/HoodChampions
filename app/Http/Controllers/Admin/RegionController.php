<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Region;
use Session;
use App\Http\Requests\RegionRequest;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();
        return view('admin.region.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionRequest $request)
    {
        $region = new Region;
        $region->region = $request->region;
        $region->save();
        if ($region) {
            Session::flash('created', 'New Region Added');
            return redirect()->route('region.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Region::findOrFail($id);
        return view('admin.region.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegionRequest $request, $id)
    {
        $region = Region::findOrFail($id);
        $region->region = $request->region;
        $region->update();
        if ($region) {
            Session::flash('updated', 'Region Updated Successfully');
            return redirect()->route('region.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegionRequest $request)
    {
        $region = Region::findOrFail($request->id);
        $region->delete();
        if ($region) {
            Session::flash('deleted', 'Region Removed Permanently');
            return redirect()->route('region.index');
        }
    }
}
