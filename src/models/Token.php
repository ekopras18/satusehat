<?php

namespace Ekopras18\Satusehat\models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Token
 *
 * This class extends the Model class. It is used to handle operations related to Tokens.
 */
class Token extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    public $guarded = [];

    /**
     * Create a new Token instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        // If table is not set, set it to the 'token' table from the 'satusehat' config
        if (!isset($this->table)) {
            $this->setTable(config('satusehat.table.token'));
        }

        parent::__construct($attributes);
    }

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'env' => 'string',
        'token' => 'string',
        'last_used_at' => 'datetime'
    ];
}