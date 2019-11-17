<?php

declare(strict_types=1);

namespace Root\Controller;

abstract class AbstractController
{
  private $view;
  private $data;

  public function render(string $filename, array $data = []): void
  {
      $filename = "../src/View/{$filename}.phtml";

      if (!file_exists($filename)) {
          die("Arquivo {$filename} não existe");
      }

      $this->data = $data;
      $this->view = $filename;

      $template = 'blank';

      if (isset($_SESSION['user'])) {
          $template = 'logged';
      }

      include_once "../src/View/template/{$template}.phtml";
  }

  private function content(): void
  {
      include_once '../src/View/template/notifications.phtml';
      include_once $this->view;
  }
}
