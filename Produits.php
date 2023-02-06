<?php
require('templates/header.php');
require_once('lib/jeuxData.php');



?>  
    
<!-- ########### FIRST SECTION ###########-->
<div class="mx-auto w-full  pb-8">
<div class="flex flex-row w-full" >
  
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
          
          <button class="bg-slate-50"type="submit">Filtrer</button>
          <button class="bg-slate-50"type="reset">Réinitialiser</button>
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
      
        <div class="scroll-container scrollable bg-gradient-to-r from-black border-y-2 border-lime-500" id="allGames">
      
          <?php foreach ($jeux as $key => $jeu)
           {
              include('templates/jeu_partial.php');
           }
           ?>
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