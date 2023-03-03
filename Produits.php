<?php
require('templates/header.php');
require_once('lib/jeuxData.php');


$jeux = getGames($pdo);
if(isset($_SESSION['user']['email'])){
  $users = $_SESSION['user']['email'];
};




$favorisQuery = $pdo->prepare('SELECT * FROM utilisateur_jeu WHERE utilisateur_email = :mail');
$favorisQuery->bindParam(':mail', $users, PDO::PARAM_STR);
$favorisQuery->execute();
$favoris = $favorisQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- ########### FIRST SECTION ###########-->
<div class="mx-auto w-full  pb-8">
  <div class="flex flex-row w-full">

    <!-- SideBar -->
    <div class="left-0 top-0 basis-1/4 hidden" id="filterSideBar">
      <aside class="w-128 left-0" aria-label="Sidebar">
        <div class="px-2 py-4 overflow-y-auto rounded bg-gray-50 dark:bg-gray-800">

          <!-- Contenu Modale -->
          <div class="px-6 py-2">
            <div class="flex flex-row justify-between">

              <h2 class="text-slate-50 text-2xl py-2 pb-6 basis-2/4">
                Filtres
              </h2>

              <button class="close text-slate-50 text-2xl text-right basis-1/4" id="closeModalButton">&times;</button>

            </div>



            <form id="filter-form">
              <input type="text" id="filter-input" placeholder="Filtrer les produits...">

              <button class="bg-slate-50" type="submit">Filtrer</button>
              <button class="bg-slate-50" type="reset">Réinitialiser</button>
            </form>


          </div>

          <!-- Fin Contenu Modale -->
        </div>
      </aside>
    </div>

    <!-- Fin de la SideBar -->



    <!-- FIRST SECTION -->


    <div class="mx-32 w-full" id="mainSection">

      <h1 class="text-5xl text-slate-50 text-start text mt-16 mb-16 underline decoration-lime-500">
        Nos jeux
      </h1>

      <button class="bg-lime-500 rounded-md font-bold px-4 py-2 border-2 border-slate-50 text-slate-50" id="FilterButton">
        Filtres
      </button>



      <!-- FIRST GROUP -->
      <div>
        <div class="flex flex-row py-6 mt-8">
          <div class="basis-3/4">
            <h2 class="text-lime-500 text-2xl">Tout nos jeux</h2>
          </div>
          <div class="text-end place-content-end basis-1/4">
            <button class="bg-lime-500 rounded-full mx-2 text-center" onclick="scrollOther()">
              <span class="material-symbols-outlined py-2 px-2">
                arrow_back
              </span>
            </button>
            <button class="bg-lime-500 rounded-full" onclick="scrollRight()">
              <span class="material-symbols-outlined py-2 px-2">
                arrow_forward
              </span>
            </button>
          </div>
        </div>

        <div class="scroll-container scrollable bg-gradient-to-r from-black border-y-2 border-lime-500" id="allGames">

          <!-- ALL GAMES "../js/Produits.js"  -->

        </div>
      </div>

      <!-- 2ND GROUP -->

      <div>
        <div class="flex flex-row py-6 mt-8">
          <div class="basis-3/4">
            <h2 class="text-lime-500 text-2xl">Tout nos jeux</h2>
          </div>
          <div class="text-end place-content-end basis-1/4">
            <button class="bg-lime-500 rounded-full mx-2 text-center" onclick="scrollOther()">
              <span class="material-symbols-outlined py-2 px-2">
                arrow_back
              </span>
            </button>
            <button class="bg-lime-500 rounded-full" onclick="scrollRight()">
              <span class="material-symbols-outlined py-2 px-2">
                arrow_forward
              </span>
            </button>
          </div>
        </div>

        <div class="scroll-container scrollable bg-gradient-to-r from-black border-y-2 border-lime-500 flex" id="allGames">
  <?php 
  foreach ($jeux as $jeu) { ?>
          <div class="flex flex-col border-l-2 border-gray-800 items-center py-2">
            <!-- <div class="w-32 h-12">
        <p class="text-slate-50">
            <?= $jeu['Titre'] ?>
        </p>
    </div> -->
            <a href="jeu.php?id=<?= $jeu['ID'] ?>" class="">
              <img class="rounded-lg hover:brightness-150 transition duration object-content" src="<?= getGameImg($jeu['image']); ?>" />
            </a>
            <?php if (isset($_SESSION['role']) && isset($_SESSION['role']['role']) && (intval($_SESSION['role']['role'])) == 1 || (intval($_SESSION['role']['role'])) == 2 || (intval($_SESSION['role']['role'])) == 5 || (intval($_SESSION['role']['role'])) == 6) {
              foreach ($favoris as $favori) {
                $favori = $favori['jeu_id'];
              }
              if (isset($favori) && $favori == $jeu['ID']) { ?>
                <div class="text-right py-6">
                  <a href="favoris.php" class="text-slate-50 text-right border-2 border-lime-500 px-2 py-2 rounded-md my-2 mx-6">
                    <i class="fas fa-heart text-slate-50"></i> <span class="text-slate-50">Vous aimez ce jeu</span>
                  </a>
                </div>
              <?php } else { ?>
                <div class="text-right py-6">
                  <a href="ajouter_favoris.php?id=<?= $jeu['ID'] ?>&mail=<?= $users ?>" style="cursor: pointer;" class="text-slate-50 text-right border-2 border-lime-500 px-2 py-2 rounded-md my-2 mx-6">
                    <i class="fa-regular fa-heart"></i> Ajouter aux favoris
                  </a>
                </div>

            <?php }
            } ?>
          </div>
        <?php } ?>
        </div>
        
      </div>

      <!-- 3RD GROUP -->

      <!-- FIN DU CONTENU -->
    </div>
  </div>
</div>

<script src="js/Produits.js"></script>


<!-- FOOTER -->


<?php
require('templates/footer.php');
?>