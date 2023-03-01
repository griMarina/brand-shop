<?php

class Cart implements JsonSerializable
{
    public function __construct(
        private string $session_id,
        private array $cart_products = [],
        private float $cart_total = 0.0,
        private int $cart_qty = 0
    ) {
        $this->set_cart_total();
    }

    public function get_session_id(): string
    {
        return $this->session_id;
    }

    public function get_cart_products(): array
    {
        return $this->cart_products;
    }

    public function add_product(CartProduct $product): void
    {
        $id = $product->get_id();
        $this->cart_products[$id] = $product;
        $this->set_cart_total();
        $this->set_cart_qty();
    }

    public function remove_product(int $id): void
    {
        unset($this->cart_products[$id]);
        $this->set_cart_total();
        $this->set_cart_qty();
    }

    public function set_product_quantity(int $id, string $operation): void
    {
        if ($operation == 'increase') {
            $this->cart_products[$id]->increase_quantity();
        } elseif ($operation == 'decrease') {
            $this->cart_products[$id]->decrease_quantity();
        }

        $this->set_cart_total();
        $this->set_cart_qty();
    }

    public function get_cart_total(): float
    {
        return $this->cart_total;
    }

    public function set_cart_total(): void
    {
        $total = 0;
        foreach ($this->cart_products as $product) {
            $total += $product->get_total_price();
        }
        $this->cart_total = $total;
    }

    public function is_product_exists(int $id): bool
    {
        return isset($this->cart_products[$id]);
    }

    public function get_cart_qty(): int
    {
        return $this->cart_qty;
    }

    public function set_cart_qty(): void
    {
        $qty = 0;
        foreach ($this->cart_products as $product) {
            $qty += $product->get_quantity();
        }
        $this->cart_qty = $qty;
    }

    public function clear_cart(): void
    {
        $this->cart_products = [];
        $this->set_cart_total();
        $this->set_cart_qty();
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}
