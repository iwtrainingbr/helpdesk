<?php

declare(strict_types=1);

namespace Root\Controller;

final class TicketController extends AbstractController
{
    public function addAction(): void
    {
        $this->render('ticket/add');
    }

    public function listAction(): void
    {
        $this->render('ticket/list');
    }
}
