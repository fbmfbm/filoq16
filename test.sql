



  /******************PLATEFORME ANAH ********* PP *********** VERSION APPEL avec protection des intervalles  *********/

SELECT cube4a."CODE_TERR",
cube4a.a60 AS a60,
cube4a.a43 AS a43,
NULLIF(REGEXP_REPLACE(cube4a.a43, '\[*\]*[0-9.]*:[0-9.]*\]*\[*', '', 'g'), '')::DEC/n1.tot_cube4a_a43_a48 AS tx_cube4a_a43_a48
FROM  cube4a_beyond as cube4a
JOIN

(select  "CODE_TERR", "TYPE", annee,
(NULLIF(REGEXP_REPLACE(cube4a.a43, '\[*\]*[0-9.]*:[0-9.]*\]*\[*', '', 'g'), '')::DEC+
NULLIF(REGEXP_REPLACE(cube4a.a44, '\[*\]*[0-9.]*:[0-9.]*\]*\[*', '', 'g'), '')::DEC+
NULLIF(REGEXP_REPLACE(cube4a.a45, '\[*\]*[0-9.]*:[0-9.]*\]*\[*', '', 'g'), '')::DEC+
NULLIF(REGEXP_REPLACE(cube4a.a46, '\[*\]*[0-9.]*:[0-9.]*\]*\[*', '', 'g'), '')::DEC+
NULLIF(REGEXP_REPLACE(cube4a.a47, '\[*\]*[0-9.]*:[0-9.]*\]*\[*', '', 'g'), '')::DEC+
NULLIF(REGEXP_REPLACE(cube4a.a48, '\[*\]*[0-9.]*:[0-9.]*\]*\[*', '', 'g'), '')::DEC) AS tot_cube4a_a43_a48




FROM  cube4a_beyond as cube4a  WHERE "CODE_TERR" = '43228' AND "TYPE" = 'COM' AND annee = '2015') as n1




ON cube4a."CODE_TERR" = n1."CODE_TERR"

  WHERE cube4a."CODE_TERR" = '43228' AND cube4a."TYPE" = 'COM' AND cube4a.annee = '2015'