<?php 

namespace App\Services\Payslip\Traits;
 
use App\Services\Payslip\Objects\Employee;
use App\Services\Payslip\Objects\Timekeeping;
use Exception;

trait CheckParameter
{
    /**
     * checkEmployee
     * Checks if employee object has complete set of property
     *
     * @param Object $object
     * @return void
     */
    public function checkEmployee($object)
    {
        $keys = get_object_vars(new Employee); 

        foreach($keys as $property => $value)
        {
            if (!property_exists($object, $property)) {
                throw new Exception('Property '.$property.' missing in Employee Object');
            }
        }

        return $this->employee = $object;
    }

    /**
     * checkTimekeeping
     * Checks if timekeeping object has complete set of property
     *
     * @param Object $object
     * @return void
     */
    public function checkTimekeeping($object)
    {
        $keys = get_object_vars(new Timekeeping); 

        foreach($keys as $property => $value)
        {
            foreach($object as $x => $y){
                if (!array_key_exists($property, $y)) {
                    throw new Exception('Property '.$property.' missing in Timekeeping Array');
                }
            } 
        }

        return $this->timekeeping = $object;
    }

    /**
     * checkContributions
     * Checks if contributions array has complete set of keys
     *
     * @param Array $array
     * @return void
     */
    public function checkContributions($array)
    {
        $contributions = [
            'tax',
            'sss',
            'philhealth',
            'pagibig'
        ];

        $values = [
            'id',
            'employee',
            'monthly'
        ];

        foreach($contributions as $type)
        {
            if (!array_key_exists($type,$array)) {
                throw new Exception('Key '.$type.' missing in Contributions Array');
            }

            foreach ($values as $value) 
            {
                if (!array_key_exists($value, $array[$type])) {
                    throw new Exception('Key '.$value.' missing in Contributions '.$type.' Array');
                }
            }
        }

        return $this->contributions = $array;
    }

    /**
     * checkLoan
     * Checks if loan array has complete set of keys
     *
     * @param Array $array
     * @return void
     */
    public function checkLoan($array)
    { 
        $loans = [
            'loan_type',
            'total',
            'monthly',
            'balance'
        ];

        foreach($loans as $type)
        {
            if (!array_key_exists($type,$array)) {
                throw new Exception('Key '.$type.' missing in Loans Array');
            } 
        }

        return $this->loan = $array;
    }


    /**
     * checkLoan
     * Checks if loan array has complete set of keys
     *
     * @param Array $array
     * @return void
     */
    public function checkLeaves($array)
    {  
        foreach($array as $type)
        {
            if (!array_key_exists('start',$type)) {
                throw new Exception('Key start missing in leaves Array');
            } 

            if (!array_key_exists('end',$type)) {
                throw new Exception('Key end missing in leaves Array');
            } 
        }

        return $this->leaves = $array;
    }

    
}

