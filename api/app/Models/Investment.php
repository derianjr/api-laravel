<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'creation_date', 'initial_value', 'withdrawn', 'tax_rate'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getExpectedBalanceAttribute()
    {
        // Implemente a lógica para calcular o saldo esperado considerando ganhos e retiradas
        return $this->initial_value + $this->gains - $this->withdrawn_amount;
    }

    public function getGainsAttribute()
    {
        // Implemente a lógica para calcular os ganhos do investimento
        $monthsDifference = Carbon::parse($this->creation_date)->diffInMonths(Carbon::now());
        $monthlyRate = 0.0052; // 0.52% ao mês

        $compoundGains = $this->initial_value * (pow(1 + $monthlyRate, $monthsDifference) - 1);

        return $compoundGains;
    }

    public function getWithdrawnAmountAttribute()
    {
        // Implemente a lógica para calcular o valor total retirado
        return $this->withdrawn ? $this->initial_value + $this->gains : 0;
    }

    public function getTaxAmountAttribute()
    {
        // Implemente a lógica para calcular o valor do imposto
        $withdrawnAmount = $this->getWithdrawnAmountAttribute();
        $investmentAge = Carbon::parse($this->creation_date)->diffInYears(Carbon::now());

        switch ($investmentAge) {
            case ($investmentAge < 1):
                $taxRate = 0.225; // 22.5%
                break;
            case ($investmentAge >= 1 && $investmentAge < 2):
                $taxRate = 0.185; // 18.5%
                break;
            default:
                $taxRate = 0.15; // 15%
        }

        return $withdrawnAmount * $taxRate;
    }
}
