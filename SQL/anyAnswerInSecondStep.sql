#Počet lidí, kteří odpověděli v druhém kroku (Jak často pijete pivo?)
SELECT COUNT(`index`) AS numNotNull FROM `responses` WHERE `frequency` IS NOT NULL;

#bonus
SELECT COUNT(`index`) AS numHigher FROM `responses` WHERE `frequency` >= 2;