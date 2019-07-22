<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Models\Service;
use App\Http\Resources\ServiceResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $token = $request->bearerToken();
        $user = User::where('api_token', $token)->first();
        return response()->json([
            'services' => ServiceResource::collection($user->hood->services)
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = $request->bearerToken();
        $user = User::where('api_token', $token)->first();
        $service = new Service;
        $service->hood_id = $user->hood->id;
        $service->user_id = $user->id;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->email = $request->email;
        $service->contact_no = $request->contact_no;
        /**
         * Image base64 converting code starts from here
         */
            $image = $request->input('image'); // image base64 encoded
        if ($image) {
             preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
             $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
             $image = str_replace(' ', '+', $image);
             $imageName = 'service_' . time() . '.' . $image_extension[1]; //generating unique file name;
             $file = \File::put(storage_path().'/app/public/services/'.$imageName, base64_decode($image));
             $service->image = 'public/services/'.$imageName;
        }
        /**
         * Image code ends here
         */
        $service->save();
        return response()->json([
            'service' => new ServiceResource($service)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $service = Service::find($id);
        return response()->json([
            'service' => new ServiceResource($service)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $token = $request->bearerToken();
        $user = User::where('api_token', $token)->first();
        $service = Service::find($id);
        $service->hood_id = $user->hood->id;
        $service->user_id = $user->id;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->email = $request->email;
        $service->contact_no = $request->contact_no;
        Storage::delete($service->image);
        /**
         * Image base64 converting code starts from here
         */
            $image = $request->input('image'); // image base64 encoded
        if ($image) {
             preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
             $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
             $image = str_replace(' ', '+', $image);
             $imageName = 'service_' . time() . '.' . $image_extension[1]; //generating unique file name;
             $file = \File::put(storage_path().'/app/public/services/'.$imageName, base64_decode($image));
             $service->image = 'public/services/'.$imageName;
        }
        /**
         * Image code ends here
         */
        $service->save();
        return response()->json([
            'service' => new ServiceResource($service)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
