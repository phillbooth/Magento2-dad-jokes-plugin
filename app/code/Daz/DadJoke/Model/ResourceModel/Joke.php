<?php
/**
 * Copyright © Daz. All rights reserved.
 */
declare(strict_types=1);

namespace Daz\DadJoke\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Joke extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('daz_dad_joke', 'joke_id');
    }
}

