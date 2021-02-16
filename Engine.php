<?php

namespace App\Services\Payslip;

use App\Services\Payslip\Computation;
use App\Services\Payslip\Traits\SetParameter;
use App\Services\Payslip\Traits\CheckParameter;

class Engine extends Computation
{   
    use SetParameter, CheckParameter;

    /** @var Object|Model */
    protected $employee;

    /** @var Array */
    protected $contributions;

    /** @var Array */
    protected $loan;

    /** @var Array */
    protected $leaves;

    /** @var Array */
    protected $timekeeping;
    
    public function __construct()
    {
        
    }

    /**
     * test()
     * Returns all the data set in the object class
     *
     * @return dd()
     */
    public function test()
    {
        $this->computeDeductions();
        $this->computeRates();
        $this->computeTime();
        $this->computeLoan();
        $this->computeTotal();
        
        return dd($this);
    } 
}