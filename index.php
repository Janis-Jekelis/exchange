<?php
declare(strict_types=1);
use App\Application;

$result=(new Application())->calculate();
echo number_format($result,2);



