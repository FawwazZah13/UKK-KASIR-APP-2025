<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\{
    FromCollection,
    WithHeadings,
    WithStyles,
    ShouldAutoSize,
    WithMapping
};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\Pembelians;
use Carbon\Carbon;

class PembelianExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithMapping
{
    protected $filter;
    protected $tanggal;

    public function __construct($filter = null, $tanggal = null)
    {
        $this->filter = $filter;
        $this->tanggal = $tanggal;
    }

    public function collection()
    {
        $query = Pembelians::with(['customer', 'details.produk']);

        if ($this->filter === 'hari') {
            $query->whereDate('tanggal_pembelian', Carbon::today());
        } elseif ($this->filter === 'bulan') {
            $query->whereMonth('tanggal_pembelian', Carbon::now()->month);
        } elseif ($this->filter === 'tahun') {
            $query->whereYear('tanggal_pembelian', Carbon::now()->year);
        }

        if (!empty($this->tanggal)) {
            $query->whereDate('tanggal_pembelian', $this->tanggal);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Nama Pelanggan',
            'Nomor Telpon',
            'Poin',
            'Produk',
            'Total Harga',
            'Total Bayar',
            'Total Diskon Poin',
            'Total Kembalian',
            'Tanggal',
        ];
    }

    public function map($row): array
    {
        $produkList = $row->details->map(function ($item) {
            $nama = $item->produk->nama_produk ?? '-';
            $qty = $item->qty ?? 0;
            $harga = number_format($item->produk->harga ?? 0, 0, ',', '.');
            return "$nama (x$qty) - Rp$harga";
        })->implode(', ');

        return [
            $row->customer->name ?? '-',
            $row->customer->no_tlp ?? '-',
            $row->poin ?? '-',
            $produkList,
            'Rp ' . number_format($row->total_harga, 0, ',', '.'),
            'Rp ' . number_format($row->total_bayar, 0, ',', '.'),
            'Rp ' . number_format($row->total_harga, 0, ',', '.'),
            'Rp ' . number_format($row->total_kembalian, 0, ',', '.'),
            $row->created_at->format('d-m-Y'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true], 'alignment' => ['horizontal' => 'center']],
        ];
    }
}
