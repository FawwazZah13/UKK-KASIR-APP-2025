<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Pembelians;

class PembelianExport
{
    public function export()
    {
        // Ambil data pembelian beserta relasi customer dan detail produk
        $pembelian = Pembelians::with(['customer', 'details.produk'])->get();

        // Buat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set Heading pada baris pertama
        $sheet->setCellValue('A1', 'Nama Pelanggan');
        $sheet->setCellValue('B1', 'Nomor Telpon');
        $sheet->setCellValue('C1', 'Poin');
        $sheet->setCellValue('D1', 'Produk');
        $sheet->setCellValue('E1', 'Total Harga');
        $sheet->setCellValue('F1', 'Total Bayar');
        $sheet->setCellValue('G1', 'Total Diskon Poin');
        $sheet->setCellValue('H1', 'Total Kembalian');
        $sheet->setCellValue('I1', 'Tanggal');

        // Mengisi data pembelian
        $rowNum = 2; // Mulai dari baris kedua untuk data
        foreach ($pembelian as $row) {
            // Mapped products and their quantities
            $produkList = $row->details->map(function ($item) {
                $nama = $item->produk->nama_produk ?? '-';
                $qty = $item->qty ?? 0;
                $harga = number_format($item->produk->harga ?? 0, 0, ',', '.');
                return "$nama (x$qty) - Rp$harga";
            })->implode(', ');

            // Assuming total_diskon_poin is a field in the Pembelians model
            $totalDiskonPoin = $row->total_diskon_poin ?? 0;

            // Set data ke spreadsheet
            $sheet->setCellValue('A' . $rowNum, $row->customer->name ?? '-');
            $sheet->setCellValue('B' . $rowNum, $row->customer->no_tlp ?? '-');
            $sheet->setCellValue('C' . $rowNum, $row->customer->poin ?? '-');
            $sheet->setCellValue('D' . $rowNum, $produkList);
            $sheet->setCellValue('E' . $rowNum, 'Rp ' . number_format($row->total_harga, 0, ',', '.'));
            $sheet->setCellValue('F' . $rowNum, 'Rp ' . number_format($row->total_bayar, 0, ',', '.'));
            $sheet->setCellValue('G' . $rowNum, 'Rp ' . number_format($totalDiskonPoin, 0, ',', '.'));
            $sheet->setCellValue('H' . $rowNum, 'Rp ' . number_format($row->total_kembalian, 0, ',', '.'));
            $sheet->setCellValue('I' . $rowNum, $row->created_at->format('d-m-Y'));

            $rowNum++;
        }

        // Buat writer untuk mengubah spreadsheet menjadi file Excel
        $writer = new Xlsx($spreadsheet);

        // Set header untuk download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pembelian.xlsx"');
        header('Cache-Control: max-age=0');

        // Output file Excel
        $writer->save('php://output');
    }
}
