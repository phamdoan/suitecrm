<?php
/**
 * SuiteCRM is a customer relationship management program developed by SalesAgility Ltd.
 * Copyright (C) 2024 SalesAgility Ltd.
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


namespace App\Data\Service\Record\Mappers;

trait RecordFieldMapperTrait
{
    use ModuleMapperTrait;
    /**
     * @param array $moduleMappers
     * @param string $key
     * @param int $order
     * @param BaseModuleMapperInterface $handler
     */
    protected function addMapper(array &$moduleMappers, string $key, int $order, BaseModuleMapperInterface $handler): void
    {
        $mappers = $moduleMappers[$key] ?? [];

        $this->addMapperByOrder($mappers, $order, $handler);

        $moduleMappers[$key] = $mappers;
    }

    /**
     * @param BaseModuleMapperInterface[] $registry
     * @param string $module
     * @param string $key
     * @return array
     */
    protected function getOrderedMappers(array &$registry, string $module, string $key): array
    {
        $mappers = $this->getMergedMappers($registry, $module, $key);

        $flatList = [];
        foreach ($mappers as $orderedMappers) {

            if (empty($orderedMappers)) {
                continue;
            }

            if (!is_array($orderedMappers)) {
                $flatList[] = $orderedMappers;
                continue;
            }

            foreach ($orderedMappers as $orderedMapper) {
                if (empty($orderedMapper)) {
                    continue;
                }
                $flatList[] = $orderedMapper;
            }
        }
        return $flatList;
    }

    /**
     * @param BaseModuleMapperInterface[] $registry
     * @param string $module
     * @param string $key
     * @return BaseModuleMapperInterface[]
     */
    protected function getMergedMappers(array &$registry, string $module, string $key): array
    {
        $defaultDefinitions = $registry['default'] ?? [];
        $moduleDefinitions = $registry[$module] ?? [];

        $merged = array_merge($defaultDefinitions, $moduleDefinitions);
        return $merged[$key] ?? [];
    }
}
