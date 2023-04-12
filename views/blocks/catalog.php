<main>
    <section class="breadcrumb">
        <div class="container breadcrumb-container">
            <ul class="breadcrumb-categories">
                <li class="breadcrumb-category"><a href="/catalog/women"><span>WOMEN</span></a></li>
                <li class="breadcrumb-category"><a href="/catalog/men"><span>MEN</span></a></li>
                <li class="breadcrumb-category"><a href="/catalog/kids"><span>KIDS</span></a></li>
            </ul>
            <ul class="breadcrumb-navigation">
                <li class="breadcrumb-link"><a href="/">Home</a></li>
                <li class="breadcrumb-link"><a href="/catalog">Products</a></li>
                <?php foreach ($crumbs as $crumb => $link) : ?>
                    <?php if ($crumb !== '') : ?>
                        <li class="breadcrumb-link"><a href="/catalog<?= $link ?>"><?= $crumb ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <section class="filter container">
        <h2 class="hidden">filter products</h2>
        <div class="filter-main">
            <details class="filter-title">
                <summary class="filter-title-text">FILTER<svg class="filter-title-icon" width="15" height="10" viewBox="0 0 15 10" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.833333 10H4.16667C4.625 10 5 9.625 5 9.16667C5 8.70833 4.625 8.33333 4.16667 8.33333H0.833333C0.375 8.33333 0 8.70833 0 9.16667C0 9.625 0.375 10 0.833333 10ZM0 0.833333C0 1.29167 0.375 1.66667 0.833333 1.66667H14.1667C14.625 1.66667 15 1.29167 15 0.833333C15 0.375 14.625 0 14.1667 0H0.833333C0.375 0 0 0.375 0 0.833333ZM0.833333 5.83333H9.16667C9.625 5.83333 10 5.45833 10 5C10 4.54167 9.625 4.16667 9.16667 4.16667H0.833333C0.375 4.16667 0 4.54167 0 5C0 5.45833 0.375 5.83333 0.833333 5.83333Z" />
                    </svg>
                </summary>
                <div>
                    <details class="filter-content">
                        <summary class="filter-content-title">WOMEN</summary>
                        <ul class="filter-content-list">
                            <li><a href="/catalog/women/dresses">Dresses</a></li>
                            <li><a href="/catalog/women/sweatshirts">Sweatshirts</a></li>
                            <li><a href="/catalog/women/t-shirts">T-Shirts</a></li>
                            <li><a href="/catalog/women/trousers">Trousers</a></li>
                            <li><a href="/catalog/women/jeans">Jeans</a></li>
                            <li><a href="/catalog/women/coats">Coats</a></li>
                            <li><a href="/catalog/women/shorts">Shorts</a></li>
                        </ul>
                    </details>
                    <details class="filter-content">
                        <summary class="filter-content-title">MEN</summary>
                        <ul class="filter-content-list">
                            <li><a href="/catalog/men/shirts">Shirts</a></li>
                            <li><a href="/catalog/men/sweatshirts">Sweatshirts</a></li>
                            <li><a href="/catalog/men/t-shirts">T-Shirts</a></li>
                            <li><a href="/catalog/men/trousers">Trousers</a></li>
                            <li><a href="/catalog/men/jeans">Jeans</a></li>
                            <li><a href="/catalog/men/coats">Coats</a></li>
                            <li><a href="/catalog/men/shorts">Shorts</a></li>
                        </ul>
                    </details>
                    <details class="filter-content">
                        <summary class="filter-content-title">KIDS</summary>
                        <ul class="filter-content-list">
                            <li><a href="/catalog/kids/t-shirts">T-Shirts</a></li>
                            <li><a href="/catalog/kids/sweatshirts">Sweatshirts</a></li>
                            <li><a href="/catalog/kids/jeans">Jeans</a></li>
                        </ul>
                    </details>
                </div>
            </details>
        </div>
        <div class="sorting">
            <!-- <div class="sorting-type">
                <input class="sorting-toggle" type="checkbox" id="sorting-toggle-trend">
                <label class="sorting-title" for="sorting-toggle-trend">TRENDING NOW<img class="sorting-icon" src="/img/main/dropdown-icon.svg" alt="unfold"></label>
                <div class="sorting-list sorting-trend">
                    <input type="checkbox">
                    <label class="sorting-list-value"></label><br>
                    <input type="checkbox">
                    <label class="sorting-list-value"></label><br>
                    <input type="checkbox">
                    <label class="sorting-list-value"></label><br>
                    <input type="checkbox">
                    <label class="sorting-list-value"></label><br>
                </div>
            </div>
            <div class="sorting-type sorting-type-size">
                <input class="sorting-toggle" type="checkbox" id="sorting-toggle-size">
                <label class="sorting-title" for="sorting-toggle-size">SIZE<img class="sorting-icon" src="/img/main/dropdown-icon.svg" alt="unfold"></label>
                <div class="sorting-list sorting-list-size sorting-size">
                    <input type="checkbox" id="size-xs" name="size" value="xs">
                    <label class="sorting-list-value" for="size-xs">XS</label><br>
                    <input type="checkbox" id="size-s" name="size" value="s">
                    <label class="sorting-list-value" for="size-s">S</label><br>
                    <input type="checkbox" id="size-m" name="size" value="m">
                    <label class="sorting-list-value" for="size-m">M</label><br>
                    <input type="checkbox" id="size-l" name="size" value="l">
                    <label class="sorting-list-value" for="size-l">L</label><br>
                </div>
            </div>
            <div class="sorting-type">
                <input class="sorting-toggle" type="checkbox" id="sorting-toggle-price">
                <label class="sorting-title" for="sorting-toggle-price">PRICE<img class="sorting-icon" src="/img/main/dropdown-icon.svg" alt="unfold"></label>
                <div class="sorting-list sorting-price">
                    <input type="checkbox">
                    <label class="sorting-list-value"></label><br>
                    <input type="checkbox">
                    <label class="sorting-list-value"></label><br>
                    <input type="checkbox">
                    <label class="sorting-list-value"></label><br>
                    <input type="checkbox">
                    <label class="sorting-list-value"></label><br>
                </div>
            </div> -->
        </div>
    </section>
    <section class="products container">
        <h2 class="hidden">featured products</h2>
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
        <!-- <section class="pagination">
            <h2 class="hidden">page selection</h2>
            <a href="#">
                <svg class="pagination-icon" width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.99512 2L3.99512 7L8.99512 12L7.99512 14L0.995117 7L7.99512 0L8.99512 2Z" />
                </svg>
            </a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">...</a>
            <a href="#">20</a>
            <a href="#">
                <svg class="pagination-icon" width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.994995 12L5.995 7L0.994995 2L1.995 0L8.995 7L1.995 14L0.994995 12Z" />
                </svg>
            </a>
        </section> -->
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