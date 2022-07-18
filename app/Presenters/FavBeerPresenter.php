<?php

namespace App\Presenters;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\UI\Form;

class FavBeerPresenter extends Nette\Application\UI\Presenter
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

    protected function createComponentFavBeerForm(): Form
    {

        $form = new Form;
        $form->addText('favBeer',"Zadejte vaše oblíbené pivo: ")
            ->setHtmlAttribute('placeholder','Plznička')
            ->setMaxLength(30)
            ->setRequired();
        $form->addSubmit('send', 'Pokračovat');
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }

    public function formSucceeded(Nette\Forms\Form $form, $data)
    {
        $this->database->table('responses')->where('index',$this->id)->update([
            'fav_beer' => $data->favBeer
        ]);
        $this->redirect('SendGift:default',$this->id);
    }

}