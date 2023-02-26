function addToCart(id) {
    fetch('/cart', {
        method: 'POST',
        body: JSON.stringify({
            action: 'add',
            product_id: id
        })
    })
        .then(response => {

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
            if (data['quantity'] === 0) {
                deleteProduct(id);
            } else {
                const quantity = document.querySelector(`.cart-item-quantity[data-id="${id}"]`);
                quantity.textContent = data['quantity'];

                const price = document.querySelector(`.cart-item-price[data-id="${id}"]`);
                price.textContent = '$' + data['total_product_price'];

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
            const quantity = document.querySelector(`.cart-item-quantity[data-id="${id}"]`);
            quantity.textContent = data['quantity'];

            const price = document.querySelector(`.cart-item-price[data-id="${id}"]`);
            price.textContent = '$' + data['total_product_price'];
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
            render(data)
        })
        .catch(error => {

        });
}

function render(data) {
    if (data.length !== 0) {
        document.querySelector('.cart-items').textContent = '';
        for (const elem in data) {
            const cartItemHtml = `<div class="cart-item">
        <picture class="cart-item-image">
            <img src="/img/catalog/${data[elem]['image']}.jpg" alt="${data[elem]['image']}">
        </picture>
        <div class="cart-item-description">
            <div class="cart-item-description-top">
                <h3 class="cart-item-title">${data[elem]['title']}</h3>
                <button class="cart-item-delete" type="button"><svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg" onclick="deleteProduct(${data[elem]['id']})">
                        <path d="M11.2453 9L17.5302 2.71516C17.8285 2.41741 17.9962 2.01336 17.9966 1.59191C17.997 1.17045 17.8299 0.76611 17.5322 0.467833C17.2344 0.169555 16.8304 0.00177586 16.4089 0.00140366C15.9875 0.00103146 15.5831 0.168097 15.2848 0.465848L9 6.75069L2.71516 0.465848C2.41688 0.167571 2.01233 0 1.5905 0C1.16868 0 0.764125 0.167571 0.465848 0.465848C0.167571 0.764125 0 1.16868 0 1.5905C0 2.01233 0.167571 2.41688 0.465848 2.71516L6.75069 9L0.465848 15.2848C0.167571 15.5831 0 15.9877 0 16.4095C0 16.8313 0.167571 17.2359 0.465848 17.5342C0.764125 17.8324 1.16868 18 1.5905 18C2.01233 18 2.41688 17.8324 2.71516 17.5342L9 11.2493L15.2848 17.5342C15.5831 17.8324 15.9877 18 16.4095 18C16.8313 18 17.2359 17.8324 17.5342 17.5342C17.8324 17.2359 18 16.8313 18 16.4095C18 15.9877 17.8324 15.5831 17.5342 15.2848L11.2453 9Z" />
                    </svg></button>
            </div>
            <ul class="cart-item-text">
                <li>Price: <span class="cart-item-price" data-id="${data[elem]['id']}">$${data[elem]['total_price']}</span></li>
                <!-- <li>Color: Red</li>
            <li>Size: Xl</li> -->
                <li>Quantity:
                    <button class="cart-item-change_quantity" onclick="decreaseQty(${data[elem]['id']})" type="button">-</button>
                    <span class="cart-item-quantity" data-id="${data[elem]['id']}">${data[elem]['quantity']}</span>
                    <button class="cart-item-change_quantity" onclick="increaseQty(${data[elem]['id']})" type="button">+</button>
                </li>
            </ul>
        </div>
    </div>`;
            document.querySelector('.cart-items').insertAdjacentHTML('afterbegin', cartItemHtml);
        }
        const cartCheckoutHtml = `<form class="cart-form">
                <h2 class="cart-form-heading">SHIPPING ADRESS</h2>
                <input class="cart-form-info" type="text" placeholder="Country" required>
                <input class="cart-form-info" type="text" placeholder="State">
                <input class="cart-form-info" type="text" placeholder="Postcode / Zip" pattern="[0-9]{6}" required>
                <input class="cart-form-submit" type="submit" value="Get a quote">
            </form>
            <div class="cart-box">
                <div class="cart-sum">
                    <h2 class="hidden">sum total</h2>
                    <p class="cart-sum-bigtext">GRAND TOTAL<span class="cart-sum-bigprice">$</span></p>
                    <hr class="cart-sum-line">
                    <a class="cart-sum-proceed" href="#">PROCEED TO CHECKOUT</a>
                </div>
            </div>`;
        document.querySelector('.cart-checkout').innerHTML = cartCheckoutHtml;
    } else {
        document.querySelector('.cart').innerHTML = '<p>The cart is empty</p>';
    }
}