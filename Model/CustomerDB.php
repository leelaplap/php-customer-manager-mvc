<?php


namespace Model;


class CustomerDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($customer)
    {
        $sql = "INSERT INTO customers(name, email,address) VALUES (:name,:email,:address)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':name', $customer->name);
        $statement->bindParam(':email', $customer->email);
        $statement->bindParam(':address', $customer->address);
        $statement->execute();
    }

    public function getAll()
    {
        $stmt = $this->connection->query("SELECT * FROM customers");
        $result = $stmt->fetchAll();
        $customers = [];
        foreach ($result as $value) {
            $customer = new Customer($value['name'], $value['email'], $value['address']);
            $customer->id = $value['id'];
            array_push($customers, $customer);
        }
        return $customers;
    }

    public function delete($id)
    {
        $stmt = $this->connection->query("DELETE FROM customers WHERE id=$id");
    }

    public function getCustomerById($id)
    {
        $stmt = $this->connection->query("SELECT * FROM customers WHERE id=$id");
        $result=$stmt->fetch();
        $customer = new Customer($result['name'],$result['email'],$result['address']);
        $customer->id = $result['id'];
        return $customer;
    }

    public function edit($id,$customer){
        $stmt= $this->connection->prepare("UPDATE customers SET name=:name,email=:email,address=:address WHERE id=:id");
        $stmt->bindParam(':name', $customer->name);
        $stmt->bindParam(':email', $customer->email);
        $stmt->bindParam(':address', $customer->address);
        $stmt->bindParam(':id', $id);
        $stmt->execute;
    }
}