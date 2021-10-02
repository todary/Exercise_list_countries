<?php




class CustomerTransformer extends Transformer
{


    /**
     * method to custom transform an item
     * @param  [mixed] $item [item to be transformed]
     * @return [mixeed]       [counts of the implementation in child class]
     */
    public function transform($item)
    {
        $data = [];

        $data['id'] = isset($item['id'])?$item['id']:0;
        $data['country'] = isset($item['country'])?$item['country']:'';
        $data['code'] = isset($item['code'])?$item['code']:'';
        $data['status'] = isset($item['status'])?$item['status']:'';
        $data['phone'] = isset($item['number'])?$item['number']:0;
        return $data;


    }


    public function validateNumbers($numbers)
    {

        $countriesValidationFactory = new countriesValidationFactory('237');

        $countriesValidationFactory->check($numbers);

        var_dump($countriesValidationFactory->getInValidNumbers());
        var_dump($countriesValidationFactory->getValidNumbers());
        die();
        $countryCode = "all";
        if (isset($_GET['country'])){
            $countryCode = $_GET['country'];
        }

        $re = "/\(212\)\ ?[5-9]\d{8}$/";

        $result= preg_grep($re, $numbers);
        var_dump($result);
//        var_dump(implode(',',$numbers));
        die();



        $listCountries = $this->Countries();




        $key = array_search('+256', $listCountries);
        var_dump($key);
        var_dump($listCountries);
        die();
        switch ($countryCode) {
            case 'all':

            break;

        }




        var_dump($result);
        die();
    }


    public function getAllNumbers($result)
    {
        $allNumbers = [];

        foreach ($result as $number){
            $allNumbers[]=$number['phone'];
        }

        return $allNumbers;
    }



    function Countries()
    {
        return [
            [
                "name"=>"Cameroon",
                "code"=>"+237",
                "regex"=>"/\(237\)\ ?[2368]\d{7,8}$/"
            ],
            [
                "name"=>"Ethiopia",
                "code"=>"+251",
                "regex"=>"/\(251\)\ ?[1-59]\d{8}$/"

            ],
            [
                "name"=>"Morocco",
                "code"=>"+212",
                "regex"=>"/\(212\)\ ?[5-9]\d{8}$/"

            ],
            [
                "name"=>"Mozambique",
                "code"=>"+258",
                "regex"=>"/\(258\)\ ?[28]\d{7,8}$/"

            ],
            [
                "name"=>"Uganda",
                "code"=>"+256",
                "regex"=>"/\(256\)\ ?\d{9}$/"

            ]

        ];

    }





}
