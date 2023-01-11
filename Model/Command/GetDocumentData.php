<?php declare(strict_types=1);

namespace MateuszMesek\DocumentDataCmsBlock\Model\Command;

use Magento\Cms\Api\Data\BlockInterface;
use MateuszMesek\DocumentDataApi\Model\Command\GetDocumentDataInterface;
use MateuszMesek\DocumentDataApi\Model\Data\DocumentDataInterface;
use MateuszMesek\DocumentDataCmsBlock\Model\Data\InputFactory;

class GetDocumentData
{
    public function __construct(
        private readonly InputFactory             $inputFactory,
        private readonly GetDocumentDataInterface $getDocumentData
    )
    {
    }

    public function execute(BlockInterface $block): ?DocumentDataInterface
    {
        $input = $this->inputFactory->create(['block' => $block]);

        return $this->getDocumentData->execute('cms_block', $input);
    }
}
