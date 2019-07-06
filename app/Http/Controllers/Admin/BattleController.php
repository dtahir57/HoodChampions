<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Battle;
use Session;
use Storage;
use App\Http\Models\Hood;
use App\Http\Models\Team;
use App\Http\Models\Category;
use App\Http\Requests\BattleRequest;

class BattleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $battles = Battle::all();
        return view('admin.battle.index', compact('battles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoods = Hood::all();
        $teams = Team::all();

        $categories = Category::where([
            ['categoryable_type', Battle::class],
            ['is_active', 1]
        ])->get();
        return view('admin.battle.create', compact('hoods', 'teams', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BattleRequest $request)
    {
        $battle = new Battle;
        $battle->hood_id = $request->hood_id;
        $battle->category_id = $request->category_id;
        $battle->title = $request->title;
        $battle->max_no_of_teams = $request->max_no_of_teams;
        $battle->description = $request->description;
        $battle->about_us = $request->about_us;
        $battle->email = $request->email;
        $battle->contact_no = $request->contact_no;
        $battle->meetup_place = $request->meetup_place;
        $battle->image = $request->image->store('public/battles/');
        $battle->save();

        $battle->teams()->attach($request->teams);
        if ($battle) {
            Session::flash('created', 'New Battle Created Successfully');
            return redirect()->route('battle.index');
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
        $battle = Battle::findOrFail($id);
        $hoods = Hood::all();
        $teams = Team::all();

        $categories = Category::where([
            ['categoryable_type', Battle::class],
            ['is_active', 1]
        ])->get();
        return view('admin.battle.edit', compact('battle', 'hoods', 'teams', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BattleRequest $request, $id)
    {
        $battle = Battle::findOrFail($id);
        $battle->hood_id = $request->hood_id;
        $battle->category_id = $request->category_id;
        $battle->title = $request->title;
        $battle->max_no_of_teams = $request->max_no_of_teams;
        $battle->description = $request->description;
        $battle->about_us = $request->about_us;
        $battle->email = $request->email;
        $battle->contact_no = $request->contact_no;
        $battle->meetup_place = $request->meetup_place;
        if ($request->hasFile('image')) {
            Storage::delete($battle->image);
            $battle->image = $request->image->store('public/battles/');
        }
        $battle->update();

        $battle->teams()->sync($request->teams);
        if ($battle) {
            Session::flash('created', 'New Battle Created Successfully');
            return redirect()->route('battle.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BattleRequest $request)
    {
        $battle = Battle::findOrFail($request->id);
        Storage::delete($battle->image);
        $battle->delete();
        if ($battle) {
            Session::flash('deleted', 'Battle Removed Permanently');
            return redirect()->route('battle.index');
        }
    }
}
