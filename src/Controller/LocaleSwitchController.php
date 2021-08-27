<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

final class LocaleSwitchController extends AbstractController
{
    private const LOCALE_CODES = [
        'en',
        'it'
    ];

    /**
     * @Route("/", name="app_index")
     */
    public function switchAction(Request $request): Response
    {
        $localeCode = $this->getAcceptLanguageLocale($request);
        if ($localeCode === null) {
            $localeCode = $request->getDefaultLocale();
        }

        if (!in_array($localeCode, $this::LOCALE_CODES, true)) {
            throw new HttpException(
                Response::HTTP_NOT_ACCEPTABLE,
                sprintf('The locale code "%s" is invalid.', $localeCode)
            );
        }

        return new RedirectResponse(
            $this->generateUrl('app_homepage', [
                '_locale' => $localeCode
            ])
        );
    }

    private function getAcceptLanguageLocale(Request $request): ?string
    {
        $availableLocalesCodes = $this::LOCALE_CODES;
        $preferredLanguage = $request->getPreferredLanguage($availableLocalesCodes);
        if (!in_array($preferredLanguage, $availableLocalesCodes, true)) {
            return null;
        }

        return $preferredLanguage;
    }
}
