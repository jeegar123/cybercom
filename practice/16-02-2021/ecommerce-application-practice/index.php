<?php

require_once './Controller/Core/Front.php';

class Mage
{

    public static function init()
    {
        Front::init();
    }
}

?>
<nav class="nav  bg-light">
    <a class="nav-link " href="http://localhost/cybercom/practice/16-02-2021/ecommerce-application-practice/index.php?c=product&a=grid">Products</a>
    <a class="nav-link " href="http://localhost/cybercom/practice/16-02-2021/ecommerce-application-practice/index.php?c=customer&a=grid">Customers</a>
    <a class="nav-link " href="http://localhost/cybercom/practice/16-02-2021/ecommerce-application-practice/index.php?c=category&a=grid">Category</a>
</nav>

<?php
Mage::init();

