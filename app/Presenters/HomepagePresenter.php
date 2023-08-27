<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Service\GeneratorService;
use JetBrains\PhpStorm\NoReturn;
use Nette;
use Nette\Application\AbortException;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use PhpOffice\PhpWord\Exception\Exception;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{

    public function __construct(private readonly GeneratorService $generatorService)
    {
        parent::__construct();
    }

    protected function createComponentStartForm(): Form
    {
        $form = new Form;
        $form->addUpload('file', 'Please upload file')
            ->setHtmlAttribute('id', 'fileControl');
        $form->addSubmit('send', 'Upload');
        $form->onSuccess[] = [$this, 'formSucceeded'];
        $form->onError[] = [$this, 'formError'];
        return $form;
    }

    /**
     * @param Nette\Forms\Form $form
     * @return void
     * @throws AbortException
     */
    #[NoReturn] public function formError(Nette\Forms\Form $form): void
    {
        $this->redirect('this');
    }

    /**
     * @param Nette\Forms\Form $form
     * @param ArrayHash $data
     * @return void
     * @throws Exception
     */
    public function formSucceeded(Nette\Forms\Form $form, Nette\Utils\ArrayHash $data): void
    {
        $this->generatorService->generateWord($data['file']->getContents());
    }

}
