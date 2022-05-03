<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?= $data->title; ?></title>
		<?= $this->section('meta'); ?>
		<?= $this->section('css'); ?>
		<?= $this->section('scripts'); ?>
	</head>
	<body>
		<?= $this->section('content'); ?>
	</body>
</html>
