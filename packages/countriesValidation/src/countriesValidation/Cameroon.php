<?php


/**
 * Class Cameroon
 */
class Cameroon implements countryAdapter
{

    private $validNumbers =[];
    private $inValidNumbers =[];
    private $regex = "/\(237\)\ ?[2368]\d{7,8}$/";
    private $countryCodeRegex = "/\(237\)\ /";
    private $countryCode = "+237";
    private $countryName = "Cameroon";


    public function check(array $numbers)
    {
        $countryNumbers = preg_grep($this->countryCodeRegex, $numbers);
        $this->validNumbers = preg_grep($this->regex, $countryNumbers);
        $this->inValidNumbers = array_diff( $countryNumbers,$this->validNumbers);

    }


    /**
     * @return string
     */
    public function getCountryCodeRegex()
    {
        return $this->countryCodeRegex;
    }

    /**
     * @return array
     */
    public function getInValidNumbers():array
    {
        $allData =[];
        $single =[];
        foreach ($this->inValidNumbers as $number){
            $single['status']   ='inValid';
            $single['phone']    =$number;
            $single['country']  =$this->countryName ;
            $single['code']     =$this->countryCode ;
            $allData[]=$single;
            $single=[];

        }
        return $allData;
    }

    /**
     * @return string
     */
    public function getRegex()
    {
        return $this->regex;
    }

    /**
     * @return array
     */
    public function getValidNumbers():array
    {

        $allData =[];
        $single =[];
        foreach ($this->validNumbers as $number){
            $single['status']   ='valid';
            $single['phone']    =$number;
            $single['country']  =$this->countryName ;
            $single['code']     =$this->countryCode ;
            $allData[]=$single;
            $single=[];

        }
        return $allData;

    }

}