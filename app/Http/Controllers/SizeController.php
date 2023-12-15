<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $this->authorize('viewAny'); */

        $sizes = Size::all();

        return view('size.showSize', [
            'sizes' => $sizes
        ]);
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
            'size_name' => 'required',
            'size_price' => 'required',
        ]);

        Size::create([
            'size_name'  => $request->get('size_name'),
            'size_price' => $request->get('size_price')
        ]);

        return to_route('size.index')->with('status', __('Size created successfully!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('size.editSize', [
            'size' => $size
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $validated = $request->validate([
            'size_name' => 'required',
            'size_price' => ['required', 'min:1', 'max:4'],
        ]);

        $size->update($validated);

        return to_route('size.index')->with('status', __('Size edited successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        try {
            $this->authorize('delete', $size);
            $size->delete();
            return to_route('size.index')->with('status', __('Size deleted successfully!'));
        } catch (QueryException $e) {
            return to_route('size.index')->with('error', __('Error deleting, size in use!'));
        }
    
    }
}
