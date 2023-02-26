<?php

class Cart
{
    public function __construct(
        private string $session_id,
        private array $cart_products = [],
        private float $cart_total = 0.0
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

    public function set_cart_products(array $cart_products): void
    {
        $this->cart_products = $cart_products;
        $this->set_cart_total();
    }

    public function add_product(CartProduct $product): void
    {
        $this->cart_products[] = $product;
        $this->set_cart_total();
    }

    public function remove_product(CartProduct $product): void
    {
        $index = array_search($product, $this->cart_products, true);
        if ($index !== false) {
            array_splice($this->cart_products, $index, 1);
            $this->set_cart_total();
        }
    }

    public function get_cart_total(): float
    {
        return $this->cart_total;
    }

    private function set_cart_total(): void
    {
        $total = 0;
        foreach ($this->cart_products as $product) {
            $total += $product->get_total_price();
        }
        $this->cart_total = $total;
    }

    public function is_product_exists(CartProduct $product): bool
    {
        $index = array_search($product, $this->cart_products, true);
        return $index == true;
    }
}
