<?php

class Order
{
    private int $id = 0;
    private string $date = '';

    public function __construct(
        private string $first_name = '',
        private string $last_name = '',
        private string $phone = '',
        private string $email = '',
        private string $address = '',
        private float $total = 0.0,
        private ?string $user_id = '',
        private string $session_id = '',
        private string $status = 'pending'
    ) {
    }

    public function get_id(): int
    {
        return $this->id;
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

    public function get_total(): float
    {
        return $this->total;
    }

    public function get_user_id(): ?string
    {
        return $this->user_id;
    }

    public function get_session_id(): string
    {
        return $this->session_id;
    }

    public function get_status(): string
    {
        return $this->status;
    }

    public function get_date(): string
    {
        return $this->date;
    }
}
