<?php
namespace App\Interface;
interface IPDF {
    public function TablaGenerica(array $objetos, string $name, bool $time) : void;
}
