<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Models\Background;
use App\Models\Character;
use App\Models\Size;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function list()
    {

        $allOrders = Order::where('order_pay', 1)
            ->whereNotIn('state_id', [3, 4])
            ->orderBy('updated_at', 'asc')
            ->get();


        return view('dashboard', [
            'orders' => $allOrders
        ]);
    }

    public function index()
    {
        if (auth()->user()->role_id === 2) {

            $allOrders = Order::with('type', 'size', 'background', 'character', 'state')->where('user_id', Auth::id())->whereNotIn('state_id', [4])->get();

            return view('order.showOrders', [
                'orders' => $allOrders,
                'role' => auth()->user()->role_id
            ]);
        } elseif (auth()->user()->role_id === 1) {
            $allOrders = Order::with('type', 'size', 'background', 'character', 'state')->whereNotIn('state_id', [4])->get();

            return view('order.showOrders', [
                'orders' => $allOrders,
                'role' => auth()->user()->role_id
            ]);
        }
    }


    public function create()
    {
        if (auth()->user()->role_id != 2) {
            abort(403);
        }
        $types = Type::all();
        $sizes = Size::all();
        $chars = Character::all();
        $bkgs = Background::all();

        return view('order.makeOrder', [
            'types' => $types,
            'sizes' => $sizes,
            'chars' => $chars,
            'bkgs'  => $bkgs
        ]);
    }

    public function confirm(Request $request)
    {
        if (auth()->user()->role_id != 2) {
            abort(403);
        }
        $request->validate([
            'type' => 'required',
            'size' => 'required',
            'characters' => 'required',
            'background' => 'required',
        ]);

        $typeDesc = Type::select('type_name', 'type_price')->find($request->get('type'));
        /* $typeDesc = Type::all(); */
        $sizeDesc = Size::select('size_name', 'size_price')->find($request->get('size'));
        $charDesc = Character::select('char_name', 'char_price')->find($request->get('characters'));
        $backDesc = Background::select('bkg_name', 'bkg_price')->find($request->get('background'));

        $total = Background::where('id', $request->get('background'))->value('bkg_price')
            + Character::where('id', $request->get('characters'))->value('char_price')
            + Size::where('id', $request->get('size'))->value('size_price')
            + Type::where('id', $request->get('type'))->value('type_price');


        return view('order.confirmOrder', [
            'typeDesc' => $typeDesc,
            'sizeDesc' => $sizeDesc,
            'charDesc' => $charDesc,
            'backDesc' => $backDesc,
            'total' => $total,
        ]);
    }


    public function store(Request $request)
    {
        if (auth()->user()->role_id != 2) {
            abort(403);
        }
        $request->validate([
            'type' => 'required',
            'size' => 'required',
            'characters' => 'required',
            'background' => 'required',
        ]);

        $orderPublic = $request->get('pub') ?? 'false';

        if ($orderPublic === 'on') {
            $orderPublic = true;
        } else {
            $orderPublic = false;
        }

        Order::create([
            'order_totPrice' => $request->get('total'),
            'order_link'     => 'https://paypal.me/mdaisteach?country.x=AR&locale.x=es_XC',
            'order_public'   => $orderPublic,
            'user_id'        => auth()->id(),
            'type_id'        => $request->get('type'),
            'size_id'        => $request->get('size'),
            'character_id'   => $request->get('characters'),
            'bkg_id'         => $request->get('background'),
            'state_id'       => '2'
        ]);

        // session()->flash('status','Order created successfully!');
        // esto es lo mismo que hacerlo con ->with() en el to_route

        return to_route('order.makeOrder')->with('status', __('Order created successfully!'));
    }


    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $ord)
    {

        if (auth()->user()->role_id != 1) {
            abort(403);
        }


        return view('order.editOrder', [
            'order' => $ord
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $ord)
    {
        if (auth()->user()->role_id != 1) {
            abort(403);
        }

        $validated = $request->validate([
            'state_id' => 'required',
            'order_pay' => 'required'
        ]);

        if ($request->state_id == 3) {
            $ord->update([
                'state_id' => $validated['state_id'],
                'order_pay' => $validated['order_pay'],
                'order_delivery' => now()
            ]);
        } else {
            $ord->update($validated);
        }

        return to_route('order.showOrders')->with('status', __('Order edited successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cancelar(Order $ord)
    {

        Order::where('id', $ord->id)->update(['state_id' => 4]);
        return to_route('order.showOrders')->with('status', __('Order canceled successfully!'));
    }
}
