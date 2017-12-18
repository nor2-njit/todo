<?php
session_start();
include '../includes/header.php'; 
?>

<main>
	<img class = "banner" src="../images/banner.jpg"/>
	<h1> Welcome <?php echo " " . $_SESSION['name']; ?></h1>
	<table align="center" class="table_list"> <h3> Incomplete </h3>
		<tr>
			<th> ID </th>
			<th> Task </th>
			<th> Create Date </th>
			<th> Due Date </th>
			<th> Complete</th>
			<th>  </th>
			<th>  </th>
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
					<input type="hidden" name="action" value="isdone_todo">
                    <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
                    <input type="submit" value="Complete">
				</form>
			</td>

			<td> 
				<form action="." method="post">
					<input type="hidden" name="action" value="edit_todo">
                    <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
                    <input type="submit" value="Edit">
				</form>
			</td>
		</tr>
		<?php } ?>
	</table>

	<table align="center" class="table_list"> <h3> Complete </h3>
		<tr>
			<th> ID </th>
			<th> Task </th>
			<th> Create Date </th>
			<th> Due Date </th>
			<th> Complete</th>
		</tr>

		<tr>
			<?php foreach ($complete_todos as $todo) { ?>
			<td><?php echo $todo['id']; ?>          </td>
			<td><?php echo $todo['message']; ?>     </td>
			<td><?php echo $todo['createddate']; ?> </td>
			<td><?php echo $todo['duedate']; ?>     </td>
			<td><?php echo $todo['isdone']; ?>      </td>
			<td>
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="edit_todo" />
					<input type="hidden" name="todo_id"/>
					<input type="submit" value="Complete"/>
				</form>
			</td>
			<td>
				<form action="." method="post">
					<input type="hidden" name="action" value="delete_todo">
                    <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
                    <input type="submit" value="Delete">
				</form>
			</td>
		</tr>
		<?php } ?>
	</table>

	<form method="POST" id="add_form"> </form>
	<table align="center" class="table_list"> <h3> Add A New To-Do </h3>
		<tr>
			<th> Message </th>
			<th> Due Date </th>
		</tr>
		<tr>
			<td> <input type="text" name="message" form="add_form"/> </td>
			<td> <input type="date" name="duedate" form="add_form"/> </td>
			<td> <input type="submit" value="Add" form="add_form"/>  </td>
		</tr>
	</table>

	<a href="." align="center" action="sign_out"> <h4> Sign Out </h4> </a>




</main>

<?php include '../includes/footer.php'; ?>