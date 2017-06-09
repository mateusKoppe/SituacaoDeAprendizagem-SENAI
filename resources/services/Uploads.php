<?php 

namespace services;

class Uploads {

	public function uploadFile($file){
		return move_uploaded_file($file['tmp_name'], './uploads/'. $file['name']);
	}

	public function uploadArray($files){
		$status = false;
		foreach ($files['name'] as $key => $file) {
			$success = move_uploaded_file($files['tmp_name'][$key], './uploads/'. $files['name'][$key]);
			$status = $success || $status;
		}
		return $success;
	}

	public function removeFile($file){
		@unlink("./uploads/$file");
	}

}