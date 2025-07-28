<?php
/**
 * Copyright © Daz. All rights reserved.
 */
declare(strict_types=1);

namespace Daz\DadJoke\Controller\Adminhtml\Jokes;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action implements HttpGetActionInterface
{
    public const ADMIN_RESOURCE = 'Daz_DadJoke::jokes';

    /**
     * @param Action\Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Action\Context $context,
        private readonly PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Daz_DadJoke::jokes');
        $resultPage->getConfig()->getTitle()->prepend(__('Dad Jokes'));

        return $resultPage;
    }
}