<?php
echo (@fopen("http://127.0.0.1:8000","r") ? "UP" : "DOWN") . "\n";