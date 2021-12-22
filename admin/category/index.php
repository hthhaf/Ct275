<?php
require_once('../../database/dbhelper.php');
require_once('../../common/pagination.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Category Management</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link active" href="#">Category Management</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" style="color:black" href="../product/">Products Management</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" style="color:black" href="../../frontend/">HomePage</a>
		</li>
	</ul>

	<div class="wrapper">
		<div class="container">
			<div class="panel-heading">
				<h2 class="text-center">CATEGORY</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="bt bt-up">Create</button>
				</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Category</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<!-- Get category -->
						<?php
						$limit = 7;
						$page = 1;
						if (isset($_GET['page'])) {
							$page = $_GET['page'];
						}
						$firstIndex = ($page - 1) * $limit;

						$sql          = 'select * from category where 1 limit ' . $firstIndex . ' , ' . $limit;
						$categoryList = executeResult($sql);

						$sql = 'select count(id) as total from category order by id DESC';
						$countResult = executeSingleResult($sql);
						$count = $countResult['total'];
						$number = ceil($count / $limit);

						$index = 1;
						foreach ($categoryList as $item) {
							echo '<tr>
									<td>' . (++$firstIndex) . '</td>
									<td>' . $item['name'] . '</td>
									<td>
										<a href="add.php?id=' . $item['id'] . '"><button class="btn-up bt-up">Update</button></a>
									</td>
									<td>
										<button class="btn-del bt-up" onclick="deleteCategory(' . $item['id'] . ')">Delete</button>
									</td>
								</tr>';
						}
						?>
					</tbody>
				</table>

				<!-- pagination -->
				<?= pagination($number, $page, '') ?>
			</div>
		</div>
	</div>

	<!-- confirm -->
	<script type="text/javascript">
		function deleteCategory(id) {
			var option = confirm('Are you sure you want to delete this item?')
			if (!option) {
				return;
			}

			console.log(id)
			$.post('ajax.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>

</html>