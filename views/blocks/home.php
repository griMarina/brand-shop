<main>
    <section class="promo">
        <div class="container promo-container">
            <h1 class="promo-heading">
                <span class="promo-heading-brand">THE BRAND</span><br>
                <span class="promo-heading-lux">OF LUXURIOUS</span>
                <span class="promo-heading-fashion">FASHION</span>
            </h1>
        </div>
    </section>
    <section class="categories container">
        <h2 class="hidden">categories of products</h2>
        <a class="categories-card categories-women" href="/catalog/women">
            <span class="categories-text">WOMEN</span>
        </a>
        <a class="categories-card categories-men" href="/catalog/men">
            <span class="categories-text">MEN</span>
        </a>
        <a class="categories-card categories-kids" href="/catalog/kids">
            <span class="categories-text">KIDS</span>
        </a>
    </section>
    <section class="products container">
        <h2 class="products-heading">Featured Items</h2>
        <p class="products-text">Shop for items based on what we featured during this week</p>
        <section class="products-items">
            <?php foreach ($products as $product) : ?>
                <figure class="products-card">
                    <a class="products-card-link" href="/product/?id=<?= $product['id'] ?>">
                        <div class="products-card-image">
                            <img class="products-card-img" src="/img/catalog/<?= $product['main_img'] ?>.jpg" alt="<?= $product['id'] ?>" />
                            <div class="products-card-overlay"></div>
                        </div>
                        <figcaption class="products-card-info">
                            <h3 class="products-card-heading"><?= $product['title'] ?></h3>
                            <p class="products-card-text"><?= $product['desc'] ?></p>
                            <p class="products-card-pricetag">$<?= $product['price'] ?></p>
                        </figcaption>
                    </a>
                </figure>
            <?php endforeach; ?>
        </section>
        <a class="products-all" href="/catalog">Browse All Products</a>
    </section>
    <section class="benefits">
        <h2 class="hidden">company's advantages</h2>
        <div class="container benefits-container">
            <div class="benefits-item">
                <img src="/img/main/van-icon.svg" alt="delivery">
                <h3 class="benefits-heading">Free Delivery</h3>
                <p class="benefits-text">Worldwide delivery on all. Authorit tively morph next-generation innovation with extensive models.</p>
            </div>
            <div class="benefits-item">
                <img src="/img/main/percentage-icon.svg" alt="discounts">
                <h3 class="benefits-heading">Sales & discounts</h3>
                <p class="benefits-text">Worldwide delivery on all. Authorit tively morph next-generation innovation with extensive models.</p>
            </div>
            <div class="benefits-item">
                <img src="/img/main/crown-icon.svg" alt="assurance">
                <h3 class="benefits-heading">Quality assurance</h3>
                <p class="benefits-text">Worldwide delivery on all. Authorit tively morph next-generation innovation with extensive models.</p>
            </div>
        </div>
    </section>
</main>