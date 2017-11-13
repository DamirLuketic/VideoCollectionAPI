<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $video = $request->all();
        $countries = null;
        $genres = null;

        foreach ($video as $key => $value)
        {
            if($value === null)
            {
                unset($video[$key]);
            }
        }

        if (isset($video['country_code']))
        {
            $countries = $video['country_code'];
            unset($video['country_code']);
        }

        if (isset($video['genres']))
        {
            $genres = $video['genres'];
            unset($video['genres']);
        }

        $current_video = Video::create($video);

        if ($genres != null)
        {
            foreach ($genres as $genre_id)
            {
                $current_video->genres()->attach((int)$genre_id);
            }
        }

        if ($countries != null)
        {
            foreach ($countries as $country_id)
            {
                $current_video->countries()->attach((int)$country_id);
            }
        }

        return [true];
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
        Video::destroy($id['id']);
        return ['1'];
    }

    /**
     * Get current user collection
     */
    public function video_personal(Request $request){
        $user_id = (int)($request->all()[0]);
        $videos = Video::whereUserId($user_id)->get();
        return $videos;
    }
}
