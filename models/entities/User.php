<?php

class User
{
    private string $id;
    private string $username;
    private string $pass_hash;
    private string $first_name;
    private string $last_name;
    private string $phone;
    private string $address;

    public function __construct()
    {
    }

    public function get_id(): string
    {
        return $this->id;
    }

    public function get_username(): string
    {
        return $this->username;
    }

    public function get_pass_hash(): string
    {
        return $this->pass_hash;
    }

    public function get_first_name(): string
    {
        return $this->first_name;
    }

    public function get_last_name(): string
    {
        return $this->last_name;
    }

    public function get_phone(): string
    {
        return $this->phone;
    }

    public function get_address(): string
    {
        return $this->address;
    }
}
