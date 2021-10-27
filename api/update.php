<?php

require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'put') {

  parse_str(file_get_contents('php://input'), $input);

  $id    = (!empty($input['id']))    ? filter_var($input['id'])    : null;
  $title = (!empty($input['title'])) ? filter_var($input['title']) : null;
  $body  = (!empty($input['body']))  ? filter_var($input['body'])  : null;

  if ($id && $title && $body) {

    $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $sql = $pdo->prepare("UPDATE notes SET title = :title, body = :body WHERE id = :id");
      $sql->bindValue(':title', $title);
      $sql->bindValue(':body', $body);
      $sql->bindValue(':id', $id);
      $sql->execute();

      $array['success'] = [
        'id'    => $id,
        'title' => $title,
        'body'  => $body
      ];
    } else {
      $array['error'] = 'ID inexistente';
    }
  } else {
    $array['error'] = 'Campos id/title/body não enviados';
  }
} else {
  $array['error'] = 'Método não permitido!';
}

require('../return.php');
