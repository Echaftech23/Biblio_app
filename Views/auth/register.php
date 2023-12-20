<form autocomplete="off" action="" method="post" class="sign-up-form">
    <input type="hidden" id="action" value="register" />
    <h2 class="title">Sign up</h2>
    <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" id="username" placeholder="Username" />
    </div>
    <div class="input-field">
        <i class="fas fa-phone"></i>
        <input type="text" id="phone" placeholder="Phone" />
    </div>
    <div class="input-field">
        <i class="fas fa-envelope"></i>
        <input type="email" id="email" placeholder="Email" />
    </div>
    <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" id="password" placeholder="Password" />
    </div>
    <button type="button" onclick="submitData();" class="btn register">Sign up</button>
    <p class="social-text">Or Sign up with social platforms</p>
    <div class="social-media">
        <a href="#" class="social-icon">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-google"></i>
        </a>
        <a href="#" class="social-icon">
            <i class="fab fa-linkedin-in"></i>
        </a>
    </div>
</form>
<script>
    function submitData(event) {
        event.preventDefault();
    }
          </script>