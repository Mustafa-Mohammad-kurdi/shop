<?php

namespace App\Contracts;

/**
 * Interface BrandContract
 * @package App\Contracts
 */
interface BrandContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listBrands( $order = 'id',  $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findBrandById( $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createBrand(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateBrand(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteBrand($id);
}
