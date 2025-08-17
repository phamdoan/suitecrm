<?php
/**
 * SuiteCRM is a customer relationship management program developed by SalesAgility Ltd.
 * Copyright (C) 2021 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SALESAGILITY, SALESAGILITY DISCLAIMS THE
 * WARRANTY OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License
 * version 3, these Appropriate Legal Notices must retain the display of the
 * "Supercharged by SuiteCRM" logo. If the display of the logos is not reasonably
 * feasible for technical reasons, the Appropriate Legal Notices must display
 * the words "Supercharged by SuiteCRM".
 */

namespace App\Data\DataProvider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Data\Entity\Record;
use App\Data\Entity\RecordList;
use App\Data\LegacyHandler\RecordListHandler;
use App\Data\Service\Record\ApiRecordMappers\ApiRecordMapperRunner;

/**
 * Class RecordListStateProvider
 * @package App\DataProvider
 */
class RecordListStateProvider implements ProviderInterface
{
    protected RecordListHandler $recordListHandler;
    protected ApiRecordMapperRunner $apiRecordMapperRunner;

    /**
     * RecordListStateProvider constructor.
     * @param RecordListHandler $recordListHandler
     * @param ApiRecordMapperRunner $apiRecordMapperRunner
     */
    public function __construct(
        RecordListHandler $recordListHandler,
        ApiRecordMapperRunner $apiRecordMapperRunner
    ) {
        $this->recordListHandler = $recordListHandler;
        $this->apiRecordMapperRunner = $apiRecordMapperRunner;
    }

    /**
     * @param Operation $operation
     * @param array $uriVariables
     * @param array $context
     * @return RecordList|null
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): ?RecordList
    {
        $list = $this->recordListHandler->getList($uriVariables['id'] ?? '');

        $mappedRecords = [];
        foreach ($list->getRecords() as $recordArray) {
            $record = new Record();
            $record->fromArray($recordArray);

            $this->apiRecordMapperRunner->toExternal($record, 'list');
            $mappedRecords[] = $record->toArray();
        }

        $list->setRecords($mappedRecords);
        return $list;

    }
}
