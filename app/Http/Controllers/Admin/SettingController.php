<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.index');
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
        $envFile = app()->environmentFilePath();
        $handle = fopen($envFile, 'a+');
        $USERNAME = "BULKSMS_USERNAME=";
        $PASSWORD = "BULKSMS_PASSWORD=";
        $contents = file_get_contents($envFile);
        $pattern = preg_quote($USERNAME, '/');
        $pattern = "/^.*$pattern.*\$/m";
        if(preg_match_all($pattern, $contents, $matches)){
           $result = implode("\n", $matches[0]);
           $contents = str_replace($result, '', $contents);
           file_put_contents($envFile, $contents."\n".$USERNAME.$request->username."\n");
        }
        else{
           fwrite($handle, "\n".$USERNAME.$request->username."\n");
        }

        $pattern = preg_quote($PASSWORD, '/');
        $pattern = "/^.*$pattern.*\$/m";
        if(preg_match_all($pattern, $contents, $matches)){
           $result = implode("\n", $matches[0]);
           $contents = str_replace($result, '', $contents);
           // dd($contents);
           file_put_contents($envFile, $contents."\n".$PASSWORD.$request->password."\n");
        }
        else{
           fwrite($handle, $PASSWORD.$request->password."\n");
        }
        fclose($handle);
        \Artisan::call('config:clear');
        return redirect()->back();
        
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
