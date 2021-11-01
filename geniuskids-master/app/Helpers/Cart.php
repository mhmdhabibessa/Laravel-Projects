<?php


namespace App\Helpers;


class Cart
{
    public function __construct()
    {
        if($this->getCart() === null) {
            $this->setCart($this->empty());
        }
    }

    public function add($student): void
    {
        $cart = $this->getCart();
        array_push($cart['students'], $student);
        $this->setCart($cart);
    }

    public function remove(int $id): void
    {
        $cart = $this->getCart();
        array_splice($cart['students'], array_search($id, array_column($cart['students'], 'id')), 1);
        $this->setCart($cart);
    }

    public function clear(): void
    {
        $this->setCart($this->empty());
    }

    public function empty(): array
    {
        return [
            'students' => [],
        ];
    }

    public function getCart(): ?array
    {
        return request()->session()->get('cart');
    }

    private function setCart($cart): void
    {
        request()->session()->put('cart', $cart);
    }
}
