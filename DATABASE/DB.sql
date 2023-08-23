
INSERT INTO `ads` (`id`, `garage_id`, `title`, `description`, `price`, `created_at`) VALUES
(9, 1, 'PEUGEOT 308 1.5 BLUEHDI 130CH S&S ACTIVE BUSINESS', 'DIMENSIONS\r\n\r\nLongueur 4,25 m\r\nLargeur 1,80 m\r\nHauteur 1,46 m\r\nEmpattement 2,62 m\r\nRéservoir53 l\r\nPorte à faux avant 0,863 m\r\nPorte à faux arrière 0,770 m\r\nVoies avant 1,559 m\r\nVoies arrière 1,553 m\r\nGarde au sol 110 mm\r\n\r\nPOIDS\r\n\r\nPoids à vide1 180 kg\r\nPTAC1 810 kg\r\nPTRA3 300 kg\r\n\r\nHABITABILITÉ\r\n\r\nNombre de places 5\r\nVolume de coffre 420 l\r\nVolume de coffre utile1 228 l\r\n\r\nPNEUMATIQUES\r\n\r\nTypes de pneumatiques Eté\r\nMatériau des jantes Aluminium\r\nTaille des roues avant 205/55 R16\r\nTaille des roues arrière205/55 R16\r\nType de roues de secours\r\nKit de dépannage pneumatique', 13900, '2023-08-17 06:14:40'),
(10, 1, 'BMW SERIE 1 (F21/F20) 116DA 116CH URBANCHIC 5P', 'DIMENSIONS\r\n\r\nLongueur 4,25 m\r\nLargeur 1,80 m\r\nHauteur 1,46 m\r\nEmpattement 2,62 m\r\nRéservoir53 l\r\nPorte à faux avant 0,863 m\r\nPorte à faux arrière 0,770 m\r\nVoies avant 1,559 m\r\nVoies arrière 1,553 m\r\nGarde au sol 110 mm\r\n\r\nPOIDS\r\n\r\nPoids à vide1 180 kg\r\nPTAC1 810 kg\r\nPTRA3 300 kg\r\n\r\nHABITABILITÉ\r\n\r\nNombre de places 5\r\nVolume de coffre 420 l\r\nVolume de coffre utile1 228 l\r\n\r\nPNEUMATIQUES\r\n\r\nTypes de pneumatiques Eté\r\nMatériau des jantes Aluminium\r\nTaille des roues avant 205/55 R16\r\nTaille des roues arrière205/55 R16\r\nType de roues de secours\r\nKit de dépannage pneumatique', 14900, '2023-08-17 06:29:29'),
(11, 1, 'GIULIETTA 1.6 JTDM 105CH DISTINCTIVE BUSINESS STOP&START', 'DIMENSIONS\r\n\r\nLongueur 4,25 m\r\nLargeur 1,80 m\r\nHauteur 1,46 m\r\nEmpattement 2,62 m\r\nRéservoir53 l\r\nPorte à faux avant 0,863 m\r\nPorte à faux arrière 0,770 m\r\nVoies avant 1,559 m\r\nVoies arrière 1,553 m\r\nGarde au sol 110 mm\r\n\r\nPOIDS\r\n\r\nPoids à vide1 180 kg\r\nPTAC1 810 kg\r\nPTRA3 300 kg\r\n\r\nHABITABILITÉ\r\n\r\nNombre de places 5\r\nVolume de coffre 420 l\r\nVolume de coffre utile1 228 l\r\n\r\nPNEUMATIQUES\r\n\r\nTypes de pneumatiques Eté\r\nMatériau des jantes Aluminium\r\nTaille des roues avant 205/55 R16\r\nTaille des roues arrière205/55 R16\r\nType de roues de secours\r\nKit de dépannage pneumatique', 12990, '2023-08-17 06:42:28');


INSERT INTO `cars` (`id`, `ad_id`, `model`, `brand`, `energy`, `kilometers`, `year`) VALUES
(2, 9, '308 1.5 BLUEHDI 130CH S&S ACTIVE BUSINESS', 'PEUGEOT', 'DIESEL', '118000', 2019),
(4, 10, 'SERIE 1 (F21/F20) 116DA 116CH URBANCHIC 5P', 'BMW', 'DIESEL', '140684', 2016),
(5, 11, 'GIULIETTA 1.6 JTDM 105CH DISTINCTIVE BUSINESS STOP&START', 'ALFA ROMEO', 'DIESEL', '102422', 2016);



