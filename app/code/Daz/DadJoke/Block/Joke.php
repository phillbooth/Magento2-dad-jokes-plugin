<?php
/**
 * Copyright © Daz. All rights reserved.
 */
declare(strict_types=1);

namespace Daz\DadJoke\Block;

use Daz\DadJoke\Model\ResourceModel\Joke\CollectionFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Joke extends Template
{
    /**
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        private readonly CollectionFactory $collectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Get a random joke from the collection.
     *
     * @return string
     */
    public function getRandomJoke(): string
    {
        $collection = $this->collectionFactory->create();
        if ($collection->count() === 0) {
            return 'No dad jokes found. Please fetch some from the admin panel!';
        }

        $collection->getSelect()->orderRand()->limit(1);

        return (string)$collection->getFirstItem()->getData('joke');
    }
}