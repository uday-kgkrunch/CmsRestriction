<?php
namespace Kgkrunch\CmsRestriction\Plugin;

use Magento\Framework\App\State;
use Magento\Authorization\Model\UserContextInterface;
use Magento\Framework\Exception\AuthorizationException;

class PageRepositoryPlugin
{
    protected $state;
    protected $userContext;

    public function __construct(
        State $state,
        UserContextInterface $userContext
    ) {
        $this->state = $state;
        $this->userContext = $userContext;
    }

    public function beforeSave(
        \Magento\Cms\Model\PageRepository $subject,
        \Magento\Cms\Api\Data\PageInterface $page
    ) {
        if ($this->state->getAreaCode() === \Magento\Framework\App\Area::AREA_WEBAPI_REST) {
            // Optionally check user type here if needed
            throw new AuthorizationException(
                __('You are not authorized to update CMS pages via API.')
            );
        }
        return [$page];
    }
}
