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
            quantity = document.querySelector('.cart-item-quantity');
            quantity.textContent = data['quantity'];
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
            quantity = document.querySelector('.cart-item-quantity');
            quantity.textContent = data['quantity'];
        })
        .catch(error => {

        });
}