INSERT INTO `garages` (`id`, `name`, `mail`, `phone`, `address`) VALUES
(1, 'Garage Vincent Parrot', 'contact@vparrot.fr', '0251999999', '99, Roving Street 23 456 NYC');



INSERT INTO `images` (`id`, `ad_id`, `path`, `name`) VALUES
(15, 9, 'upload/aa494b97-9d96-4ff8-bc25-f14aa32237e9-peugeot_308-1.jpg', 'PEUGEOT-308'),
(16, 9, 'upload/039caa6b-1f37-4c11-b9da-c7d612d02093-peugeot_308-2.jpg', 'PEUGEOT-308'),
(17, 9, 'upload/ee12c473-7793-4213-afef-e48edc0008dc-peugeot_308-3.jpg', 'PEUGEOT-308'),
(18, 9, 'upload/addc1218-8ff2-4283-b65c-4b7893fdb1d3-peugeot_308-4.jpg', 'PEUGEOT-308'),
(19, 9, 'upload/34d36776-f850-41b4-9f08-e18ee49fa9e1-peugeot_308-5.jpg', 'PEUGEOT-308'),
(20, 10, 'upload/44efbd93-b165-43f5-8fcf-411354ed3739-BMW_116-1.jpg', 'BMW-116'),
(21, 10, 'upload/6dbc1767-2395-4267-ad5c-01b01b7e018c-BMW_116-2.jpg', 'BMW-116'),
(22, 10, 'upload/6beb012b-411d-4c6c-b63b-7568b5da6062-BMW_116-3.jpg', 'BMW-116'),
(23, 10, 'upload/025b3e1e-70e2-45b3-8ebb-9e8a4288c136-BMW_116-4.jpg', 'BMW-116'),
(24, 10, 'upload/cd2d5787-3bd9-4a39-9cfb-abcf6e31c122-BMW_116-5.jpg', 'BMW-116'),
(25, 11, 'upload/2da46c68-623a-474b-86a2-80d8b7b117e3-ALPHA_giuletta-1.jpg', 'ALFA ROMEO-GIULIETTA'),
(26, 11, 'upload/0c773570-7d0e-4c59-960d-8baa434de5ef-ALPHA_giuletta-2.jpg', 'ALFA ROMEO-GIULIETTA'),
(27, 11, 'upload/0e087fd2-ff35-4e21-8772-55c1f2d612de-ALPHA_giuletta-3.jpg', 'ALFA ROMEO-GIULIETTA'),
(28, 11, 'upload/f4e38f89-ca33-49e6-81a9-2c1b41c65013-ALPHA_giuletta-4.jpg', 'ALFA ROMEO-GIULIETTA');




INSERT INTO `services` (`id`, `garage_id`, `title`, `description`, `price`) VALUES
(1, 1, 'Révision et vidange', 'Changement des filtres-Mise a niveau des liquides-Pression des pneus-Diagnostique expert', 100),
(2, 1, 'Diagnostic freinage', 'Remplacement plaquettes-Diagnostic ABS ou ESP-Purge liquide de frein-Configuration ABS', 159),
(3, 1, 'Distribution', 'Remplacement courroie de distribution-Remplacement galets tendeur-Remplacement pompes a eau-Lecture des codes défauts', 325);



INSERT INTO `testimonials` (`id`, `garage_id`, `author`, `message`, `note`, `validated`) VALUES
(1, 1, 'Marcus', 'Atelier Convivial  !', 5, 1),
(2, 1, 'Bernadette', 'Réparation correct, bon retours', 4, 1);


INSERT INTO `users` (`id`, `firstname`, `lastname`, `mail`, `password`, `roles`, `garage_id`) VALUES
(1001, 'Vincent', 'Parrot', 'v.parrot@vparrot.fr', '$2y$13$le163ag.M3oi4LpO7Je5WO6xRuBmaeqC2ny7uTHzmuwIwl30i00fa', '[\"ROLE_ADMIN\"]', 1),
(1002, 'John', 'Doe', 'j.doe@vparrot.fr', '$2y$13$RTxGT0uYC9To21.AAsXXeef1J/Xzb2CT8PIvbvS.0jAT9laRkWXO.', '[]', 1);

-