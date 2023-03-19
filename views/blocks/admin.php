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
                        <a class="admin-top-btn" href="#">DELETE</a>
                        <!-- <button class="admin-top-btn">ADD NEW</button>
                        <button class="admin-top-btn">DELETE</button> -->
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
                <div class="admin-product-img">
                    <img src="/img/slide-small/<?= $product['image'] ?>-slide-1-small.jpg" alt="<?= $product['image'] ?>">
                    <div class="admin-product-img-upload-form">
                        <form class="form" method="POST" enctype="multipart/form-data">
                            <input type="file" name="new_img">
                            <input type="submit" value="Upload">
                        </form>
                    </div>
                </div>
                <div class="admin-productt-info">
                    <form class="admin-product-form" method="POST" action="/admin">
                        <input hidden name="action" value="edit_info">
                        <label for="id">Id</label>
                        <input id="id" class="admin-product-form-info" name="id" type="text" value="<?= $product['id'] ?> " disabled>
                        <label for="title">Title</label>
                        <input id="title" class="admin-product-form-info" name="title" type="text" value="<?= $product['title'] ?> ">
                        <label for="price">Price</label>
                        <input id="price" class="admin-product-form-info" name="price" type="text" value="<?= $product['price'] ?> ">
                        <label for="desc">Description</label>
                        <textarea id="desc" class="admin-product-form-info" name="desc" rows="4" cols="50"><?= $product['desc'] ?></textarea>
                        <button class="admin-product-form-join" type="submit">EDIT<svg width="17" height="10" viewBox="0 0 17 10" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.54 0.208095C11.6058 0.142131 11.684 0.0897967 11.77 0.0540883C11.8561 0.01838 11.9483 0 12.0415 0C12.1347 0 12.2269 0.01838 12.313 0.0540883C12.399 0.0897967 12.4772 0.142131 12.543 0.208095L16.7929 4.458C16.8589 4.5238 16.9112 4.60196 16.9469 4.68802C16.9826 4.77407 17.001 4.86632 17.001 4.95949C17.001 5.05266 16.9826 5.14491 16.9469 5.23097C16.9112 5.31702 16.8589 5.39518 16.7929 5.46098L12.543 9.71089C12.41 9.84389 12.2296 9.91861 12.0415 9.91861C11.8534 9.91861 11.673 9.84389 11.54 9.71089C11.407 9.57788 11.3323 9.39749 11.3323 9.2094C11.3323 9.0213 11.407 8.84091 11.54 8.70791L15.2898 4.95949L11.54 1.21107C11.474 1.14528 11.4217 1.06711 11.386 0.981059C11.3503 0.895005 11.3319 0.802752 11.3319 0.709584C11.3319 0.616415 11.3503 0.524162 11.386 0.438109C11.4217 0.352055 11.474 0.273891 11.54 0.208095Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4.95948C0 4.77162 0.0746263 4.59146 0.207462 4.45862C0.340297 4.32579 0.52046 4.25116 0.708318 4.25116H15.583C15.7708 4.25116 15.951 4.32579 16.0838 4.45862C16.2167 4.59146 16.2913 4.77162 16.2913 4.95948C16.2913 5.14734 16.2167 5.3275 16.0838 5.46033C15.951 5.59317 15.7708 5.6678 15.583 5.6678H0.708318C0.52046 5.6678 0.340297 5.59317 0.207462 5.46033C0.0746263 5.3275 0 5.14734 0 4.95948Z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        <?php elseif ($tab == 'add-product') : ?>
            <div class="admin-product">
                <div class="admin-product-img">
                    <img src="/img/main/no-img.jpg" alt="no image">
                    <div class="admin-product-img-upload-form">
                        <form class="form" method="POST" enctype="multipart/form-data">
                            <input type="file" name="new_img">
                            <input type="submit" value="Upload">
                        </form>
                    </div>
                </div>
                <div class="admin-productt-info">
                    <form class="admin-product-form" method="POST" action="/admin/add-product">
                        <input hidden name="action" value="add">
                        <label for="title">Title</label>
                        <input id="title" class="admin-product-form-info" name="title" type="text" value="">
                        <label for="desc">Description</label>
                        <textarea id="desc" class="admin-product-form-info" name="desc" rows="4" cols="50"></textarea>
                        <label for="price">Price, $</label>
                        <input id="price" class="admin-product-form-info" name="price" type="text" value="">
                        <label for="colour">Colour</label>
                        <input id="colour" class="admin-product-form-info" name="colour" type="text" value="">
                        <label for="section_id">Section</label>
                        <select name="section_id" id="section_id">
                            <option value="1">Women</option>
                            <option value="2">Men </option>
                            <option value="3">Kids</option>
                        </select>
                        <label for="section_id">Category</label>
                        <select name="category_id" id="category_id">
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id'] ?>"><?= ucfirst($category['title']) . ' (' . $category['section'] . ')' ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="admin-product-form-join" type="submit">ADD<svg width="17" height="10" viewBox="0 0 17 10" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.54 0.208095C11.6058 0.142131 11.684 0.0897967 11.77 0.0540883C11.8561 0.01838 11.9483 0 12.0415 0C12.1347 0 12.2269 0.01838 12.313 0.0540883C12.399 0.0897967 12.4772 0.142131 12.543 0.208095L16.7929 4.458C16.8589 4.5238 16.9112 4.60196 16.9469 4.68802C16.9826 4.77407 17.001 4.86632 17.001 4.95949C17.001 5.05266 16.9826 5.14491 16.9469 5.23097C16.9112 5.31702 16.8589 5.39518 16.7929 5.46098L12.543 9.71089C12.41 9.84389 12.2296 9.91861 12.0415 9.91861C11.8534 9.91861 11.673 9.84389 11.54 9.71089C11.407 9.57788 11.3323 9.39749 11.3323 9.2094C11.3323 9.0213 11.407 8.84091 11.54 8.70791L15.2898 4.95949L11.54 1.21107C11.474 1.14528 11.4217 1.06711 11.386 0.981059C11.3503 0.895005 11.3319 0.802752 11.3319 0.709584C11.3319 0.616415 11.3503 0.524162 11.386 0.438109C11.4217 0.352055 11.474 0.273891 11.54 0.208095Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4.95948C0 4.77162 0.0746263 4.59146 0.207462 4.45862C0.340297 4.32579 0.52046 4.25116 0.708318 4.25116H15.583C15.7708 4.25116 15.951 4.32579 16.0838 4.45862C16.2167 4.59146 16.2913 4.77162 16.2913 4.95948C16.2913 5.14734 16.2167 5.3275 16.0838 5.46033C15.951 5.59317 15.7708 5.6678 15.583 5.6678H0.708318C0.52046 5.6678 0.340297 5.59317 0.207462 5.46033C0.0746263 5.3275 0 5.14734 0 4.95948Z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        <?php elseif ($tab == 'users') : ?>
            <div class="admin-users">
                <div class="admin-top">
                    <div>
                        <!-- <a class="admin-top-btn" href="#">ADD NEW USER</a>
                        <a class="admin-top-btn" href="#">DELETE</a> -->
                        <button class="admin-top-btn">ADD NEW</button>
                        <button class="admin-top-btn">DELETE</button>
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
                                <td><a class="admin-table-view" href="/user"><?= $user['id'] ?></a></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['first_name'] . ' ' . $user['last_name'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        <?php elseif ($tab == 'orders') : ?>
            <div class="admin-orders">
                <div class="admin-top">
                    <div>
                        <!-- <a class="admin-top-btn" href="#">ADD NEW USER</a>
                    <a class="admin-top-btn" href="#">DELETE</a> -->
                        <button class="admin-top-btn">ADD NEW</button>
                        <button class="admin-top-btn">DELETE</button>
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
                                <td><a class="admin-table-view" href="/order/?id=<?= $order['id'] ?>"><?= $order['id'] ?></a></td>
                                <td><?= $order['email'] ?></td>
                                <td><?= $order['date'] ?></td>
                                <td><?= $order['status'] ?></td>
                                <td>$<?= $order['total'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        <?php else : ?>
            <div class="account-index">
                <h2>Welcome Admin!</h2>
                <p>You can manage user's orders, returns and account's info right here.</p>
            </div>
        <?php endif; ?>
    </section>
</main>