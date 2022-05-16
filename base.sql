DROP TABLE article;

CREATE TABLE article (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(100),
    contenu TEXT,
    image VARCHAR(255),
    url VARCHAR(255),
    dateheure TIMESTAMP,
    type CHAR(2)
);


-- causes
INSERT INTO article VALUES
(DEFAULT, 'Production d energie', 'Une grande partie des emissions mondiales de gaz à effet de serre provient de l utilisation de combustibles fossiles — tels que le charbon, le petrole et le gaz naturel — pour produire de l electricite et de la chaleur. La production d electricite depend encore majoritairement des combustibles fossiles. Seul un quart de notre electricite provient de sources eoliennes, solaires et d autres sources renouvelables.', 'production-denergie.jpg', 'causes/production-denergie', NOW(), 'ca'),
(DEFAULT, 'Production industrielle', 'La production industrielle rejette des emissions de gaz, essentiellement du fait de son utilisation des combustibles fossiles pour produire l energie necessaire à la fabrication de materiaux tels que le ciment, le fer, l acier, l electronique, le plastique et le textile, ainsi que d autres biens. L exploitation minière et d autres processus industriels produisent egalement des emissions.', 'production-industrielle.jpg', 'causes/production-industrielle', NOW(), 'ca'),
(DEFAULT, 'Deforestation', 'La deforestation au profit d exploitations agricoles, de pâturages ou autre, rejette egalement des emissions de gaz à effet de serre, puisque les arbres, lorsqu ils sont abattus, libèrent le carbone qu ils ont stocke. La destruction des forêts, qui absorbent le dioxyde de carbone, limite egalement la capacite de la nature à empêcher les emissions de gaz d entrer dans l atmosphère.', 'deforestation.jpg', 'causes/deforestation', NOW(), 'ca'),
(DEFAULT, 'Utilisation des transports', 'La plupart des voitures, camions, bateaux et avions fonctionnent aux combustibles fossiles. Par consequent, les transports contribuent largement à la production de gaz à effet de serre, en particulier les emissions de dioxyde de carbone. Les vehicules routiers sont responsables de la majeure partie de ces emissions, mais celles des navires et des avions ne cessent de croître.', 'utilisation-des-transports.jpg', 'causes/utilisation-des-transports', NOW(), 'ca'),
(DEFAULT, 'Production alimentaire', 'La production alimentaire a besoin d energie pour faire fonctionner les equipements agricoles ou les bateaux de pêche, qui utilisent generalement des combustibles fossiles. Les cultures ont egalement un impact sur les emissions de gaz, notamment parce qu elles necessitent l utilisation d engrais et de fumier. Le betail produit du methane, un puissant gaz à effet de serre. Enfin, le conditionnement et la distribution des aliments genèrent aussi des emissions de gaz.', 'production-alimentaire.jpg', 'causes/production-alimentaire', NOW(), 'ca'),
(DEFAULT, 'Alimentation des bâtiments', 'À l echelle mondiale, les bâtiments residentiels et commerciaux consomment plus de la moitie de l electricite produite. Ils continuent à dependre du charbon, du petrole et du gaz naturel pour le chauffage et la climatisation, et emettent donc d importantes quantites de gaz à effet de serre. Pour en savoir plus sur l impact de l ali', 'alimentation-des-batiments.jpg', 'causes/alimentation-des-batiments', NOW(), 'ca'),
(DEFAULT, 'Surconsommation', 'Notre maison, notre consommation d energie, nos deplacements, notre alimentation et la quantite de dechets que nous jetons contribuent tous aux emissions de gaz à effet de serre. Il en va de même pour la consommation de biens, tels que les vêtements, les appareils electroniques et les matières plastiques.', 'surconsommation.jpg', 'causes/surconsommation', NOW(), 'ca');

