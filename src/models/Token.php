<?php

namespace Ekopras18\Satusehat\models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public $guarded = [];

    public function __construct(array $attributes = [])
    {
        if (!isset($this->table)) {
            $this->setTable(config('satusehat.token_table'));
        }

        parent::__construct($attributes);
    }

    protected $primaryKey = 'id';

    protected $casts = ['env' => 'string', 'token' => 'string', 'last_used_at' => 'datetime'];
}
