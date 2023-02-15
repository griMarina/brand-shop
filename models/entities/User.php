<?php

class User extends Data
{
    public function __construct(
        private string $username,
        private string $hash,
    ) {
    }
}
