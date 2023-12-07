<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Background;
use App\Models\Character;
use App\Models\Size;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        
    }


    public function create()
    {
        return view('order.makeOrder');
    }

    public function confirm(Request $request)
    {   
        $request->validate([
            'type' => 'required',
            'size' => 'required',
            'characters' => 'required',
            'background' => 'required',
        ]);

        $typeDesc = Type::select('type_name','type_price')->find($request->get('type'));
        /* $typeDesc = Type::all(); */
        $sizeDesc = Size::select('size_name','size_price')->find($request->get('size'));
        $charDesc = Character::select('char_name','char_price')->find($request->get('characters'));
        $backDesc = Background::select('bkg_name','bkg_price')->find($request->get('background'));

        $total = Background::where('id', $request->get('background'))->value('bkg_price')
        + Character::where('id', $request->get('characters'))->value('char_price')
        + Size::where('id', $request->get('size'))->value('size_price')
        + Type::where('id', $request->get('type'))->value('type_price');


        return view('order.confirmOrder',[
            'typeDesc' => $typeDesc,
            'sizeDesc' => $sizeDesc,
            'charDesc' => $charDesc,
            'backDesc' => $backDesc,
            'total' => $total,
        ]);
    }


    public function store(Request $request)
    {
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
            'order_link'     => 'paypal.com',
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
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
