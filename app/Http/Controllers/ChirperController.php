<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::with('user')
            ->latest(50)
            ->get();

        return view('home', compact('chirps'));
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
        $request->validate([
            'message' => 'required|string|max:255',
        ],
        [
            'message.required' => 'Please tulis apa aja, jan dikosongin!',
            'message.max' => 'Hampura euy, tong leuwih teuing ti 255 karakter.',
        ]);

        auth()->user()->chirps()->create([$request->all()]);

        return redirect('/')->with('success', 'Chirp maneh geus disebar.');
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
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        return view('chirper.edit', compact('chirp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'Please tulis apa aja, jan dikosongin!',
            'message.max' => 'Curhat naonsih meni loba loba teuing'
            ]
        );
        $chirp->update([
            'message' => $request->message,
        ]);


        return redirect('/')->with('success', 'Curhatan maneh geus diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);
        $chirp->delete();
        return redirect('/')->with('success', 'Curhatan maneh geus dihapus.');
    }
}
