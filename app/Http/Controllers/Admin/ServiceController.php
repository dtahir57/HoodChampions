<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Service;
use App\Http\Models\Hood;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\ServiceRequest;
use Session;
use Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoods = Hood::latest()->get();
        $users = User::all();

        $kakis = $this->getKakis($users);
        
        return view('admin.service.create', compact('kakis', 'hoods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service = new Service;
        $service->hood_id = $request->hood_id;
        $service->user_id = $request->user_id;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->email = $request->email;
        $service->contact_no = $request->contact_no;
        if ($request->hasFile('image')) {
            $service->image = $request->image->store('public/services/');
        }
        $service->save();
        if ($service) {
            Session::flash('created', 'New Service Created Successfully');
            return redirect()->route('service.index');
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
        $hoods = Hood::latest()->get();
        $users = User::all();

        $kakis = $this->getKakis($users);
        $service = Service::findOrFail($id);

        return view('admin.service.edit', compact('hoods', 'kakis', 'service'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->hood_id = $request->hood_id;
        $service->user_id = $request->user_id;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->email = $request->email;
        $service->contact_no = $request->contact_no;
        if ($request->hasFile('image')) {
            Storage::delete($service->image);
            $service->image = $request->image->store('public/services/');
        }
        $service->update();
        if ($service) {
            Session::flash('updated', 'Service Updated Successfully');
            return redirect()->route('service.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceRequest $request)
    {
        $service = Service::findOrFail($request->id);
        Storage::delete($service->image);
        $service->delete();
        if ($service) {
            Session::flash('deleted', 'Service Deleted Successfully');
            return redirect()->route('service.index');
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
