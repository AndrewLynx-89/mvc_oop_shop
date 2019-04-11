<form class="login100-form validate-form flex-sb flex-w" action="" method="post">
    <span class="login100-form-title p-b-32">Account Login</span>

    <span class="txt1 p-b-11">Email</span>
    <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
        <input class="input100" type="text" name="email" >
        <span class="focus-input100"></span>
    </div>

    <span class="txt1 p-b-11">Password</span>
    <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
        <input class="input100" type="password" name="password" >
        <span class="focus-input100"></span>
    </div>

    <div class="flex-sb-m w-full p-b-48">
        <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
            <label class="label-checkbox100" for="ckb1">Remember me</label>
        </div>

        <div>
            <a href="/user/forgot" class="txt3">
                Forgot Password?
            </a>
        </div>
    </div>

    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">
            Войти
        </button>
    </div>
</form>