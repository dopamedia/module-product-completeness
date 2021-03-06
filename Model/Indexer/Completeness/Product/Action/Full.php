<?php
/**
 * User: Andreas Penz <office@dopa.media>
 * Date: 23.04.17
 */

namespace Dopamedia\Completeness\Model\Indexer\Completeness\Product\Action;

use Dopamedia\Completeness\Model\Indexer\Completeness\Product\AbstractAction;

class Full extends AbstractAction
{
    /**
     * @param array|null $ids
     * @return AbstractAction
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute(array $ids = null)
    {
        try {
            foreach ($this->storeManager->getStores(true) as $store) {
                $this->reindexByStore($store->getId());
            }
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\LocalizedException(__($e->getMessage()), $e);
        }
        return $this;
    }
}