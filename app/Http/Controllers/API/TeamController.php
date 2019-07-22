<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Models\Hood;
use App\Http\Models\Team;
use App\Http\Resources\TeamResource;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
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
        $hood = Hood::find($user->hood_id);
        $user_teams = $user->teams;
        $hood_name = $user->hood->planning_area_name;
        return response()->json([
            'user_teams' => TeamResource::collection($user_teams),
            'teams' => TeamResource::collection($hood->teams),
            'hood_name' => $hood_name
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
        // get the user of this hood in which team is going to be created
        $token = $request->bearerToken();
        $user = User::where('api_token', $token)->first();
        if (!$user) {
            return response()->json([
                'code' => 404,
                'User Not Found! Please try to login again!'
            ]);
        }
        // create a team
        $team = new Team;
        $team->hood_id = $user->hood->id;
        $team->title = $request->title;
        $team->max_no_of_players = $request->max_no_of_players;
        $team->description = $request->description;
        $team->about_us = $request->about_us;
        $team->email = $request->email;
        $team->contact_no = $request->contact_no;
        $team->meetup_place = $request->meetup_place;
        /**
         * Image base64 converting code starts from here
         */
            $image = $request->input('image'); // image base64 encoded
        if ($image) {
             preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
             $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
             $image = str_replace(' ', '+', $image);
             $imageName = 'team_' . time() . '.' . $image_extension[1]; //generating unique file name;
             $file = \File::put(storage_path().'/app/public/teams/'.$imageName, base64_decode($image));
             $team->image = 'public/teams/'.$imageName;
        }
        /**
         * Image code ends here
         */
        $team->save();
        $user->assignRole('Captain');
        $team->users()->attach($user, ['is_captain' => 1]);
        if ($team) {
            return response()->json([
                'code' => 200,
                'team' => new TeamResource($team)
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong',
                'team' => new TeamResource($team)
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $team = Team::find($id);
        $token = $request->bearerToken();
        $user = User::where('api_token', $token)->first();
        $exists = $team->users->contains($user->id);
        return response()->json([
            'team' => new TeamResource($team),
            'users' => UserResource::collection($team->users),
            'user' => new UserResource($user),
            'is_join' => $exists
        ]);
    }

    public function join(Request $request)
    {
        $token = $request->bearerToken();
        $user = User::where('api_token', $token)->first();
        $team = Team::find($request->id);
        $team->users()->attach($user);
        $exists = $team->users->contains($user->id);
        return response()->json([
            'team' => new TeamResource($team),
            'users' => UserResource::collection($team->users),
            'user' => new UserResource($user),
            'is_join' => $exists
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

    // public function generateImage($img)

    // {

    //     // $folderPath = "images/";


    //     $image_parts = explode(";base64,", $img);

    //     $image_type_aux = explode("image/", $image_parts[0]);

    //     $image_type = $image_type_aux[1];

    //     $image_base64 = base64_decode($image_parts[1]);

    //     return $image_base64;
    //     // $file = $folderPath . uniqid() . '.png';


    //     // file_put_contents($file, $image_base64);

    // }

    // public function base64_to_jpeg( $inputfile, $outputfile ) {
    //   /* read data (binary) */
    //   $ifp = fopen( $inputfile, "rb" );
    //   $imageData = fread( $ifp, filesize( $inputfile ) );
    //   fclose( $ifp );
    //   /* encode & write data (binary) */
    //   $ifp = fopen( $outputfile, "wb" );
    //   fwrite( $ifp, base64_decode( $imageData ) );
    //   fclose( $ifp );
    //   /* return output filename */
    //   return( $outputfile );
    // } 
}
