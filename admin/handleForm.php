<?php
session_start();

include '../includes/env.php';
include '../includes/functions.php';
// var_dump($_POST);
// var_dump($_FILES);
// echo "<br><hr><br>";

if (isset($_POST['action']) && $_POST['action'] == 'save-post') {

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
		// dd(mysqli_error($conn));
		$result = ['type' => 'error', 'message' => 'There was an error. Please contact admin.'];
	}

    echo json_encode($result);
    die;
}

if (isset($_POST['action']) && $_POST['action'] == 'update-photos') {
	$captions = escape($_POST['caption']);
    $active = $_POST['is_active'];

    foreach ($captions as $id => $caption) {

        $isActive = 0;
        if (array_key_exists($id, $active)) {
            $isActive = 1;
        }

        $sql = "UPDATE photos SET caption='$caption', is_active='$isActive' WHERE id = ".$id;
        if(mysqli_query($conn, $sql)){
        	$result = ['type' => 'success', 'message' => 'Photos have been updated.'];
		} else {
			dd(mysqli_error($conn));
			$result = ['type' => 'error', 'message' => 'There was an error. Please contact admin.'];
		}
    }

    echo json_encode($result);
    die;
}
	
if (isset($_POST['action']) && $_POST['action'] == 'new-photos') {

	$createdAt = date('Y-m-d H:i:s');
	$targetDir = "../img/uploaded/";

	if (isset($_FILES)) {

		$imageNumber = 1;
	
		foreach($_FILES as $file) {
			if ($file['name'] != '') {
				$temp = explode(".", $file["name"]); 
				$newFileName = round(microtime(true)).rand(1,100).'.'.end($temp);
				$targetFile = $targetDir.$newFileName;
				$return = uploadAttachment($targetFile, $file);

				// Don't insert in DB unless upload was successful
				if ($return == "success") {
					$sql = "INSERT INTO photos (path, caption, is_active, created_at) VALUES ('$newFileName', '', 1, '$createdAt')";
				        if(mysqli_query($conn, $sql)){
				    	$result = ['type' => 'success', 'message' => 'Photos have been updated.'];
					} else {
						// dd(mysqli_error($conn));
						$result = ['type' => 'error', 'message' => 'There was an error. Please contact admin.'];
					}
				}

				$imageNumber++;
			}
		}
	}

	header("Location: ".URL."/admin/photos.php?message=".$result['type']);
	die();
}

if(isset($_POST['ckCsrfToken'])) {

	if (isset($_FILES)) {

		$targetDir = "../img/uploaded/";
		$imageNumber = 1;
	
		foreach($_FILES as $file) {
			if ($file['name'] != '') {
				$temp = explode(".", $file["name"]); 
				$newFileName = round(microtime(true)).rand(1,100).'.'.end($temp);
				$targetFile = $targetDir.$newFileName;
				$return = uploadAttachment($targetFile, $file);

				// Don't insert in DB unless upload was successful
				// if ($return == "success") {
				// 	$sql = "INSERT INTO photos (path, caption, is_active, created_at) VALUES ('$newFileName', '', 1, '$createdAt')";
				//         if(mysqli_query($conn, $sql)){
				//     	$result = ['type' => 'success', 'message' => 'Photos have been updated.'];
				// 	} else {
				// 		// dd(mysqli_error($conn));
				// 		$result = ['type' => 'error', 'message' => 'There was an error. Please contact admin.'];
				// 	}
				// }

				$imageNumber++;
			}
		}
	}

	$fileUrl = URL."/img/uploaded/".$newFileName;

	$result = [
		'uploaded' => 1,
		'filename' => $newFileName,
		'url' => $fileUrl
	];

	echo json_encode($result);
	die;
}


?>