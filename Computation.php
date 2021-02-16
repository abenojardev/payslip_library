<?php

namespace App\Services\Payslip;
 
class Computation
{
    public $deductions = 0;
    public $hourly_rate = 0;
    public $daily_rate = 0;
    public $gross = 0;
    public $timings = [
        "regular_hours" => 0,
        "ot_hours" =>0,
        "night_diff_hours" => 0,
        "early" => 0,
        "tardy" => 0
    ];
    public $loan_deductions = 0;
    public $total = 0;
    public $total_deductions = 0;

    public function computeDeductions()
    {
        foreach($this->contributions as $i => $x)
        {
            $this->deductions += $x['employee']; 
        }
    }

    public function computeRates()
    { 
        $this->hourly_rate += $this->employee->rate / 160;
        $this->daily_rate += $this->hourly_rate * 8;
    }

    public function computeTime()
    {
        foreach ($this->timekeeping as $i => $x) {
            $this->timings['regular_hours'] += $x['regular_hours'];
            $this->timings['ot_hours'] += $x['ot_hours'];
            $this->timings['night_diff_hours'] += $x['night_diff_hours'];
            $this->timings['early'] += $x['early'];
            $this->timings['tardy'] += $x['tardy'];

            $pay = 0;
            $pay += $x['regular_hours'] * $this->hourly_rate;
            $pay += $x['ot_hours'] * ($this->hourly_rate + ($this->daily_rate * 0.1));
            $pay += $x['night_diff_hours'] * ($this->hourly_rate + ($this->daily_rate * 0.5));
             

            $this->gross += $x['double_pay'] ? ($pay * 2) : $pay;
        }
    }

    public function computeLoan()
    {
        if(!empty($this->loan)){
            $this->loan_deductions = $this->loan['monthly'] / 2;
            $this->loan['balance'] = $this->loan['balance'] - ($this->loan['monthly'] / 2);
        }
    } 

    public function computeTotal()
    {
        $this->total += $this->gross;
        $this->total_deductions = $this->deductions + $this->loan_deductions; 
        $this->total -= $this->total_deductions;
    }
}