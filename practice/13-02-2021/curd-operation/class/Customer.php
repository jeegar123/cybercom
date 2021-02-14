<?php


class Customer
{

    private int $customerId;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;
    private bool $status;
    private $createdDate;
    private $updatedDate;

    public function __construct(
        string $firstName = "default",
        string $lastName = "default",
        string $email = "default",
        string $password = "default",
        bool $status = false
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->status = $status;
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    public function getInsertKeys()
    {
        return [
            'first_name',
            'last_name',
            'email',
            'password',
            'status',
            'created_date'
        ];
    }
}
