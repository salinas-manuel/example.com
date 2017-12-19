<?php
$meta = [];
$meta['title'] = 'Manuel\'s Website';
$meta['description'] = 'Hello, my name is Manuel';
$meta['keywords'] = 'Manuel, Manuel Salinas';

$content = <<<EOT
<h1>Hello World</h1>
<p>Welcome to my web site.</p>
EOT;

require '../core/layout.php';
