<?php

class Cart implements JsonSerializable
{
    public function __construct(
        private string $session_id,
        private array $cart_products = [],
        private float $cart_price = 0.0,
        private int $cart_qty = 0
    ) {
    }

    public function get_session_id(): string
    {
        return $this->session_id;
    }

    public function get_cart_products(): array
    {
        return $this->cart_products;
    }

    public function get_cart_price(): float
    {
        return $this->cart_price;
    }

    public function set_cart_price(): void
    {
        $cart_price = 0;
        foreach ($this->cart_products as $product) {
            $cart_price += $product->get_total_price();
        }
        $this->cart_price = $cart_price;
    }

    public function get_cart_qty(): int
    {
        return $this->cart_qty;
    }

    public function set_cart_qty(): void
    {
        $cart_qty = 0;
        foreach ($this->cart_products as $product) {
            $cart_qty += $product->get_quantity();
        }
        $this->cart_qty = $cart_qty;
    }

    public function is_product_exists(string $id): bool
    {
        return isset($this->cart_products[$id]);
    }

    public function add_product(CartProduct $product): void
    {
        $id = $product->get_id();
        $this->cart_products[$id] = $product;
        $this->set_cart_price();
        $this->set_cart_qty();
    }

    public function set_product_quantity(string $id, string $operation): void
    {
        if ($operation == 'increase') {
            $this->cart_products[$id]->increase_quantity();
        } elseif ($operation == 'decrease') {
            $this->cart_products[$id]->decrease_quantity();
        }

        $this->set_cart_price();
        $this->set_cart_qty();
    }

    public function remove_product(string $id): void
    {
        unset($this->cart_products[$id]);
        $this->set_cart_price();
        $this->set_cart_qty();
    }

    public function clear_cart(): void
    {
        $this->cart_products = [];
        $this->set_cart_price();
        $this->set_cart_qty();
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}
