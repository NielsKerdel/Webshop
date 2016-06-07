<?php
include('header.php');
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form method="post" action="/login_com.php">
            <div class="form-group">
                <label for="Emailadres">Emailadres</label>
                <input type="text" name="emailadres" class="form-control" id="Emailadres" placeholder="Emailadres">
            </div>
            <div class="form-group">
                <label for="InputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Inloggen</button>
        </form>
        <div class="row">
            <div class="col-md-12" style="padding-top:20px;">
                <a class="btn btn-default" href='/registreren.php'>Registreren</a>
                <a class="btn btn-default" href='/ww_vergeten.php'>Wachtwoord vergeten</a>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');

?>
