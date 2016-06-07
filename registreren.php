<?php
include('header.php');

?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form method="post" action="/reg_com.php">
	        <div class="form-group">
		        <label for="Naam">Naam</label>
		        <input type="text" name="naam" class="form-control" id="Naam" placeholder="Naam">
	        </div>
	        <div class="form-group">
		        <label for="Emailadres">Emailadres</label>
		        <input type="email" name="emailadres" class="form-control" id="Emailadres" placeholder="Emailadres">
	        </div>
            <div class="form-group">
                <label for="Password">Wachtwoord</label>
                <input type="text" name="password" class="form-control" id="Password" placeholder="Wachtwoord">
            </div>
            <div class="form-group">
                <label for="Password_again">Herhaling Password</label>
                <input type="text" name="password_again" class="form-control" id="Password_again" placeholder="Wachtwoord nog een keer">
            </div>
	        <div class="form-group">
		        <label for="School">School</label>
		        <input type="text" name="school" class="form-control" id="School" placeholder="School">
	        </div>
	        <div class="form-group">
		        <label for="Adres">Adres</label>
		        <input type="text" name="adres" class="form-control" id="Adres" placeholder="Adres">
	        </div>
            <div class="checkbox">
                <label for="algemene_voorwaarden">
                    <input  name="av[]" type="checkbox" id="algemene_voorwaarden" value="value1">Ik ga akkoord met de algemene voorwaarden
                </label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Registreer</button>
        </form>
        <div class="row">
            <div class="col-md-8" style="padding-top:20px;">
                <a class="btn btn-default" href='/login.php'>login</a>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');

?>