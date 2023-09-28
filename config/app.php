<?php
require_once('../routes/web.php');

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_ALL, 'pt_BR.utf-8', 'portuguese', 'portuguese-brazil', 'ptb');

session_name('FINANCES');
session_start();
