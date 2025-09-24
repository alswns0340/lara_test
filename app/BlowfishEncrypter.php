<?php

declare(strict_types=1);

namespace App;

use phpseclib3\Crypt\Blowfish;
use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;

class BlowfishEncrypter implements EncrypterContract
{
    protected Blowfish $cipher;
    protected string $key;
    
    public function __construct(string $key)
    {
        $this->key = $key;
        $this->encrypter = new Blowfish('ecb');
        $this->cipher->setKey($this->key);

    }

    public function encrypt($value,$serialize = true)
    {
        return $this->encrypter->encrypt($value);
    }

    public function decrypt($payload, $unserialize = true)
    {
        return $this->encrypter->decrypt($payload);
    }

    public function getKey()
    {
        return $this->key;
    }
    
    public function getAllKeys()
    {
        return $this->key;
    }
        public function getPreviousKeys()
    {
        return $this->key;
    }
}