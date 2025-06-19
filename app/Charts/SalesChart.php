<?php
namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Order;

class SalesChart extends Chart
{
    public function __construct()
    {
        parent::__construct();

        $monthlySales = Order::where('status', 'accepted')
            ->selectRaw('MONTH(created_at) as month, SUM(total_price) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        $this->labels([
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ]);

        $sales = array_fill(0, 12, 0);
        foreach ($monthlySales as $month => $total) {
            $sales[$month - 1] = $total;
        }

        $this->dataset('Monthly Sales', 'bar', $sales)
            ->backgroundColor('#60a5fa');
    }
}
