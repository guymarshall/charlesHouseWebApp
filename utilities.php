<?php

function print_r_easy(mixed $data, bool $exit = true)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';

    if ($exit) {
        exit;
    }
}

function penceToPounds(int $pence): string
{
    $pounds = $pence / 100;
    return '£' . number_format($pounds, 2);
}
