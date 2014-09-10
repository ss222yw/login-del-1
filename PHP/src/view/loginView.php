<?php

class loginView{

	public function showLoginView (){

		$htmlBody = '<form action="" method="POST" >
<h1>Login - Skriv in användarnamn och lösenord</h1>
<p>
<label>användarnamn : </label> <input typ="text" name="name" maxlength="10"/>
<label>losenord: </label><input typ="password" name="pass" maxlength="10"/>
<br/>
<br/>
</p>
<input type="submit" name="submit" value="logga in"/> 
</form>';

    return $htmlBody;
	}


	

}

?>