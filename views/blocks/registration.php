<main>
    <section class="breadcrumb">
        <div class="container breadcrumb-container">
            <h1 class="breadcrumb-heading">REGISTRATION</h1>
        </div>
    </section>
    <section class="reg container">
        <?php if ($status == 'ok') : ?>
            <p class="reg-success">You have successfully registered!<br>Thank you for joining us!</p>
        <?php else : ?>
            <h2 class="hidden">registration</h2>
            <section>
                <h2 class="hidden">registration info</h2>
                <form class="reg-form" method="POST" action="/registration">
                    <fieldset class="reg-form-heading">
                        <input hidden name="action" value="join">
                        Your Name
                        <input class="reg-form-info" name="first_name" type="text" placeholder="First Name" required>
                        <input class="reg-form-info" name="last_name" type="text" placeholder="Last Name" required>
                    </fieldset>
                    <fieldset class="reg-form-heading">
                        Contact details
                        <input class="reg-form-info" name="phone" type="tel" pattern="[0-9]{3,10}" placeholder="Phone" required>
                        <input class="reg-form-info" name="address" type="text" placeholder="Address" required>
                    </fieldset>
                    <fieldset class="reg-form-heading">
                        Login details
                        <?php if ((isset($status)) && $status == 'error') : ?>
                            <p class="reg-form-error">This login email already exists.</p>
                        <?php endif; ?>
                        <input class="reg-form-info" name="email" type="email" placeholder="Email" required>
                        <input class="reg-form-info" name="password" type="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                    </fieldset>
                    <p class="reg-form-text">Please use 8 or more characters, with at least 1 number and a mixture of uppercase and lowercase letters</p>
                    <button class="reg-form-join" type="submit">JOIN NOW<svg width="17" height="10" viewBox="0 0 17 10" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.54 0.208095C11.6058 0.142131 11.684 0.0897967 11.77 0.0540883C11.8561 0.01838 11.9483 0 12.0415 0C12.1347 0 12.2269 0.01838 12.313 0.0540883C12.399 0.0897967 12.4772 0.142131 12.543 0.208095L16.7929 4.458C16.8589 4.5238 16.9112 4.60196 16.9469 4.68802C16.9826 4.77407 17.001 4.86632 17.001 4.95949C17.001 5.05266 16.9826 5.14491 16.9469 5.23097C16.9112 5.31702 16.8589 5.39518 16.7929 5.46098L12.543 9.71089C12.41 9.84389 12.2296 9.91861 12.0415 9.91861C11.8534 9.91861 11.673 9.84389 11.54 9.71089C11.407 9.57788 11.3323 9.39749 11.3323 9.2094C11.3323 9.0213 11.407 8.84091 11.54 8.70791L15.2898 4.95949L11.54 1.21107C11.474 1.14528 11.4217 1.06711 11.386 0.981059C11.3503 0.895005 11.3319 0.802752 11.3319 0.709584C11.3319 0.616415 11.3503 0.524162 11.386 0.438109C11.4217 0.352055 11.474 0.273891 11.54 0.208095Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4.95948C0 4.77162 0.0746263 4.59146 0.207462 4.45862C0.340297 4.32579 0.52046 4.25116 0.708318 4.25116H15.583C15.7708 4.25116 15.951 4.32579 16.0838 4.45862C16.2167 4.59146 16.2913 4.77162 16.2913 4.95948C16.2913 5.14734 16.2167 5.3275 16.0838 5.46033C15.951 5.59317 15.7708 5.6678 15.583 5.6678H0.708318C0.52046 5.6678 0.340297 5.59317 0.207462 5.46033C0.0746263 5.3275 0 5.14734 0 4.95948Z" />
                        </svg>
                    </button>
                </form>
            </section>
            <aside class="reg-perks">
                <h2 class="reg-perks reg-perks-heading">LOYALTY HAS ITS PERKS</h2>
                <p class="reg-perks-text">Get in on the loyalty program where you can earn points and unlock serious perks. Starting with these as soon as you join:</p>
                <ul class="reg-perks-list">
                    <li>15% off welcome offer</li>
                    <li>Free shipping, returns and exchanges on all orders</li>
                    <li>$10 off a purchase on your birthday</li>
                    <li>Early access to products</li>
                    <li>Exclusive offers & rewards</li>
                </ul>
            </aside>
        <?php endif; ?>
    </section>
</main>