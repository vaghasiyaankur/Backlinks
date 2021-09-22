<div class="auth-form-light text-left">
    <h4>Forget Password Email</h4>

  <form id="loginForm">      
       <div>
          <label for="message">You can reset password from bellow link:</label>
          <a href="{{ route('reset.password.get', $token) }}">Reset Password</a>
       </div>
   </form>
</div>