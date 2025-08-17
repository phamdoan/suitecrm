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
 * along with this program.  If not, see http://www.gnu.org/licenses.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License
 * version 3, these Appropriate Legal Notices must retain the display of the
 * "Supercharged by SuiteCRM" logo. If the display of the logos is not reasonably
 * feasible for technical reasons, the Appropriate Legal Notices must display
 * the words "Supercharged by SuiteCRM".
 */

namespace App\Module\Service\Fields\LineItems\Mappers;

use App\Data\Entity\Record;
use App\Data\Service\LinkedRecords\LinkedRecordsProviderInterface;
use App\Data\Service\Record\ApiRecordMappers\ApiRecordFieldTypeMapperInterface;
use App\FieldDefinitions\Entity\FieldDefinition;
use Symfony\Component\DependencyInjection\Attribute\Autoconfigure;

#[Autoconfigure(lazy: true)]
class LineItemsRetrieveApiMapper implements ApiRecordFieldTypeMapperInterface
{
    use LineItemsApiMapperTrait;

    public const FIELD_TYPE = 'line-items';
    protected LinkedRecordsProviderInterface $linkedRecordsProvider;

    public function __construct(LinkedRecordsProviderInterface $linkedRecordsProvider)
    {
        $this->linkedRecordsProvider = $linkedRecordsProvider;
    }

    public function getFieldType(): string
    {
        return self::FIELD_TYPE;
    }

    public function getModule(): string
    {
        return 'default';
    }

    public function getKey(): string
    {
        return 'default';
    }

    public function getModes(): array
    {
        return ['retrieve'];
    }

    public function getOrder(): int
    {
        return 0;
    }

    public function toInternal(Record $record, FieldDefinition $fieldDefinitions, string $field): void
    {
    }

    public function toExternal(Record $record, FieldDefinition $fieldDefinitions, string $field): void
    {
        $this->injectRelatedRecords($record, $field, $this->linkedRecordsProvider);
    }
}
