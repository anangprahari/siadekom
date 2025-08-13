<?php

namespace App\Http\Controllers\Dashboards;

use App\Models\{Aset, AsetLancar, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index()
    {
        try {
            // STATISTIK ASET TETAP (Kelompok 1.3)
            $totalAsetTetap = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.3');
            })->count();

            $nilaiTotalAsetTetap = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.3');
            })->sum('harga_satuan');

            // Statistik berdasarkan keadaan barang (Aset Tetap)
            $asetBaik = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.3');
            })->where('keadaan_barang', 'B')->count();

            $asetKurangBaik = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.3');
            })->where('keadaan_barang', 'KB')->count();

            $asetRusakBerat = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.3');
            })->where('keadaan_barang', 'RB')->count();

            // Aset Tetap terbaru (30 hari terakhir)
            $asetTetapBaru = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.3');
            })->where('created_at', '>=', Carbon::now()->subDays(30))->count();

            // STATISTIK ASET LAINNYA (Kelompok 1.5)
            $totalAsetLainnya = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.5');
            })->count();

            $nilaiTotalAsetLainnya = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.5');
            })->sum('harga_satuan');

            // Aset Lainnya terbaru (30 hari terakhir)
            $asetLainnyaBaru = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.5');
            })->where('created_at', '>=', Carbon::now()->subDays(30))->count();

            // STATISTIK KONDISI ASET LAINNYA
            $asetLainnyaBaik = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.5');
            })->where('keadaan_barang', 'B')->count();

            $asetLainnyaKurangBaik = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.5');
            })->where('keadaan_barang', 'KB')->count();

            $asetLainnyaRusakBerat = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.5');
            })->where('keadaan_barang', 'RB')->count();

            // STATISTIK ASET LANCAR
            $totalAsetLancar = AsetLancar::count();
            $nilaiSaldoAkhirTotal = AsetLancar::sum('saldo_akhir_total');
            $nilaiSaldoAwalTotal = AsetLancar::sum('saldo_awal_total');
            $nilaiMutasiTambah = AsetLancar::sum('mutasi_tambah_nilai_total');

            // STATISTIK PENGGUNA
            $totalPengguna = User::count();
            $penggunaBaru = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();

            // STATISTIK TAMBAHAN
            // Top 5 jenis barang terbanyak (Aset Tetap)
            $topJenisBarang = Aset::select('nama_jenis_barang', DB::raw('count(*) as total'))
                ->whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                    $q->where('kode', '1.3');
                })
                ->groupBy('nama_jenis_barang')
                ->orderBy('total', 'desc')
                ->limit(5)
                ->get();

            // Aset berdasarkan tahun perolehan (5 tahun terakhir) - Aset Tetap
            $asetPerTahun = Aset::select(
                'tahun_perolehan',
                DB::raw('count(*) as jumlah'),
                DB::raw('sum(harga_satuan) as nilai_total')
            )
                ->whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                    $q->where('kode', '1.3');
                })
                ->where('tahun_perolehan', '>=', Carbon::now()->year - 4)
                ->groupBy('tahun_perolehan')
                ->orderBy('tahun_perolehan', 'desc')
                ->get();

            // Aktivitas bulan ini
            $asetTetapBulanIni = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.3');
            })
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();

            $asetLainnyaBulanIni = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.5');
            })
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();

            $asetLancarBulanIni = AsetLancar::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();

            // STATISTIK GABUNGAN
            $totalSemuaAset = $totalAsetTetap + $totalAsetLainnya + $totalAsetLancar;
            $totalNilaiSemuaAset = $nilaiTotalAsetTetap + $nilaiTotalAsetLainnya + $nilaiSaldoAkhirTotal;
            $totalAsetBaik = $asetBaik + $asetLainnyaBaik;
            $totalAsetBermasalah = ($asetKurangBaik + $asetRusakBerat) + ($asetLainnyaKurangBaik + $asetLainnyaRusakBerat);
            $totalAktivitasBulanIni = $asetTetapBulanIni + $asetLainnyaBulanIni + $asetLancarBulanIni;

            return view('dashboard', compact(
                // Aset Tetap
                'totalAsetTetap',
                'nilaiTotalAsetTetap',
                'asetBaik',
                'asetKurangBaik',
                'asetRusakBerat',
                'asetTetapBaru',
                'asetTetapBulanIni',

                // Aset Lainnya
                'totalAsetLainnya',
                'nilaiTotalAsetLainnya',
                'asetLainnyaBaru',
                'asetLainnyaBulanIni',
                'asetLainnyaBaik',
                'asetLainnyaKurangBaik',
                'asetLainnyaRusakBerat',

                // Aset Lancar
                'totalAsetLancar',
                'nilaiSaldoAkhirTotal',
                'nilaiSaldoAwalTotal',
                'nilaiMutasiTambah',
                'asetLancarBulanIni',

                // Pengguna
                'totalPengguna',
                'penggunaBaru',

                // Statistik Gabungan
                'totalSemuaAset',
                'totalNilaiSemuaAset',
                'totalAsetBaik',
                'totalAsetBermasalah',
                'totalAktivitasBulanIni',

                // Data untuk chart/grafik
                'topJenisBarang',
                'asetPerTahun'
            ));
        } catch (\Exception $e) {
            return view('dashboard')->with('error', 'Terjadi kesalahan saat memuat data dashboard: ' . $e->getMessage());
        }
    }

    /**
     * Get chart data for AJAX requests
     */
    public function getChartData(Request $request)
    {
        $type = $request->get('type');

        try {
            switch ($type) {
                case 'aset_per_bulan':
                    // Data aset tetap per bulan (12 bulan terakhir)
                    $data = [];
                    for ($i = 11; $i >= 0; $i--) {
                        $date = Carbon::now()->subMonths($i);
                        $count = Aset::whereMonth('created_at', $date->month)
                            ->whereYear('created_at', $date->year)
                            ->count();
                        $data[] = [
                            'month' => $date->format('M Y'),
                            'count' => $count
                        ];
                    }
                    return response()->json($data);

                case 'kondisi_aset':
                    // Data kondisi aset untuk pie chart
                    $data = [
                        ['label' => 'Baik', 'value' => Aset::where('keadaan_barang', 'B')->count()],
                        ['label' => 'Kurang Baik', 'value' => Aset::where('keadaan_barang', 'KB')->count()],
                        ['label' => 'Rusak Berat', 'value' => Aset::where('keadaan_barang', 'RB')->count()]
                    ];
                    return response()->json($data);

                case 'nilai_aset_lancar':
                    // Perbandingan saldo awal vs saldo akhir aset lancar
                    $data = [
                        ['label' => 'Saldo Awal', 'value' => AsetLancar::sum('saldo_awal_total')],
                        ['label' => 'Saldo Akhir', 'value' => AsetLancar::sum('saldo_akhir_total')]
                    ];
                    return response()->json($data);

                case 'aset_per_kategori':
                    // Data aset per kategori
                    $asetTetap = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                        $q->where('kode', '1.3');
                    })->count();

                    $asetLainnya = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                        $q->where('kode', '1.5');
                    })->count();

                    $asetLancar = AsetLancar::count();

                    $data = [
                        ['label' => 'Aset Tetap', 'value' => $asetTetap],
                        ['label' => 'Aset Lainnya', 'value' => $asetLainnya],
                        ['label' => 'Aset Lancar', 'value' => $asetLancar]
                    ];
                    return response()->json($data);

                case 'trend_bulanan':
                    // Trend penambahan aset per bulan (6 bulan terakhir)
                    $data = [];
                    for ($i = 5; $i >= 0; $i--) {
                        $date = Carbon::now()->subMonths($i);

                        $asetTetap = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                            $q->where('kode', '1.3');
                        })
                            ->whereMonth('created_at', $date->month)
                            ->whereYear('created_at', $date->year)
                            ->count();

                        $asetLainnya = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                            $q->where('kode', '1.5');
                        })
                            ->whereMonth('created_at', $date->month)
                            ->whereYear('created_at', $date->year)
                            ->count();

                        $asetLancar = AsetLancar::whereMonth('created_at', $date->month)
                            ->whereYear('created_at', $date->year)
                            ->count();

                        $data[] = [
                            'month' => $date->format('M Y'),
                            'aset_tetap' => $asetTetap,
                            'aset_lainnya' => $asetLainnya,
                            'aset_lancar' => $asetLancar,
                            'total' => $asetTetap + $asetLainnya + $asetLancar
                        ];
                    }
                    return response()->json($data);

                default:
                    return response()->json(['error' => 'Invalid chart type'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Get dashboard summary for quick stats
     */
    public function getSummary()
    {
        try {
            // Total aset
            $totalAsetTetap = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.3');
            })->count();

            $totalAsetLainnya = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.5');
            })->count();

            $totalAsetLancar = AsetLancar::count();

            // Total nilai
            $nilaiAsetTetap = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.3');
            })->sum('harga_satuan');

            $nilaiAsetLainnya = Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) {
                $q->where('kode', '1.5');
            })->sum('harga_satuan');

            $nilaiAsetLancar = AsetLancar::sum('saldo_akhir_total');

            // Kondisi aset
            $asetBaik = Aset::where('keadaan_barang', 'B')->count();
            $asetBermasalah = Aset::whereIn('keadaan_barang', ['KB', 'RB'])->count();

            // Aktivitas bulan ini
            $aktivitasBulanIni = Aset::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count() + AsetLancar::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();

            return response()->json([
                'success' => true,
                'data' => [
                    'total_aset' => [
                        'tetap' => $totalAsetTetap,
                        'lainnya' => $totalAsetLainnya,
                        'lancar' => $totalAsetLancar,
                        'total' => $totalAsetTetap + $totalAsetLainnya + $totalAsetLancar
                    ],
                    'total_nilai' => [
                        'tetap' => $nilaiAsetTetap,
                        'lainnya' => $nilaiAsetLainnya,
                        'lancar' => $nilaiAsetLancar,
                        'total' => $nilaiAsetTetap + $nilaiAsetLainnya + $nilaiAsetLancar
                    ],
                    'kondisi_aset' => [
                        'baik' => $asetBaik,
                        'bermasalah' => $asetBermasalah,
                        'persentase_baik' => $asetBaik > 0 ? round(($asetBaik / ($asetBaik + $asetBermasalah)) * 100, 1) : 0
                    ],
                    'aktivitas_bulan_ini' => $aktivitasBulanIni
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil ringkasan data: ' . $e->getMessage()
            ], 500);
        }
    }
}
