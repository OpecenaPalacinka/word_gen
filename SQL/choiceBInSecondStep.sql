#Počet lidí, kteří zvolili možnost B
SELECT COUNT(`index`) AS numOfB FROM `responses` WHERE `frequency` = 1;