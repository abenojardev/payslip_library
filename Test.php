<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Payslip\Engine; 

class TestController extends Controller
{    

    public function test()
    { 
        $employee = new \stdClass();
        $employee->first_name = 'Ken';
        $employee->last_name = 'Abenojar';
        $employee->middle_name = 'B';
        $employee->address = 'Makati';
        $employee->contact = '161367565345';
        $employee->designation = 'TECHNICAL';
        $employee->rate = 204503.00;
        $employee->department = 'IT';

        $contributions = [
            'tax' => [
                'employee' => 100.53,
                'monthly' => 201.06,
                'id' => 1
            ],
            'sss' => [
                'employee' => 100.53,
                'monthly' => 201.06,
                'id' => 1
            ],
            'philhealth' => [
                'employee' => 100.53,
                'monthly' => 201.06,
                'id' => 1
            ],
            'pagibig' => [
                'employee' => 100.53,
                'monthly' => 201.06,
                'id' => 1
            ]
        ];

        $loans = [
            'loan_type' => 'Personal',
            'total' => 5000.00,
            'monthly' => 1000.00,
            'balance' => 500.00
        ];

        $leaves = [
            [
                'start' => '2020-10-24', 
                'end' => '2020-10-27'
            ]
        ];

        $timekeeping = [
            [ 
                'regular_hours' => 8,
                'ot_hours' => 0,
                'night_diff_hours' => 0,
                'early' => 0,
                'tardy' => 0,
                'double_pay' => false
            ],
            [ 
                'regular_hours' => 8,
                'ot_hours' => 0,
                'night_diff_hours' => 0,
                'early' => 0,
                'tardy' => 0,
                'double_pay' => true
            ],
            [ 
                'regular_hours' => 8,
                'ot_hours' => 0,
                'night_diff_hours' => 0,
                'early' => 0,
                'tardy' => 0,
                'double_pay' => false
            ]
        ];  
        
        $engine = new Engine();
        $engine->setEmployee($employee);
        $engine->setContributions($contributions);
        $engine->setLoan($loans);
        $engine->setLeaves($leaves);
        $engine->setTimekeeping($timekeeping);

        return dd(
            $engine->test()
        );
    } 
}
