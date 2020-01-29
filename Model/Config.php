<?php
/**
 * See LICENSE.md for license details.
 */
declare(strict_types=1);

namespace PostDirekt\Core\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;
use Magento\Store\Model\ScopeInterface;
use PostDirekt\Core\Api\ConfigInterface;

/**
 * Class Config
 *
 * @author   Andreas Müller <andreas.mueller@netresearch.de>
 * @link     https://www.netresearch.de/
 */
class Config implements ConfigInterface
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var EncryptorInterface
     */
    private $encryptor;

    /**
     * Config constructor.
     * @param ScopeConfigInterface $scopeConfig
     * @param EncryptorInterface $encryptor
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        EncryptorInterface $encryptor
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->encryptor = $encryptor;
    }

    /**
     * @param mixed $store
     * @return string
     */
    public function getApiUser($store = null): string
    {
        return (string) $this->scopeConfig->getValue(
            self::CONFIG_PATH_API_USER,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    /**
     * @param mixed $store
     * @return string
     */
    public function getApiPassword($store = null): string
    {
        return (string) $this->encryptor->decrypt(
            $this->scopeConfig->getValue(
                self::CONFIG_PATH_API_PASSWORD,
                ScopeInterface::SCOPE_STORE,
                $store
            )
        );
    }
}