<?php
/**
 * See LICENSE.md for license details.
 */
declare(strict_types=1);

namespace PostDirekt\Core\Api;

/**
 * Interface ConfigurationInterface
 *
 * @api
 */
interface ConfigInterface
{
    const CONFIG_PATH_API_USER = 'postdirekt/general/api_user';
    const CONFIG_PATH_API_PASSWORD= 'postdirekt/general/api_password';

    /**
     * Get the api user
     *
     * @param mixed $store
     * @return string
     */
    public function getApiUser($store = null): string;

    /**
     * Get the api password
     *
     * @param mixed $store
     * @return string
     */
    public function getApiPassword($store = null): string;
}
