<?php

namespace App\Http\Controllers\Dashboards;

use App\Models\{Aset, AsetLancar, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

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

            // STATISTIK PENGGUNA
            $totalPengguna = User::count();
            $penggunaBaru = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();

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

            // Log untuk debugging
            Log::info('Dashboard Data:', [
                'totalAsetTetap' => $totalAsetTetap,
                'asetBaik' => $asetBaik,
                'asetKurangBaik' => $asetKurangBaik,
                'asetRusakBerat' => $asetRusakBerat,
                'totalAsetLainnya' => $totalAsetLainnya,
                'asetLainnyaBaik' => $asetLainnyaBaik,
                'asetLainnyaKurangBaik' => $asetLainnyaKurangBaik,
                'asetLainnyaRusakBerat' => $asetLainnyaRusakBerat
            ]);

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
                'asetLancarBulanIni',

                // Pengguna
                'totalPengguna',
                'penggunaBaru'
            ));
        } catch (\Exception $e) {
            Log::error('Dashboard Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            return view('dashboard')->with('error', 'Terjadi kesalahan saat memuat data dashboard: ' . $e->getMessage());
        }
    }

    /**
     * Get dashboard summary for API requests
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
            Log::error('Dashboard Summary Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil ringkasan data: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get recent activities for dashboard
     */
    public function getRecentActivities()
    {
        try {
            $recentAssets = Aset::with(['subSubRincianObjek.subRincianObjek.rincianObjek'])
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get();

            $recentAsetLancar = AsetLancar::orderBy('created_at', 'desc')
                ->limit(5)
                ->get();

            return response()->json([
                'success' => true,
                'data' => [
                    'recent_assets' => $recentAssets,
                    'recent_aset_lancar' => $recentAsetLancar
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Recent Activities Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil aktivitas terbaru: ' . $e->getMessage()
            ], 500);
        }
    }
}
