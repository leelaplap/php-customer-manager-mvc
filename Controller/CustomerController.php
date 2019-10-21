<?php

namespace Controller;

use Model\Customer;
use Model\CustomerDB;
use Model\DBConnection;

class CustomerController
{
    public $customerDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=mvc_customer_manager", "dat", "1");
        $this->customerDB = new CustomerDB($connection->connect());

    }

    function showList()
    {
        $customers = $this->customerDB->getAll();
        include 'View/list.php';
    }

    public function add()
    {
        include "View/add.php";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $customer = new Customer($name, $email, $address);
            $this->customerDB->create($customer);
            header("location:index.php");
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $this->customerDB->delete($id);
        header("location:index.php");
    }


    public function edit()
    {
        $id = $_GET['id'];
        $customer = $this->customerDB->getCustomerById($id);
        include "View/edit.php";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $customer = new Customer($name, $email, $address);
            $this->customerDB->edit($id, $customer);
            header("location:index.php");
        }
    }
}