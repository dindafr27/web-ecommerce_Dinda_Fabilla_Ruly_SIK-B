<?php
class tbl_post extends DB
{
	public function GetPost()
	{
		$qr = "SELECT * FROM tbl_post ORDER BY id DESC";
		return mysqli_query($this->con, $qr);
	}
	public function GetDetailPage($id)
	{
		$qr = "SELECT * FROM tbl_post WHERE tbl_post.id=$id";
		return mysqli_query($this->con, $qr);
	}
	public function Search($inputSearch)
	{
		$qr = "SELECT * FROM tbl_post WHERE tbl_post.title LIKE '%$inputSearch%' LIMIT 6";
		return mysqli_query($this->con, $qr);
	}
	public function AddPost($title, $content, $name,  $price, $image)
	{
		$qr = "INSERT INTO tbl_post (title,content,name,price,image,active)
		VALUES ('$title', '$content', '$name', '$price', '$image',1)";
		return mysqli_query($this->con, $qr);
	}

	public function DeleteProduct($id)
	{
		$qr = "DELETE FROM tbl_post WHERE id=$id";
		return mysqli_query($this->con, $qr);
	}
}
