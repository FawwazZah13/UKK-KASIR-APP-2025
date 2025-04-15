<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Produks;
use App\Models\Pembelians;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $jumlah_pembelian =  Pembelians::count();
        $user = Auth::user();
        $data = [];

        if ($user->role === 'petugas') {
            $data = [
                'dailyPembelians' => Pembelians::whereDate('created_at', Carbon::today())->count(),
                'lastUpdated' => Pembelians::whereDate('created_at', Carbon::today())->latest('updated_at')
                    ->first()?->updated_at?->format('d-m-Y H:i') ?? now()->format('d-m-Y H:i'),
            ];
        } 
        elseif ($user->role === 'admin') {
            $productSales = Produks::with('details')->get()->map(function ($product) {
                return [
                    'nama_produk' => $product->nama_produk,
                    'total_sold' => $product->details->sum('qty')
                ];
            });
        
            $data = [
                'salesData' => $this->getPembeliansData(),
                'productSales' => $productSales
            ];
        }
        
        
        else {
            $data = [
                'totalProducts' => Produks::count(),
                'totalPembelians' => Pembelians::count(),
                'totalUsers' => User::count(),
            ];
        }

        return view('dashboard', $data, compact('jumlah_pembelian'));
    }

    private function getPembeliansData()
    {
        return Pembelians::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->where('created_at', '>=', Carbon::today()->subDays(13))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(fn($item) => [
                'date' => Carbon::parse($item->date)->format('d-M-Y'),
                'total' => $item->total,
       ]);
}


}

