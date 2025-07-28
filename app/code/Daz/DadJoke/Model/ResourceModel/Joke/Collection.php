<?php
/**
 * Copyright © Daz. All rights reserved.
 */
declare(strict_types=1);

namespace Daz\DadJoke\Model\ResourceModel\Joke;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Daz\DadJoke\Model\Joke as JokeModel;
use Daz\DadJoke\Model\ResourceModel\Joke as JokeResourceModel;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'joke_id';

    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(JokeModel::class, JokeResourceModel::class);
    }
}