-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 19:21:17
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `leparfumweb_guzman`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `carrito_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `precio` float(8,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `nombreComprador` varchar(256) NOT NULL,
  `mail` varchar(265) NOT NULL,
  `direccion` varchar(256) NOT NULL,
  `numeroTarjeta` int(16) NOT NULL,
  `nombreTarjeta` varchar(256) NOT NULL,
  `codigo` int(11) NOT NULL,
  `pago` enum('credito','debito','efectivo','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`carrito_id`, `nombre`, `precio`, `cantidad`, `nombreComprador`, `mail`, `direccion`, `numeroTarjeta`, `nombreTarjeta`, `codigo`, `pago`) VALUES
(1, 'Armani Code Le Parfum EDP', 77.94, 2, 'Armani Code Le Parfum EDP', '77.94', '2', 0, 'test@gmail.com', 0, ''),
(2, '212 VIP Rosé EDP\r\n', 29.55, 1, 'Armani Code Le Parfum EDP', '77.94', '2', 0, 'test@gmail.com', 0, ''),
(3, 'Armani Code Le Parfum EDP', 77.94, 2, '212 VIP Rosé EDP\r\n', '29.55', '1', 0, 'test@gmail.com', 0, ''),
(4, '212 VIP Rosé EDP\r\n', 29.55, 1, '212 VIP Rosé EDP\r\n', '29.55', '1', 0, 'test@gmail.com', 0, ''),
(5, 'Ck In2u For Her EDT', 18.49, 1, 'Ck In2u For Her EDT', '18.49', '1', 0, 'FDS', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Unisex'),
(2, 'Femenino'),
(3, 'Masculino'),
(4, 'Infantil'),
(5, 'Vegano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_x_perfume`
--

