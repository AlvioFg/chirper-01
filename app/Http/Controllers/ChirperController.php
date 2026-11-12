<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChirperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = [
            [
                'author' => 'James Reynold',
                'message' => 'hay hay hayyyy',
                'time' => '5 minutes ago'
            ],
            [
                'author' => 'James Madison',
                'message' => 'hay hay hayyyy',
                'time' => '5 years ago'
            ],
            [
                'author' => 'James Lamp',
                'message' => 'hay hay',
                'time' => '67 years ago']

        ];
        return view('home', ['chirps' => $chirps]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
