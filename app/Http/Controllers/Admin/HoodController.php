<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Hood;
use App\Http\Requests\HoodRequest;
use Session;
use App\Http\Models\Region;

class HoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoods = Hood::latest()->get();
        return view('admin.hood.index', compact('hoods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        return view('admin.hood.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HoodRequest $request)
    {
        $hood = new Hood;
        $hood->planning_area_name = $request->planning_area_name;
        $hood->region_id = $request->region_id;
        $hood->save();
        if ($hood) {
            Session::flash('created', 'Hood Created Successfully');
            return redirect()->route('hood.index');
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
        $hood = Hood::findOrFail($id);
        $regions = Region::all();
        return view('admin.hood.edit', compact('hood', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HoodRequest $request, $id)
    {
        $hood = Hood::findOrFail($id);
        $hood->planning_area_name = $request->planning_area_name;
        $hood->region_id = $request->region_id;
        $hood->update();
        if ($hood) {
            Session::flash('updated', 'Hood Information updated Successfully');
            return redirect()->route('hood.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HoodRequest $request)
    {
        $hood = Hood::findOrFail($request->id);
        $hood->delete();
        if ($hood) {
            Session::flash('deleted', 'Hood Removed Successfully');
            return redirect()->route('hood.index');
        }
    }
}
