<?php 
session_start();
include "../includes/header.php";  
?>
<main>
		<img class = "banner" src="../images/banner.jpg"/>
		<h1> Edit To-Do </h1>

		<table align="center" class="table_list"> <h3> Incomplete </h3>
		<tr>
			<th> ID </th>
			<th> Task </th>
			<th> Create Date </th>
			<th> Due Date </th>
			<th> Complete</th>
			<th> &nbsp; </th>
			<th> &nbsp; </th>
		</tr>
			
		<tr>
			<?php foreach ($incomplete_todos as $todo) { ?>
			<td><?php echo $todo['id']; ?>          </td>
			<td><?php echo $todo['message']; ?>     </td>
			<td><?php echo $todo['createddate']; ?> </td>
			<td><?php echo $todo['duedate']; ?>     </td>
			<td><?php echo $todo['isdone']; ?>      </td>
			<td>
				<form action="." method="post">
					<input type="hidden" name="action" value="isdone_todo"/>
                    <input type="hidden" name="id" value="<?php echo $todo['id']; ?>"/>
                    <input type="submit" value="Complete"/>
				</form>
			</td>
			<?php } ?>
		</tr>
		<br>
		<tr> 
			<td> Edit Date
				<form action="." method="post">
				<input type="date" name="duedate" form="add_form"/> 
                <input type="hidden" name="id" value="<?php echo $todo['id']; ?>"/>
                <input type="submit" value="Edit Date"/>
            	</form>
			</td>

		</tr>

		<tr> 
			<td> Edit Message 
				<form action="." method="post">
				<input type="text" name="message" form="add_form"/> 
				<input type="hidden" name="id" value="<?php echo $todo['id']; ?>"/>
	            <input type="submit" value="Edit Message"/>
	            </form>
       		</td>
		</tr>

	</table>

	<a href="." align="center" action="sign_out"> <h4> Main Page </h4> </a>
	<a href="." align="center"> <h4> Sign Out </h4> </a>
</main>


<?php include '../includes/footer.php'; ?>