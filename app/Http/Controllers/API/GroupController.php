<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Models\Category;
use App\Http\Models\InterestGroup;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\InterestGroupResource;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class GroupController extends Controller
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
            ['categoryable_type', InterestGroup::class],
            ['is_active', 1]
        ])->get();
        return response()->json([
            'code' => 200,
            'interest_groups' => InterestGroupResource::collection($user->interest_groups),
            'hood_groups' => InterestGroupResource::collection($user->hood->interest_groups),
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
            ['categoryable_type', InterestGroup::class],
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
        $interest_group = new InterestGroup;
        $interest_group->hood_id = $user->hood->id;
        $interest_group->category_id = $request->category_id;
        $interest_group->title = $request->title;
        $interest_group->description = $request->description;
        $interest_group->about_us = $request->about_us;
        $interest_group->email = $request->email;
        $interest_group->contact_no = $request->contact_no;
        $interest_group->meetup_place = $request->meetup_place;
        /**
         * Image base64 converting code starts from here
         */
            $image = $request->input('photo'); // image base64 encoded
        if ($image) {
             preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
             $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
             $image = str_replace(' ', '+', $image);
             $imageName = 'interest_group_' . time() . '.' . $image_extension[1]; //generating unique file name;
             $file = \File::put(storage_path().'/app/public/interest_groups/'.$imageName, base64_decode($image));
             $interest_group->photo = 'public/interest_groups/'.$imageName;
        }
        /**
         * Image code ends here
         */
        $interest_group->save();
        $interest_group->users()->attach($user);
        return response()->json([
            'code' => 200,
            'group' => new InterestGroupResource($interest_group)
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
        $group = InterestGroup::find($id);
        $token = $request->bearerToken();
        $user = User::where('api_token', $token)->first();
        $is_member = $group->users->contains($user->id);
        return response()->json([
            'group' => new InterestGroupResource($group),
            'users' => UserResource::collection($group->users),
            'is_member' => $is_member
        ]);
    }

    public function getCategory($id)
    {
        $category = Category::find($id);
        return response()->json([
            'groups' => InterestGroupResource::collection($category->interest_groups),
            'category' => new CategoryResource($category)
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
