<main>
    <section class="breadcrumb">
        <div class="container admin-nav">
            <div class="admin-nav-top">
                <a class="admin-nav-top-heading" href="/admin">ADMIN PANEL</a>
                <a class="admin-nav-logout logout-mob" href="/admin/?action=logout"><span>Log out</span></a>
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
                    <!-- <section class="admin-top-pagination">
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
                    </section> -->
                </div>
                <div class="admin-table-wrapper">
                    <table class="admin-table sortable">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Id</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Section</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <!-- <td class="admin-table-checkbox"><input type="checkbox" name="" id=""></td> -->
                                <td><a class="admin-table-view" href="/admin/product/?id=<?= $product['id'] ?>"><?= $product['id'] ?></a></td>
                                <td><?= $product['title'] ?></td>
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
                        <input id="title" class="admin-product-form-input" name="title" type="text" value="<?= $product->get_title() ?>" required>
                        <label for="price">Price, $</label>
                        <input id="price" class="admin-product-form-input" name="price" type="number" value="<?= $product->get_price() ?>" required>
                        <label for="desc">Description</label>
                        <textarea id="desc" class="admin-product-form-input" name="desc" rows="4" cols="50" required><?= $product->get_desc() ?></textarea>
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
                        <input id="title" class="admin-product-form-input" name="title" type="text" value="" required>
                        <label for="desc">Description</label>
                        <textarea id="desc" class="admin-product-form-input" name="desc" rows="4" cols="50" required></textarea>
                        <label for="price">Price, $</label>
                        <input id="price" class="admin-product-form-input" name="price" type="number" value="" required>
                        <label for="colour">Colour</label>
                        <input id="colour" class="admin-product-form-input" name="colour" type="text" value="" required>
                        <label for="section_id">Section</label>
                        <select class="admin-product-form-input" name="section_id" id="section_id" required>
                            <option value="1">Women</option>
                            <option value="2">Men </option>
                            <option value="3">Kids</option>
                        </select>
                        <label for="section_id">Category</label>
                        <select class="admin-product-form-input" name="category_id" id="category_id" required>
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
                <!-- <div class="admin-top">
                    <div>
                        <a class="admin-top-btn" href="/admin/add-user">ADD NEW</a>
                        <a class="admin-top-btn" href="#">DELETE</a>
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
                </div> -->
                <div class="admin-table-wrapper">
                    <table class="admin-table sortable">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Id</th>
                                <th>Email / Username</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <!-- <td class="admin-table-checkbox"><input type="checkbox" name="" id=""></td> -->
                                <td><a class="admin-table-view" href="/admin/user/?user_id=<?= $user['id'] ?>"><?= $user['id'] ?></a></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['first_name'] . ' ' . $user['last_name'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        <?php elseif ($tab == 'user') : ?>
            <div class="admin-user">
                <form class="admin-user-form" method="POST" action="/admin/user">
                    <input type="hidden" name="user_id" value="<?= $user->get_id() ?>">
                    <label for="id">Id</label>
                    <input id="id" class="admin-user-form-input" name="id" type="text" value="<?= $user->get_id() ?>" disabled>
                    <label for="emal">Email</label>
                    <input id="email" class="admin-user-form-input" name="email" type="email" value="<?= $user->get_username() ?>" disabled>
                    <label for="first_name">First Name</label>
                    <input id="first_name" class="admin-user-form-input" name="first_name" type="text" placeholder="First Name" value="<?= $user->get_first_name() ?>" required>
                    <label for="last_name">Last Name</label>
                    <input id="last_name" class="admin-user-form-input" name="last_name" type="text" placeholder="Last Name" value="<?= $user->get_last_name() ?>" required>
                    <label for="phone">Phone</label>
                    <input id="phone" class="admin-user-form-input" name="phone" type="tel" pattern="[0-9]{3,10}" placeholder="Phone" value="<?= $user->get_phone() ?>" required>
                    <label for="address">Address</label>
                    <input id="address" class="admin-user-form-input" name="address" type="text" placeholder="Address" value="<?= $user->get_address() ?>" required>
                    <div class="admin-user-form-btn">
                        <button class="admin-user-form-join" type="submit" name="action" value="edit">EDIT</button>
                        <button class="admin-user-form-join" type="submit" name="action" value="delete">DELETE</button>
                    </div>
                </form>
            </div>
        <?php elseif ($tab == 'orders') : ?>
            <div class="admin-orders">
                <!-- <div class="admin-top">
                    <div>
                        <a class="admin-top-btn" href="#">ADD NEW</a>
                        <a class="admin-top-btn" href="#">DELETE</a>
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
                </div> -->
                <div class="admin-table-wrapper">
                    <table class="admin-table sortable">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Id</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <!-- <td class="admin-table-checkbox"><input type="checkbox" name="" id=""></td> -->
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
                    <div class="admin-order-summary-top">
                        <h2 class="admin-order-header">Order: <?= $order->get_id() ?></h2>
                        <form class="admin-order-form" method="POST" action="/admin/order">
                            <input hidden name="id" value="<?= $order->get_id() ?>">
                            <select class="admin-order-form-input" name="status">
                                <option value="">Change order status</option>
                                <option value="pending">Pending</option>
                                <option value="awaiting payment">Awaiting Payment</option>
                                <option value="completed">Completed</option>
                                <option value="shipped">Shipped</option>
                                <option value="refunded">Refunded</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            <div class="admin-order-form-btn">
                                <button class="admin-order-form-join" type="submit" name="action" value="update-status">Save</button>
                                <button class="admin-order-form-join" type="submit" name="action" value="delete">Delete order</button>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="admin-order-summary-bottom">
                        <div>
                            <p class="admin-order-summary-text"><span>Customer:</span></p>
                            <p class="admin-order-summary-text"><?= $order->get_first_name() . ' ' . $order->get_last_name() ?></p>
                            <p class="admin-order-summary-text"><?= $order->get_address() ?></p>
                            <p class="admin-order-summary-text"><?= $order->get_email() ?></p>
                        </div>
                        <div>
                            <p class="admin-order-summary-text"><span> Order details:</span></p>
                            <p class="admin-order-summary-text">Ordered: <?= $order->get_date() ?></p>
                            <p class="admin-order-summary-text">Status: <?= $order->get_status() ?></p>
                            <p class="admin-order-summary-text">Total: $<?= $order->get_total() ?></p>
                        </div>
                    </div>
                </section>
                <hr>
                <section class="admin-order-items">
                    <?php foreach ($cart as $item) : ?>
                        <div class="order-item">
                            <picture class="order-item-image">
                                <img src="/img/catalog/<?= $item['image'] ?>.jpg" alt="<?= $item['image'] ?>">
                            </picture>
                            <p class="order-item-description">
                                <a class="order-item-title" href="/admin/product/?id=<?= $item['product_id'] ?>"><span><?= $item['title'] ?></span></a>
                                <span class="order-item-qty"> Quantity: <?= $item['quantity'] ?></span>
                                <span>Price: $<?= $item['price'] * $item['quantity'] ?></span>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>
        <?php else : ?>
            <div class="account-index">
                <?php if ($status == 'product-added') : ?>
                    <p>New product has been successfully added!</p>
                <?php elseif ($status == 'product-updated') : ?>
                    <p>Product has been successfully updated!</p>
                <?php elseif ($status == 'product-deleted') : ?>
                    <p>Product has been successfully deleted!</p>
                <?php elseif ($status == 'user-updated') : ?>
                    <p>User's data has been successfully updated!</p>
                <?php elseif ($status == 'user-deleted') : ?>
                    <p>User has been successfully deleted!</p>
                <?php elseif ($status == 'order-deleted') : ?>
                    <p>Order has been successfully deleted!</p>
                <?php else : ?>
                    <h2>Welcome Admin!</h2>
                    <p>You can manage user's orders, returns and account's info right here.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </section>
</main>