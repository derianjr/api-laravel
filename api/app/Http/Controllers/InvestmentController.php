<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvestmentController extends Controller
{
    public function create(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'creation_date' => 'required|date',
            'initial_value' => 'required|numeric|min:0',
            'withdrawn' => 'boolean',
            'tax_rate' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        
        $investment = Investment::create($request->all());

        return response()->json(['data' => $investment], 201);
    }

    public function withdraw($investmentId)
    {
        
        $investment = Investment::findOrFail($investmentId);

       
        if ($investment->withdrawn) {
            return response()->json(['error' => 'Investment has already been withdrawn.'], 400);
        }

        $investment->update(['withdrawn' => true]);

        return response()->json(['message' => 'Withdrawal successful.'], 200);
    }

    public function listInvestments($userId)
    {
        
        $investments = Investment::where('user_id', $userId)->paginate(10);

        return response()->json(['data' => $investments], 200);
    }
}
