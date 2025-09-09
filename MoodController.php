<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mood::where('user_id', Auth::id())->latest()->get();
        return view('mood.index', compact('data'));
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
            'feeling' => 'required',
            'description' => 'required|string',
        ]);

        Mood::create([
            'user_id' => Auth::id(),
            'feeling' => $request->feeling,
            'description' => $request->description,
        ]);

        return redirect()->route('mood.index')->with('success', 'Mood berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mood $mood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mood $mood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mood $mood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mood $mood)
    {
        //
    }
}
