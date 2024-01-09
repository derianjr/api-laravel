<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function create(Request $request)
    {
        // Implementar a lógica para criar um investimento
    }

    public function withdraw($investmentId)
    {
        // Implementar a lógica para realizar uma retirada
    }

    public function listInvestments($userId)
    {
        // Implementar a lógica para listar os investimentos paginados
    }
}
