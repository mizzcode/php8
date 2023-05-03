<?php

use Config\Database;
use Model\Comments;
use Repository\CommentRepositoryImpl;

require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Model/Comments.php";
require_once __DIR__ . "/../Repository/CommentRepository.php";

$connection = Database::getConnection();

$commentRepository = new CommentRepositoryImpl($connection);

// $comment = new Comments(name: 'mizz', comment: 'bikin artikel');

// untuk masukan data object comments ke database table comments
// $newComment = $commentRepository->insert($comment);
// var_dump($newComment->getId());

// $commentById = $commentRepository->findById(29);
// var_dump($commentById);

$commentFindAll = $commentRepository->findAll();
var_dump($commentFindAll);


$connection = null;