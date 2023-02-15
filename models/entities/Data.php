<?php

class Data extends Base
{
    public function __construct(
        private string $first_name,
        private string $last_name,
        private string $phone,
        private string $address
    ) {
    }
}
