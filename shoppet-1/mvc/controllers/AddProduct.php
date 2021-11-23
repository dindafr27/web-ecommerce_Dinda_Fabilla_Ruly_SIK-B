<?php
class AddProduct extends Controller
{
	function Add()
	{
		$this->view("master", ["Page" => "addproduct", "PageName" => "addproduct"]);
	}
	function AddProductPost()
	{
		$title = $_POST["title"];
		$content = $_POST["content"];
		$name = $_POST["name"];
		$price = $_POST["price"];
		$image = '';
		$total = count($_FILES['upload']['name']);
		for ($i = 0; $i < $total; $i++) {
			$tmpFilePath = $_FILES['upload']['tmp_name'][$i];
			$image .= date("h") . date("i") . date("sa") . $_FILES['upload']['name'][$i] . ',';
			if ($tmpFilePath != "") {
				$newFilePath = "./public/images/product/" . date("h") . date("i") . date("sa") . $_FILES['upload']['name'][$i];
				if (move_uploaded_file($tmpFilePath, $newFilePath)) {
				}
			}
		}
		$GetModel = $this->model("tbl_post");
		$InsertToDb = $GetModel->AddPost($title, $content, $name, $price, $image);
		echo $image;
		header("Location: ../AddProduct/Add");
	}
}
