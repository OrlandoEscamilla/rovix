<?php

namespace App\Http\Controllers;

use App\Star;
use Illuminate\Http\Request;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('checkAuth');
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $resource = $request->resource;
        $user = $request->session()->get('usuario_id');

        $starred = Star::where([
            ['resource_id', '=', $resource],
            ['user_id', '=', $user]
        ])->get();

        if (count($starred) == 0) {
            $star = new Star;
            $star->resource_id = $resource;
            $star->user_id = $user;
            $star->save();

            return back()->with('success', 'Thanks for your fav!');
        } else {
            return back()->with('error', 'You already fav this.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Star $star
     * @return \Illuminate\Http\Response
     */
    public function show(Star $star)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Star $star
     * @return \Illuminate\Http\Response
     */
    public function edit(Star $star)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Star $star
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Star $star)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Star $star
     * @return \Illuminate\Http\Response
     */
    public function destroy(Star $star)
    {
        dd($star);
        Star::destroy($star);
    }

    public function favHandler(Request $request)
    {
        $id_recurso = $request->id;
        $id_usuario = $request->session()->get('usuario_id');

        $starred = Star::where([
            ['resource_id', '=', $id_recurso],
            ['user_id', '=', $id_usuario]
        ])->get();

        if (count($starred) == 0) {
            $star = new Star;
            $star->resource_id = $id_recurso;
            $star->user_id = $id_usuario;
            $star->save();

            /** Trying to make a chainable update to resources */
            $resource = $star->resource;
            $resource->updated_at = date("Y-m-d H:i:s");
            $resource->save();


            return response()->json([
                'status' => 'success',
                'message' => 'You starred this!'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'You already starred this!'
            ]);
        }
    }
}
