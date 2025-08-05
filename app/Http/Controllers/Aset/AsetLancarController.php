<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\AsetLancar;
use App\Models\RekeningUraian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class AsetLancarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AsetLancar::with('rekeningUraian');

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_kegiatan', 'like', "%{$search}%")
                    ->orWhere('uraian_kegiatan', 'like', "%{$search}%")
                    ->orWhere('uraian_jenis_barang', 'like', "%{$search}%")
                    ->orWhereHas('rekeningUraian', function ($q) use ($search) {
                        $q->where('kode_rekening', 'like', "%{$search}%")
                            ->orWhere('uraian', 'like', "%{$search}%");
                    });
            });
        }

        // Filter by rekening_uraian_id
        if ($request->has('rekening_uraian_id') && !empty($request->rekening_uraian_id)) {
            $query->where('rekening_uraian_id', $request->rekening_uraian_id);
        }

        // Filter by nama_kegiatan
        if ($request->has('nama_kegiatan') && !empty($request->nama_kegiatan)) {
            $query->where('nama_kegiatan', 'like', "%{$request->nama_kegiatan}%");
        }

        // Filter by uraian_jenis_barang
        if ($request->has('uraian_jenis_barang') && !empty($request->uraian_jenis_barang)) {
            $query->where('uraian_jenis_barang', 'like', "%{$request->uraian_jenis_barang}%");
        }

        // Filter by saldo_awal range
        if ($request->has('saldo_awal_min') && !empty($request->saldo_awal_min)) {
            $query->where('saldo_awal_total', '>=', $request->saldo_awal_min);
        }
        if ($request->has('saldo_awal_max') && !empty($request->saldo_awal_max)) {
            $query->where('saldo_awal_total', '<=', $request->saldo_awal_max);
        }

        // Filter by mutasi_tambah range
        if ($request->has('mutasi_tambah_min') && !empty($request->mutasi_tambah_min)) {
            $query->where('mutasi_tambah_nilai_total', '>=', $request->mutasi_tambah_min);
        }
        if ($request->has('mutasi_tambah_max') && !empty($request->mutasi_tambah_max)) {
            $query->where('mutasi_tambah_nilai_total', '<=', $request->mutasi_tambah_max);
        }

        // Filter by saldo_akhir range
        if ($request->has('saldo_akhir_min') && !empty($request->saldo_akhir_min)) {
            $query->where('saldo_akhir_total', '>=', $request->saldo_akhir_min);
        }
        if ($request->has('saldo_akhir_max') && !empty($request->saldo_akhir_max)) {
            $query->where('saldo_akhir_total', '<=', $request->saldo_akhir_max);
        }

        // Filter by date range
        if ($request->has('date_from') && !empty($request->date_from)) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->has('date_to') && !empty($request->date_to)) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $rekeningUraians = RekeningUraian::orderBy('kode_rekening')->get();
        $asetLancars = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('asets.asetlancar.index', compact('asetLancars', 'rekeningUraians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rekeningUraians = RekeningUraian::orderBy('kode_rekening')->get();
        return view('asets.asetlancar.create', compact('rekeningUraians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ganti validation rules di method store() dan update()
        $request->validate([
            'rekening_uraian_id' => 'required|exists:rekening_uraians,id',
            'nama_kegiatan' => 'nullable|string|max:255',
            'uraian_kegiatan' => 'nullable|string',
            'uraian_jenis_barang' => 'nullable|string',
            'saldo_awal_unit' => 'nullable|integer|min:0',
            'saldo_awal_harga_satuan' => 'nullable|numeric|min:0',
            'mutasi_tambah_unit' => 'nullable|integer|min:0',
            'mutasi_tambah_harga_satuan' => 'nullable|numeric|min:0',
            'mutasi_kurang_unit' => 'nullable|integer|min:0',
            'mutasi_kurang_nilai_total' => 'nullable|numeric|min:0',
        ], [
            'rekening_uraian_id.required' => 'Rekening uraian harus dipilih.',
            'nama_kegiatan.required' => 'Nama kegiatan harus diisi.',
            'saldo_awal_unit.min' => 'Unit saldo awal tidak boleh negatif.',
            'saldo_awal_harga_satuan.min' => 'Harga satuan saldo awal tidak boleh negatif.',
            'mutasi_tambah_unit.min' => 'Unit mutasi tambah tidak boleh negatif.',
            'mutasi_tambah_harga_satuan.min' => 'Harga satuan mutasi tambah tidak boleh negatif.',
            'mutasi_kurang_unit.min' => 'Unit mutasi kurang tidak boleh negatif.',
            'mutasi_kurang_nilai_total.min' => 'Nilai total mutasi kurang tidak boleh negatif.',
        ]);

        // Tambahkan custom validation setelah validate()
        $saldoAwalUnit = $request->saldo_awal_unit ?? 0;
        $saldoAwalHargaSatuan = $request->saldo_awal_harga_satuan ?? 0;
        $mutasiTambahUnit = $request->mutasi_tambah_unit ?? 0;
        $mutasiTambahHargaSatuan = $request->mutasi_tambah_harga_satuan ?? 0;

        // Validasi: harus ada harga satuan
        if ($saldoAwalHargaSatuan == 0 && $mutasiTambahHargaSatuan == 0) {
            return back()->withErrors(['harga_satuan' => 'Harga satuan harus diisi, baik di Saldo Awal atau Mutasi Tambah.'])->withInput();
        }

        // Validasi: jika ada unit saldo awal, harus ada harga satuan saldo awal
        if ($saldoAwalUnit > 0 && $saldoAwalHargaSatuan == 0) {
            return back()->withErrors(['saldo_awal_harga_satuan' => 'Jika ada unit saldo awal, harga satuan saldo awal harus diisi.'])->withInput();
        }

        // Validasi: jika ada unit mutasi tambah, harus ada harga satuan mutasi tambah
        if ($mutasiTambahUnit > 0 && $mutasiTambahHargaSatuan == 0) {
            return back()->withErrors(['mutasi_tambah_harga_satuan' => 'Jika ada unit mutasi tambah, harga satuan mutasi tambah harus diisi.'])->withInput();
        }

        $data = $request->all();

        // Perhitungan otomatis
        $data = $this->calculateValues($data);

        AsetLancar::create($data);

        return redirect()->route('aset-lancars.index')
            ->with('success', 'Data aset lancar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AsetLancar $asetLancar)
    {
        $asetLancar->load('rekeningUraian');
        return view('asets.asetlancar.show', compact('asetLancar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AsetLancar $asetLancar)
    {
        $rekeningUraians = RekeningUraian::orderBy('kode_rekening')->get();
        return view('asets.asetlancar.edit', compact('asetLancar', 'rekeningUraians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AsetLancar $asetLancar)
    {
        // Ganti validation rules di method store() dan update()
        $request->validate([
            'rekening_uraian_id' => 'required|exists:rekening_uraians,id',
            'nama_kegiatan' => 'nullable|string|max:255',
            'uraian_kegiatan' => 'nullable|string',
            'uraian_jenis_barang' => 'nullable|string',
            'saldo_awal_unit' => 'nullable|integer|min:0',
            'saldo_awal_harga_satuan' => 'nullable|numeric|min:0',
            'mutasi_tambah_unit' => 'nullable|integer|min:0',
            'mutasi_tambah_harga_satuan' => 'nullable|numeric|min:0',
            'mutasi_kurang_unit' => 'nullable|integer|min:0',
            'mutasi_kurang_nilai_total' => 'nullable|numeric|min:0',
        ], [
            'rekening_uraian_id.required' => 'Rekening uraian harus dipilih.',
            'nama_kegiatan.required' => 'Nama kegiatan harus diisi.',
            'saldo_awal_unit.min' => 'Unit saldo awal tidak boleh negatif.',
            'saldo_awal_harga_satuan.min' => 'Harga satuan saldo awal tidak boleh negatif.',
            'mutasi_tambah_unit.min' => 'Unit mutasi tambah tidak boleh negatif.',
            'mutasi_tambah_harga_satuan.min' => 'Harga satuan mutasi tambah tidak boleh negatif.',
            'mutasi_kurang_unit.min' => 'Unit mutasi kurang tidak boleh negatif.',
            'mutasi_kurang_nilai_total.min' => 'Nilai total mutasi kurang tidak boleh negatif.',
        ]);

        // Tambahkan custom validation setelah validate()
        $saldoAwalUnit = $request->saldo_awal_unit ?? 0;
        $saldoAwalHargaSatuan = $request->saldo_awal_harga_satuan ?? 0;
        $mutasiTambahUnit = $request->mutasi_tambah_unit ?? 0;
        $mutasiTambahHargaSatuan = $request->mutasi_tambah_harga_satuan ?? 0;

        // Validasi: harus ada harga satuan
        if ($saldoAwalHargaSatuan == 0 && $mutasiTambahHargaSatuan == 0) {
            return back()->withErrors(['harga_satuan' => 'Harga satuan harus diisi, baik di Saldo Awal atau Mutasi Tambah.'])->withInput();
        }

        // Validasi: jika ada unit saldo awal, harus ada harga satuan saldo awal
        if ($saldoAwalUnit > 0 && $saldoAwalHargaSatuan == 0) {
            return back()->withErrors(['saldo_awal_harga_satuan' => 'Jika ada unit saldo awal, harga satuan saldo awal harus diisi.'])->withInput();
        }

        // Validasi: jika ada unit mutasi tambah, harus ada harga satuan mutasi tambah
        if ($mutasiTambahUnit > 0 && $mutasiTambahHargaSatuan == 0) {
            return back()->withErrors(['mutasi_tambah_harga_satuan' => 'Jika ada unit mutasi tambah, harga satuan mutasi tambah harus diisi.'])->withInput();
        }

        $data = $request->all();

        // Perhitungan otomatis
        $data = $this->calculateValues($data);

        $asetLancar->update($data);

        return redirect()->route('aset-lancars.index')
            ->with('success', 'Data aset lancar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsetLancar $asetLancar)
    {
        $asetLancar->delete();

        return redirect()->route('aset-lancars.index')
            ->with('success', 'Data aset lancar berhasil dihapus.');
    }

    /**
     * Calculate automatic values
     */
    private function calculateValues($data)
    {
        // Set default values if null
        $data['saldo_awal_unit'] = $data['saldo_awal_unit'] ?? 0;
        $data['saldo_awal_harga_satuan'] = $data['saldo_awal_harga_satuan'] ?? 0;
        $data['mutasi_tambah_unit'] = $data['mutasi_tambah_unit'] ?? 0;
        $data['mutasi_tambah_harga_satuan'] = $data['mutasi_tambah_harga_satuan'] ?? 0;
        $data['mutasi_kurang_unit'] = $data['mutasi_kurang_unit'] ?? 0;
        $data['mutasi_kurang_nilai_total'] = $data['mutasi_kurang_nilai_total'] ?? 0;

        // Perhitungan saldo_awal_total
        $data['saldo_awal_total'] = $data['saldo_awal_unit'] * $data['saldo_awal_harga_satuan'];

        // Perhitungan mutasi_tambah_nilai_total
        $data['mutasi_tambah_nilai_total'] = $data['mutasi_tambah_unit'] * $data['mutasi_tambah_harga_satuan'];

        // Perhitungan saldo_akhir_unit
        $data['saldo_akhir_unit'] = $data['saldo_awal_unit'] + $data['mutasi_tambah_unit'] - $data['mutasi_kurang_unit'];

        // Tentukan harga satuan yang digunakan untuk saldo akhir
        $harga_satuan_untuk_saldo_akhir = 0;
        if ($data['saldo_awal_harga_satuan'] > 0) {
            // Jika ada saldo awal, gunakan harga satuan saldo awal
            $harga_satuan_untuk_saldo_akhir = $data['saldo_awal_harga_satuan'];
        } elseif ($data['mutasi_tambah_harga_satuan'] > 0) {
            // Jika tidak ada saldo awal tapi ada mutasi tambah, gunakan harga satuan mutasi tambah
            $harga_satuan_untuk_saldo_akhir = $data['mutasi_tambah_harga_satuan'];
        }

        // Perhitungan saldo_akhir_total
        if ($data['saldo_akhir_unit'] > 0 && $harga_satuan_untuk_saldo_akhir > 0) {
            $data['saldo_akhir_total'] = $data['saldo_akhir_unit'] * $harga_satuan_untuk_saldo_akhir;
        } else {
            $data['saldo_akhir_total'] = 0;
        }

        // Auto-fill mutasi kurang nilai total jika ada unit kurang tapi nilai kosong
        if ($data['mutasi_kurang_unit'] > 0 && $data['mutasi_kurang_nilai_total'] == 0) {
            $data['mutasi_kurang_nilai_total'] = $data['mutasi_kurang_unit'] * $harga_satuan_untuk_saldo_akhir;
        }

        return $data;
    }

    /**
     * Export to Excel
     */
    public function export(Request $request)
    {
        $query = AsetLancar::with('rekeningUraian');

        // Apply search filter if exists
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_kegiatan', 'like', "%{$search}%")
                    ->orWhere('uraian_kegiatan', 'like', "%{$search}%")
                    ->orWhere('uraian_jenis_barang', 'like', "%{$search}%")
                    ->orWhereHas('rekeningUraian', function ($q) use ($search) {
                        $q->where('kode_rekening', 'like', "%{$search}%")
                            ->orWhere('uraian', 'like', "%{$search}%");
                    });
            });
        }

        // Apply the same filters as index method
        if ($request->has('rekening_uraian_id') && !empty($request->rekening_uraian_id)) {
            $query->where('rekening_uraian_id', $request->rekening_uraian_id);
        }
        if ($request->has('nama_kegiatan') && !empty($request->nama_kegiatan)) {
            $query->where('nama_kegiatan', 'like', "%{$request->nama_kegiatan}%");
        }
        if ($request->has('uraian_jenis_barang') && !empty($request->uraian_jenis_barang)) {
            $query->where('uraian_jenis_barang', 'like', "%{$request->uraian_jenis_barang}%");
        }
        if ($request->has('saldo_awal_min') && !empty($request->saldo_awal_min)) {
            $query->where('saldo_awal_total', '>=', $request->saldo_awal_min);
        }
        if ($request->has('saldo_awal_max') && !empty($request->saldo_awal_max)) {
            $query->where('saldo_awal_total', '<=', $request->saldo_awal_max);
        }
        if ($request->has('mutasi_tambah_min') && !empty($request->mutasi_tambah_min)) {
            $query->where('mutasi_tambah_nilai_total', '>=', $request->mutasi_tambah_min);
        }
        if ($request->has('mutasi_tambah_max') && !empty($request->mutasi_tambah_max)) {
            $query->where('mutasi_tambah_nilai_total', '<=', $request->mutasi_tambah_max);
        }
        if ($request->has('saldo_akhir_min') && !empty($request->saldo_akhir_min)) {
            $query->where('saldo_akhir_total', '>=', $request->saldo_akhir_min);
        }
        if ($request->has('saldo_akhir_max') && !empty($request->saldo_akhir_max)) {
            $query->where('saldo_akhir_total', '<=', $request->saldo_akhir_max);
        }
        if ($request->has('date_from') && !empty($request->date_from)) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->has('date_to') && !empty($request->date_to)) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $asetLancars = $query->orderBy('created_at', 'desc')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set title
        $sheet->setCellValue('A1', 'LAPORAN ASET LANCAR');
        $sheet->mergeCells('A1:P1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Set date
        $sheet->setCellValue('A2', 'Tanggal: ' . date('d F Y'));
        $sheet->mergeCells('A2:P2');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Create main headers (row 4)
        $sheet->setCellValue('A4', 'No');
        $sheet->setCellValue('B4', 'Kode Rekening');
        $sheet->setCellValue('C4', 'Uraian Rekening');
        $sheet->setCellValue('D4', 'Nama Kegiatan');
        $sheet->setCellValue('E4', 'Jenis Barang');
        $sheet->setCellValue('F4', 'Saldo Awal');
        $sheet->setCellValue('I4', 'Mutasi');
        $sheet->setCellValue('L4', 'Saldo Akhir');

        // Merge main header cells
        $sheet->mergeCells('A4:A5');
        $sheet->mergeCells('B4:B5');
        $sheet->mergeCells('C4:C5');
        $sheet->mergeCells('D4:D5');
        $sheet->mergeCells('E4:E5');
        $sheet->mergeCells('F4:H4'); // Saldo Awal
        $sheet->mergeCells('I4:K4'); // Mutasi
        $sheet->mergeCells('L4:N4'); // Saldo Akhir

        // Create sub headers (row 5)
        $sheet->setCellValue('F5', 'Unit Barang');
        $sheet->setCellValue('G5', 'Harga Satuan');
        $sheet->setCellValue('H5', 'Nilai Total');
        $sheet->setCellValue('I5', 'Tambah');
        $sheet->setCellValue('J5', 'Kurang');
        $sheet->setCellValue('K5', 'Nilai Total');
        $sheet->setCellValue('L5', 'Unit Barang');
        $sheet->setCellValue('M5', 'Nilai Total');

        // Style headers
        $headerRange = 'A4:M5';
        $sheet->getStyle($headerRange)->getFont()->setBold(true);
        $sheet->getStyle($headerRange)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle($headerRange)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle($headerRange)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Set background colors for sections
        $sheet->getStyle('F4:H5')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFE3F2FD');
        $sheet->getStyle('I4:K5')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFE8F5E8');
        $sheet->getStyle('L4:M5')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFF3E0');

        // Fill data starting from row 6
        $row = 6;
        $totalSaldoAwal = 0;
        $totalMutasi = 0;
        $totalSaldoAkhir = 0;

        foreach ($asetLancars as $index => $aset) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $aset->rekeningUraian->kode_rekening);
            $sheet->setCellValue('C' . $row, $aset->rekeningUraian->uraian);
            $sheet->setCellValue('D' . $row, $aset->nama_kegiatan);
            $sheet->setCellValue('E' . $row, $aset->uraian_jenis_barang);

            // Saldo Awal
            $sheet->setCellValue('F' . $row, $aset->saldo_awal_unit);
            $sheet->setCellValue('G' . $row, $aset->saldo_awal_harga_satuan);
            $sheet->setCellValue('H' . $row, $aset->saldo_awal_total);

            // Mutasi
            $mutasiTambah = $aset->mutasi_tambah_unit > 0 ? '+' . $aset->mutasi_tambah_unit : '-';
            $mutasiKurang = $aset->mutasi_kurang_unit > 0 ? '-' . $aset->mutasi_kurang_unit : '-';
            $mutasiTotal = $aset->mutasi_tambah_nilai_total - $aset->mutasi_kurang_nilai_total;

            $sheet->setCellValue('I' . $row, $mutasiTambah);
            $sheet->setCellValue('J' . $row, $mutasiKurang);
            $sheet->setCellValue('K' . $row, $mutasiTotal);

            // Saldo Akhir
            $sheet->setCellValue('L' . $row, $aset->saldo_akhir_unit);
            $sheet->setCellValue('M' . $row, $aset->saldo_akhir_total);

            // Apply borders to data rows
            $sheet->getStyle('A' . $row . ':M' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            // Apply background colors for sections
            $sheet->getStyle('F' . $row . ':H' . $row)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFF8FDFF');
            $sheet->getStyle('I' . $row . ':K' . $row)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFF8FFF8');
            $sheet->getStyle('L' . $row . ':M' . $row)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFFBF0');

            // Calculate totals
            $totalSaldoAwal += $aset->saldo_awal_total;
            $totalMutasi += $mutasiTotal;
            $totalSaldoAkhir += $aset->saldo_akhir_total;

            $row++;
        }

        // Add total row
        $sheet->setCellValue('A' . $row, 'TOTAL');
        $sheet->mergeCells('A' . $row . ':G' . $row);
        $sheet->setCellValue('H' . $row, $totalSaldoAwal);
        $sheet->setCellValue('K' . $row, $totalMutasi);
        $sheet->setCellValue('M' . $row, $totalSaldoAkhir);

        // Style total row
        $sheet->getStyle('A' . $row . ':M' . $row)->getFont()->setBold(true);
        $sheet->getStyle('A' . $row . ':M' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THICK);
        $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Auto-size columns
        foreach (range('A', 'M') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Format currency columns
        $currencyColumns = ['G', 'H', 'K', 'M'];
        foreach ($currencyColumns as $col) {
            $sheet->getStyle($col . '6:' . $col . $row)->getNumberFormat()->setFormatCode('#,##0');
        }

        // Set row heights
        $sheet->getRowDimension('4')->setRowHeight(25);
        $sheet->getRowDimension('5')->setRowHeight(20);

        $writer = new Xlsx($spreadsheet);

        $filename = 'aset_lancar_' . date('Y-m-d_H-i-s') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    /**
     * Get rekening uraian data for AJAX
     */
    public function getRekeningUraian($id)
    {
        $rekening = RekeningUraian::find($id);

        if ($rekening) {
            return response()->json([
                'success' => true,
                'data' => $rekening
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan'
        ]);
    }
}