-- consequences
INSERT INTO article VALUES
(DEFAULT, 'Hausse des temperatures', 'Dans la quasi-totalite des regions terrestres, les journees très chaudes et les vagues de chaleur se multiplient. L annee 2020 a ete l une des plus chaudes jamais enregistrees. La hausse des temperatures provoque une augmentation des maladies liees à la chaleur et peut rendre le travail et les deplacements plus difficiles. En outre, les incendies de forêt demarrent plus facilement et se propagent plus vite lorsque les temperatures sont plus elevees.', 'hausse-des-temperatures.jpeg', 'consequences/hausse-des-temperatures', NOW(), 'co'),
(DEFAULT, 'Accroissement de la gravite des tempêtes', 'Les changements de temperature occasionnent à leur tour des changements dans les precipitations. Cela se traduit par des tempêtes plus violentes et plus frequentes, susceptibles de provoquer des inondations et des glissements de terrain, de detruire des maisons et des communautes, et de coûter des milliards de dollars.', 'accroissement-de-la-gravite-des-tempetes.jpg', 'consequences/accroissement-de-la-gravite-des-tempetes', NOW(), 'co'),
(DEFAULT, 'Accroissement des secheresses', 'De plus en plus de regions sont confrontees à une penurie d eau. Les secheresses peuvent provoquer des tempêtes de sable et de poussière destructrices, capables de deplacer des milliards de tonnes de sable à travers les continents. Avec la desertification, les terres cultivables voient egalement leur surface se reduire. Aujourd hui, de nombreuses personnes sont exposees au risque de manquer d eau.', 'accroissement-des-secheresses.jpg', 'consequences/accroissement-des-secheresses', NOW(), 'co'),
(DEFAULT, 'Rechauffement et montee des oceans', 'Les oceans absorbent une grande partie de la chaleur due au rechauffement de la planète. Cela a pour effet de provoquer la fonte des calottes glaciaires et l elevation du niveau des mers, menaçant ainsi les communautes côtières et insulaires. Les oceans absorbent egalement le dioxyde de carbone contenu dans l atmosphère. Or, l augmentation du dioxyde de carbone rend l ocean plus acide, ce qui met en danger la vie marine.', 'rechauffement-et-montee-des-oceans.jpg', 'consequences/rechauffement-et-montee-des-oceans', NOW(), 'co'),
(DEFAULT, 'Perte de biodiversite', 'Les changements climatiques menacent la survie des espèces sur terre et dans les oceans. Plus les temperatures sont elevees, plus les risques encourus augmentent. Les incendies de forêt, les conditions meteorologiques extrêmes, les espèces nuisibles et les maladies comptent parmi les nombreuses menaces liees aux changements climatiques. Si certaines espèces sont en mesure de se deplacer et de survivre, d autres ne peuvent pas en faire autant.', 'perte-de-biodiversite.jpg', 'consequences/perte-de-biodiversite', NOW(), 'co'),
(DEFAULT, 'Penurie alimentaire', 'La progression de la faim et de la malnutrition dans le monde s explique notamment par les changements climatiques et l augmentation des phenomènes meteorologiques extrêmes. Les ressources halieutiques, les cultures et le betail sont exposes au risque de destruction ou de perte de productivite. En outre, le stress thermique peut entraîner une diminution des ressources en eau et des prairies pour le pâturage.', 'penurie-alimentaire.jpg', 'consequences/penurie-alimentaire', NOW(), 'co'),
(DEFAULT, 'Augmentation des risques pour la sante', 'L evolution des conditions meteorologiques favorise la propagation de maladies telles que le paludisme. Les phenomènes meteorologiques extrêmes entraînent une augmentation des maladies et des decès et mettent à mal les systèmes de sante. Parmi les autres risques pour la sante figure egalement l augmentation de la famine et de la malnutrition dans des regions où il est impossible de cultiver ou de trouver suffisamment de nourriture.', 'augmentation-des-risques-pour-la-sante.jpg', 'consequences/augmentation-des-risques-pour-la-sante', NOW(), 'co'),
(DEFAULT, 'Pauvrete et deplacement', 'Les changements climatiques accentuent les facteurs qui contribuent à la pauvrete. Par exemple, les inondations peuvent balayer les bidonvilles et detruire les maisons et les moyens de subsistance ; la chaleur peut rendre difficile le travail en exterieur. Chaque annee, les catastrophes liees aux conditions meteorologiques entraînent le deplacement de 23 millions de personnes et les rendent encore plus vulnerables à la pauvrete.', 'pauvrete-et-deplacement.jpg', 'consequences/pauvrete-et-deplacement', NOW(), 'co');

