<?php

class Order
{
    public function __construct(
        private string $first_name,
        private string $last_name,
        private string $phone,
        private string $email,
        private string $address,
        private string $session_id,
        private string $status = 'pending'
    ) {
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

    public function get_email(): string
    {
        return $this->email;
    }

    public function get_address(): string
    {
        return $this->address;
    }

    public function get_session_id(): string
    {
        return $this->session_id;
    }

    public function get_status(): string
    {
        return $this->status;
    }
}
