<?php
// app/views/amazon/index.thtml
foreach ($results->Details as $product)
{
    echo $product->ProductName . '<br />';
}
?>