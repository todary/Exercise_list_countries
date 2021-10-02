<?php


/**
 * Class Uganda
 */
class allCountries implements countryAdapter
{

    private $validNumbers =[];
    private $inValidNumbers =[];
    private $countriesCode = ["237","251","212","258","256"];


    public function check(array $numbers)
    {

        foreach ($this->countriesCode as $code){

            $countryFactory = new  countriesValidationFactory();
            $countryClass  =$countryFactory->validation($code);

            $countryClass->check($numbers);
            $this->validNumbers =array_merge($this->validNumbers,$countryClass->getValidNumbers());
            $this->inValidNumbers =array_merge($this->inValidNumbers,$countryClass->getInValidNumbers());

        }

    }


    /**
     * @return array
     */
    public function getInValidNumbers()
    {
        return $this->inValidNumbers;
    }

    /**
     * @return array
     */
    public function getValidNumbers()
    {
        return $this->validNumbers;
    }


}