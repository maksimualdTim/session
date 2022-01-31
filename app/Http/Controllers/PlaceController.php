<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();
        return response($places);
        return view('places.list', ['places' => $places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'work' => 'required|boolean',
            'description' => 'required|string',
            'repair' => 'required'
        ]);
        $name = $request->input('name');
        $desc = $request->input('description');
        $work = $request->input('work');
        $repair = $request->input('repair');

        $place = new Place();
        $place->name = $name;
        $place->description = $desc;
        $place->repair = $repair;
        $place->work = $work;
        $place->save();

        return response($place);

        return redirect('/places');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::where('id', '=', $id)->first();

        $work = $place->work;
        $repair = Place::REPAIR[$place->repair];
        return response(['place' => $place, 'work' => $work, 'repair' => $repair]);
        return view('places.info', ['place' => $place, 'work' => $work, 'repair' => $repair]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = Place::where('id', '=', $id)->first();

        $work = $place->work;
        $repair = Place::REPAIR[$place->repair];

        return view('places.update', ['place' => $place, 'work' => $work, 'repair' => $repair]);
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
        $place = Place::where('id', '=', $id)->first();

        $place->name = $request->input('name') ?? $place->name;
        $place->repair = $request->input('repair') ?? $place->repair;
        $place->description = $request->input('description') ?? $place->description;
        $place->work = $request->input('work') ?? $place->work;

        $place->save();
        return response($place);
        return redirect('places');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::where('id', '=', $id)->delete();

        return response(['place' => $place, 'operation' => 'deleted']);
        return redirect('places');
    }
}
