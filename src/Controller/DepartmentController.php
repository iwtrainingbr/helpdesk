<?php

declare(strict_types=1);

namespace Root\Controller;

final class DepartmentController extends AbstractController
{
    public function listAction(): void
    {
        $this->render('department/list');
    }

    public function addAction(): void
    {
        $this->render('department/add');
    }
}
