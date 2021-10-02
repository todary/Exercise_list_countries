<?php



/**
 * Class FactoryMethod
 * @package Madrasty\Payment\PaymentFactory
 */

abstract class FactoryMethod
{
    /**
     * @param string $type
     * @return mixed
     */
    abstract protected function countriesValidation(string $type);


    /**
     * @param string $type
     * @return mixed
     */

    public function validation(string $type)
    {
        $object = $this->countriesValidation($type);
        return $object;
    }


}