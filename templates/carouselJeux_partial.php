<div class="hidden duration-200 ease-linear" data-carousel-item>
    <p class="relative text-slate-50 text-2xl dark:text-white z-30 text-center bg-gradient-to-r from-black"><?=$jeu['Description'] ?></p>
    <a href="jeu.php?id=<?= $jeu['ID'] ?>" ><img class="object-cover absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" src="<?=getGameImg($jeu['Image']); ?>"/></a>
</div>