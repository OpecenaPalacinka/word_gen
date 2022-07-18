<?php

namespace App\Presenters;

use DOMDocument;
use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\UI\Form;
use Nette\Utils\Html;


class SendGiftPresenter extends Nette\Application\UI\Presenter
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

    protected function createComponentSendGiftForm(): Form
    {
        $form = new Form;
        $form->addEmail('email','Zadejte váš email a získejte dárek: ')
            ->setHtmlAttribute('placeholder',"email@seznam.cz")
            ->setRequired();
        $form->addSubmit('send', 'Chci dárek');
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }

    public function formSucceeded(Nette\Forms\Form $form, $data)
    {

        $request = $_POST['email'];

        $this->database->table('responses')->where('index',$this->id)->update([
            'email' => $request
        ]);

        $form->setHtmlAttribute('hidden','true');

        $dom = '<h1 style="color: #11ff00; font-size: 3em">Dárek je už na cestě.</h1>';
        echo $dom;

    }

}