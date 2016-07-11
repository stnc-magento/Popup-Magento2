<?php

/**
 * Magestore.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magestore.com license that is
 * available through the world-wide-web at this URL:
 * http://www.magestore.com/license-agreement.html
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Magestore
 * @package     Magestore_Popupplus
 * @copyright   Copyright (c) 2012 Magestore (http://www.magestore.com/)
 * @license     http://www.magestore.com/license-agreement.html
 */
namespace Magestore\Popupplus\Controller\Adminhtml\Popupplus\Category;

class Chooser extends \Magestore\Popupplus\Controller\Adminhtml\Popupplus
{
    /**
     * Prepare block for chooser
     *
     * @return void
     */
    public function execute()
    {
        $ids = $this->getRequest()->getParam('selected', []);
        if (is_array($ids)) {
            foreach ($ids as $key => &$id) {
                $id = (int)$id;
                if ($id <= 0) {
                    unset($ids[$key]);
                }
            }

            $ids = array_unique($ids);
        } else {
            $ids = [];
        }

        $block = $this->_view->getLayout()->createBlock(
            'Magestore\Popupplus\Block\Adminhtml\Popupplus\Category\Chooser\Categories',
            'promo_widget_chooser_category_ids',
             ['js_form_object' => $this->getRequest()->getParam('form')]
        )->setCategoryIds(
            $ids
        );
        if ($block) {
            $this->getResponse()->setBody($block->toHtml());
        }
    }
}
