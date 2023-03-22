<main>
    <section class="breadcrumb">
        <div class="container admin-nav">
            <div class="admin-nav-top">
                <p class="admin-nav-top-heading">ADMIN PANEL</p>
                <a class="admin-nav-logout logout-mob" href="/"><span>Log out</span></a>
            </div>
            <ul class="admin-nav-categories">
                <li class="admin-nav-category <?= ($tab == 'products') ? 'active' : '' ?> "><a href="/admin/products"><span>PRODUCTS</span></a></li>
                <li class="admin-nav-category <?= ($tab == 'users') ? 'active' : '' ?> "><a href="/admin/users"><span>USERS</span></a></li>
                <li class="admin-nav-category <?= ($tab == 'orders') ? 'active' : '' ?> "><a href="/admin/orders"><span>ORDERS</span></a></li>
            </ul>
            <a class="admin-nav-logout logout-desk" href="/admin/?action=logout"><span>Log out</span></a>
        </div>
    </section>
    <section class="admin container">
        <?php if ($tab == 'products') : ?>
            <div class="admin-products">
                <div class="admin-top">
                    <div>
                        <a class="admin-top-btn" href="/admin/add-product">ADD NEW</a>
                        <!-- <a class="admin-top-btn" href="#">DELETE</a> -->
                    </div>
                    <section class="admin-top-pagination">
                        <h2 class="hidden">page selection</h2>
                        <a href="#">
                            <svg class="admin-top-pagination-icon" width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.99512 2L3.99512 7L8.99512 12L7.99512 14L0.995117 7L7.99512 0L8.99512 2Z" />
                            </svg>
                        </a>
                        <a href="#" class="admin-top-active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">...</a>
                        <a href="#">20</a>
                        <a href="#">
                            <svg class="admin-top-pagination-icon" width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.994995 12L5.995 7L0.994995 2L1.995 0L8.995 7L1.995 14L0.994995 12Z" />
                            </svg>
                        </a>
                    </section>
                </div>
                <div class="admin-table-wrapper">
                    <table class="admin-table sortable">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Section</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td class="admin-table-checkbox"><input type="checkbox" name="" id=""></td>
                                <td><a class="admin-table-view" href="/admin/product/?id=<?= $product['id'] ?>"><?= $product['id'] ?></a></td>
                                <td><a class="admin-table-view" href="/admin/product/?id=<?= $product['id'] ?>"><?= $product['title'] ?></a></td>
                                <td>$<?= $product['price'] ?></td>
                                <td><?= $product['section'] ?></td>
                                <td><?= $product['category'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        <?php elseif ($tab == 'product') : ?>
            <div class="admin-product">
                <form class="admin-product-form" method="POST" action="/admin/product" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $product->get_id() ?>">
                    <fieldset class="admin-product-form-field">
                        <img class="admin-product-form-img" src="/img/slide-small/<?= $image->get_title() ?>-slide-1-small.jpg" alt="<?= $image->get_title() ?>">
                        <!-- <input type="file" name="new_img"> -->
                    </fieldset>
                    <fieldset class="admin-product-form-field">
                        <label for="id">Id</label>
                        <input id="id" class="admin-product-form-input" name="id" type="text" value="<?= $product->get_id() ?>" disabled>
                        <label for="title">Title</label>
                        <input id="title" class="admin-product-form-input" name="title" type="text" value="<?= $product->get_title() ?>">
                        <label for="price">Price, $</label>
                        <input id="price" class="admin-product-form-input" name="price" type="number" value="<?= $product->get_price() ?>">
                        <label for="desc">Description</label>
                        <textarea id="desc" class="admin-product-form-input" name="desc" rows="4" cols="50"><?= $product->get_desc() ?></textarea>
                        <div class="admin-product-form-btn">
                            <button class="admin-product-form-join" type="submit" name="action" value="edit">EDIT</button>
                            <button class="admin-product-form-join" type="submit" name="action" value="delete">DELETE</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        <?php elseif ($tab == 'add-product') : ?>
            <div class="admin-product">
                <form class="admin-product-form" method="POST" enctype="multipart/form-data" action="/admin/add-product">
                    <input hidden name="action" value="add">
                    <fieldset class="admin-product-form-field">
                        <img class="admin-product-form-img" src="/img/main/no-img.jpg" alt="no image">
                        <input type="file" name="new_img">
                    </fieldset>
                    <fieldset class="admin-product-form-field">
                        <label for="title">Title</label>
                        <input id="title" class="admin-product-form-input" name="title" type="text" value="">
                        <label for="desc">Description</label>
                        <textarea id="desc" class="admin-product-form-input" name="desc" rows="4" cols="50"></textarea>
                        <label for="price">Price, $</label>
                        <input id="price" class="admin-product-form-input" name="price" type="number" value="">
                        <label for="colour">Colour</label>
                        <input id="colour" class="admin-product-form-input" name="colour" type="text" value="">
                        <label for="section_id">Section</label>
                        <select class="admin-product-form-input" name="section_id" id="section_id">
                            <option value="1">Women</option>
                            <option value="2">Men </option>
                            <option value="3">Kids</option>
                        </select>
                        <label for="section_id">Category</label>
                        <select class="admin-product-form-input" name="category_id" id="category_id">
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id'] ?>"><?= ucfirst($category['title']) . ' (' . $category['section'] . ')' ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="admin-product-form-join" type="submit">ADD</button>
                    </fieldset>

                </form>
            </div>
        <?php elseif ($tab == 'users') : ?>
            <div class="admin-users">
                <div class="admin-top">
                    <div>
                        <a class="admin-top-btn" href="/admin/add-user">ADD NEW</a>
                        <!-- <a class="admin-top-btn" href="#">DELETE</a> -->
                    </div>
                    <section class="admin-top-pagination">
                        <h2 class="hidden">page selection</h2>
                        <a href="#">
                            <svg class="admin-top-pagination-icon" width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.99512 2L3.99512 7L8.99512 12L7.99512 14L0.995117 7L7.99512 0L8.99512 2Z" />
                            </svg>
                        </a>
                        <a href="#" class="admin-top-active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">...</a>
                        <a href="#">20</a>
                        <a href="#">
                            <svg class="admin-top-pagination-icon" width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.994995 12L5.995 7L0.994995 2L1.995 0L8.995 7L1.995 14L0.994995 12Z" />
                            </svg>
                        </a>
                    </section>
                </div>
                <div class="admin-table-wrapper">
                    <table class="admin-table sortable">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Id</th>
                                <th>Email / Username</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td class="admin-table-checkbox"><input type="checkbox" name="" id=""></td>
                                <td><a class="admin-table-view" href="/admin/user/?id=<?= $user['id'] ?>"><?= $user['id'] ?></a></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['first_name'] . ' ' . $user['last_name'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        <?php elseif ($tab == 'user') : ?>
            <div class="admin-user">
                <form class="admin-user-form" method="POST" action="/admin/add-user">
                    <input type="hidden" name="id" value="">
                    <label for="id">Id</label>
                    <input id="id" class="admin-user-form-input" name="id" type="text" value="" disabled>
                    <label for="emal">Email</label>
                    <input id="email" class="admin-user-form-input" name="email" type="email" value="" disabled>
                    <label for="first_name">First Name</label>
                    <input id="first_name" class="admin-user-form-input" name="first_name" type="text" placeholder="First Name" value="">
                    <label for="last_name">Last Name</label>
                    <input id="last_name" class="admin-user-form-input" name="last_name" type="text" placeholder="Last Name" value="">
                    <label for="phone">Phone</label>
                    <input id="phone" class="admin-user-form-input" name="phone" type="phone" placeholder="Phone" value="">
                    <label for="address">Address</label>
                    <input id="address" class="admin-user-form-input" name="address" type="address" placeholder="Address" value="">
                    <div class="admin-user-form-btn">
                        <button class="admin-user-form-join" type="submit" name="action" value="edit">EDIT</button>
                        <button class="admin-user-form-join" type="submit" name="action" value="delete">DELETE</button>
                    </div>
                </form>
            </div>
        <?php elseif ($tab == 'add-user') : ?>
            <div class="admin-user">
                <form class="admin-user-form" method="POST" action="/admin/add-user">
                    <input type="hidden" name="action" value="add">
                    <label for="emal">Email</label>
                    <input id="email" class="admin-user-form-input" name="email" type="email" placeholder="Email" value="">
                    <label for="first_name">First Name</label>
                    <input id="first_name" class="admin-user-form-input" name="first_name" type="text" placeholder="First Name" value="">
                    <label for="last_name">Last Name</label>
                    <input id="last_name" class="admin-user-form-input" name="last_name" type="text" placeholder="Last Name" value="">
                    <label for="phone">Phone</label>
                    <input id="phone" class="admin-user-form-input" name="phone" type="phone" placeholder="Phone" value="">
                    <label for="address">Address</label>
                    <input id="address" class="admin-user-form-input" name="address" type="address" placeholder="Address" value="">
                    <button class="admin-user-form-join" type="submit" name="action" value="edit">ADD</button>
                </form>
            </div>
        <?php elseif ($tab == 'orders') : ?>
            <div class="admin-orders">
                <div class="admin-top">
                    <div>
                        <a class="admin-top-btn" href="#">ADD NEW</a>
                        <!-- <a class="admin-top-btn" href="#">DELETE</a> -->
                    </div>
                    <section class="admin-top-pagination">
                        <h2 class="hidden">page selection</h2>
                        <a href="#">
                            <svg class="admin-top-pagination-icon" width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.99512 2L3.99512 7L8.99512 12L7.99512 14L0.995117 7L7.99512 0L8.99512 2Z" />
                            </svg>
                        </a>
                        <a href="#" class="admin-top-active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">...</a>
                        <a href="#">20</a>
                        <a href="#">
                            <svg class="admin-top-pagination-icon" width="9" height="14" viewBox="0 0 9 14" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.994995 12L5.995 7L0.994995 2L1.995 0L8.995 7L1.995 14L0.994995 12Z" />
                            </svg>
                        </a>
                    </section>
                </div>
                <div class="admin-table-wrapper">
                    <table class="admin-table sortable">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <td class="admin-table-checkbox"><input type="checkbox" name="" id=""></td>
                                <td><a class="admin-table-view" href="/admin/order/?id=<?= $order['id'] ?>"><?= $order['id'] ?></a></td>
                                <td><?= $order['email'] ?></td>
                                <td><?= $order['date'] ?></td>
                                <td><?= $order['status'] ?></td>
                                <td>$<?= $order['total'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        <?php elseif ($tab == 'order') : ?>
            <div class="admin-order">
                <section class="admin-order-summary">
                    <h2 class="admin-header">Order <?= $order['id'] ?></h2>
                    <div>
                        <p>Ordered: <?= $order['date'] ?></p>
                        <p>Status: <?= $order['status'] ?></p>
                        <p>Total: $<?= $order['total'] ?></p>
                    </div>
                    <div>
                        <p>Customer: </p>
                        <p>Name</p>
                        <p>Email</p>
                        <p>Address</p>
                    </div>
                </section>
                <section class="admin-order-items">
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
        <?php else : ?>
            <div class="account-index">
                <h2>Welcome Admin!</h2>
                <p>You can manage user's orders, returns and account's info right here.</p>
            </div>
        <?php endif; ?>
    </section>
</main>