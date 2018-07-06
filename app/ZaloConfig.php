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
    public function __construct()
    {
        $this->zaloAppId = "abc";
        $this->zaloAppSecretKey = "abc";
        $this->zaloOaID = Auth::user()->store->oa_id;
        $this->zaloOaSecretKey = Auth::user()->store->oa_secret;
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
