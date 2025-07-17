<?php
namespace Kgkrunch\CmsRestriction\Plugin;
use Magento\Framework\App\State;
use Magento\Authorization\Model\UserContextInterface;
use Magento\Framework\Exception\AuthorizationException;
class BlockRepositoryPlugin
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
        \Magento\Cms\Model\BlockRepository $subject,
        \Magento\Cms\Api\Data\BlockInterface $block
    ) {
            if ($this->state->getAreaCode() === \Magento\Framework\App\Area::AREA_WEBAPI_REST) {
            $userId = $this->userContext->getUserId();
                throw new AuthorizationException(
                    __('You are not authorized to update CMS blocks via API.')
                );
        }
        return [$block];
    }
}