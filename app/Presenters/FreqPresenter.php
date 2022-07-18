<?php

namespace App\Presenters;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\UI\Form;

class FreqPresenter extends Nette\Application\UI\Presenter
{

    private Nette\Database\Explorer $database;
    private int $id;

    public function __construct(Nette\Database\Explorer $database)
    {
        $this->database = $database;
    }

    public function actionDefault(int $idToDb){;
        $this->id = $idToDb;
    }

    protected function createComponentFreqForm(): Form
    {
        $frequency = [
            '0' => "Pivo vůbec nepiju",
            '1' => "Příležitostně",
            '2' => "Alespoň 1x za měsíc",
            '3' => "Alespoň 1x za týden",
            '4' => "Častěji než 1x za týden",
        ];

        $form = new Form;
        $form->addSelect('freqBeer', 'Zvolte: ',$frequency)
            ->setRequired();
        $form->addSubmit('send', 'Pokračovat');
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }

    public function formSucceeded(Nette\Forms\Form $form, $data)
    {
        $row = $this->database->table('responses')->where('index',$this->id)->update([
            'frequency' => $data->freqBeer,
        ]);

        $this->redirect('FavBeer:default',$this->id);
    }
}