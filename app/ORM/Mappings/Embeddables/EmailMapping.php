<?php

namespace App\ORM\Mappings\Embeddables;

use LaravelDoctrine\Fluent;

use App\Entities\Embeddables\Email;

class EmailMapping extends Fluent\EmbeddableMapping
{
    public function mapFor()
    {
        return Email::class;
    }

    public function map(Fluent\Fluent $builder)
    {
        $builder->string('address');
    }
}