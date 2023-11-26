<?php
var_dump($_GET);
print_r($_GET);
var_dump($_GET['param1']);
echo (nl2br("\n"));
foreach ($_GET as $key => $value) {
    echo 'キー:' . $key . '<br>';
    echo '値:' . $value . '<br><br>';
}
