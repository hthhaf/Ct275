<?php
require_once('../../database/dbhelper.php');

$id = $title = $price = $thumbnail = $content = $id_category = '';
if (!empty($_POST)) {
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}

	if (isset($_POST['title'])) {
		$title = $_POST['title'];
		$title = str_replace('"', '\\"', $title);
	}

	if (isset($_POST['price'])) {
		$price = $_POST['price'];
	}

	if (isset($_FILES['thumbnail'])) {
		$thumbnail = $_FILES['thumbnail']['name'];
		move_uploaded_file($_FILES['thumbnail']['tmp_name'], "../../common/images/" . $_FILES['thumbnail']['name']);
	}

	if (isset($_POST['content'])) {
		$content = $_POST['content'];
		$content = str_replace('"', '\\"', $content);
	}
	if (isset($_POST['id_category'])) {
		$id_category = $_POST['id_category'];
	}

	// update product
	if (!empty($title)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');

		if ($id == '') {
			$sql = 'insert into product(title, price, thumbnail, content, id_category, created_at, updated_at) values ("' . $title . '", "' . $price . '", "' . $thumbnail . '", "' . $content . '", "' . $id_category . '", "' . $created_at . '", "' . $updated_at . '")';
		} else {
			$sql = 'update product set title = "' . $title . '", price = "' . $price . '", thumbnail = "' . $thumbnail . '", content = "' . $content . '", id_category = "' . $id_category . '",  updated_at = "' . $updated_at . '" where id = ' . $id;
		}

		execute($sql);

		header('Location: index.php');
	}

	$nameimg = basename($_FILES['thumbnail']['name']);
}



if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	$sql      = 'select * from product where id = ' . $id;
	$product = executeSingleResult($sql);
	if ($product != null) {
		$title = $product['title'];
		$price = $product['price'];
		$thumbnail = $product['thumbnail'];
		$content = $product['content'];
		$id_category = $product['id_category'];
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>UPDATE PRODUCTS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
</head>

<body>
	<div class="wrapper">
		<div class="innerProduct">
			<div class="preview">
				<img id="img_product" src="../../common/images/<?=$thumbnail?>">
			</div>

			<form action="" method="post" enctype="multipart/form-data">
				<h3>UPDATE PRODUCTS</h3>

				<div class="form-group ">
					<label for="title">Name: </label>
					<input type="text" name="id" value="<?= $id ?>" hidden="true">
					<input required="true" type="text" class="form-control" id="title" name="title" value="<?= $title ?>">
				</div>

				<div class="form-group">
					<label for="id_category">Category</label>
					<select class="form-control" name="id_category" id="id_category">
						<option>Select</option>
						<?php
						$sql          = 'select * from category';
						$categoryList = executeResult($sql);

						foreach ($categoryList as $item) {
							echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
						}
						?>
					</select>
				</div>

				<div class="form-group">
					<label for="price">Price:</label>
					<input type="text" name="id" value="<?= $id ?>" hidden="true">
					<input required="true" type="number" class="form-control" id="price" name="price" value="<?= $price ?>">
				</div>

				<div class="form-group">
					<label for="thumbnail">Images:</label>
					<input required="true" type="file" id="thumbnail" name="thumbnail" value="'<?= $nameimg ?>">
				</div>

				<div>
					<label for="content">Content:</label>
					<textarea id="summernote" name="content"><?= $content ?></textarea>
				</div>
				
				<div class="row gird" style="margin-top: 32px;">
					<div class="col-lg-6">
						<button class="bt-up">Save</button>
					</div>

					<div class="col-lg-6">
						<button class="bt-up bt-back"><a href="index.php">Back</a></button>
					</div>
				</div>

			</form>
		</div>
	</div>

	<script type="text/javascript">

			$(document).ready(function() {
				$('#summernote').summernote({
					hight: 600,
					placeholder: 'Enter content...',
					toolbar: [
						['style', ['bold', 'italic', 'underline', 'clear']],
						['font', ['strikethrough', 'superscript', 'subscript']],
						['fontsize', ['fontsize']],
						['color', ['color']],
						['para', ['ul', 'ol', 'paragraph']],
						['height', ['height']]
					]
				});
			});
	</script>

</body>

</html>