<?php

namespace App;

use App\Store;
use Auth;

/**
 * Class ZaloConfig
 * Clone ZaloConfig
 * Author: Phuc Le Dien
 */
class ZaloConfig {
    
    protected $zaloAppId;
    protected $zaloAppSecretKey;
    protected $zaloOaID;
    protected $zaloOaSecretKey;
    public function __construct($zaloOaID='3186267020034142764', $zaloOaSecretKey='XkcN6J3G6QB0BTPRhYJK', $zaloAppId='abc', $zaloAppSecretKey='abc')
    {
        $this->zaloAppId = $zaloAppId;
        $this->zaloAppSecretKey = $zaloAppSecretKey;
        $this->zaloOaID = $zaloOaID;
        $this->zaloOaSecretKey = $zaloOaSecretKey;
    }
    /**
     * Get zalo sdk config
     * @return []
     */
    public function getConfig() {
        return [
            'app_id' => $this->zaloAppId,
            'app_secret' => $this->zaloAppSecretKey,
            'oa_id' => $this->zaloOaID,
            'oa_secret' => $this->zaloOaSecretKey
        ];
    }
}
