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


namespace App\Data\Service\Record\RecordSaveHandlers;

trait RecordFieldSaveHandlerTrait
{
    use ModuleSaveHandlerTrait;

    /**
     * @param array $moduleHandlers
     * @param string $key
     * @param int $order
     * @param BaseModuleSaveHandlerInterface $handler
     */
    protected function addHandler(array &$moduleHandlers, string $key, int $order, BaseModuleSaveHandlerInterface $handler): void
    {
        $handlers = $moduleHandlers[$key] ?? [];

        $this->addHandlerByOrder($handlers, $order, $handler);

        $moduleHandlers[$key] = $handlers;
    }

    /**
     * @param BaseModuleSaveHandlerInterface[] $registry
     * @param string $module
     * @param string $key
     * @return array
     */
    protected function getOrderedHandlers(array &$registry, string $module, string $key): array
    {
        $handlers = $this->getMergedHandlers($registry, $module, $key);

        $flatList = [];
        foreach ($handlers as $orderedHandlers) {

            if (empty($orderedHandlers)) {
                continue;
            }

            if (!is_array($orderedHandlers)) {
                $flatList[] = $orderedHandlers;
                continue;
            }

            foreach ($orderedHandlers as $orderedHandler) {
                if (empty($orderedHandler)) {
                    continue;
                }
                $flatList[] = $orderedHandler;
            }
        }
        return $flatList;
    }

    /**
     * @param BaseModuleSaveHandlerInterface[] $registry
     * @param string $module
     * @param string $key
     * @return BaseModuleSaveHandlerInterface[]
     */
    protected function getMergedHandlers(array &$registry, string $module, string $key): array
    {
        $defaultDefinitions = $registry['default'] ?? [];
        $moduleDefinitions = $registry[$module] ?? [];

        $merged = array_merge($defaultDefinitions, $moduleDefinitions);
        return $merged[$key] ?? [];
    }
}
