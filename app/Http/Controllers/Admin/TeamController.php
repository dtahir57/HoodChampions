<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Team;
use App\Http\Requests\TeamRequest;
use Session;
use Storage;
use App\Http\Models\Hood;
use App\User;
use Spatie\Permission\Models\Role;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoods = Hood::all();
        $users = User::all();

        $kakis = $this->getKakis($users);
        return view('admin.team.create', compact('hoods', 'kakis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $team = new Team;
        $team->hood_id = $request->hood_id;
        $team->title = $request->title;
        $team->max_no_of_players = $request->max_no_of_players;
        $team->description = $request->description;
        $team->about_us = $request->about_us;
        $team->email = $request->email;
        $team->contact_no = $request->contact_no;
        $team->meetup_place = $request->meetup_place;
        if ($request->hasFile('image')) {
            $team->image = $request->image->store('public/teams/');
        }
        $team->save();
        $team->users()->attach($request->users);
        if ($team) {
            Session::flash('created', 'Team Created Successfully');
            return redirect()->route('team.index');
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
        $team = Team::findOrFail($id);
        $hoods = Hood::all();
        $users = User::all();

        $kakis = $this->getKakis($users);
        // dd($team->users()->pluck('user_id')->toArray());
        return view('admin.team.edit', compact('team', 'hoods', 'kakis'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->hood_id = $request->hood_id;
        $team->title = $request->title;
        $team->max_no_of_players = $request->max_no_of_players;
        $team->description = $request->description;
        $team->about_us = $request->about_us;
        $team->email = $request->email;
        $team->contact_no = $request->contact_no;
        $team->meetup_place = $request->meetup_place;
        if ($request->hasFile('image')) {
            Storage::delete($team->image);
            $team->image = $request->image->store('public/teams/');
        }
        $team->update();
        $team->users()->sync($request->users);
        if ($team) {
            Session::flash('updated', 'Team Updated Successfully');
            return redirect()->route('team.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamRequest $request)
    {
        $team = Team::findOrFail($request->id);
        Storage::delete($team->image);
        $team->delete();
        if ($team) {
            Session::flash('deleted', 'Team Deleted Successfully');
            return redirect()->route('team.index');
        }
    }

    public function getKakis($users)
    {
        $kakis = [];

        foreach($users as $user) {
            if( !$user->hasAnyRole(Role::all()) ) {
                array_push($kakis, $user);
            }
        }
        return $kakis;    
    }
}
