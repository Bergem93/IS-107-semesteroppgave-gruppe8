<?php

session_start();

// ***************************************** //
// **********	DECLARE VARIABLES  ********** //
// ***************************************** //

$username = 'username';
$password = '12345';

$random1 = 'secret_key1';
$random2 = 'secret_key2';

$hash = md5($random1.$password.$random2); 

$self = $_SERVER['prosjekt.hia.no/user/haakb12/BareSiDet'];


// ************************************ //
// **********	USER LOGOUT  ********** //
// ************************************ //

if(isset($_GET['logout']))
{
	unset($_SESSION['login']);
}


// ******************************************* //
// **********	USER IS LOGGED IN	********** //
// ******************************************* //

if (isset($_SESSION['login']) && $_SESSION['login'] == $hash) {

	?>
	
	<p>Vennligst logg inn</p>
	<?php
	display_login_form();
	
	
	?>
	
	<?php
}


// *********************************************** //
// **********	FORM HAS BEEN SUBMITTED	********** //
// *********************************************** //

else if (isset($_POST['submit'])) {

	if ($_POST['username'] == $username && $_POST['password'] == $password){
	
		//IF USERNAME AND PASSWORD ARE CORRECT SET THE LOG-IN SESSION
		$_SESSION["login"] = $hash;
		?>
		<p>Hei <?php echo $username; ?>, du har logget inn!</p>
		<div id="skjema">
		<form method="post" action="">
		<textarea rows="20" cols="50" name="Melding2"></textarea>
		<br/>
		<input type="submit"> 
		</form>
		<br>
		<a href="?logout=true">Logg ut?</a>
		
<?php
		
		
	} else {
		
		// DISPLAY FORM WITH ERROR
		display_login_form();
		echo '<p>Passord eller brukernavn er feil</p>';
		
	}
}	
	
	
// *********************************************** //
// **********	SHOW THE LOG-IN FORM	********** //
// *********************************************** //

else { 

	display_login_form();
	

}


function display_login_form(){ ?>

	<form action="<?php echo $self; ?>" method='post'>
	<label for="username">Brukernavn</label>
	<input type="text" name="username" id="username">
	<label for="password">Passord</label>
	<input type="password" name="password" id="password">
	<input type="submit" name="submit" value="submit">
	</form>	
	
	
	<form method="link" action="http://prosjekt.hia.no/users/haakb12/BareSiDet/index.html">
	<input type="submit" value="Tilbake til hovesiden">
	</form>

<?php } ?>

