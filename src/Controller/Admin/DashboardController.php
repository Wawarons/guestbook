<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use App\Entity\Conference;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(ConferenceCrudController::class);

        return $this->redirect(
          $url
        );
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Guestbook');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
      yield MenuItem::linkToRoute('Back to the website', 'fa fa-home', 'homepage');
      yield MenuItem::linkToCrud('Conferences', 'fas fa-map-market-alt', Conference::class);
      yield MenuItem::linkToCrud('Comments', 'fas fa-comments', Comment::class);
    }
}
