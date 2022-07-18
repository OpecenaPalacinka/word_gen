# Počet lidí, kteří dokončili danou část formuláře

SELECT DISTINCT (SELECT COUNT(`index`) FROM `responses`) as onlyWelcomePage,
                (SELECT COUNT(`frequency`) FROM `responses` WHERE `frequency` IS NOT NULL) as doneFirstStep,
                (SELECT COUNT(`fav_beer`) FROM `responses` WHERE `fav_beer` is NOT NULL) as doneSecondStep,
                (SELECT COUNT(`email`) FROM `responses` WHERE `email` IS NOT NULL) as doneThirdStep FROM `responses`;