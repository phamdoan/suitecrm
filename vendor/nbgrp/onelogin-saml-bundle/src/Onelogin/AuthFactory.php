<?php
// SPDX-License-Identifier: BSD-3-Clause

declare(strict_types=1);

namespace Nbgrp\OneloginSamlBundle\Onelogin;

use OneLogin\Saml2\Auth;
use Symfony\Component\HttpFoundation\RequestStack;

final class AuthFactory
{
    public const SCHEME_AND_HOST_PLACEHOLDER = '<request_scheme_and_host>';

    public function __construct(
        private readonly RequestStack $requestStack,
    ) {}

    public function __invoke(array $settings): Auth
    {
        $request = $this->requestStack->getMainRequest();
        $settings = self::replaceSchemeAndHostPlaceholder(
            $settings,
            $request?->getSchemeAndHttpHost() ?? 'http://localhost',
        );

        return new Auth($settings);
    }

    /**
     * @psalm-suppress MixedArrayAssignment, MixedArrayAccess
     */
    private static function replaceSchemeAndHostPlaceholder(array $settings, string $replace): array
    {
        if (isset($settings['baseurl'])) {
            $settings['baseurl'] = str_replace(self::SCHEME_AND_HOST_PLACEHOLDER, $replace, (string) $settings['baseurl']);
        }

        if (isset($settings['sp']['entityId'])) {
            $settings['sp']['entityId'] = str_replace(self::SCHEME_AND_HOST_PLACEHOLDER, $replace, (string) $settings['sp']['entityId']);
        }

        if (isset($settings['sp']['assertionConsumerService']['url'])) {
            $settings['sp']['assertionConsumerService']['url'] = str_replace(self::SCHEME_AND_HOST_PLACEHOLDER, $replace, (string) $settings['sp']['assertionConsumerService']['url']); // @phan-suppress-current-line PhanTypeArraySuspiciousNull, PhanTypeInvalidDimOffset
        }

        if (isset($settings['sp']['singleLogoutService']['url'])) {
            $settings['sp']['singleLogoutService']['url'] = str_replace(self::SCHEME_AND_HOST_PLACEHOLDER, $replace, (string) $settings['sp']['singleLogoutService']['url']); // @phan-suppress-current-line PhanTypeArraySuspiciousNull, PhanTypeInvalidDimOffset
        }

        return $settings;
    }
}
