<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Activity;
use Storage;
use Session;
use App\Http\Models\Hood;
use App\User;
use App\Http\Requests\ActivityRequest;
use Spatie\Permission\Models\Role;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        return view('admin.activity.index', compact('activities'));
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
        $categories = Category::where('categoryable_type', Activity::class)->get();
        return view('admin.activity.index', compact('hoods', 'kakis', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        $activity = new Activity;
        $activity->hood_id = $request->hood_id;
        $activity->category_id = $request->category_id;
        $activity->user_id = $request->user_id;
        $activity->type = $request->type;
        $activity->title = $request->title;
        $activity->description = $request->description;
        $activity->about_us = $request->about_us;
        $activity->email = $request->email;
        $activity->contact_no = $request->contact_no;
        $activity->meetup_place = $request->meetup_place;
        $activity->image = $request->image->store('public/activities/');
        $activity->save();
        if ($activity) {
            Session::flash('created', 'Activity Created Successfully');
            return redirect()->route('activity.index');
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
        $activity = Activity::findOrFail($id);
        $hoods = Hood::all();
        $users = User::all();

        $kakis = $this->getKakis($users);
        $categories = Category::where('categoryable_type', Activity::class)->get();
        return view('admin.activity.edit', compact('activity', 'hoods', 'kakis', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->hood_id = $request->hood_id;
        $activity->category_id = $request->category_id;
        $activity->user_id = $request->user_id;
        $activity->type = $request->type;
        $activity->title = $request->title;
        $activity->description = $request->description;
        $activity->about_us = $request->about_us;
        $activity->email = $request->email;
        $activity->contact_no = $request->contact_no;
        $activity->meetup_place = $request->meetup_place;
        if ($request->hasFile('image')) {
            Storage::delete($activity->image);
            $activity->image = $request->image->store('public/activities/');
        }
        $activity->update();
        if ($activity) {
            Session::flash('updated', 'Activity Updated Successfully');
            return redirect()->route('activity.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityRequest $request)
    {
        $activity = Activity::findOrFail($request->id);
        Storage::delete($activity->image);
        $activity->delete();
        if ($activity) {
            Session::flash('deleted', 'Activity Deleted Successfully');
            return redirect()->route('activity.index');
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
