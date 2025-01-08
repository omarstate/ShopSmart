<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function getPurchases()
    {
        $user = request()->user();
        $purchases = $user->purchases()->get();
        return response($purchases);
    }


    public function addPurchase()
    {
        $validated = request()->validate([
            'amount' => ['required', 'numeric', 'min:1'],
            'purchase_date' => ['required', 'date'],
        ]);



        $user = Auth::user();
        $points = ($validated['amount'] / 10);
        $user->purchases()->create([
            'user_id' => $user['id'],
            'amount' => $validated['amount'],
            'points_earned' => $points,
            'purchase_date' => $validated['purchase_date']
        ]);

        $user->update([
            'points' => $validated['amount']
        ]);

        return redirect('/profile');

    }

}
