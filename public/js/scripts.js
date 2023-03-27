function addToCart(id) {
    fetch('/cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            action: 'add',
            product_id: id
        })
    })
        .then(response => response.json())
        .then(data => {
            updateQty(data);
        })
        .catch(error => {
        });
}

function decreaseQty(id) {
    fetch('/cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            action: 'decrease',
            product_id: id
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data['cart_products'][id]['quantity'] === 0) {
                deleteProduct(id);
            } else {
                updateData(id, data);
            }
        })
        .catch(error => {
        });
}

function increaseQty(id) {
    fetch('/cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            action: 'increase',
            product_id: id
        })
    })
        .then(response => response.json())
        .then(data => {
            updateData(id, data);
        })
        .catch(error => {
        });
}

function deleteProduct(id) {
    fetch('/cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            action: 'delete',
            product_id: id
        })
    })
        .then(response => response.json())
        .then(data => {
            render(data);
            updateQty(data);
        })
        .catch(error => {
        });
}

function clearCart() {
    fetch('/cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            action: 'clear'
        })
    })
        .then(response => response.json())
        .then(data => {
            render(data);
            updateQty(data);
        })
        .catch(error => {
        });
}

function updateQty(data) {
    const cartQty = document.querySelectorAll('.text-quantity');
    const cartIcon = document.querySelectorAll('.header-cart_count_icon');

    cartQty.forEach(el => el.textContent = data['cart_qty']);
    cartIcon.forEach(el => {
        if (data['cart_qty'] === 0) {
            el.style.display = 'none';
        } else {
            el.style.display = 'inline';
        }
    })
}

function updateData(id, data) {
    const quantity = document.querySelector(`.cart-item-quantity[data-id="${id}"]`);
    quantity.textContent = data['cart_products'][id]['quantity'];

    const price = document.querySelector(`.cart-item-price[data-id="${id}"]`);
    price.textContent = '$' + data['cart_products'][id]['total_price'];

    const total = document.querySelectorAll('.cart-checkout-price');
    total.forEach(el => el.textContent = '$' + data['cart_price']);

    updateQty(data);
}

function render(data) {
    const cart = data['cart_products'];

    if (cart.length !== 0) {
        document.querySelector('.cart-items').textContent = '';
        for (const elem in cart) {
            const cartItemHtml = `<div class="cart-item">
                <picture class="cart-item-image">
                    <img src="/img/catalog/${cart[elem]['image']}.jpg" alt="${cart[elem]['image']}">
                </picture>
                <div class="cart-item-description">
                    <div class="cart-item-description-top">
                        <a class="cart-item-title" href="/product/?id=${cart[elem]['id']}">${cart[elem]['title']}</a>
                        <button class="cart-item-delete" type="button"><svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg" onclick="deleteProduct('${cart[elem]['id']}')">
                                <path d="M11.2453 9L17.5302 2.71516C17.8285 2.41741 17.9962 2.01336 17.9966 1.59191C17.997 1.17045 17.8299 0.76611 17.5322 0.467833C17.2344 0.169555 16.8304 0.00177586 16.4089 0.00140366C15.9875 0.00103146 15.5831 0.168097 15.2848 0.465848L9 6.75069L2.71516 0.465848C2.41688 0.167571 2.01233 0 1.5905 0C1.16868 0 0.764125 0.167571 0.465848 0.465848C0.167571 0.764125 0 1.16868 0 1.5905C0 2.01233 0.167571 2.41688 0.465848 2.71516L6.75069 9L0.465848 15.2848C0.167571 15.5831 0 15.9877 0 16.4095C0 16.8313 0.167571 17.2359 0.465848 17.5342C0.764125 17.8324 1.16868 18 1.5905 18C2.01233 18 2.41688 17.8324 2.71516 17.5342L9 11.2493L15.2848 17.5342C15.5831 17.8324 15.9877 18 16.4095 18C16.8313 18 17.2359 17.8324 17.5342 17.5342C17.8324 17.2359 18 16.8313 18 16.4095C18 15.9877 17.8324 15.5831 17.5342 15.2848L11.2453 9Z" />
                            </svg></button>
                    </div>
                    <ul class="cart-item-text">
                        <li>Price: <span class="cart-item-price" data-id="${cart[elem]['id']}">$${cart[elem]['total_price']}</span></li>
                        <!-- <li>Color: Red</li>
                    <li>Size: Xl</li> -->
                        <li>Quantity:
                            <button class="cart-item-change_quantity" onclick="decreaseQty('${cart[elem]['id']}')" type="button">-</button>
                            <span class="cart-item-quantity" data-id="${cart[elem]['id']}">${cart[elem]['quantity']}</span>
                            <button class="cart-item-change_quantity" onclick="increaseQty('${cart[elem]['id']}')" type="button">+</button>
                        </li>
                    </ul>
                </div>
            </div>`;
            document.querySelector('.cart-items').insertAdjacentHTML('beforeend', cartItemHtml);
        }
        const actionsHtml = `<section class="cart-actions">
            <h2 class="hidden">further actions</h2>
            <button class="cart-actions-clear" type="button" onclick="clearCart()">Clear shopping cart</button>
            <a class="cart-actions-continue" href="/catalog">Continue shopping</a>
        </section>`;
        document.querySelector('.cart-items').insertAdjacentHTML('beforeend', actionsHtml);

        const checkoutHtml = `<h2 class="hidden">sum total</h2>
        <p class="cart-checkout-text">ORDER SUMMARY</p>
        <hr class="cart-checkout-line">
        <p class="cart-checkout-text">
            <span>Order value</span>
            <span class="cart-checkout-price">$${data['cart_price']}</span>
        </p>
        <p class="cart-checkout-text">
            <span>Delivery fee</span>
            <span>free</span>
        </p>
        <hr class="cart-checkout-line">
        <p class="cart-checkout-text">
            <span>TOTAL (VAT included) </span>
            <span class="cart-checkout-price cart-checkout-total-price">$${data['cart_price']}</span>
        </p>
        <a class="cart-checkout-proceed" href="/login/?action=checkout">PROCEED TO CHECKOUT</a>`;
        document.querySelector('.cart-checkout').innerHTML = checkoutHtml;
    } else {
        const div = document.createElement('div');
        div.className = 'empty-cart';
        div.innerHTML = `<img src="/img/main/empty-cart.png" alt="empty cart image" /></br>
            <a class="cart-actions-continue" href="/catalog">Continue shopping</a>`;
        document.querySelector('.cart').replaceWith(div);
    }
}