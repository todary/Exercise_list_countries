<?php


/**
 * Class Uganda
 */
class Uganda implements countryAdapter
{

    private $validNumbers =[];
    private $inValidNumbers =[];
    private $regex = "/\(256\)\ ?\d{9}$/";
    private $countryCodeRegex = "/\(256\)\ /";
    private $countryCode = "+256";
    private $countryName = "Uganda";


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