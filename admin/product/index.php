<?php
require_once('../../database/dbhelper.php');
require_once('../../common/pagination.php');
?>

<!DOCTYPE html>
<html>

<head>
	<title>Products Management</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" style="color:black" href="../category/">Category Management</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href="#">Products Management</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" style="color:black" href="../../frontend/">HomePage</a>
		</li>
	</ul>

	<div class="wrapper">
		<div class="container">
			<div class="panel-heading">
				<h2 class="text-center">PRODUCTS</h2>
			</div>

			<div class="panel-body">
				<div class="row grid">
					<div class="col-lg-6">
						<a href="add.php">
							<button class="bt bt-up" style="margin-left: 60px">Create</button>
						</a>
					</div>

					<div class="col-lg-6">
						<form id="form-search" method="get" style="width: 100%">
							<div class="form-group search">
								<input class="searchspace" id="search" name="search" style="width: 100%; float: right" type="text" placeholder="Search...">
								<i id="icon" class="fas fa-search"></i>
							</div>
						</form>
					</div>
				</div>

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px"></th>
							<th>Image</th>
							<th>Name</th>
							<th>Price</th>
							<th>Category</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>

					<tbody>
						<!-- get products -->
						<?php
						$limit = 3;
						$page = 1;

						if (isset($_GET['page'])) {
							$page = $_GET['page'];
						}

						$firstIndex = ($page - 1) * $limit;

						$search = '';
						if (isset($_GET['search'])) {
							$search = $_GET['search'];
						}

						$additional = '';
						if (!empty($search)) {
							$additional = 'and title like "%' . $search . '%"';
						}

						$sql          = 'select product.id, product.title, product.price, product.thumbnail, category.name category_name from product left join category on product.id_category = category.id where 1 order by id DESC' . $additional . ' limit ' . $firstIndex . ', ' . $limit;
						$productList = executeResult($sql);

						$sql = 'select count(id) as total from product where 1 ' . $additional;
						$countResult = executeSingleResult($sql);
						$number = 0;
						if ($countResult != null) {
							$count = $countResult['total'];
							$number = ceil($count / $limit);
						}

						$index = 1;

						foreach ($productList as $item) {
							echo '<tr>
										<td>' . ($index++) . '</td>
										<td><img src="../../common/images/' . $item['thumbnail'] . '" style="max-width: 200px"/></td>
										<td>' . $item['title'] . '</td>
										<td>' . $item['price'] . '</td>
										<td>' . $item['category_name'] . '</td>
										<td>
											<a href="add.php?id=' . $item['id'] . '"><button class="btn-up bt-up">Update</button></a>
										</td>
										<td>
											<button class="btn-del bt-up" onclick="deleteProduct(' . $item['id'] . ')">Delete</button>
										</td>
									</tr>';
						}
						?>
					</tbody>
				</table>

				<!-- pagination  -->
				<?= pagination($number, $page, '&search=' . $search) ?>
			</div>
		</div>
	</div>

	<!-- confirm -->
	<script type="text/javascript">
		function deleteProduct(id) {
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