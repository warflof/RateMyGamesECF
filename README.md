// #############  Utilisation de la BBD  ##################


    # DONNEES QUI DOIVENT ETRE MODIFIEES EN TABLE DE LIAISONS :

           NOMBRE DE JOUEURS /
            Modifiable grâce à la table de liaison "jeu_nombre_joueur", il faudra référencer le "jeu_id" de la table Jeu et le "nombre_joueur_id" de la table nombre_joueur"

            +----+---------------------------------+
            | ID | Titre                           |
            +----+---------------------------------+
            |  1 | A plague tale: Requiem          |
            |  2 | New world                       |        <=== Tableau évolutif.
            |  3 | Horizon Forbiden West           |
            |  4 | Call of duty : Modern Warfare 2 |
            |  etc.                                |
            +----+---------------------------------+

            +----+-------------+
            | id | nom         |
            +----+-------------+
            |  1 | Solo        |            <=== Tableau définitif et non-évolutif.
            |  2 | Coop        |
            |  3 | Multijoueur |
            +----+-------------+

            ###################################################################

            STYLE / indique si le ou les style au jeu.
                Modifiable grâce à la table de liaison "jeu_style", il faudra référencer le "jeu_id" de la table
                jeu et le "style_id" de la table style.

                +----+---------------------------------+
                | ID | Titre                           |
                +----+---------------------------------+
                |  1 | A plague tale: Requiem          |
                |  2 | New world                       |        <=== Tableau évolutif.
                |  3 | Horizon Forbiden West           |
                |  4 | Call of duty : Modern Warfare 2 |
                |  etc.                                |
                +----+---------------------------------+

                +----+--------------+
                | id | style        |
                +----+--------------+
                |  1 | Aventure     |
                |  2 | Plateformer  |
                |  3 | FPS          |
                |  4 | MMORPG       |
                |  5 | RPG          |       <=== Tableau évolutif.
                |  6 | MOBA         |
                |  7 | RTS          |
                |  8 | Horreur      |
                |  9 | Survival     |
                | 10 | Hack'n Slash |
                | 11 | Simulation   |
                +----+--------------+

            ######################################################################

    

A FAIRE :

    TABLE UTILISATEUR
    TABLE ROLE  


