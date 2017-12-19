<?php

$meta = [];
$meta['title'] = 'Manuel\'s Resume';
$meta['description'] = 'Web Developer';
$meta['keywords'] = 'PHP, MySQL, Linux, Javascript, HTML, CSS';

$content = <<<EOT
<h1>My Resume</h1>
<h2>Education</h2>
 <p>Texas A&M University - Kingsville</p>
EOT;

require '../core/layout.php';