CREATE TABLE `categorias_x_perfume` (
  `id` int(10) UNSIGNED NOT NULL,
  `perfume_id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias_x_perfume`
--

INSERT INTO `categorias_x_perfume` (`id`, `perfume_id`, `categoria_id`) VALUES
(49, 54, 1),
(50, 54, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `ID` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`ID`, `id_usuario`, `fecha`, `importe`) VALUES
(34, 2, '2023-11-26', 112.94),
(37, 2, '2023-11-26', 29.55),
(38, 2, '2023-12-01', 35),
(39, 2, '2023-12-01', 29.55),
(40, 2, '2023-12-01', 29.55),
(41, 2, '2023-12-01', 29.55),
(42, 2, '2023-12-01', 29.55),
(43, 2, '2023-12-01', 35.95),
(44, 2, '2023-12-01', 35.95),
(45, 2, '2023-12-01', 35.95),
(46, 2, '2023-12-01', 35.95),
(47, 2, '2023-12-01', 35.95),
(48, 2, '2023-12-01', 35.95),
(49, 2, '2023-12-01', 35.95),
(50, 2, '2023-12-01', 35.95),
(51, 2, '2023-12-01', 35.95),
(52, 2, '2023-12-01', 35.95),
(53, 2, '2023-12-01', 35.95),
(54, 2, '2023-12-01', 35.95),
(55, 2, '2023-12-01', 35.95),
(56, 2, '2023-12-01', 35.95),
(57, 2, '2023-12-02', 35.95),
(58, 2, '2023-12-03', 35.95),
(59, 2, '2023-12-06', 35.95),
(60, 1, '2024-12-02', 29.55),
(61, 1, '2024-12-02', 29.55),
(62, 1, '2024-12-02', 185.43),
(63, 1, '2024-12-02', 185.43),
(64, 1, '2024-12-02', 185.43),
(65, 1, '2024-12-02', 185.43),
(66, 1, '2024-12-02', 185.43),
(67, 1, '2024-12-02', 185.43),
(68, 1, '2024-12-02', 185.43),
(69, 1, '2024-12-02', 185.43),
(70, 1, '2024-12-02', 185.43),
(71, 1, '2024-12-02', 185.43),
(72, 1, '2024-12-02', 185.43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disenadores`
--

CREATE TABLE `disenadores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `biografia` text DEFAULT NULL,
  `foto_perfil` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `disenadores`
--

INSERT INTO `disenadores` (`id`, `nombre_completo`, `biografia`, `foto_perfil`) VALUES
(1, 'Sophia Grojsman', 'Sophia Grojsman, perfumista visionaria, cultivó desde temprana edad su pasión por las flores y plantas en Bielorrusia. Emigró a los Estados Unidos en 1965, donde inició su carrera en International Flavors & Fragrances Inc. Su mentoría con perfumistas legendarios como Josephine Catapano y Ernest Shiftan la llevó a crear icónicas fragancias como Paris de Yves Saint Laurent, Eternity for Women de Calvin Klein y Tresor de Lancome.\r\n\r\nConocida por su sensualidad sedosa, las creaciones de Sophia rompen con las formas clásicas al permitir que las notas de base sean visibles desde la parte superior. Su enfoque único inauguró un nuevo estilo en la perfumería. Además de su brillante carrera, se destaca por su calidez y generosidad, siendo una figura maternal para jóvenes perfumistas en International Flavors & Fragrances. Sophia Grojsman es una verdadera revolucionaria en la perfumería, cuyas fragancias no solo son progresivas sino también inspiradoras, reflejando su dedicación y calidez excepcionales.', 'SophiaGrojsman.jpg'),
(2, 'Alberto Morillas', 'Alberto Morillas, destacado perfumista español, nació en Sevilla en 1950 y se trasladó a Suiza a los diez años. Su carrera en perfumería comenzó a los 20 años, influenciado por un artículo sobre Jean-Paul Guerlain. En 1970, se unió a Firmenich, creando la icónica Must de Cartier en 1975. Ha contribuido a casi 7000 perfumes, incluyendo CK One, Acqua di Giò, Kenzo Flower y Marc Jacobs Daisy.\r\n\r\nFundador de Mizensir, Morillas expandió su línea desde velas hasta 17 perfumes. Con Penhaligon\'s, ofrece el servicio Bespoke en Harrods, Londres. Ganador del Prix François Coty en 2003, reside en Ginebra, Suiza. Su amor por el Mediterráneo se refleja en creaciones con notas cítricas, marinas y florales. Apasionado de los jardines, encuentra inspiración en su propio jardín en Ginebra. Morillas ve un futuro positivo para la industria, donde la perfumería refleja la sociedad y él, como artista, interpreta emociones a través de sus creaciones. La fragancia, para Morillas, es un arte personal y creativo que implica entrenar el olfato y construir un \"banco de aromas\". Su preferencia por la nota de rosa y la exploración de almizcles y flor de naranjo destacan en su enfoque artístico.', 'AlbertoMorillas.jpg'),
(3, 'Jacques Polge', 'Jacques Polge, distinguido perfumista francés, nació el 14 de junio de 1943 en L\'Isle-sur-la-Sorgue. Inició su carrera en 1970 con Roure Bertrand Dupont y se unió a Chanel en 1978, donde trabajó hasta su retiro en 2015. Reconocido por crear emblemáticas fragancias como Coco Mademoiselle, Bleu de Chanel, Chance y Allure, Polge es apreciado por la complejidad y elegancia atemporal de sus creaciones.\r\n\r\nSu camino hacia la perfumería comenzó en la juventud, desarrollando un agudo sentido del olfato y fascinación por las fragancias. Estudió química y perfeccionó su oficio en la industria, colaborando con marcas prestigiosas como Yves Saint Laurent y Tiffany. Sin embargo, su legado se consolidó con Chanel, donde su enfoque meticuloso destaca la importancia de contar historias y evocar emociones a través de los perfumes.\r\n\r\nJacques Polge ha recibido numerosos premios, incluido el Ordre national du Mérite. Además, ha transmitido su conocimiento a su hijo, Olivier Polge, quien sigue sus pasos como exitoso perfumista. Su contribución al mundo de la perfumería es un testimonio de su maestría y compromiso con la narrativa olfativa.', 'JacquesPolge.jpg'),
(8, 'Lucas Sieuzac', 'Lucas Sieuzac, un destacado perfumista de tercera generación, ha forjado una notable carrera en la perfumería. Proveniente de una familia de perfumistas del sur de Francia, comenzó su trayectoria en Florasynth en 1994 y ha colaborado con marcas prestigiosas como Carolina Herrera, Giorgio Armani y Givenchy. Su enfoque creativo se basa en la creencia de que una fragancia es una invitación a un viaje, buscando compartir emociones únicas con cada individuo a través de sus creaciones. Entre sus populares fragancias se encuentran Amouage Reflection Man y Carolina Herrera 212 VIP Men.\r\n\r\nAdemás de su éxito en la industria, Sieuzac ha recibido reconocimientos, incluyendo el premio \"Prix Lalique\" en 2013. Su perspectiva no convencional se refleja en su lema de \"tomar el camino menos transitado\", describiéndose a sí mismo como un no conformista que desafía los códigos habituales del diseño de perfumes. Su legado familiar y su pasión por descubrir el mundo a través de los sentidos influyen en su dedicación a la creación de fragancias, donde cada ingrediente desempeña un papel significativo. Su mensaje es claro: si tiene la oportunidad de trabajar en un proyecto, aportará creatividad, pasión y la capacidad de romper códigos convencionales al frasco.\r\n\r\n\r\n\r\n\r\n\r\n', 'LucasSieuzac.jpg'),
(9, 'Antoine Maisondieu', 'Antoine Maisondieu, un perfumista senior en Givaudan, ha consolidado su posición como uno de los talentos más destacados e innovadores en la industria de fragancias. Educado en la escuela de perfumería de Roure, ha dedicado muchos años a Givaudan, donde ha demostrado su habilidad excepcional en la creación de fragancias complejas y artísticas. Trabajando con marcas de renombre como Giorgio Armani, Tom Ford y Prada, ha ganado seguidores tanto entre los consumidores como entre los entusiastas de las fragancias.\r\n\r\nLa destreza de Antoine se manifiesta en su capacidad para utilizar ingredientes naturales de manera innovadora, creando fragancias modernas y profundas. Además de su maestría en el arte de la perfumería, también es reconocido por su compromiso con la sostenibilidad, reflejado en su esfuerzo por reducir el impacto ambiental de la industria. Actualmente, sigue colaborando con Givaudan para desarrollar fragancias excepcionales, y sus contribuciones le han valido numerosos reconocimientos, consolidándolo como uno de los perfumistas más talentosos e influyentes de su generación.', 'AntoineMaisondieu.jpg'),
(10, 'Michel Girard', 'Michel Girard, nacido en 1957 en la capital mundial de la perfumería, Grasse, estaba destinado a una carrera en el fascinante mundo de los aromas. Su conexión con los encantadores olores florales y la rica tradición perfumera de Grasse lo inspiraron desde joven. Graduado en 1974 del Lycée Fénélon en Grasse, inició su viaje para convertirse en un perfumista destacado.\r\n\r\nCon una sólida experiencia previa en empresas como Robertet, Michel se unió a Givaudan en 1998, después de destacarse en Quest International como Senior Perfumer. Su talento excepcional lo llevó a colaborar con marcas prestigiosas como Givenchy, Gucci y Valentino. Su enfoque único, influenciado por su crianza en Grasse y sus experiencias culturales globales, ha dejado una marca duradera en la perfumería. Michel ha creado fragancias icónicas como 1 Million de Paco Rabanne, un hito significativo en su carrera, que destaca su habilidad excepcional como perfumista. Actualmente, como perfumista en Givaudan desde 2007, Michel Girard continúa su legado, creando fragancias extraordinarias que perduran en la memoria olfativa global.', 'MichelGirard.jpg'),
(11, 'Honorine Blanc', 'Honorine Blanc, maestra perfumista en Firmenich, es reconocida por su habilidad para crear fragancias irresistiblemente imperfectas, cargadas de nuevas ideas, tensiones y emociones. Más que un trabajo, para Honorine, la creación de perfumes es una forma de expresión y manifestación de su visión artística única. Originaria de Beirut, su carácter fue moldeado por la vibrante y refinada cultura de la ciudad. Estudió en París y, bajo la tutela del Maestro Perfumista Sophia Grojsman, se trasladó a Nueva York, donde ha dejado una huella duradera.\r\n\r\nLa vida personal diversa de Honorine, marcada por la pasión por la navegación, el amor por los libros y la inspiración en el arte, se entrelaza con su enfoque perfeccionista hacia la perfumería. Apasionada por crear fragancias que sean adictivas y llenas de nuevas ideas, busca comunicar a través de sus creaciones de manera única. Su enfoque sin reglas y la disposición a correr riesgos han llevado a la creación de fragancias para marcas prestigiosas como Gucci, Ralph Lauren y Yves Saint Laurent, con éxitos notables como Yves Saint Laurent Black Opium y Lancôme La Nuit Trésor à la Folie. Para Honorine Blanc, cada fragancia es una extensión auténtica de sí misma, fusionando su fortaleza personal, visión artística y el deseo de explorar nuevos horizontes.', 'HonorineBlanc.jpg'),
(12, 'Annick Menardo', 'Annick Ménardo, maestra perfumista francesa, ha dejado una marca indeleble en la industria de la perfumería con sus creaciones icónicas. Su viaje comenzó con una formación en química y una diplomatura en la academia de perfumería ISIPCA. Bajo la guía de Michel Almairac en Créations Aromatiques, Ménardo perfeccionó un estilo de composición preciso y ligeramente rebelde. Su ingreso a Firmenich en 1991 la catapultó a la fama, donde creó fragancias notables para marcas como Boss de Hugo Boss y Dior Hypnotic Poison. Reconocida por su singularidad y fuerte identidad, Ménardo es una figura líder en la perfumería moderna, destacando por su enfoque en la precisión y la difusión, plasmado en fragancias con notas frescas, jugosas y florales, ideales para el verano. Su colaboración con Lolita Lempicka, especialmente en la creación de la icónica primera fragancia y la posterior L\'Eau Jolie, refleja su legado de talento y contribuciones significativas a la perfumería contemporánea.\r\n\r\nEl legado de Annick Ménardo en la perfumería se caracteriza por su inmenso talento y su contribución al desarrollo de la perfumería moderna. Su trabajo es un testimonio de su pasión, creatividad y compromiso con la perfección, lo que la convierte en una de las perfumistas más respetadas del mundo. Hoy en día, Annick Ménardo continúa creando e innovando en su papel de maestra perfumista en Symrise.', 'AnnickMenardo.jpg'),
(13, 'Nathalie Lorson', 'Nathalie Lorson, una Maestra Perfumista nacida en la cuna de la perfumería, Grasse, ha dejado una marca significativa en el mundo de las fragancias. Desde su temprana exposición al mundo de las fragancias en la casa de fragancias Roure, hasta su formación en la prestigiosa escuela de perfumería Roure Bertrand Dupont, Nathalie ha demostrado ser una figura destacada en la industria. Con cientos de perfumes a su nombre, sus creaciones, como Lalique Amethyst y Flora by Gucci, son conocidas por su estilo olfativo armonioso y generoso. Su enfoque distintivo en la selección de materias primas suaves y sensuales la ha destacado como una de las cuatro perfumistas de Firmenich detrás del exitoso YSL Black Opium. La pasión de Nathalie por la investigación y su habilidad para descubrir nuevos territorios olfativos la han convertido en una maestra de la perfumería, mientras su humildad y dedicación la posicionan como una fuente de inspiración en la industria.', 'NathalieLorson.jpg'),
(14, 'Olivier Cresp', 'Olivier Cresp, legendario perfumista francés originario de la cuna de la perfumería, Grasse, es una figura influyente y respetada en la industria. Criado en una familia con una rica herencia en fragancias, su infancia en campos de flores cultivó su extraordinaria sensibilidad artística y aprecio por la magia del perfume. Iniciando su carrera en Firmenich en 1992, Cresp se destacó rápidamente como un talentoso e innovador perfumista, creando algunas de las fragancias más icónicas del mundo, como Midnight Poison y Thierry Mugler Angel. Además de recibir numerosos premios, en 2018 fundó su marca familiar Akro, mostrando su excepcional habilidad y creatividad. Cresp, amante de la comida y devoto de la refinación, busca conceptos poderosos y únicos que dejen una impresión duradera, consolidando su posición como una verdadera leyenda en el mundo de la perfumería.', 'OlivierCresp.jpg'),
(15, 'Bruno Jovanovic', 'Bruno Jovanovic, destacado perfumista francés, cultivó su amor por los perfumes desde joven, inspirado por los cautivadores aromas que lo rodeaban. Después de obtener un título en Física y Química, se graduó con honores de la prestigiosa escuela francesa de perfumería ISIPCA. Con más de dos décadas de experiencia entre Nueva York y París, Bruno fusiona el sueño americano con el encanto de la perfumería francesa, reflejando su profunda conexión con las fragancias y su apasionado enfoque en su trabajo.\r\n\r\nUn perfumista tanto intelectual como artístico, se inspira en artistas y filósofos, descomponiendo y simplificando ideas para capturar lo esencial. Con un enfoque limitado en el número de materias primas, crea perfumes con un mensaje claro y distintivo, como Monsieur de Editions de Parfums Frédéric Malle y Dries Van Noten. Su lema, \"La belleza es universal y no tiene concepto\", refleja su filosofía y su dedicación a la creación de fragancias modernas e innovadoras con una elegancia clásica.', 'BrunoJovanovic.jpg'),
(16, 'Carlos Benaim', 'Carlos Benaim, destacado perfumista, cultivó su interés por la perfumería en Tánger, Marruecos, influenciado por su padre farmacéutico apasionado por la extracción de aceites esenciales. Tras estudiar ingeniería química, inició una exitosa carrera como perfumista, trabajando para casas destacadas como IFF, donde se convirtió en Maestro Perfumista en 2013. Reconocido por su habilidad para revelar conexiones invisibles en sus creaciones, Benaim ha colaborado con marcas de renombre como Armani, Calvin Klein y Yves Saint Laurent, destacándose por composiciones imaginativas y armoniosas.\r\n\r\nHa recibido múltiples premios y honores a lo largo de su carrera, incluyendo el Premio a la Trayectoria de Vida de la Sociedad Americana de Perfumistas en 2004 y el Premio a la Trayectoria de Vida del Perfumista del Año de la Fundación de Fragancias en 2014. Más allá de su éxito en la perfumería, Benaim contribuye activamente a causas benéficas, participando en la Fundación Internacional de Educación Sefardí y estableciendo un fondo de dotación para becas en la Universidad Ben-Gurión junto a su esposa, la Dra. Darel M. Benaim.', 'CarlosBenaim.jpg'),
(17, 'Louise Turner', 'Louise Turner, perfumista destacada, se enamoró de los aromas a través de las flores silvestres en su ciudad natal en el sur de Inglaterra. Aunque inicialmente estudió odontología, su atracción por la perfumería la llevó a trabajar en Quest (actualmente Givaudan), marcando el comienzo de una exitosa carrera. Desde el año 2000, Turner ha sido perfumista en Givaudan, colaborando con marcas de renombre como Hugo Boss, Thierry Mugler y Maison Martin Margiela. Su estilo distintivo, caracterizado por un enfoque alegre y luminoso, refleja su amor por las flores, y es reconocida por su capacidad para transmitir no solo el aroma, sino también la textura y la sensación placentera de los pétalos.\r\n\r\nTurner ha creado fragancias notables como Boss The Scent For Her Magnetic, Chérie, Bad Boy Extreme y Good Girl Collector Gold Fantasy 2022. Su obra Lazy Sunday Morning para Maison Martin Margiela refleja su conexión con la naturaleza y su aprecio por el color blanco. La perfumista encuentra inspiración en diversos elementos, desde sus recuerdos de infancia en Kent hasta sus viajes, el arte, los colores, la música y la comida. A pesar de los desafíos en la creación de perfumes, Turner aborda su trabajo con pasión, confianza y una piel gruesa, comprendiendo que la crítica es parte integral del proceso.', 'LouiseTurner.jpg'),
(18, 'François Demachy', 'François Demachy, destacado perfumista francés, ha dejado una huella significativa en el mundo de la fragancia moderna. Nacido en Cannes y criado en Grasse, epicentro mundial de la perfumería, su conexión con el mundo de los aromas se consolidó en la farmacia de su padre. Después de incursiones académicas en odontología y fisioterapia, se unió a Mane y posteriormente se formó en la escuela de perfumería Charabot. Su trayectoria incluye una colaboración de veintidós años con Chanel, donde desempeñó roles clave, y en 2006, se convirtió en el Director de Desarrollo de la división de cosméticos y perfumes de LVMH, así como el principal nariz de Christian Dior.\r\n\r\nEn Dior, Demachy ha creado algunas de las fragancias más emblemáticas, como Sauvage, Miss Dior y Dior Homme. Su enfoque apasionado y su inspiración en productores, mujeres y hombres que usan sus creaciones lo han convertido en un maestro perfumista destacado. A través del documental \"Nose\" en 2021, se destacó su enfoque integral de la creación de perfumes, honrando a quienes contribuyen desde el cultivo de materias primas hasta quienes usan las fragancias, consolidando su lugar como una figura visionaria en la perfumería moderna.', 'FrançoisDemachy.jpg'),
(19, 'Air-Val International', 'tiene 39 perfumes  La primera edición se creó en 1992 y la más nueva es de 2019.', 'Air-ValInternational.jpg'),
(20, 'Francis Kurkdjian', 'Francis Kurkdjian, distinguido perfumista nacido en la histórica Grasse, Francia, ha dejado una marca indeleble en la industria de la fragancia con sus creaciones cautivadoras. Criado entre los evocadores campos de jazmín, rosa y lavanda de Grasse, Kurkdjian demostró desde joven una pasión por las artes creativas. Después de completar su formación en el reconocido Institut Supérieur International du Parfum, de la Cosmétique et de l\'Aromatique Alimentaire (ISIPCA), inició su carrera en perfumería a los 25 años.\r\n\r\nA lo largo de su notable trayectoria, Kurkdjian perfeccionó su arte en casas de perfume de renombre como Quest International, Dior y Takasago. Su primera fragancia en solitario, el innovador Le Male para Jean Paul Gaultier, fusionó notas tradicionalmente masculinas y femeninas, convirtiéndose en un clásico instantáneo. La fundación de su propia casa de fragancias, Maison Francis Kurkdjian, en 2009, fue la culminación de su visión artística. Entre sus creaciones destacadas se encuentran Narciso Rodriguez for Her, Carven Le Parfum y el icónico Baccarat Rouge 540. La creatividad de Kurkdjian, inspirada en la música y la danza, se refleja en cada fragancia, llevando alegría y magia a la vida diaria de personas de todo el mundo. Su éxito y dedicación constante a desafiar los límites en perfumería subrayan su posición como un líder influyente en la industria del perfume.', 'FrancisKurkdjian.jpg'),
(21, 'Anne Flipo', 'Anne Flipo, maestra perfumista con una destacada carrera en la firma International Flavors & Fragrances (IFF), se ha ganado el prestigioso título de \"Maestra Perfumista\", un reconocimiento a su excepcional labor en la industria de la fragancia. Su viaje hacia la perfumería comenzó durante sus estudios en la escuela de perfumería en Versalles, donde quedó cautivada por los ingredientes y materiales crudos, despertando su curiosidad y pasión por el arte de crear fragancias. Esta experiencia la llevó a abrazar la perfumería como un desafío creativo y un juego, estableciendo así las bases para su exitosa carrera.\r\n\r\nA lo largo de los años, Anne Flipo ha dejado su marca en la industria, creando fragancias notables como Burberry Brit Rhythm, Chloé Love Story, Jimmy Choo Illicit, Paco Rabanne Lady Million y la colección The Herb Garden para Jo Malone London. Su enfoque distintivo implica equilibrar hábilmente materiales naturales y sintéticos para dar vida a composiciones complejas y sofisticadas. Con una profunda conexión con la naturaleza, Anne Flipo incorpora ingredientes como neroli, albahaca, jazmín sambac, pachulí e iris en sus creaciones. Su colaboración con Dominique Ropion ha dado lugar a algunas de las fragancias más populares en el mercado, y su misión continua es transmitir su pasión y buscar su obra maestra, estableciéndola como una figura destacada e inspiradora en el mundo de la perfumería.', 'AnneFlipo.jpg'),
(22, 'Christine Nagel', 'Christine Nagel, perfumista suiza y actual Directora de Creación Olfativa en Hermès Parfums, ha dejado una huella significativa en la industria de la perfumería. A pesar de comenzar sus estudios en medicina con la intención de convertirse en partera, descubrió su verdadera pasión por la química y, posteriormente, por el mundo del perfume. Su carrera en Firmenich la llevó inicialmente a la investigación, pero su deseo de trabajar en perfumería fue inicialmente rechazado. Sin embargo, Nagel perseveró y se convirtió en una de las pocas personas capacitadas para reconocer ingredientes solo con su olfato, destacando su dedicación y habilidades únicas.\r\n\r\nDespués de emprender su propio negocio en Italia y crear éxitos de perfume para marcas como Fendi y Versace, Nagel se trasladó a París en 1997, donde continuó creando fragancias notables, incluyendo colaboraciones exitosas como Narciso Rodriguez for Her y Miss Dior Chérie. En 2014, se unió a Hermès y, tras la jubilación de Jean-Claude Ellena en 2016, se convirtió en la única perfumista interna de la casa de moda. Su enfoque en composiciones simples y su creencia en que cualquier persona puede usar la fragancia que le guste, independientemente de las categorías de género, reflejan su filosofía y contribuyen a su posición como una figura influyente en la perfumería contemporánea.', 'ChristineNagel.jpg'),
(23, 'Hamid Merati-Kashani\r\n', 'Hamid Merati-Kashani, perfumista destacado que trabaja actualmente con Firmenich, fusiona sus raíces iraníes y alemanas para crear fragancias memorables. Su infancia en Isfahán, Irán, rodeado de campos de rosas, despertó su interés en la perfumería. Definiéndose como \"iraní en educación y alemán en la organización\", Hamid se destaca por su dedicación a los clientes y su lema de \"pensar en el cliente\". Como colaborador natural, valora el aprendizaje de los demás y comparte su conocimiento generosamente.\r\n\r\nCon una carrera que lo ha llevado a colaborar con marcas de renombre como Carolina Herrera, Jean Paul Gaultier y Yves Saint Laurent, Hamid tiene una afinidad particular por el Medio Oriente, donde aprecia la cultura olfativa única. Inspirado por el lujo y la opulencia de la región, Hamid cree que sus clientes son sus guías, y su éxito, evidente en fragancias populares como Parfums de Marly Layton y Pegasus, lo impulsa a seguir creando experiencias olfativas únicas. Su ética de trabajo incansable refleja su humildad y la constante búsqueda de la excelencia en el arte de la perfumería.', 'HamidMerati-Kashani.jpg\r\n'),
(24, 'Jacques Cavallier', 'Jacques Cavallier-Belletrud, perfumista francés, pertenece a una familia con raíces profundas en la perfumería, con su padre y abuelo también dedicados a este arte. Con más de 80 fragancias creadas o colaboradas, ha dejado su huella en marcas de renombre como Parfums Christian Dior, Yves Saint Laurent y Louis Vuitton, siendo este último su actual empleador dentro del grupo de lujo LVMH. Su contribución más destacada es la introducción de la molécula sintética Calone 1951, conocida por su distintivo aroma \"marino\", presente en éxitos como Aqua di Gio y L\'Eau d\'Issey.\r\n\r\nJacques Cavallier-Belletrud ha marcado la industria de la perfumería con creaciones notables como Giorgio Armani Acqua di Gio y Issey Miyake L\'Eau d\'Issey. En 2012, se unió a LVMH como perfumista interno, desempeñando un papel fundamental en la formulación de la primera fragancia de Louis Vuitton lanzada en 2016. Esta tendencia de contar con perfumistas internos dedicados refleja la importancia que las casas de moda de lujo otorgan a la creación de fragancias distintivas y exclusivas.', 'JacquesCavallier.jpg'),
(25, 'Christian Dussoulier', 'Christian Dussoulier, un Maestro Perfumista altamente capacitado, inició su carrera en Givaudan después de recibir educación en la prestigiosa ISIPCA. Con una destacada carrera en Firmenich de 14 años, perfeccionó su arte colaborando con renombrados perfumistas. Ha dejado su huella en marcas de alta gama como Dior, Giorgio Armani, Hugo Boss, Lancôme y más. En 2010, fundó Créations et Parfums, donde continúa creando fragancias populares y cautivadoras, consolidando su reputación como uno de los perfumistas más influyentes de su generación. Entre sus obras notables se encuentran Dior Hypnotic Poison, Giorgio Armani Acqua di Gio y Paco Rabanne 1 Million, conocidas por su mezcla única de elegancia, sensualidad y modernidad. Su talento para crear experiencias olfativas inolvidables lo posiciona como un verdadero maestro de su oficio.', 'ChristianDussoulier.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id`, `nombre`) VALUES
(1, 'Ambar'),
(2, 'Aromática'),
(3, 'Chipre'),
(4, 'Cítrica'),
(5, 'Floral'),
(6, 'Cuero'),
(7, 'Amaderada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_x_compra`
--

CREATE TABLE `item_x_compra` (
  `ID` int(10) UNSIGNED NOT NULL,
  `compra_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `item_x_compra`
--

INSERT INTO `item_x_compra` (`ID`, `compra_id`, `item_id`, `cantidad`) VALUES
(1, 34, 2, 1),
(2, 34, 3, 1),
(3, 37, 1, 1),
(4, 38, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `biografia` text DEFAULT NULL,
  `imagen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre_completo`, `biografia`, `imagen`) VALUES
(1, 'Yves Saint Laurent', 'Yves Saint Laurent, una icónica casa de moda francesa, fue fundada por el diseñador Yves Saint Laurent y su socio Pierre Bergé en 1961. La marca se destacó por su enfoque revolucionario en la moda femenina, introduciendo elementos de la sastrería masculina en las colecciones de mujeres, como el traje pantalón \"Le Smoking\". A lo largo de los años, Yves Saint Laurent ha sido pionero en la industria con diseños atrevidos y modernos, y su estilo elegante y vanguardista ha influido de manera significativa en la moda contemporánea. Además de la moda, la marca ha diversificado su presencia en el mundo del lujo, lanzando exitosas líneas de fragancias, cosméticos y accesorios, consolidando su posición como un ícono de la elegancia y el estilo parisino.', '1.png'),
(2, 'Calvin Klein', 'Calvin Klein, una icónica marca de moda estadounidense fundada por el diseñador homónimo en 1968, se ha convertido en un referente de estilo moderno y minimalista. Conocida por su estética limpia y contemporánea, la marca abarca una amplia gama de productos, desde ropa y accesorios hasta fragancias. Calvin Klein revolucionó la industria de la moda al introducir líneas de ropa interior unisex y fragancias que reflejan un enfoque audaz y provocativo.\r\n\r\nLas fragancias de Calvin Klein han desempeñado un papel crucial en su éxito, capturando la esencia de la juventud y la sofisticación. Desde la icónica \"Obsession\" hasta \"Eternity\" y \"CK One\", las fragancias de Calvin Klein han dejado una marca duradera en la industria de la perfumería con sus composiciones distintivas y su capacidad para reflejar la evolución de las tendencias culturales a lo largo de las décadas. La marca continúa siendo un símbolo de estilo vanguardista y modernidad, manteniendo su posición como líder en la moda y la fragancia.', '2.png'),
(10, 'Versace', 'Versace es una icónica casa de moda italiana fundada por Gianni Versace en 1978. La marca se ha destacado por su estilo audaz, sensual y lujoso, fusionando la alta costura con elementos provocativos y llamativos. Conocida por su distintivo logotipo Medusa y estampados gráficos, Versace ha dejado una marca duradera en la industria de la moda, ofreciendo prendas y accesorios que reflejan una estética glamorosa y vanguardista. Además de la moda, la marca también ha incursionado con éxito en la perfumería, creando fragancias distintivas que encapsulan la esencia audaz y seductora de la marca. Versace se ha convertido en un símbolo de lujo y sofisticación, atrayendo a una clientela que valora la innovación y la expresión creativa en la moda y la fragancia.', '3.jpg'),
(11, 'Carolina Herrera', 'Carolina Herrera es una reconocida casa de moda fundada por la diseñadora venezolana Carolina Herrera en 1980. La marca es conocida por su elegancia atemporal y su enfoque clásico y refinado en la moda y la perfumería. Carolina Herrera ha dejado una marca distintiva en la industria de la moda con su estilo sofisticado y sus creaciones icónicas, que han vestido a mujeres influyentes y celebridades de todo el mundo.\r\n\r\nEn el ámbito de la perfumería, Carolina Herrera ha lanzado una serie de fragancias que reflejan la misma elegancia y estilo que caracteriza a sus diseños de moda. Sus perfumes capturan la esencia de la feminidad moderna y a menudo se inspiran en la sofisticación urbana. Con botellas elegantes y composiciones olfativas cuidadosamente elaboradas, las fragancias de Carolina Herrera han ganado popularidad global y se han convertido en símbolos de lujo y distinción en la industria de la belleza.', '4.jpg'),
(12, 'Giorgio Armani ', 'Giorgio Armani es una prestigiosa marca de moda y estilo de vida fundada por el diseñador italiano Giorgio Armani en 1975. La firma se ha destacado por su enfoque elegante y atemporal, ofreciendo prendas de alta costura, prêt-à-porter, accesorios, perfumes y productos de belleza. Reconocida por su estética minimalista y sofisticada, la marca Giorgio Armani ha dejado una marca duradera en la industria de la moda, siendo sinónimo de lujo discreto y calidad artesanal. Además de su impacto en la moda, la marca ha lanzado una variedad de fragancias icónicas, como \"Acqua di Gio\" y \"Armani Code\", que han ganado popularidad mundial y reflejan la elegancia distintiva de Giorgio Armani.', '3.png'),
(13, 'Tous', 'Tous es una marca de joyería y accesorios de moda española conocida por su estilo distintivo y creativo. Fundada en 1920 en Manresa, España, por Salvador Tous Blavi y su esposa Teresa Ponsa Mas, la marca comenzó como una pequeña tienda de reparación de relojes. Sin embargo, se transformó en un referente internacional de joyería contemporánea con el lanzamiento de su icónico osito en 1985. El osito, que se ha convertido en el emblema de la marca, refleja la esencia lúdica y encantadora de Tous. La marca se ha expandido globalmente, ofreciendo una amplia gama de joyas, bolsos, fragancias y accesorios, con un enfoque en diseños modernos y accesibles que atraen a una amplia audiencia. La combinación de creatividad, calidad y un toque juguetón ha llevado a Tous a convertirse en una opción popular entre los amantes de la moda en todo el mundo.', '4.png'),
(14, 'Boss', 'Boss es una reconocida marca de moda y estilo de vida que forma parte del grupo Hugo Boss, una empresa alemana fundada en 1924. La marca se ha destacado por su elegancia y sofisticación en prendas de vestir, accesorios y fragancias. Con una estética moderna y contemporánea, Boss se ha convertido en un referente de la moda masculina y femenina, ofreciendo ropa de alta calidad con cortes precisos y un estilo refinado. Además de la moda, Boss ha ganado renombre en el mundo de las fragancias, presentando una línea de perfumes que reflejan la misma elegancia y carácter distintivo que caracteriza a la marca en su conjunto. La marca ha establecido su presencia global, siendo una elección popular para aquellos que buscan prendas y fragancias que encarnen la modernidad y la sofisticación.', '5.png'),
(15, 'Bvlgari', 'Bvlgari es una casa de lujo italiana conocida por su elegancia atemporal y sus creaciones de alta joyería, relojería, accesorios de moda y fragancias. Fundada en 1884 en Roma por Sotirios Voulgaris, la marca ha mantenido una reputación de excelencia y artesanía desde sus inicios. Bvlgari se destaca por sus diseños distintivos que fusionan la tradición romana con la innovación contemporánea, creando piezas que encarnan la opulencia y la sofisticación.\r\n\r\nLa marca ha diversificado su oferta para incluir una amplia gama de productos de lujo, pero es especialmente conocida por sus icónicas creaciones de joyería, como la colección B.zero1 y la serpiente Tubogas. Además, Bvlgari ha dejado una marca significativa en el mundo de la perfumería, con fragancias que reflejan la elegancia y la personalidad única de la marca. Con su enfoque distintivo en el diseño y la calidad, Bvlgari ha consolidado su posición como una de las marcas de lujo más reconocidas y respetadas a nivel mundial.', '6.png'),
(16, 'Cacharel', 'Cacharel, la icónica marca de moda y fragancias fundada en París en 1958 por Jean Bousquet, ha dejado una huella distintiva en el mundo de la moda y la perfumería. Desde sus inicios, Cacharel ha sido conocida por su enfoque juvenil y romántico, marcado por diseños frescos y femeninos que capturan la esencia de la juventud parisina. La marca se destacó en la década de 1960 con creaciones como el famoso vestido de camisa rosa que se convirtió en un símbolo de su estilo innovador.\r\n\r\nEn el ámbito de las fragancias, Cacharel es reconocida por sus aromas juveniles y contemporáneos que reflejan la alegría y la espontaneidad. Su perfume más emblemático, \"Anaïs Anaïs\", lanzado en 1978, se convirtió en un clásico atemporal y marcó el comienzo de la exitosa incursión de la marca en el mundo de la perfumería. A lo largo de los años, Cacharel ha continuado lanzando fragancias notables que fusionan la elegancia con la frescura, contribuyendo así a su reputación duradera en la industria de la moda y la belleza.', '7.png'),
(17, 'Dior', 'Dior, una casa de moda francesa de renombre mundial, fue fundada en 1946 por el diseñador Christian Dior. Reconocida por su elegancia atemporal y su enfoque innovador en la moda, Dior se ha convertido en un ícono de la alta costura. La marca es famosa por introducir el revolucionario \"New Look\" en la década de 1940, que marcó una nueva era de feminidad y glamour en la moda. Además de su impacto en la ropa, Dior ha dejado una marca indeleble en el mundo de la perfumería con fragancias icónicas como Miss Dior y J\'adore, creadas por talentosos perfumistas en colaboración con la casa de moda. La firma Dior, conocida por su excelencia en la artesanía y la calidad excepcional, continúa liderando la industria de la moda y la fragancia con su enfoque distintivo y su compromiso con la elegancia y la sofisticación.', '8.png'),
(18, 'Air-Val International', 'Air-Val International es una empresa española especializada en la creación y comercialización de perfumes y productos de cuidado personal con licencia. La compañía se fundó en 1979 y se ha destacado por colaborar con marcas conocidas para desarrollar fragancias basadas en personajes populares de la cultura pop, como personajes de dibujos animados, superhéroes, celebridades y más.\r\n\r\nAir-Val International ha establecido asociaciones con marcas reconocidas como Disney, Marvel, Warner Bros, Mattel, y otras, para lanzar líneas de fragancias que atraen a niños, adolescentes y adultos. Sus productos suelen incluir una variedad de artículos, como perfumes, colonias, productos para el cuidado del cuerpo y juegos de regalo, todos con temáticas de personajes y marcas populares.', 'Air-ValInternational.jpg'),
(19, 'Elizabeth Arden', 'Elizabeth Arden es una marca icónica en la industria de la belleza y los cosméticos, fundada por Florence Nightingale Graham en 1910. Con una rica historia que abarca más de un siglo, la marca se ha ganado una reputación mundial por sus innovadores productos de cuidado de la piel, fragancias y cosméticos. Elizabeth Arden fue una pionera en la introducción de productos de belleza en los Estados Unidos y es conocida por su enfoque científico en el cuidado de la piel.\r\n\r\nLa marca ha lanzado muchos productos emblemáticos a lo largo de los años, como el famoso crema Eight Hour Cream, que se ha convertido en un clásico del cuidado de la piel. Además de su compromiso con la calidad, Elizabeth Arden ha sido una defensora del empoderamiento femenino, y su legado perdura como una marca que fusiona la ciencia y la belleza para ofrecer soluciones innovadoras y de alta calidad a sus consumidores.', '5.jpg'),
(20, 'Gucci', 'Gucci es una icónica casa de moda italiana reconocida a nivel mundial por su lujo, estilo vanguardista y sofisticación. Fundada en Florencia en 1921 por Guccio Gucci, la marca comenzó como una pequeña tienda de artículos de cuero y ha evolucionado para convertirse en una de las marcas más influyentes en la moda y el diseño. Gucci es conocida por sus productos de alta calidad, desde bolsos y accesorios hasta ropa y fragancias, y ha establecido un estatus distintivo en la industria de la moda con su estilo distintivo y su logotipo de doble G.\r\n\r\nA lo largo de los años, Gucci ha experimentado varias fases creativas bajo el liderazgo de diferentes directores creativos. En la actualidad, Alessandro Michele, nombrado director creativo en 2015, ha revitalizado la marca con un enfoque ecléctico y vanguardista, incorporando elementos nostálgicos y extravagantes en sus colecciones. Gucci ha reafirmado su posición como una marca de moda líder, con una presencia significativa en la alta costura y una influencia duradera en la cultura contemporánea.', '9.png'),
(21, 'Halloween', 'Halloween es una marca de perfumes que ha logrado destacarse en la industria con su enfoque distintivo y su asociación con la festividad que lleva su nombre. La marca fue lanzada por Jesús del Pozo, un diseñador de moda español, en 1997. Desde entonces, Halloween ha creado una variedad de fragancias que buscan capturar la esencia misteriosa y seductora de la celebración del Día de Halloween.\r\n\r\nLos perfumes de Halloween suelen presentar composiciones modernas y llamativas, con botellas diseñadas de manera única para reflejar la estética festiva y enigmática de la marca. La línea de fragancias ha evolucionado con el tiempo, ofreciendo opciones tanto para hombres como para mujeres. Halloween ha logrado ganar popularidad gracias a su capacidad para crear aromas intrigantes que van más allá de la temporada específica, convirtiéndose en elecciones atractivas para cualquier ocasión.', '6.png'),
(22, 'Jean Paul Gaultier', 'Jean Paul Gaultier es una marca de moda y perfumes fundada por el diseñador de moda francés Jean Paul Gaultier. La marca se ha destacado por su enfoque provocador y vanguardista en la moda, desafiando las normas convencionales y utilizando elementos de la cultura pop y la alta costura. Gaultier se hizo conocido mundialmente por sus diseños únicos, como la icónica camiseta con el busto puntiagudo, que se ha convertido en un símbolo distintivo de su estética irreverente.\r\n\r\nEn el ámbito de la perfumería, Jean Paul Gaultier ha lanzado una serie de fragancias memorables y reconocibles. Su primera fragancia, \"Classique\", lanzada en 1993, se presenta en un frasco que imita la forma de un torso femenino, capturando la audacia y la sensualidad que caracterizan la marca. Otros éxitos incluyen \"Le Mâle\", una fragancia icónica para hombres, y diversas interpretaciones olfativas que reflejan la diversidad y originalidad que Jean Paul Gaultier aporta al mundo de los perfumes.', '10.png'),
(23, 'Nina Ricci', 'Nina Ricci es una icónica marca de moda y perfumes con origen en París, Francia. Fundada por Maria \"Nina\" Ricci y su hijo Robert en 1932, la casa de moda se destacó por su elegancia y estilo femenino refinado. Nina Ricci rápidamente se convirtió en un referente en la alta costura, conocida por sus diseños románticos y atemporales.\r\n\r\nEl universo olfativo de Nina Ricci se inauguró en 1948 con el lanzamiento de su primera fragancia, \"L\'Air du Temps\", que se convirtió en un clásico instantáneo. La marca continuó expandiendo su línea de perfumes, creando composiciones distintivas y encantadoras que capturan la esencia de la feminidad. A lo largo de los años, Nina Ricci ha mantenido su reputación como una casa de moda y perfumería elegante y sofisticada, consolidando su posición como una de las marcas más queridas y reconocidas en el mundo de la perfumería de lujo.', '11.png'),
(24, 'Paco Rabanne', 'Paco Rabanne es una icónica marca de moda y fragancias fundada por el diseñador español Francisco \"Paco\" Rabaneda Cuervo. La marca se ha ganado reconocimiento mundial por su enfoque vanguardista y visionario en la moda y la perfumería. Desde su lanzamiento en la década de 1960, Paco Rabanne ha sido pionera en diseños futuristas y materiales no convencionales, y esta audacia se refleja en sus fragancias, que han alcanzado un estatus legendario en la industria.\r\n\r\nLas fragancias de Paco Rabanne son conocidas por su originalidad y estilo distintivo, con éxitos de ventas como \"Calandre\", lanzada en 1969, y \"Paco Rabanne Pour Homme\", que establecieron la reputación de la marca en el mundo de la perfumería. Además, perfumes modernos como \"Lady Million\" y \"Invictus\" han mantenido la presencia de Paco Rabanne en la vanguardia de la industria de fragancias, atrayendo a una amplia audiencia con sus composiciones audaces y su compromiso con la innovación en el arte del perfume.', '12.png'),
(25, 'Ralph Lauren ', 'Ralph Lauren es una icónica marca de moda estadounidense que ha extendido su influencia al mundo de las fragancias con una línea distintiva de perfumes. Fundada por Ralph Lauren en 1967, la marca se ha convertido en un símbolo de estilo clásico y elegancia atemporal. Su presencia en la perfumería se caracteriza por fragancias que reflejan la sofisticación y el estilo de vida refinado asociado con la marca Ralph Lauren.\r\n\r\nLa línea de perfumes Ralph Lauren abarca una amplia gama de fragancias para hombres y mujeres, cada una encapsulando un aspecto particular del estilo de vida de la marca. Desde el icónico Polo Ralph Lauren hasta otras creaciones distintivas como Romance, Polo Blue, y la colección Big Pony, los perfumes de Ralph Lauren buscan transmitir la elegancia, la calidad y la autenticidad que han definido a la marca a lo largo de las décadas.', '13.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfumes`
--

CREATE TABLE `perfumes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `categoria_principal_id` int(10) UNSIGNED NOT NULL,
  `familia_id` int(10) UNSIGNED NOT NULL,
  `disenador_id` int(10) UNSIGNED NOT NULL,
  `marca_id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `pais` enum('Estados Unidos','Francia','Italia','España') NOT NULL,
  `proveedor` varchar(256) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(256) NOT NULL,
  `precio` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfumes`
--

INSERT INTO `perfumes` (`id`, `nombre`, `categoria_principal_id`, `familia_id`, `disenador_id`, `marca_id`, `fecha`, `pais`, `proveedor`, `descripcion`, `imagen`, `precio`) VALUES
(1, '212 VIP Rosé EDP\r\n', 2, 5, 8, 11, '2014-01-01', 'Estados Unidos', 'Proveedor1', 'Carolina Herrera destaca como una marca líder en el mundo de la moda y la perfumería, siendo el perfume 212 VIP Rosé EDP uno de sus productos más emblemáticos. Diseñado especialmente para mujeres que buscan destacar y dejar una impresión duradera, este exquisito perfume encarna frescura, juventud y sensualidad. Inspirado en su predecesor, el 212 VIP EDP, esta fragancia se caracteriza por sus notas iniciales de frutas frescas que evolucionan hacia un corazón floral, culminando en una cálida base de Ámbar, Almizcle Blanco y notas amaderadas. Ideal para amantes de las celebraciones y el encanto, este perfume añade un toque ecléctico al estilo personal, representando una obra maestra de Carolina Herrera.\r\n\r\nEn resumen, Carolina Herrera ha logrado crear una experiencia única en forma de perfume con el 212 VIP Rosé EDP, fusionando frescura, juventud y sofisticación en una fragancia inolvidable. Esta creación invita a llevar consigo el encanto distintivo de Carolina Herrera, consolidando su posición como una opción perfecta para quienes buscan una fragancia distintiva y cautivadora.', '212VipRoseEDP.webp', 29.55),
(2, 'Armani Code Le Parfum EDP', 3, 7, 9, 12, '2022-01-01', 'Italia', 'Proveedor1', 'Armani Code Le Parfum EDP contiene una reinterpretación de la fragancia más icónica de la marca. Su esencia es más intensa y vibrante. Un perfume para hombre que no se detiene ante nada especialmente pensado para aquellos que se enfocan en el futuro con una mente abierta. Su increíble aroma cuenta con acordes brillantes, enérgicos y de alta sensibilidad. Se presenta en un frasco recargable con un toque lujoso y moderno.', 'ArmaniCodeLeParfumEDP.webp', 77.94),
(3, 'Baby Tous Estuche', 1, 5, 10, 13, '2007-01-01', 'España', 'Proveedor2', 'Baby Tous Estuche es el regalo ideal para los futuros admiradores de la marca Tous, especialmente diseñado para los más pequeños. Inspirada en la dulce fragancia característica de los bebés, esta inolvidable colonia de Tous combina propiedades cálidas y reconfortantes, creando una experiencia refrescante que induce a un agradable estado de relajación. El estuche incluye la fragancia unisex, un neceser, accesorios y una loción emoliente para mimar a los pequeños después del baño, ofreciendo un conjunto completo para el cuidado y disfrute.\r\n\r\nBaby Tous es una fragancia fresca y alegre de la familia olfativa Floral Almizclada. Sus notas de salida incluyen bergamota, mandarina y neroli, seguidas por notas de corazón de pera, manzana, flor de naranjo y rosa. La composición se completa con notas de fondo de madera de cedro, almizcle y petit grain. Aunque el estuche puede variar en diseño, el producto principal, que incluye la fragancia y la crema, permanece constante, ofreciendo una experiencia de cuidado infantil consistente y de calidad.', 'BabyTousEstuche.webp', 35.00),
(4, 'Black Opium Cofre de Regalo', 2, 1, 11, 1, '2014-01-01', 'Francia', 'Proveedor2', 'Vuelve la fragancia más misteriosa y adictiva, Black Opium Eau De Parfum de Yves Saint Laurent, en este exclusivo Cofre Regalo.', 'BlackOpiumCofredeRegalo.webp', 89.90),
(43, 'HUGO BOSS Bottled EDT', 3, 7, 12, 14, '1998-01-01', 'Italia', 'Proveedor1', 'HUGO BOSS Bottled EDT es una fragancia masculina que encarna la versatilidad y los contrastes, inspirada en espíritus masculinos eclécticos y misteriosos. Este perfume, con un aroma fresco y amaderado, redefine los cánones de la masculinidad en línea con la filosofía \"Man of Today\". La fragancia busca motivar a cada hombre a expresar su auténtico ser a través de sus acciones y valores, proporcionando una experiencia olfativa perdurable que eleva la presencia del hombre contemporáneo.\r\n\r\nBoss Bottled EDT de HUGO BOSS fusiona autenticidad y carácter distintivo, capturando la esencia del hombre moderno. Con su distintivo aroma, esta icónica fragancia se presenta como una elección que va más allá de lo olfativo, buscando reflejar la autenticidad y la singularidad de cada individuo, invitándolos a hacer una diferencia a través de su presencia y elección de fragancia.', 'BossBottledEDT.webp', 35.95),
(44, 'HUGO BOSS Bottled EDT Estuche', 3, 7, 12, 14, '1998-01-01', 'Italia', 'Proveedor1', 'Una masculinidad intensa y refinada se revela en BOSS Bottled Eau de Parfum.', 'BossBottledEstucheEaudeParfum.webp', 59.90),
(45, 'Ck In2u For Her EDT', 2, 1, 15, 2, '2007-01-01', 'Estados Unidos', 'Proveedor3', 'Esta fragancia de mujer describe una conceptualización sobre la vida. Inicia con unas notas de salida florales con la Toronja, Bergamota y Grosella Negra, evoluciona incrementando la intensidad del aroma y finaliza con toque orientales que la convierten en una aroma con carisma ¡No deja indiferente a nadie!', 'CalvinKleinCkIn2uForHerEDT.webp', 18.49),
(46, 'Petits Et Mamans Estuche', 2, 7, 13, 15, '1997-01-01', 'Italia', 'Proveedor5', 'El estuche de Bvlgari Petits et Mamans viene repleto de emociones. En su interior podrás encontrar la fragancia Bvlgari Petit et Mamans y otros productos con la misma fragancia para potenciar su aroma.', 'BvlgariPetitsEtMamansEstuche.webp', 50.72),
(47, 'Eternity For Men Estuche', 3, 7, 16, 2, '1990-01-01', 'Estados Unidos', 'Proveerdor4', 'Eternity Men de Calvin Klein es una fragancia contemporánea, equilibrada y sofisticada. Una fusión estimulante moderna y clásica a la vez, con notas de mandarina y salvia seguidas de la terrosidad de las flores y las hierbas chispeantes, el cedro, y el musgo.', 'CalvinKleinEternityForMenEstuche.webp', 39.94),
(48, '212 Men EDT Estuche', 3, 7, 2, 11, '1999-01-01', 'Estados Unidos', 'Proveedor', 'CAROLINA HERRERA 212 MEN COFRE: Estuche con el perfume de Carolina Herrera 212 Men y otro/s producto/s con la misma fragancia.', 'CarolinaHerrera212MenEDTEstuche.webp', 56.35),
(49, 'Good Girl EDP', 2, 5, 17, 11, '2018-01-01', 'Estados Unidos', 'Proveedo1', 'Good Girl EDP combina notas innovadoras, profundas y atrevidas con otras chispeantes, florales y revitalizadoras para conseguir una fragancia que empodera y deja huella allá donde va. Un aroma duradero y encapsulado en un frasco con forma de stiletto que supone toda una declaración de intenciones.', 'CarolinaHerreraGoodGirlEDP.webp', 48.95),
(50, 'SAUVAGE Eau de Toilette', 3, 1, 18, 17, '2018-01-01', 'Francia', 'Proveedor2', 'Sauvage Eau de Toilette de Dior es un perfume para hombres con una estela inconfundible que reinventa los códigos de la masculinidad más clásica. Una fragancia ecléctica, misteriosa y muy fresca que apuesta por el lema “lo salvaje debe durar”. Así, combina notas refrescantes como la Bergamota de Reggio Calabria con otras más cálidas y reconfortantes como la madera o el Ámbar. ¿El resultado? Un aroma duradero que deja huella allá donde va.', 'DiorSauvageEaudeToilette.webp', 59.95),
(51, 'Colonia Ana y Elsa Frozen', 4, 5, 19, 18, '2013-01-01', 'España', 'Proveedor4', 'DISNEY Colonia Ana y Elsa Frozen, colonia infantil con la fresca dulzura de estos adorables personajes.', 'DisneyColoniaAnayElsaFrozen.webp', 4.94),
(52, 'Paris', 2, 5, 1, 1, '1983-01-01', 'Francia', 'Proveedor2', 'Paris de Yves Saint Laurent es una fragancia de la familia olfativa Floral para Mujeres. Paris se lanzó en 1983. La Nariz detrás de esta fragrancia es Sophia Grojsman. Las Notas de Salida son rosa, mimosa, jacinto, geranio, notas verdes, capuchina, flor de azahar del naranjo, flor del espino, casia y bergamota; las Notas de Corazón son rosa, violeta, azucena, flor de azahar del limero, ylang-ylang, lirio de los valles (muguete), jazmín y raíz de lirio; las Notas de Fondo son iris, almizcle, heliotropo, sándalo, musgo de roble, ámbar y cedro.', '1.webp', 52.20),
(53, 'Acqua Di Gioia Eau de Parfu', 2, 5, 21, 12, '2010-01-01', 'Estados Unidos', 'Proveedor1', 'Acqua Di Gioia de Giorgio Armani es un \r\nperfume de mujer\r\n que evoca la esencia de la alegría. Inspirado en los espíritus femeninos más hedonistas, esta fragancia supone un himno alegre compuesto por tres tiempos y representados por diferentes acordes: vegetación, agua y tierra. ¿El resultado? Un Eau de Parfum EDP fresco, minimalista, espontáneo y radiante que cautiva los sentidos y que deja huella allá donde va. ', '2.webp', 33.39),
(54, 'Test', 1, 1, 3, 13, '2018-02-01', 'Francia', '1', 'test3', '1733173038.webp', 56.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfume_categoria_secundaria`
--

CREATE TABLE `perfume_categoria_secundaria` (
  `perfume_id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `nombre_completo` varchar(256) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `rol` enum('superadmin','admin','usuario','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre_usuario`, `nombre_completo`, `password`, `rol`) VALUES
(1, 'test@test.com', 'test123', 'test123', '$2y$10$rQy6QMCZfpRLoLlvVLon5uWyV70TqXGSIUGKgmlBTonC8a3Rmo3zu', 'admin'),
(2, 'test2@test2.com', 'test2', 'test2', '$2y$10$rQy6QMCZfpRLoLlvVLon5uWyV70TqXGSIUGKgmlBTonC8a3Rmo3zu', 'usuario'),
(3, 'test3@test3.com', 'test3', 'test3', '$2y$10$rQy6QMCZfpRLoLlvVLon5uWyV70TqXGSIUGKgmlBTonC8a3Rmo3zu', 'superadmin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`carrito_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_x_perfume`
--
ALTER TABLE `categorias_x_perfume`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comic_id` (`perfume_id`),
  ADD KEY `personaje_id` (`categoria_id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `disenadores`
--
ALTER TABLE `disenadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `item_x_compra`
--
ALTER TABLE `item_x_compra`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `compra_id` (`compra_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfumes`
--
ALTER TABLE `perfumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personaje_pricipal_id` (`categoria_principal_id`),
  ADD KEY `serie_id` (`familia_id`),
  ADD KEY `guionista_id` (`disenador_id`),
  ADD KEY `artista_id` (`marca_id`);

--
-- Indices de la tabla `perfume_categoria_secundaria`
--
ALTER TABLE `perfume_categoria_secundaria`
  ADD PRIMARY KEY (`perfume_id`,`categoria_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `carrito_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de la tabla `categorias_x_perfume`
--
ALTER TABLE `categorias_x_perfume`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `disenadores`
--
ALTER TABLE `disenadores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `item_x_compra`
--
ALTER TABLE `item_x_compra`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `perfumes`
--
ALTER TABLE `perfumes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias_x_perfume`
--
ALTER TABLE `categorias_x_perfume`
  ADD CONSTRAINT `categorias_x_perfume_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `categorias_x_perfume_ibfk_2` FOREIGN KEY (`perfume_id`) REFERENCES `perfumes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `item_x_compra`
--
ALTER TABLE `item_x_compra`
  ADD CONSTRAINT `item_x_compra_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `item_x_compra_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `perfumes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfumes`
--
ALTER TABLE `perfumes`
  ADD CONSTRAINT `perfumes_ibfk_1` FOREIGN KEY (`categoria_principal_id`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `perfumes_ibfk_2` FOREIGN KEY (`disenador_id`) REFERENCES `disenadores` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `perfumes_ibfk_3` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `perfumes_ibfk_4` FOREIGN KEY (`familia_id`) REFERENCES `familias` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfume_categoria_secundaria`
--
ALTER TABLE `perfume_categoria_secundaria`
  ADD CONSTRAINT `perfume_categoria_secundaria_ibfk_1` FOREIGN KEY (`perfume_id`) REFERENCES `perfumes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perfume_categoria_secundaria_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
