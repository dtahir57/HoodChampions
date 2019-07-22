<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Models\Battle;
use App\Http\Models\Category;
use App\Http\Resources\BattleResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\TeamResource;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class BattleController extends Controller
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
        $categories = Category::where([
            ['categoryable_type', Battle::class],
            ['is_active', 1]
        ])->get();
        return response()->json([
            'code' => 200,
            'battles' => BattleResource::collection($user->battles),
            'categories' => CategoryResource::collection($categories)
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
            ['categoryable_type', Battle::class],
            ['is_active', 1]
        ])->get();
        return response()->json([
            'categories' => CategoryResource::collection($categories)
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
        $battle = new Battle;
        $battle->hood_id = $user->hood->id;
        $battle->category_id = $request->category_id;
        $battle->title = $request->title;
        $battle->max_no_of_teams = $request->max_no_of_teams;
        $battle->description = $request->description;
        $battle->about_us = $request->about_us;
        $battle->email = $request->email;
        $battle->contact_no = $request->contact_no;
        $battle->meetup_place = $request->meetup_place;
        /**
         * Image base64 converting code starts from here
         */
            $image = $request->input('image'); // image base64 encoded
        if ($image) {
             preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
             $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
             $image = str_replace(' ', '+', $image);
             $imageName = 'battle_' . time() . '.' . $image_extension[1]; //generating unique file name;
             $file = \File::put(storage_path().'/app/public/battles/'.$imageName, base64_decode($image));
             $battle->image = 'public/battles/'.$imageName;
        }
        /**
         * Image code ends here
         */
        $battle->save();
        $battle->users()->attach($user);
        return response()->json([
            'battle' => new BattleResource($battle)
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
        $token = $request->bearerToken();
        $user = User::where('api_token', $token)->first();
        $battle = Battle::find($id);
        $exists = $battle->users->contains($user->id);
        return response()->json([
            'battle' => new BattleResource($battle),
            'user' => new UserResource($user),
            'teams' => TeamResource::collection($battle->teams),
            'exists' => $exists
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
