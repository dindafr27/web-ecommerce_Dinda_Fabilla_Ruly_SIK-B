<?php
class ApiController extends Controller
{

	function Search($inputSearch)
	{
		$GetModel = $this->model("tbl_post");
		$GetPost = $GetModel->Search($inputSearch);

		$result = array();
		foreach ($GetPost as $res) {
			$GetPost = array();
			$GetPost['id'] = $res['id'];
			$GetPost['title'] = $res['title'];
			$GetPost['name'] = $res['name'];
			$GetPost['image'] = $res['image'];
			array_push($result, $GetPost);
		}
		echo $res = json_encode($result);
	}
}
