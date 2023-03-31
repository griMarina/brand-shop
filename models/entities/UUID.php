<?php

class UUID
{
    public function __construct()
    {
    }

    // function generates RFC 4122 compliant Version 4 UUIDs
    public static function get_uuid(): string
    {
        try {
            $data = PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(16) : random_bytes(16);
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
            return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        } catch (\Exception $e) {
            throw new \RuntimeException('Error generating UUID: ' . $e->getMessage());
        }
    }
}
