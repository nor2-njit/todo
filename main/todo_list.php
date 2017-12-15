<?php include '../includes/header.php'; ?>

<main>
	<h1> Welcome <?php " " . $name; ?></h1>
	<table align="center" class="table_list">
		<tr>
			<th> ID </th>
			<th> Task </th>
			<th> Create Date </th>
			<th> Due Date </th>
			<th> Complete</th>
		</tr>
		<?php count($todos); ?>
		<?php foreach($todos as $todo): ?>
		<tr>
			<td><?php echo $todo['id']; ?></td>
			<td><?php echo $todo['message']; ?></td>
			<td><?php echo $todo['createddate']; ?></td>
			<td><?php echo $todo['duedate']; ?></td>
			<td><?php echo $todo['isdone']; ?></td>
			
			<td>
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="edit_todo" />
					<input type="hidden" name="todo_id"
							value="<?php echo $todo['todo_id']; ?>"/>
					<input type="submit" value="complete"/>
				</form>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>

</main>

<?php include '../includes/footer.php'; ?>