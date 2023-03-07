<main>
    <section class="breadcrumb">
        <div class="container breadcrumb-container">
            <h1 class="breadcrumb-heading">LOG IN</h1>
        </div>
    </section>
    <div class="checkout-option container">
        <section class="checkout-option-login">
            <form class="checkout-option-login-form" method="POST" action="/login">
                <h2 class="checkout-option-login-form-heading">Welcome back!</h2>
                <input hidden name="action" value="login">
                <input class="checkout-option-login-form-info" name="username" type="text" placeholder="Username" required>
                <input class="checkout-option-login-form-info" name="password" type="password" placeholder="Password" required>
                <input class="checkout-option-login-form-submit" type="submit" value="Log in">
            </form>
        </section>
        <section class="checkout-option-register">
            <h2 class="checkout-option-login-form-heading">I'm new here</h2>
            <a class="checkout-option-register-link" href="/registration">Create account</a>
            <?php if ($action == 'checkout') : ?>
                <a class="checkout-option-register-link" href="/checkout">Continue as guest</a>
            <?php endif; ?>
        </section>
    </div>
</main>