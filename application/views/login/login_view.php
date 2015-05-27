

<?php echo validation_errors(); ?>
<?php echo form_open('verifylogin'); ?>
<div class="container-fluid">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
<div class="row">
    <div class="form-signin">
   <div class="col-lg-12 ">


<input type="text" size="20" id="inputUserName" name="username" class="form-control" placeholder="UserName"/>
<input type="password" size="20" id="inputPassword" name="password" class="form-control" placeholder="Password"/>

<input type="submit" value="Login" class="btn btn-lg btn-primary btn-block btn-signin"/><br/>

       <a href="#" class="forgot-password">Register</a>
   </div>
    </div>
    </div>
    </div>
</div>
</form>

