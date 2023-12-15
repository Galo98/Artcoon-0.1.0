<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        /* $this->authorize('viewAny'); */

        $type = Type::all();

        return view('type.showType', [
            'types' => $type
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /* $this->authorize('viewAny'); */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* $this->authorize('viewAny'); */

        $request->validate([
            'type_name' => 'required',
            'type_price' => 'required',
        ]);

        Type::create([
            'type_name'       => $request->get('type_name'),
            'type_price'      => $request->get('type_price')
        ]);

        return to_route('type.index')->with('status', __('Type created successfully!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        /* $this->authorize('viewAny'); */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        /* $this->authorize('viewAny'); */

        return view('type.editType', [
            'type' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        /* $this->authorize('update', $type); */

        $validated = $request->validate([
            'type_name' => 'required',
            'type_price' => ['required', 'min:1', 'max:4'],
        ]);

        $type->update($validated);

        return to_route('type.index')->with('status',
            __('Type edited successfully!')
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        /* $this->authorize('delete', $type); */
        try {
            $this->authorize('delete', $type);
            $type->delete();
            return to_route('type.index')->with('status', __('Type deleted successfully!'));
        } catch (QueryException $e) {
            return to_route('type.index')->with('error', __('Error deleting, type in use!'));
        }
    }
}
