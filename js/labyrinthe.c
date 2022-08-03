#include <stdio.h>
#include <stdlib.h>
#include <ncurses.h>

#define HAUTEUR1 8
#define LARGEUR1 15
#define HAUTEUR2 11
#define LARGEUR2 33
#define HAUTEUR3 30
#define LARGEUR3 60

/* is_valid vérifie que les coordonnées (x, y) sont valides pour un déplacement */
int is_valid(int x, int y, int hauteur, int largeur, char grille[hauteur][largeur])
{
    if ((grille[y][x] != '#') && (y >= 0))
    {
        return 1;
    }
    return 0;
}
/* is_finish vérifie que l'emplacement sur lequel se trouve les coordonnées (x, y) est une sortie */
int is_finish(int x, int y, int hauteur, int largeur, char grille[hauteur][largeur])
{
    if (grille[y][x] == '.')
    {
        printf("Bravo ! Mission accomplie.");
        return 1;
    }
    return 0;
}

int niveauf()
{
    char grille[HAUTEUR1][LARGEUR1] = {
        "# ###########",
        "# #   #   # #",
        "# # # # # # #",
        "# # # # # # #",
        "# # # # # # #",
        "#   #   #   #",
        "###########.#"};
    int x = 1, y = 0;
    int mvx, mvy;
    int i;
    initscr();
    noecho();
    cbreak();
    do
    {
        clear();
        for (i = 0; i < HAUTEUR1; ++i)
        {
            mvprintw(i, 0, "%s", grille[i]);
        }
        mvprintw(y, x, "@");
        mvprintw(y, x, " ");
        refresh();
        mvx = x;
        mvy = y;
        switch (getch())
        {
        case 'z':
            mvy = y - 1;
            break;
        case 's':
            mvy = y + 1;
            break;
        case 'q':
            mvx = x - 1;
            break;
        case 'd':
            mvx = x + 1;
            break;
        }
        if (is_valid(mvx, mvy, HAUTEUR1, LARGEUR1, grille))
        {
            x = mvx;
            y = mvy;
        }
    } while (!is_finish(x, y, HAUTEUR1, LARGEUR1, grille));
    refresh();
    clrtoeol();
    refresh();
    endwin();
    return menu();
}

int niveaum()
{
    char grille[HAUTEUR2][LARGEUR2] = {
        "############################## #",
        "#      #    # #   #            #",
        "### # ## ############# #########",
        "#      # ####          #       #",
        "#  ##  # #    ############### ##",
        "#    #             #    #      #",
        "# ## # ########### ###### ######",
        "# #   #                      # #",
        "######  ################ ##### #",
        "# #               #            #",
        "###.############################"};
    int x = 27, y = 0;
    int mvx, mvy;
    int i;
    initscr();
    noecho();
    cbreak();
    do
    {
        clear();
        for (i = 0; i < HAUTEUR2; ++i)
        {
            mvprintw(i, 0, "%s", grille[i]);
        }
        mvprintw(y, x, "@");
        mvprintw(y, x, " ");
        refresh();
        mvx = x;
        mvy = y;
        switch (getch())
        {
        case 'z':
            mvy = y - 1;
            break;
        case 's':
            mvy = y + 1;
            break;
        case 'q':
            mvx = x - 1;
            break;
        case 'd':
            mvx = x + 1;
            break;
        }
        if (is_valid(mvx, mvy, HAUTEUR1, LARGEUR1, grille))
        {
            x = mvx;
            y = mvy;
        }
    } while (!is_finish(x, y, HAUTEUR2, LARGEUR2, grille));
    refresh();
    clrtoeol();
    refresh();
    endwin();
    return menu();
}
int niveaud()
{
    char grille[HAUTEUR3][LARGEUR3] = {
        "############################################################",
        "########          ##    ###       #      #       ### ##    #",
        "#   ########      #####      ### #  ##   # ##    ######  # #",
        "#   ##### ### ### ####  ####    #  #  #  #     #####      ##",
        "#     ####     ##  ###### ##   #  #  # #  ##########     # #",
        "# ####### ## ### ##    ## # # #  # #### #  #### ## ###     #",
        "# ### ### ##### #### #### ## #  #  #######   #######   # ###",
        "# ### ### ######### ####### #  # # ###### #   # ## ### ### #",
        "#  #### ####  #### ### #####  #### ##      #  # # # # # #  #",
        "######### ######  #    ####  #  ########### #  ### # # ## ##",
        "# ### ######## ##      #    #  ######## #    #  ####       #",
        "## ## #### ####    ##### ###  ##### ## ## ## #       #######",
        "################   #     #     ######## ###########        .",
        "# # #######     # ## #####  ## ##### #### ## #    ##########",
        "#   # #######   # #   # ## ###### ##### #### ####### ### ###",
        "# #  ##### #    #  ### #### #### # ### ### ### ### ## ###  #",
        "#  #            #  ########### ## ####### ####  ## ### #####",
        "#  #        #  #  ##### #### #####      ###### ######      #",
        "#  ######## #      ################  ######  ########  ### #",
        "#         ###########  ### #### #   ######    ##### ##     #",
        "# # #  #       ######## ####### ##### #  ##  # ##### #######",
        "########## # #  ##########   ### ###    ### ### ### ###### #",
        "#  #     #  ####### #### ##### ###### ##  ### #### #####   #",
        "#  #    #  #  ##### ## ##### ##### ######## #### # ### #####",
        "#### ####  # # ##  ## ##### ###### # ######  ### ##### ### #",
        "            # #### ##  ##  ###### ### #### ### ### #  #### #",
        "############  ##### ### ##### ##### ########## ######## ## #",
        "#  ######  ##### # # # #  ######## ##### ##### #### ###    #",
        "# ## ## ##  ###  #     ### ##### ####### ###########  ######",
        "############################################################"};
    int x = 0, y = 26;
    int mvx, mvy;
    int i;
    initscr();
    noecho();
    cbreak();
    do
    {
        clear();
        for (i = 0; i < HAUTEUR3; ++i)
        {
            mvprintw(i, 0, "%s", grille[i]);
        }
        mvprintw(y, x, "@");
        mvprintw(y, x, "");
        refresh();
        mvx = x;
        mvy = y;
        switch (getch())
        {
        case 'z':
            mvy = y - 1;
            break;
        case 's':
            mvy = y + 1;
            break;
        case 'q':
            mvx = x - 1;
            break;
        case 'd':
            mvx = x + 1;
            break;
        }
        if (is_valid(mvx, mvy, HAUTEUR3, LARGEUR3, grille))
        {
            x = mvx;
            y = mvy;
        }
    } while (!is_finish(x, y, HAUTEUR3, LARGEUR3, grille));
    refresh();
    clrtoeol();
    refresh();
    endwin();
    return menu();
}

int menu()
{
    system("clear");
    int niv = 0;
    printf("Choisissez un niveau :\n");
    printf("Niveau 1 (facile)     : 1\n");
    printf("Niveau 2 (moyen)      : 2\n");
    printf("Niveau 3 (difficile)  : 3\n");
    scanf("%d", &niv);
    switch (niv)
    {
    case 1:
        niveauf();
        break;
    case 2:
        niveaum();
        break;
    case 3:
        niveaud();
        break;
    }
}

int main()
{
    int go = 0;
    printf("Bonjour, voulez-vous commencer une partie ?\n"
           "Oui : 1\n"
           "Non : 2\n");
    scanf("%d", &go);
    switch (go)
    {
    case 1:
        menu();
        break;
    case 2:
        printf("Au revoir!");
        break;
    }
}
