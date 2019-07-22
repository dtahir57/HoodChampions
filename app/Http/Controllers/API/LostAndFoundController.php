<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Models\Category;
use App\Http\Models\LostAndFound;
use App\Http\Resources\LostAndFoundResource;
use App\User;
use Illuminate\Http\Request;

class LostAndFoundController extends Controller
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
            'lost_and_founds' => LostAndFoundResource::collection($user->hood->lost_and_founds)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where([
            ['categoryable_type', LostAndFound::class],
            ['is_active', 1]
        ])->get();
        return response()->json([
            'categories' => $categories
        ]);
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
        $lost_and_found = new LostAndFound;
        $lost_and_found->hood_id = $user->hood->id;
        $lost_and_found->category_id = $request->category_id;
        $lost_and_found->user_id = $user->id;
        $lost_and_found->title = $request->title;
        $lost_and_found->description = $request->description;
        /**
         * Image base64 converting code starts from here
         */
            $image = $request->input('image'); // image base64 encoded
        if ($image) {
             preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
             $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
             $image = str_replace(' ', '+', $image);
             $imageName = 'lost_and_found_' . time() . '.' . $image_extension[1]; //generating unique file name;
             $file = \File::put(storage_path().'/app/public/lost_and_founds/'.$imageName, base64_decode($image));
             $lost_and_found->image = 'public/lost_and_founds/'.$imageName;
        }
        /**
         * Image code ends here
         */
        $lost_and_found->save();
        return response()->json([
            'code' => 200,
            'lost_and_found' => $lost_and_found
        ]);
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
        //
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
