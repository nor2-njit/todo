<?php 
session_start();
include "../includes/header.php";  
?>
<main>
		<img class = "banner" src="../images/banner.jpg"/>
		<h1> Edit To-Do </h1>

		<table align="center" class="table_list">
		<tr>
			<th> ID </th>
			<th> Task </th>
			<th> Create Date </th>
			<th> Due Date </th>
			<th> Complete</th>
		</tr>
			
		<tr>
			<?php foreach ($incomplete_todos as $todo) { ?>
			<td><?php echo $todo['id']; ?>          </td>
			<td><?php echo $todo['message']; ?>     </td>
			<td><?php echo $todo['createddate']; ?> </td>
			<td><?php echo $todo['duedate']; ?>     </td>
			<td><?php echo $todo['isdone']; ?>      </td>
			<?php } ?>
		</tr>
		<br>		

	</table>
		
	<h4 align="center"> Edit Date </h4>
		<form action="." method="post">
			<input type="date" name="duedate"/>
			<input type="hidden" name="action" value="edit_todo_date">
            <input type="hidden" name="id" value="<?php echo $todo['id']; ?>"/>
            <input type="submit" value="Edit Date"/>
        </form>
				
	<h4> Edit Message </h4>
		<form action="." method="post">
			<input type="text" name="message"/> 
			<input type="hidden" name="action" value="edit_todo_message">
			<input type="hidden" name="id" value="<?php echo $todo['id']; ?>"/>
	        <input type="submit" value="Edit Message"/>
	    </form>
       	
	<a href="." align="center" action="todo_list"> <h4> Main Page </h4> </a>
	<a href="." align="center" action="sign_out"> <h4> Sign Out </h4> </a>
</main>


<?php include '../includes/footer.php'; ?>