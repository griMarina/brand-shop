<?php

class User
{
    public function __construct(
        private string $id = '',
        private string $username = '',
        private string $pass_hash = '',
        private string $first_name = '',
        private string $last_name = '',
        private string $phone = '',
        private string $address = ''
    ) {
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

    public function set_username(string $username): void
    {
        $this->username = $username;
    }

    public function set_pass_hash(string $pass_hash): void
    {
        $this->pass_hash = $pass_hash;
    }

    public function set_first_name(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    public function set_last_name(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    public function set_phone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function set_address(string $address): void
    {
        $this->address = $address;
    }
}
