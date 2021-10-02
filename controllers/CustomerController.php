<?php

// Actions ...
class CustomerController
{

    function listCustomersAction()
    {

        // Step#1 get|insert data in|from model ..
        $UserModel = new Customer();
        $result = $UserModel->list_data(['phone']);

        $CustomerTransformer = new  CustomerTransformer();
        $customerNumbers =$CustomerTransformer->getAllNumbers($result);


        $countryFactory = new  countriesValidationFactory();

        $countryCode="all";
        if (isset($_GET['country']))
            $countryCode=$_GET['country'];


        $countryClass  =$countryFactory->validation($countryCode);

        $countryClass->check($customerNumbers);


        $status="all";
        if (isset($_GET['status']))
            $status=$_GET['status'];


        switch ($status) {
            case "all":
                $inValidNumbers =$countryClass->getInValidNumbers();
                $validateNumbers =$countryClass->getValidNumbers();
                $allNumbers = array_merge($inValidNumbers,$validateNumbers);

                break;
            case "Valid":
                $allNumbers=$countryClass->getValidNumbers();
                break;
            case "inValid":
                $allNumbers =$countryClass->getInValidNumbers();
                break;
            default:
                $inValidNumbers =$countryClass->getInValidNumbers();
                $validateNumbers =$countryClass->getValidNumbers();
                $allNumbers = array_merge($inValidNumbers,$validateNumbers);

        }


        // Step#2 display result in certain view ..
        include "views/user/user.php";
    }

    function listUserAction()
    {
        // Step#1 get|insert data in|from model ..
        $UserModel = new Customer;
        $result = $UserModel->list_data();

        // Step#2 display result in certain view ..
        include "views/user/user.php";
    }

    function editUserAction()
    {

        if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
            // store data in database ...
            $UserModel = new Customer($_GET['id']);
            $UserModel->name = $_POST["name"];
            $UserModel->username = $_POST["phone"];
            if ($UserModel->update_data() >= 1) {
                $this->listUsersAction();
            }
        } else {
            $UserModel = new Customer($_GET['id']);
            require "views/user/editForm.php";
        }
    }

    function deleteUserAction()
    {
        if(isset($_GET['id']))
        {
            $UserModel = new Customer;
            $UserModel->id=$_GET['id'];
            $UserModel->delete_data();
            $this->listUsersAction();

        }

    }

}
