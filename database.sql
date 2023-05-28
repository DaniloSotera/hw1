
--
-- Database: `troina`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `link` varchar(256) NOT NULL
);

--
-- Dump dei dati per la tabella `contacts`
--

INSERT INTO `contacts` (`id`, `tipo`, `nome`, `link`) VALUES
(1, 'cibo', 'Hotel Costellazioni', 'https://www.tripadvisor.com/Hotel_Review-g1501777-d6212150-Reviews-Hotel_Costellazioni-Troina_Province_of_Enna_Sicily.html'),
(2, 'cibo', 'Trattoria La Ferla', 'https://www.tripadvisor.com/Restaurant_Review-g1501777-d8015833-Reviews-Trattoria_La_Ferla-Troina_Province_of_Enna_Sicily.html'),
(3, 'cibo', 'Pub Black & White', 'https://www.tripadvisor.com/Restaurant_Review-g1501777-d7075872-Reviews-Black_White_Pub-Troina_Province_of_Enna_Sicily.html'),
(4, 'letto', 'Hotel Costellazioni', 'https://www.booking.com/hotel/it/costellazioni.it.html'),
(5, 'letto', 'B&B Al Centro Storico', 'https://www.booking.com/hotel/it/b-amp-b-al-centro-storico-troina1.it.html'),
(6, 'letto', 'B&B Al Borgo', 'http://www.bbalborgo.net/');

-- --------------------------------------------------------

--
-- Struttura della tabella `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `data_inizio` varchar(10) NOT NULL,
  `data_fine` varchar(10) NOT NULL,
  `titolo` varchar(40) NOT NULL,
  `paragrafo` varchar(1000) NOT NULL,
  `path` varchar(50) NOT NULL
);

--
-- Dump dei dati per la tabella `info`
--

INSERT INTO `info` (`id`, `data_inizio`, `data_fine`, `titolo`, `paragrafo`, `path`) VALUES
(1, '05/05/2023', '05/06/2023', 'Discesa e salita fercolo', 'Processione del simulacro del Santo, dalla Chiesa Madre a quella a lui dedicata, in una sfarzosa Vara settecentesca attraversando la tradizionale fiera di Giugno.', 'Fercolo-San-silvestro'),
(2, '05/18/2023', '05/21/2023', 'Festa dei Rami', 'Pellegrinaggio a piedi dalla Basilica di San Silvestro a Troina fino ai lontani boschi dei Nebrodi dove i fedeli raccolgono ramoscelli di alloro con cui sfilano la domenica lungo le via del paese.', 'Festa-dei-rami-Troina'),
(3, '06/02/2023', '06/04/2023', 'Festa della Ddarata', 'Pellegrinaggio a cavallo con tragitto simile al precedente. Anche i fedeli ddarara rientrano attraversando lo storico ponte di Faidda e sfilando, la domenica, con gli animali bardati di alloro.', 'festa-della-ddarata-troina');

-- --------------------------------------------------------

--
-- Struttura della tabella `star`
--

CREATE TABLE `star` (
  `user` varchar(255) NOT NULL,
  `id_festa` int(11) NOT NULL
);

--
-- Dump dei dati per la tabella `star`
--

INSERT INTO `star` (`user`, `id_festa`) VALUES
('ciao', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
);

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`username`, `password`, `email`) VALUES
('ciao', '$2y$10$bli7dxmDtM57O25sQF6GbOC7DIkH4uGHBBf7B8upe1RVuEe3mSEJi', 'ciao@io.com'),
('io', '$2y$10$7hFlvNgoSX9y9VszeZirb.sX41CuvnIaS5393uT1c3F8mLioMbSWi', 'io@io.com'),
('tu', '$2y$10$a95xeQPgwYtJ38Vjv0MwBeJgWr4dcggDqBG3kRdAxxhwOIke2RkPq', 'tu@io.com');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo` (`tipo`,`nome`);

--
-- Indici per le tabelle `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_inizio` (`data_inizio`,`data_fine`,`titolo`);

--
-- Indici per le tabelle `star`
--
ALTER TABLE `star`
  ADD PRIMARY KEY (`user`,`id_festa`),
  ADD KEY `id_festa` (`id_festa`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `star`
--
ALTER TABLE `star`
  ADD CONSTRAINT `star_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `star_ibfk_2` FOREIGN KEY (`id_festa`) REFERENCES `info` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
