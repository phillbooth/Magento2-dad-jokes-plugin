<?php
/**
 * Copyright © Daz. All rights reserved.
 */
declare(strict_types=1);

namespace Daz\DadJoke\Model;

use Magento\Framework\Model\AbstractModel;
use Daz\DadJoke\Model\ResourceModel\Joke as JokeResourceModel;

class Joke extends AbstractModel
{
    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(JokeResourceModel::class);
    }
}

