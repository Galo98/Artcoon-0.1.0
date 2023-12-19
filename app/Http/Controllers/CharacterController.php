<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role_id != 1) {
            abort(403);
        }

        $chars = Character::all();

        return view('character.showCharacter', [
            'chars' => $chars
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
        if (auth()->user()->role_id != 1) {
            abort(403);
        }
        $request->validate([
            'char_name' => 'required',
            'char_price' => 'required',
        ]);

        Character::create([
            'char_name'       => $request->get('char_name'),
            'char_price'      => $request->get('char_price')
        ]);

        return to_route('char.index')->with('status', __('Character created successfully!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $char)
    {
        if (auth()->user()->role_id != 1) {
            abort(403);
        }
        return view('character.editCharacter', [
            'char' => $char
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $char)
    {
        if (auth()->user()->role_id != 1) {
            abort(403);
        }
        $validated = $request->validate([
            'char_name' => 'required',
            'char_price' => ['required', 'min:1', 'max:4'],
        ]);

        $char->update($validated);

        return to_route('char.index')->with('status', __('Character edited successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $char)
    {   
        try {
            $this->authorize('delete', $char);
            $char->delete();
            return to_route('char.index')->with('status', __('Character deleted successfully!'));
        } catch (QueryException $e) {
            return to_route('char.index')->with('error', __('Error deleting, character in use!'));
        }
    }
}