-- solutions
INSERT INTO article VALUES
(DEFAULT, 'economiser l energie à la maison', 'Notre electricite et notre chauffage proviennent en grande partie du charbon, du petrole et du gaz. Il est possible de reduire sa consommation d energie en diminuant le chauffage et la climatisation, en optant pour des ampoules LED et des appareils electriques à faible consommation, en lavant son linge à l eau froide ou en le suspendant pour le faire secher au lieu d utiliser un sèche-linge.', 'economiser-lenergie-a-la-maison.jpg', 'solutions/economiser-lenergie-a-la-maison', NOW(), 'so'),
(DEFAULT, 'Se deplacer à pied, à velo ou en transports en commun', 'Partout dans le monde, les routes sont surchargees de vehicules, dont la plupart roulent au diesel ou à l essence. Privilegier la marche ou le velo à la voiture permet de reduire les emissions de gaz à effet de serre et contribue à une meilleure sante et à une meilleure forme physique. Pour les longues distances, pensez à prendre le train ou le car. Enfin, pratiquez le covoiturage chaque fois que cela est possible.', 'se-deplacer-a-pied-a-velo-ou-en-transports-en-commun.jpg', 'solutions/se-deplacer-a-pied-a-velo-ou-en-transports-en-commun', NOW(), 'so'),
(DEFAULT, 'Consommer plus d aliments d origine vegetale', 'En consommant plus de legumes, de fruits, de cereales complètes, de legumineuses, de noix et de graines, et moins de viande et de produits laitiers, on peut reduire considerablement son impact sur l environnement. La production d aliments d origine vegetale entraîne generalement moins d emissions de gaz à effet de serre et necessite moins d energie, de terres et d eau.', 'consommer-plus-daliments-dorigine-vegetale.jpg', 'solutions/consommer-plus-daliments-dorigine-vegetale', NOW(), 'so'),
(DEFAULT, 'Reflechir à ses deplacements', 'Les avions consomment de grandes quantites de combustibles fossiles et produisent d importantes emissions de gaz à effet de serre. Par consequent, prendre moins souvent l avion constitue l un des moyens les plus efficaces de reduire son impact sur l environnement. Dans la mesure du possible, organisez des reunions virtuelles, prenez le train ou evitez tout simplement les voyages longue distance.', 'reflechir-a-ses-deplacements.jpg', 'solutions/reflechir-a-ses-deplacements', NOW(), 'so'),
(DEFAULT, 'eviter le gaspillage alimentaire', 'Lorsque l on jette de la nourriture, on gaspille egalement les ressources et l energie qui ont ete utilisees pour la cultiver, la produire, l emballer et la transporter. Par ailleurs, une fois dans un site d enfouissement des dechets, les aliments se decomposent et produisent du methane, un puissant gaz à effet de serre. Veillez donc à consommer les aliments que vous achetez et à composter vos dechets.', 'eviter-le-gaspillage-alimentaire.jpg', 'solutions/eviter-le-gaspillage-alimentaire', NOW(), 'so'),
(DEFAULT, 'Reduire, reutiliser, reparer et recycler', 'Les appareils electroniques, les vêtements et tous les autres biens que nous achetons genèrent des emissions de carbone à chaque etape de leur production, de l extraction des matières premières à la fabrication et au transport des marchandises jusqu au lieu de vente. Pour proteger notre climat, achetez moins, choisissez des articles d occasion, reparez tout ce que vous pouvez et recyclez.', 'reduire-reutiliser-reparer-et-recycler.jpg', 'solutions/reduire-reutiliser-reparer-et-recycler', NOW(), 'so'),
(DEFAULT, 'Opter pour une source d energie alternative à la maison', 'Demandez à votre compagnie d electricite si l energie que vous utilisez chez vous provient du petrole, du charbon ou du gaz. Si possible, essayez de passer à des sources renouvelables comme l energie eolienne ou solaire. Mieux encore : installez des panneaux solaires sur votre toit pour produire de l energie à usage domestique.', 'opter-pour-une-source-denergie-alternative-a-la-maison.jpg', 'solutions/opter-pour-une-source-denergie-alternative-a-la-maison', NOW(), 'so'),
(DEFAULT, 'Passer à un vehicule electrique', 'En cas d achat d une nouvelle voiture, envisagez d opter pour un modèle electrique. Ces modèles sont de plus en plus nombreux et de moins en moins chers sur le marche. Même si elles fonctionnent toujours grâce à de l electricite produite à partir de combustibles fossiles, les voitures electriques contribuent à reduire la pollution atmospherique et libèrent beaucoup moins d emissions de gaz à effet de serre que les vehicules à moteur essence ou diesel.', 'passer-a-un-vehicule-electrique.jpg', 'solutions/passer-a-un-vehicule-electrique', NOW(), 'so');
