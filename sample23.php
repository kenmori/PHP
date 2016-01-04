
<?php
$file = $_FILES['my_img'];

print('ファイル名(name):' . $file['name'] . '<br />');
print('ファイルタイプ(type):' . $file['type'] . '<br />');
print('アップロードしたファイル(tmp_name): ' . $file['tmp_name'] . 
  '<br />');

print('エラー内容(error):' . $file['error'] . '<br />');
print('サイズ(size):' . $file['size'] . '<br />');


//ファイルアップロード処理をする
$ext = substr($file['name'], -4);
if($ext == '.gif' || $ext == '.jpg' || $ext == '.png'){
  $filePath = './user_img/' . $file['name'];
  move_uploaded_file($file['tmp_name'], $filePath);
  print('<img src="' . $filePath . '" />');

}else {
  print('拡張子が※.gig, .jpg, .pnのいずれかのファいいるをアップロードしてくださいg
 ');
}

?>
