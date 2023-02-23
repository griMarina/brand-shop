<?php

class DatabaseCart
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function get_cart($session_id): array
    {
        $statement = $this->pdo->prepare(
            'SELECT cart.quantity, cart.product_id, product.title, product.price, image.title AS `image`
            FROM `cart`
            LEFT JOIN `product`
            ON cart.product_id = product.id
            LEFT JOIN `image`
            ON product.id = image.product_id
            WHERE cart.session_id = :session_id AND image.number = 0;'
        );

        $statement->execute(
            [
                ':session_id' => (string) $session_id
            ]
        );

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function cart_product_exists(int $product_id, string $session_id): bool
    {
        $statement = $this->pdo->prepare(
            'SELECT cart.product_id
            FROM `cart`
            WHERE cart.product_id = :product_id AND cart.session_id = :session_id;'
        );

        $statement->execute(
            [
                ':product_id' => (string) $product_id,
                ':session_id' => (string) $session_id
            ]
        );

        return ($statement->rowCount()) ? true : false;
    }

    public function add_to_cart(CartProduct $cart): void
    {

        $result = $this->cart_product_exists($cart->get_product_id(), $cart->get_session_id());

        if ($result) {
            $statement = $this->pdo->prepare(
                'UPDATE `cart` SET quantity = quantity + 1 
                WHERE cart.product_id = :product_id AND cart.session_id = :session_id;'
            );

            $statement->execute(
                [
                    ':product_id' => (int) $cart->get_product_id(),
                    ':session_id' => (string) $cart->get_session_id()
                ]
            );
        } else {
            $statement = $this->pdo->prepare(
                'INSERT INTO `cart`(`quantity`, `product_id`, `session_id`) VALUES (:quantity, :product_id, :session_id);'
            );

            $statement->execute(
                [
                    ':quantity' => (int) $cart->get_quantity(),
                    ':product_id' => (int) $cart->get_product_id(),
                    ':session_id' => (string) $cart->get_session_id()
                ]
            );
        }
    }
}
