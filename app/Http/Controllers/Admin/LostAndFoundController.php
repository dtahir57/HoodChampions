<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\LostAndFound;
use App\Http\Models\Hood;
use App\Http\Models\Category;
use App\User;
use Session;
use Storage;
use App\Http\Requests\LostAndFoundRequest;
use Spatie\Permission\Models\Role;

class LostAndFoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lost_and_founds = LostAndFound::all();
        return view('admin.lost_and_found.index', compact('lost_and_founds'));
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
            ['categoryable_type', LostAndFound::class],
            ['is_active', 1]
        ])->get();
        return view('admin.lost_and_found.create', compact('hoods', 'kakis', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LostAndFoundRequest $request)
    {
        $lost_and_found = new LostAndFound;
        $lost_and_found->hood_id = $request->hood_id;
        $lost_and_found->category_id = $request->category_id;
        $lost_and_found->user_id = $request->user_id;
        $lost_and_found->title = $request->title;
        $lost_and_found->description = $request->description;
        $lost_and_found->image = $request->image->store('public/lost_and_founds/');
        $lost_and_found->save();
        if ($lost_and_found) {
            Session::flash('created', 'New Item Added');
            return redirect()->route('lost_and_found.index');
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
        $lost_and_found = LostAndFound::findOrFail($id);
        $hoods = Hood::all();
        $users = User::all();

        $kakis = $this->getKakis($users);
        $categories = Category::where([
            ['categoryable_type', LostAndFound::class],
            ['is_active' , 1]
        ])->get();
        return view('admin.lost_and_found.edit', compact('lost_and_found', 'hoods', 'kakis', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LostAndFoundRequest $request, $id)
    {
        $lost_and_found = LostAndFound::findOrFail($id);
        $lost_and_found->hood_id = $request->hood_id;
        $lost_and_found->category_id = $request->category_id;
        $lost_and_found->user_id = $request->user_id;
        $lost_and_found->title = $request->title;
        $lost_and_found->description = $request->description;
        if ($request->hasFile('image')) {
            Storage::delete($lost_and_found->image);
            $lost_and_found->image = $request->image->store('public/lost_and_founds/');
        }
        $lost_and_found->update();
        if ($lost_and_found) {
            Session::flash('updated', 'Item Updated');
            return redirect()->route('lost_and_found.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LostAndFoundRequest $request)
    {
        $lost_and_found = LostAndFound::findOrFail($request->id);
        Storage::delete($lost_and_found->image);
        $lost_and_found->delete();
        if ($lost_and_found) {
            Session::flash('deleted', 'Item Removed Permanently');
            return redirect()->route('lost_and_found.index');
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
