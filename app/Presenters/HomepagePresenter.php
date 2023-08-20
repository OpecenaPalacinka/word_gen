<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Service\GeneratorService;
use Nette;
use Nette\Application\UI\Form;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{

    public function __construct(private readonly GeneratorService $generatorService)
    {
    }

    protected function createComponentStartForm(): Form
    {
        $form = new Form;
        $form->addUpload('file', 'Please upload file')
            ->setHtmlAttribute('id', 'fileControl')
            ->addRule($form::PATTERN, 'File has wrong suffix', '.*\.ifc$');
        $form->addSubmit('send', 'Upload')
            ->setValidationScope([]);
        $form->onSuccess[] = [$this, 'formSucceeded'];
        $form->onError[] = [$this, 'formError'];
        return $form;
    }

    public function formError(Nette\Forms\Form $form)
    {
        bdump($form);
        $form->addError("jsjoso");
    }

    /**
     */
    public function formSucceeded(Nette\Forms\Form $form, $data)
    {
        bdump($data);
        echo $this->generatorService->generateWord("kkk");
        //$row = $this->database->table('responses')->insert([]);
        //$this->redirect('Freq:default', $row->getPrimary());
    }

}
