function addToCart(id) {
    fetch('/cart', {
        method: 'POST',
        body: JSON.stringify({ product_id: id })
    })
        .then(response => {

        })
        .catch(error => {

        });
}