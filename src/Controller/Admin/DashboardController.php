<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Game;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class DashboardController extends AbstractDashboardController
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle($this->translator->trans('app.title'))
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('app.label.dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

        yield MenuItem::section('app.label.game');
        yield MenuItem::linkToCrud('app.label.game', 'fas fa-list', Game::class);

        yield MenuItem::section();
        yield MenuItem::linkToUrl('app.label.visit_public_website', 'fas fa-external-link-alt', '/')->setLinkTarget('_blank');

        yield MenuItem::section();
        //yield MenuItem::linkToLogout('Logout', 'fa fa-exit');
    }
}
