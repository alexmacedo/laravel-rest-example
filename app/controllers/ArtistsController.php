<?php

class ArtistsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $artists = Artist::with('albums')->get();

        $response = array(
            "error" => KK::teste_alex(),
            "message" => KK::_("<a>banana</a>"),
            "data" => $artists,
        );

        return Response::json($response);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $artist = new Artist;
        $artist->name = Input::get('name');
        $artist->active = Input::get('active');
        $artist->save();

        return Response::json(array(
            'error' => false,
            'message' => 'Artist created.'
        ), 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $artist = Artist::find($id);
        return Response::json($artist);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $artist = Artist::find($id);

        if (Input::has('name')) {
            $artist->name = Input::get('name');
        }

        if (Input::has('active')) {
            $artist->active = Input::get('active');
        }

        $artist->save();

        return Response::json(array(
            'error' => false,
            'message' => 'Artist updated.'
        ), 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $artist = Artist::find($id);
        $artist->delete();

        return Response::json(array(
            'error' => false,
            'message' => 'Artist deleted.'
        ));
    }


}
