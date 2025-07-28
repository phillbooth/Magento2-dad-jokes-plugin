<?php
/**
 * Copyright © Daz. All rights reserved.
 */
declare(strict_types=1);

namespace Daz\DadJoke\Controller\Adminhtml\Jokes;

use Daz\DadJoke\Model\JokeFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Serialize\Serializer\Json;

class Update extends Action implements HttpPostActionInterface
{
    public const ADMIN_RESOURCE = 'Daz_DadJoke::jokes';
    private const API_URL = 'https://icanhazdadjoke.com/';

    /**
     * @param Context $context
     * @param Curl $curl
     * @param Json $jsonSerializer
     * @param JokeFactory $jokeFactory
     */
    public function __construct(
        Context $context,
        private readonly Curl $curl,
        private readonly Json $jsonSerializer,
        private readonly JokeFactory $jokeFactory
    ) {
        parent::__construct($context);
    }

    /**
     * @return Redirect
     */
    public function execute(): Redirect
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('*/*/index');

        try {
            $this->curl->addHeader('Accept', 'application/json');
            $this->curl->get(self::API_URL);
            $response = $this->curl->getBody();
            $data = $this->jsonSerializer->unserialize($response);

            if (isset($data['joke']) && $data['status'] === 200) {
                $joke = $this->jokeFactory->create();
                $joke->setData('joke', $data['joke']);
                $joke->save();
                $this->messageManager->addSuccessMessage(__('A new dad joke has been successfully fetched and saved.'));
            } else {
                $this->messageManager->addErrorMessage(__('Could not fetch a new dad joke. API might be down.'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('An error occurred while fetching the joke: %1', $e->getMessage()));
        }

        return $resultRedirect;
    }
}