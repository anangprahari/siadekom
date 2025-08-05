<?php

namespace App\Http\Controllers\Dashboards;

use App\Models\Aset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Total semua aset
        $totalAssets = Aset::count();

        // Aset berdasarkan keadaan barang
        $assetsByCondition = Aset::select('keadaan_barang', DB::raw('count(*) as total'))
            ->groupBy('keadaan_barang')
            ->pluck('total', 'keadaan_barang')
            ->toArray();

        $goodConditionAssets = $assetsByCondition['Baik'] ?? 0;
        $fairConditionAssets = $assetsByCondition['Kurang Baik'] ?? 0;
        $badConditionAssets = $assetsByCondition['Rusak Berat'] ?? 0;

        // Aset yang ditambahkan tahun ini
        $currentYearAssets = Aset::where('tahun_perolehan', date('Y'))->count();

        // Aset yang ditambahkan hari ini (berdasarkan created_at)
        $todayAssets = Aset::whereDate('created_at', today())->count();

        // Aset yang ditambahkan 7 hari terakhir
        $weeklyAssets = Aset::where('created_at', '>=', Carbon::now()->subDays(7))->count();

        // Total nilai aset (harga_satuan * jumlah_barang)
        $totalAssetValue = Aset::sum(DB::raw('harga_satuan * jumlah_barang'));

        // Aset berdasarkan tahun perolehan (5 tahun terakhir)
        $assetsByYear = Aset::select('tahun_perolehan', DB::raw('count(*) as total'))
            ->where('tahun_perolehan', '>=', date('Y') - 4)
            ->groupBy('tahun_perolehan')
            ->orderBy('tahun_perolehan', 'desc')
            ->get()
            ->pluck('total', 'tahun_perolehan')
            ->toArray();

        // Top 5 jenis barang berdasarkan jumlah
        $topAssetTypes = Aset::select('nama_jenis_barang', DB::raw('count(*) as total'))
            ->groupBy('nama_jenis_barang')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        // Statistik berdasarkan asal perolehan
        $assetsBySource = Aset::select('asal_perolehan', DB::raw('count(*) as total'))
            ->groupBy('asal_perolehan')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        // Data untuk chart kondisi aset
        $conditionChartData = [
            'labels' => ['Baik', 'Kurang Baik', 'Rusak Berat'],
            'data' => [$goodConditionAssets, $fairConditionAssets, $badConditionAssets],
            'colors' => ['#28a745', '#ffc107', '#dc3545']
        ];

        // Data untuk chart tahun perolehan
        $yearChartData = [
            'labels' => array_keys($assetsByYear),
            'data' => array_values($assetsByYear)
        ];

        return view('dashboard', [
            'totalAssets' => $totalAssets,
            'goodConditionAssets' => $goodConditionAssets,
            'fairConditionAssets' => $fairConditionAssets,
            'badConditionAssets' => $badConditionAssets,
            'currentYearAssets' => $currentYearAssets,
            'todayAssets' => $todayAssets,
            'weeklyAssets' => $weeklyAssets,
            'totalAssetValue' => $totalAssetValue,
            'topAssetTypes' => $topAssetTypes,
            'assetsBySource' => $assetsBySource,
            'conditionChartData' => $conditionChartData,
            'yearChartData' => $yearChartData,
        ]);
    }

    /**
     * Get asset statistics for AJAX requests
     */
    public function getAssetStats(Request $request)
    {
        try {
            $period = $request->get('period', 'month'); // month, quarter, year

            $query = Aset::query();

            switch ($period) {
                case 'week':
                    $query->where('created_at', '>=', Carbon::now()->subWeek());
                    break;
                case 'month':
                    $query->where('created_at', '>=', Carbon::now()->subMonth());
                    break;
                case 'quarter':
                    $query->where('created_at', '>=', Carbon::now()->subQuarter());
                    break;
                case 'year':
                    $query->where('created_at', '>=', Carbon::now()->subYear());
                    break;
            }

            $stats = [
                'total' => $query->count(),
                'by_condition' => $query->select('keadaan_barang', DB::raw('count(*) as total'))
                    ->groupBy('keadaan_barang')
                    ->pluck('total', 'keadaan_barang'),
                'total_value' => $query->sum(DB::raw('harga_satuan * jumlah_barang')),
            ];

            return response()->json([
                'success' => true,
                'data' => $stats
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil statistik aset.'
            ], 500);
        }
    }
}
