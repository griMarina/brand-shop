<main>
    <section class="breadcrumb">
        <div class="container breadcrumb-container">
            <h1 class="breadcrumb-heading">SHOPPING CART</h1>
        </div>
    </section>
    <?php if (!empty($cart->get_cart_products())) : ?>
        <section class="cart container">
            <h2 class="hidden">cart</h2>
            <section class="cart-items">
                <h2 class="hidden">products in cart</h2>
                <?php foreach ($cart->get_cart_products() as $product) : ?>
                    <div class="cart-item">
                        <picture class="cart-item-image">
                            <!-- <source srcset="img/product-3-small.jpg" media="(max-width: 788px)"> -->
                            <img src="/img/catalog/<?= $product->get_image() ?>.jpg" alt="<?= $product->get_image() ?>">
                        </picture>
                        <div class="cart-item-description">
                            <div class="cart-item-description-top">
                                <a class="cart-item-title" href="/product/?id=<?= $product->get_id() ?>"><?= $product->get_title() ?></a>
                                <button class="cart-item-delete" type="button"><svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg" onclick="deleteProduct('<?= $product->get_id() ?>')">
                                        <path d="M11.2453 9L17.5302 2.71516C17.8285 2.41741 17.9962 2.01336 17.9966 1.59191C17.997 1.17045 17.8299 0.76611 17.5322 0.467833C17.2344 0.169555 16.8304 0.00177586 16.4089 0.00140366C15.9875 0.00103146 15.5831 0.168097 15.2848 0.465848L9 6.75069L2.71516 0.465848C2.41688 0.167571 2.01233 0 1.5905 0C1.16868 0 0.764125 0.167571 0.465848 0.465848C0.167571 0.764125 0 1.16868 0 1.5905C0 2.01233 0.167571 2.41688 0.465848 2.71516L6.75069 9L0.465848 15.2848C0.167571 15.5831 0 15.9877 0 16.4095C0 16.8313 0.167571 17.2359 0.465848 17.5342C0.764125 17.8324 1.16868 18 1.5905 18C2.01233 18 2.41688 17.8324 2.71516 17.5342L9 11.2493L15.2848 17.5342C15.5831 17.8324 15.9877 18 16.4095 18C16.8313 18 17.2359 17.8324 17.5342 17.5342C17.8324 17.2359 18 16.8313 18 16.4095C18 15.9877 17.8324 15.5831 17.5342 15.2848L11.2453 9Z" />
                                    </svg></button>
                            </div>
                            <ul class="cart-item-text">
                                <li>Price: <span class="cart-item-price" data-id="<?= $product->get_id() ?>">$<?= $product->get_total_price() ?></span></li>
                                <!-- <li>Color: Red</li>
                            <li>Size: Xl</li> -->
                                <li>Quantity:
                                    <button class="cart-item-change_quantity" onclick="decreaseQty('<?= $product->get_id() ?>')" type="button">-</button>
                                    <span class="cart-item-quantity" data-id="<?= $product->get_id() ?>"><?= $product->get_quantity() ?></span>
                                    <button class="cart-item-change_quantity" onclick="increaseQty('<?= $product->get_id() ?>')" type="button">+</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
                <section class="cart-actions">
                    <h2 class="hidden">further actions</h2>
                    <button class="cart-actions-clear" type="button" onclick="clearCart()">Clear shopping cart</button>
                    <a class="cart-actions-continue" href="/catalog">Continue shopping</a>
                </section>
            </section>
            <section class="cart-checkout">
                <h2 class="hidden">sum total</h2>
                <p class="cart-checkout-text">ORDER SUMMARY</p>
                <hr class="cart-checkout-line">
                <p class="cart-checkout-text">
                    <span>Order value</span>
                    <span class="cart-checkout-price">$<?= $cart->get_cart_price() ?></span>
                </p>
                <p class="cart-checkout-text">
                    <span>Delivery fee</span>
                    <span>free</span>
                </p>
                <hr class="cart-checkout-line">
                <p class="cart-checkout-text">
                    <span>TOTAL (VAT included) </span>
                    <span class="cart-checkout-price cart-checkout-total-price">$<?= $cart->get_cart_price() ?></span>
                </p>
                <a class="cart-checkout-proceed" href="/login/?action=checkout">PROCEED TO CHECKOUT</a>
            </section>
        </section>
    <?php else : ?>
        <div class="empty-cart">
            <img src="/img/main/empty-cart.png" alt="empty cart image" /></br>
            <a class="cart-actions-continue" href="/catalog">Continue shopping</a>
        </div>
    <?php endif; ?>
</main>