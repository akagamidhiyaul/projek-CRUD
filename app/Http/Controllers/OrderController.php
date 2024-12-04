<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Barang;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Order::with('user'); 

        if ($request->has('search')) {
            $tanggalFilter = Carbon::parse($request->search)->toDateString();
            $query->whereDate('created_at', $tanggalFilter);
        }

        $orders = $query->simplePaginate(5);

        return view("order.index", compact("orders"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        return view("order.create", compact("barang"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_customer' => 'required',
            'barang' => 'required',
        ]);

        $arrayDistinct = array_count_values($request->barang);
        $arrayAssocMedicines = [];
 
        foreach ($arrayDistinct as $id => $count){
            $barang = Barang::where('id', $id)->first();
            $subHarga = $barang['harga'] * $count;
            $arrayItem = [
                "id" => $id,
                "name" => $barang['name'],
                "qty" => $count,
                "harga" => $barang['harga'],
                "sub_harga" => $subHarga,
            ];
            
            array_push($arrayAssocMedicines, $arrayItem);
        }

        $totalPrice = 0;

        foreach ($arrayAssocMedicines as $item){
            $totalPrice += (int)$item['sub_harga'];
        }

        $priceWithPPN = $totalPrice + ($totalPrice * 0.01);
        $proses = Order::create([
            'user_id' => Auth::user()->id,
            'barang' => $arrayAssocMedicines,
            'name_customer' => $request->name,
            'total_harga' => $priceWithPPN,
        ]);

        if ($proses) {
            $order = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->first();
            return redirect()->route('orders.print', $order['id']);
        }else{
            return redirect()->back()->with('failed', 'Gagal membuat data pembelian. Silahkan coba kembali dengan data yang sesuai!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        
    }
}
