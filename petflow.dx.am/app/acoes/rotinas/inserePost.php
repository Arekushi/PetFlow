<?php
	require_once '../../../vendor/autoload.php';
	\app\date\Location::setTimeZone();

	if (session_status() != PHP_SESSION_ACTIVE) session_start();
	$post = new \app\model\Post();

	$post->setDataPostagem(date("Y-m-d h:i:s"));
	$post->setIdUsuario($_SESSION['cod']);
	$post->setVisibilidade(1);
	$post->setImagemPostagem(null);

	if (isset($_POST['idAnimal'])) {
		$post->setIdAnimal($_POST['idAnimal']);
	} else {
		$post->setIdAnimal(null);
	}

	if (isset($_POST['txtDescricao'])) {
		$post->setDescricaoPostagem($_POST['txtDescricao']);
	} else {
		$post->setDescricaoPostagem(null);
	}

	$_SESSION['codPost'] = \app\crud\PostDao::create($post)
	
?>
