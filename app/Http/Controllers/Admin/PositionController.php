<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $positions = Position::latest()->paginate(8);
         return view('admin.positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Position::create($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]));
        return redirect()->route('admin.positions.index')->with('success', __('messages.position_created'));
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
        $position = Position::findOrFail($id);
        return view('admin.positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $position = Position::findOrFail($id);
        $position->update($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]));
        return redirect()->route('admin.positions.index')->with('success', __('messages.position_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);
        if ($position->jobs()->count()){
            return response()->json([
                'status' => 'error',
                'message' => __('messages.Position_cannot_delete')
            ]);
        }
        $position->delete();
        return response()->json([
            'status' => 'success',
            'message' => __('messages.Position_deleted')
        ]);

    }
}
