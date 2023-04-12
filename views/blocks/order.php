<main>
    <section class="breadcrumb">
        <div class="container account-nav">
            <div class="account-nav-top">
                <a class="account-nav-top-heading" href="/account">Hi, <?= $user->get_first_name() ?>!</a>
                <a class="account-nav-logout logout-mob" href="/account/?action=logout"><span>Logout</span></a>
            </div>
            <ul class="account-nav-categories">
                <li class="account-nav-category"><a href="/account/orders"><span>ORDERS</span></a></li>
                <li class="account-nav-category"><a href="/account/info"><span>PERSONAL DETAILS</span></a>
                </li>
                <li class="account-nav-category"><a href="/account/"><span>RETURNS</span></a></li>
                <li class="account-nav-category"><a href="/account/"><span>WISH LIST</span></a></li>
            </ul>
            <a class="account-nav-logout logout-desk" href="/account/?action=logout"><span>Logout</span></a>
        </div>
    </section>
    <section class="account container">
        <div class="account-order">
            <h2 class="account-header">Order: <?= $order->get_id() ?></h2>
            <div class="order-summary">
                <p>Ordered: <?= $order->get_date() ?></p>
                <p>Status: <?= $order->get_status() ?></p>
                <p>Total: $<?= $order->get_total() ?></p>
            </div>
            <section class="order-items">
                <?php foreach ($cart as $item) : ?>
                    <div class="order-item">
                        <picture class="order-item-image">
                            <img src="/img/catalog/<?= $item['image'] ?>.jpg" alt="<?= $item['image'] ?>">
                        </picture>
                        <p class="order-item-description">
                            <a class="order-item-title" href="/product/?id=<?= $item['product_id'] ?>"><span><?= $item['title'] ?></span></a>
                            <span class="order-item-qty"> Quantity: <?= $item['quantity'] ?></span>
                            <span>Price: $<?= $item['price'] * $item['quantity'] ?></span>
                        </p>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </section>
</main>