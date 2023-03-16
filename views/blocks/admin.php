<main>
    <section class="breadcrumb">
        <div class="container admin-nav">
            <div class="admin-nav-top">
                <p class="admin-nav-top-heading">ADMIN PANEL</p>
                <a class="admin-nav-logout logout-mob" href="/"><span>Log out</span></a>
            </div>
            <ul class="admin-nav-categories">
                <li class="admin-nav-category <?= ($tab == 'users') ? 'active' : '' ?> "><a href="/admin/users"><span>CUSTOMER MANAGEMENT</span></a></li>
                <li class="admin-nav-category <?= ($tab == 'products') ? 'active' : '' ?> "><a href="/admin/products"><span>PRODUCT MANAGEMENT</span></a>
                </li>
            </ul>
            <a class="admin-nav-logout logout-desk" href="/admin/?action=logout"><span>Log out</span></a>
        </div>
    </section>
    <section class="admin container">
        <?php if ($tab == 'users') : ?>
            <!-- USERS -->
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
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Peter Pen </td>
                            <td>
                                peter@pen.com </td>
                        </tr>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Peter Pen </td>
                            <td>
                                peter@pen.com </td>
                        </tr>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Peter Pen </td>
                            <td>
                                peter@pen.com </td>
                        </tr>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Peter Pen </td>
                            <td>
                                peter@pen.com </td>
                        </tr>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Peter Pen </td>
                            <td>
                                peter@pen.com </td>
                        </tr>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Peter Pen </td>
                            <td>
                                peter@pen.com </td>
                        </tr>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Peter Pen </td>
                            <td>
                                peter@pen.com </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- PRODUCTS -->
        <?php elseif ($tab == 'products') : ?>
            <div class="admin-products">
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
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Price, $</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Next TAILORED STANDARD - Day dress </td>
                            <td>
                                83
                            <td>
                                100 </td>
                        </tr>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Next TAILORED STANDARD - Day dress </td>
                            <td>
                                83
                            <td>
                                100 </td>
                        </tr>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Next TAILORED STANDARD - Day dress </td>
                            <td>
                                83
                            <td>
                                100 </td>
                        </tr>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Next TAILORED STANDARD - Day dress </td>
                            <td>
                                83
                            <td>
                                100 </td>
                        </tr>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Next TAILORED STANDARD - Day dress </td>
                            <td>
                                83
                            <td>
                                100 </td>
                        </tr>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Next TAILORED STANDARD - Day dress </td>
                            <td>
                                83
                            <td>
                                100 </td>
                        </tr>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Next TAILORED STANDARD - Day dress </td>
                            <td>
                                83
                            <td>
                                100 </td>
                        </tr>
                        <tr>
                            <td class="admin-table-checkbox">
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <a class="admin-table-view" href="/user">1</a>
                            </td>
                            <td>
                                Next TAILORED STANDARD - Day dress </td>
                            <td>
                                83
                            <td>
                                100 </td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </section>
</main>