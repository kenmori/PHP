<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border="1">
      <?php
        require_once 'Escape.php';

       ?>
       <?php
      //  Because both the request and the response is stored
      //  It will be judged by whether HTTP is included in the string
        foreach($_SERVER as $key => $value){
          if(mb_strpos($key, 'HTTP_') === 0){
          ?>
          <tr>
            <th>
              <?php es($key); ?>
            </th>
            <td>
              <?php es($value); ?>
            </td>
          </tr>
          <?php
              }
            }

           ?>
<!-- HTTP_HOST	localhost
HTTP_CONNECTION	keep-alive
HTTP_ACCEPT	text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8
HTTP_UPGRADE_INSECURE_REQUESTS	1
HTTP_USER_AGENT	Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36
HTTP_ACCEPT_ENCODING	gzip, deflate, sdch
HTTP_ACCEPT_LANGUAGE	ja,en-US;q=0.8,en;q=0.6
HTTP_COOKIE	__ywapbuk=0.714; _wasc=PHHIHM9o8ZhFhx37.0 -->
    </table>
  </body>
</html>
