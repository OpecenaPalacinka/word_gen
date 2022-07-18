<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    private Nette\Database\Explorer $database;


    public function __construct(Nette\Database\Explorer $database)
    {
        $this->database = $database;
    }

    protected function createComponentStartForm(): Form
    {

        $form = new Form;
        $form->addSubmit('send', 'Pokračovat');
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }

    public function formSucceeded(Nette\Forms\Form $form, $data)
    {
        $row = $this->database->table('responses')->insert([
        ]);

        $this->redirect('Freq:default',$row->getPrimary());
    }

}
