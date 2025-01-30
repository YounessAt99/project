<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Contract;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @return response()
     */
    public function dashboard()
    {
        
        $totalClients = Client::count();
        $totalContracts = Contract::count();
        $totalPayments = Payment::sum('amount');

        $paymentsData = Payment::selectRaw('MONTH(payment_date) as month, SUM(amount) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date('M', mktime(0, 0, 0, $i, 1));
            $data[] = $paymentsData->where('month', $i)->first()->total ?? 0;
        }
        return view('admin.dashboard', compact('totalClients', 'totalContracts', 'totalPayments','labels', 'data'));
    }
}
