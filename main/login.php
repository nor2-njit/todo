<?php 
session_start();
include "../includes/header.php";  
?>
<main>
		<img class = "banner" src="../images/banner.jpg"/>
		<h1> To-Do List </h1>

		<div class="sign_up">
		<form action="." method="post">
			<input type="hidden" name="action" value="verify_login">

			E-mail Address: <br>
				<input type="email" name="email" placeholder="E-mail Address"><br>

			Password: <br>
				<input type="password" name="password" placeholder="*********"><br>

			<input type="submit" value="Submit">
		</form>
		</div>

</main>


<?php include '../includes/footer.php'; ?>