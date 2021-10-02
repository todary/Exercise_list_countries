<?php


class countriesValidationFactory extends FactoryMethod
{


    /**
     * @param string $type
     * @return mixed
     */
    protected function countriesValidation(string $type):countryAdapter
    {
        switch ($type) {
            case "237":
                return new Cameroon();
                break;
            case "251":
                return new Ethiopia();
                break;
            case "212":
                return new Morocco();
                break;
            case "258":
                return new Mozambique();
                break;
            case "256":
                return new Uganda();
                break;
            case "all":
                return new allCountries();
                break;

            default:
                echo "Your favorite color is neither red, blue, nor green!";
        }

    }



}