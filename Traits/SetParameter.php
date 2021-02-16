<?php 

namespace App\Services\Payslip\Traits;

use Exception;

trait SetParameter
{
    /**
     * setEmployee
     * Sets variable employee's value
     *
     * @param Object $object
     * @return void
     */
    public function setEmployee($object)
    {
        if(!is_object($object))
        {
            throw new Exception('Employee should be a type of object.');
        }

        return $this->checkEmployee($object);
    }

    /**
     * setContributions
     * Sets variable contribution's value
     *
     * @param Array $array
     * @return void
     */
    public function setContributions($array)
    {
        if(!is_array($array))
        {
            throw new Exception('Contribution should be a type of Array.');
        }

        return $this->checkContributions($array);
    }

    /**
     * setLoan
     * Sets variable loan's value
     *
     * @param Array $array
     * @return void
     */
    public function setLoan($array)
    {
        if(!is_array($array))
        {
            throw new Exception('Loan should be a type of Array.');
        }

        return $this->checkLoan($array);
    }

    /**
     * setLeaves
     * Sets variable leave's value
     *
     * @param Array $array
     * @return void
     */
    public function setLeaves($array)
    {
        if(!is_array($array))
        {
            throw new Exception('Leave should be a type of Array.');
        }

        return $this->checkLeaves($array);
    }

    /**
     * setTimekeeping
     * Sets variable timekeeping's value
     *
     * @param Array $array
     * @return void
     */
    public function setTimekeeping($array)
    {
        if(!is_array($array))
        {
            throw new Exception('Timekeeping should be a type of Array.');
        }

        return $this->checkTimekeeping($array);
    }
}