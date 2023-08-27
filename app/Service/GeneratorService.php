<?php

namespace App\Service;

use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Font;

class GeneratorService
{

    public function __construct()
    {
    }

    /**
     * @param string $fileContent
     * @return void
     * @throws Exception
     */
    public function generateWord(string $fileContent): void
    {
        $wordFile = new PhpWord();

        $wordFile->addTitleStyle(1, array('name' => 'Cambria', 'size' => 16, 'color' => '#365F91'));
        $wordFile->addTitleStyle(2, array('name' => 'Cambria', 'size' => 13, 'color' => '#365F91'));
        $wordFile->addTitleStyle(3, array('name' => 'Cambria', 'size' => 12, 'color' => '#365F91'));
        $wordFile->addTitleStyle(4, array('name' => 'Cambria', 'size' => 10, 'color' => '#365F91', 'italic' => true));

        // Adding an empty Section to the document...
        $section = $wordFile->addSection();

        $section->addTitle('A Průvodní zpráva');
        $section->addTitle('A.1 Identifikační údaje', 2);
        $section->addTitle('A.1.1 Údaje o stavbě', 3);
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
            . 'The important thing is not to stop questioning." '
            . '(Albert Einstein)'
        );
        $section->addTitle('A.1.2 Údaje o stavebníkovi', 3);
        $section->addText(
            '"Great achievement is usually born of great sacrifice, '
            . 'and is never the result of selfishness." '
            . '(Napoleon Hill)',
            array('name' => 'Tahoma', 'size' => 10)
        );
        $section->addTitle('A.1.3 Údaje o zpracovateli projektové dokumentace', 3);
        // Adding Text element with font customized using named font style...
        $fontStyleName = 'oneUserDefinedStyle';
        $wordFile->addFontStyle(
            $fontStyleName,
            array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
        );
        $section->addText(
            '"The greatest accomplishment is not in never falling, '
            . 'but in rising again after you fall." '
            . '(Vince Lombardi)',
            $fontStyleName
        );
        $section->addTitle('A.2 Seznam vstupních podkladů', 2);

        // Adding Text element with font customized using explicitly created font style object...
        $fontStyle = new Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        $myTextElement->setFontStyle($fontStyle);


        $fileSaver = IOFactory::createWriter($wordFile, 'Word2007');
        $filename = 'helloWorld.docx';
        $fileSaver->save($filename);

        $this->downloadFile($filename);
    }

    public function createA1(PhpWord $wordFile, string $fileContent): PhpWord
    {

        return $wordFile;
    }

    public function createA2(PhpWord $wordFile, string $fileContent): PhpWord
    {

        return $wordFile;
    }

    public function createA3(PhpWord $wordFile, string $fileContent): PhpWord
    {

        return $wordFile;
    }

    public function createA4(PhpWord $wordFile, string $fileContent): PhpWord
    {

        return $wordFile;
    }

    public function createA5(PhpWord $wordFile, string $fileContent): PhpWord
    {

        return $wordFile;
    }

    public function createB1(PhpWord $wordFile, string $fileContent): PhpWord
    {

        return $wordFile;
    }

    public function createB2(PhpWord $wordFile, string $fileContent): PhpWord
    {

        return $wordFile;
    }

    /**
     * Download file for user
     *
     * @param string $filename
     * @return void
     */
    public function downloadFile(string $filename): void
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        flush();
        readfile($filename);
        unlink($filename); // deletes the temporary file
    }

}