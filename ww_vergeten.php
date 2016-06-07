<?php
include('header.php');
?>
<div class="row">
    <div class="col-md-6 col-md-offset-2">
        <form method="post" action="/ww_vergeten_com.php">
            <div class="form-group">
                <label for="exampleInputUsername">Voer je e-mail adres in om opnieuw je wachtwoord op te vragen.</label>
                <input type="text" name="username" class="form-control" id="exampleInputUsername" placeholder="E-mail adres">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Voer je e-mail adres in om opnieuw je gebruikersnaam op te vragen.</label>
                <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="E-mail adres">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Verstuur</button>
        </form>
        <div class="row">
            <div class="col-md-12" style="padding-top:20px;">
                <a href="/login.php" class="btn btn-default">Terug</a>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');

?>
