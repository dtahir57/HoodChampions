<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\InterestGroup;
use App\Http\Models\Hood;
use Session;
use Storage;
use App\Http\Requests\InterestGroupRequest;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Models\Category;

class InterestGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interest_groups = InterestGroup::all();
        return view('admin.interest_group.index', compact('interest_groups'));
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
        $categories = Category::where([
            ['categoryable_type', InterestGroup::class],
            ['is_active', 1]
        ])->get();
        return view('admin.interest_group.create', compact('hoods', 'kakis', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterestGroupRequest $request)
    {
        $interest_group = new InterestGroup;
        $interest_group->hood_id = $request->hood_id;
        $interest_group->category_id = $request->category_id;
        $interest_group->title = $request->title;
        $interest_group->description = $request->description;
        $interest_group->about_us = $request->about_us;
        $interest_group->email = $request->email;
        $interest_group->contact_no = $request->contact_no;
        $interest_group->meetup_place = $request->meetup_place;
        $interest_group->photo = $request->photo->store('public/interest_groups/');
        $interest_group->save();
        $interest_group->users()->attach($request->users);
        if ($interest_group) {
            Session::flash('created', 'New Interest Group Added');
            return redirect()->route('interest_group.index');
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
        $interest_group = InterestGroup::findOrFail($id);
        $hoods = Hood::all();
        $users = User::all();

        $kakis = $this->getKakis($users);
        return view('admin.interest_group.edit', compact('interest_group', 'hoods', 'kakis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InterestGroupRequest $request, $id)
    {
        $interest_group = InterestGroup::findOrFail($id);
        $interest_group->hood_id = $request->hood_id;
        $interest_group->category_id = $request->category_id;
        $interest_group->title = $request->title;
        $interest_group->description = $request->description;
        $interest_group->about_us = $request->about_us;
        $interest_group->email = $request->email;
        $interest_group->contact_no = $request->contact_no;
        $interest_group->meetup_place = $request->meetup_place;
        if ($request->hasFile('photo')) {
            Storage::delete($interest_group->photo);
            $interest_group->photo = $request->photo->store('public/interest_groups/');
        }
        $interest_group->update();
        $interest_group->users()->sync($request->users);

        if ($interest_group) {
            Session::flash('created', 'Interest Group Updated');
            return redirect()->route('interest_group.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InterestGroupRequest $request)
    {
        $interest_group = InterestGroup::findOrFail($request->id);
        Storage::delete($interest_group->photo);
        $interest_group->delete();
        if ($interest_group) {
            Session::flash('deleted', 'Interest Group Deleted Successfully');
            return redirect()->back();
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
