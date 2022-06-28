<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $adminId = auth()->guard('admin')->user()->id;
        
        $transactions = Transaction::where('admin_id', $adminId)->get();
        
        return view('admin.dashboard', compact('transactions'));
    }

    public function getPemesanan(Request $request, int $id) 
    {
        $transaction = Transaction::where('id', $id)
            ->with('facility', 'user')
            ->first();

        return json_encode($transaction);
    }

    public function rejectPemesanan(Request $request, int $id)
    {
        $transaction = Transaction::find($id);

        $transaction->status = 'rejected';

        $transaction->save();
    }

    public function acceptPemesanan(Request $request, int $id)
    {
        $transaction = Transaction::find($id);

        $transaction->status = 'accepted';

        $transaction->save();
    }

    public function cancelPemesanan(Request $request, int $id)
    {
        $transaction = Transaction::find($id);

        $transaction->status = 'pending';

        $transaction->save();
    }

    public function verifyPemesanan(Request $request, int $id)
    {
        $transaction = Transaction::find($id);

        $transaction->is_verified = true;

        $transaction->save();
    }
}
