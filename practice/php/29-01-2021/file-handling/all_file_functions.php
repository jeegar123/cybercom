<?php

date_default_timezone_set('Asia/kolkata');

echo "<h1>All File functions</h1>";


echo date('H i s',fileatime('users.txt')).'<br>';          // when is last access time

echo date('H i s',fileinode('users.txt')).'<br>';         

echo date('H i s',getmyinode()).'<br>';       
