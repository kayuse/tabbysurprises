<?php
/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 9/13/19
 * Time: 2:36 AM
 */
namespace App\Http\Controllers\Repositories;

interface OrderRepositoryInterface
{
    public function create($data);
    public function get($id);
    public function all();
}
