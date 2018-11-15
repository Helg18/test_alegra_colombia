<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 14/11/18
 * Time: 08:16 PM
 */

namespace App\Http\Template;


use App\Models\Order;

class Chef
{
    /**
     * @var Template
     */
    private $template;
    /**
     * @var Order
     */
    private $order;

    /**
     * Chef constructor.
     * @param Template $template
     * @param Order $order
     */
    public function __construct(Template $template, Order $order)
    {
        $this->template = $template;
        $this->order = $order;
    }

    public function build()
    {
        $this->template->prepare($this->order);
    }
}