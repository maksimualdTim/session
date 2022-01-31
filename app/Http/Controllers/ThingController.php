<?php

namespace App\Http\Controllers;

use App\Models\Thing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $things = Thing::all();

        return response($things);
        
        return view('things.list', ['things' => $things]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('things.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $desc = $request->input('description');
        $wrnt = $request->input('wrnt');
        $place = $request->input('place_id');

        $thing = new Thing();
        $thing->name = $name;
        $thing->description = $desc;
        $thing->wrnt = $wrnt;
        $thing->master = Auth::id();
        $thing->place_id = $place;
        $thing->save();

        return response($thing);

        return redirect('/things');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thing = Thing::where('id', '=', $id)->first();
        $owner = $thing->user;

        if($owner->id === Auth::id()){
            $owner = 'Вы';
        }else{
            $owner = $owner->name;
        }
        
        return response(['thing' => $thing, 'owner' => $owner, 'place' => $thing->place]);
        return view('things.info', ['thing' => $thing, 'owner' => $owner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $thing = Thing::where('id', '=', $id)->first();

        return view('things.update', ['thing' => $thing, 'users' => $users]);
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
        $thing = Thing::where('id', '=', $id)->first();

        $thing->name = $request->input('name') ?? $thing->name;
        $thing->wrnt = $request->input('wrnt') ?? $thing->wrnt;
        $thing->description = $request->input('description') ?? $thing->description;
        $thing->master = $request->input('master') ?? $thing->master;
        $thing->place_id = $request->input('place_id') ?? $thing->place_id;
        
        $thing->save();
        return response($thing);
        return redirect('things');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thing = Thing::where('id', '=', $id);

        return response(['thing' => $thing, 'operation' => 'deleted']);

        return redirect('things');
    }
}
