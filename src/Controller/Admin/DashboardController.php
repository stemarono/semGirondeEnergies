<?php

namespace App\Controller\Admin;

use App\Entity\Actionnaire;
use App\Entity\Activite;
use App\Entity\Commune;
use App\Entity\Fonction;
use App\Entity\Menu;
use App\Entity\Page;
use App\Entity\Personne;
use App\Entity\PreCommande;
use App\Entity\TypeActivite;
use App\Entity\User;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

// #[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
       
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(PageCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SemGirondeEnergies');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('tableau de bord', 'fa fa-home');

        yield MenuItem::linkToCrud('Page', 'fa-brands fa-pagelines', Page::class);
        yield MenuItem::linkToCrud('Menu', 'fa-regular fa-file-lines', Menu::class);
        yield MenuItem::linkToCrud('Actionnaire', 'fa-solid fa-people-group', Actionnaire::class);
        yield MenuItem::linkToCrud('Fonction', 'fa-solid fa-sitemap', Fonction::class);
        yield MenuItem::linkToCrud('Personne', 'fa-solid fa-users', Personne::class);
        yield MenuItem::linkToCrud('Pré-Commande', 'fa-regular fa-handshake', PreCommande::class);
        yield MenuItem::linkToCrud('Activité', 'fa-solid fa-charging-station', Activite::class);
        yield MenuItem::linkToCrud('Type d\'Activité', 'fa-solid fa-solar-panel', TypeActivite::class);
        yield MenuItem::linkToCrud('Commune', 'fa-solid fa-home', Commune::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fa-solid fa-user', User::class);
    }
}
