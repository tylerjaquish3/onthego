<?php
session_start();

include '../includes/env.php';
include '../includes/functions.php';
var_dump($_POST);

if (isset($_POST) && $_POST['action'] == 'save-post') {

	$isNew = $_POST['is_new'] == "true" ? true : false;
	$postId = $_POST['post_id'];
	$title = $_POST['title'];
	$contentHtml = escape($_POST['content_html']);
	$categoryId = $_POST['category'];
	$isActive = $_POST['is_active'];
	$createdBy = $_SESSION["user_id"];
	$updatedAt = date('Y-m-d H:i:s');

	// If post is a new one, insert
	if ($isNew) {
		$sql = "INSERT INTO posts (title, content_html, category_id, is_active, created_by, updated_at) VALUES ('$title', '$contentHtml', $categoryId, $isActive, $createdBy, '$updatedAt')";
	} else {
		// Post already exists, update
		$sql = "UPDATE posts SET title='$title', content_html='$contentHtml', category_id=$categoryId, is_active=$isActive, created_by=$createdBy, updated_at='$updatedAt' WHERE id = ".$postId;
	}

	// dd($sql);

	// If the user is new, send an email to update password
	if(mysqli_query($conn, $sql)){
		
		if ($isNew && $isActive) {
			$result = ['type' => 'success', 'message' => 'Post has been saved and published.'];
		} elseif ($isNew) {
			$result = ['type' => 'success', 'message' => 'Post has been saved as draft.'];
		} elseif ($isActive) {
			$result = ['type' => 'success', 'message' => 'Post has been updated and published.'];
		} else {
			$result = ['type' => 'success', 'message' => 'Post has been updated and saved as draft.'];
		}
	} else {
		dd(mysqli_error($conn));
		$result = ['type' => 'error', 'message' => 'There was an error. Please contact admin.'];
	}

    echo json_encode($result);
    die;
}
	


?>