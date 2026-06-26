<?php require_once _ROOTPATH_.'\templates\header.php'; 
  
?>

<section class="hero">
        <div>
          <p class="hero__subtitle">Bienvenue</p>
          <h1 class="hero__title">
            Donnez Votre Avis?
          </h1>
          <p class="hero__description">
          Un espace vous est reserver , afin de laisser  votre ressenti.
          </p>
          <a class="hero__link" href="?controller=avis&action=add">Avis</a> 
        </div>
<div class="hero__image">

          <fieldset><legend>
            <strong>Avis d'un Visiteur</strong> 
          </legend>
  
          <p>Un visteur du Zoo , a laisse son avis, lors de sa venu</p>
          <a href="?controller=avis&action=avisUnique">Cliquer ici pour voir d'un visiteur</a>
          
          
        </fieldset>
</div>
       
      </section>
      </section>
      <section class="section-partners">
      
        <h2>Broceliande.</h2>
        <p>
         Profite d'une excelente notorite grace a ses partenaires
          
        </p>
     
        <ul class="section-partners__list-logs">
          <li class="section-partners__logo">
            <img src="./assets/images/image_svg/logo-airbnb.svg" alt="" />
          </li> 
          <li class="section-partners__logo">
            <img src="./assets/images/image_svg/logo-facebook.svg" alt="" />
          </li>
          <li class="section-partners__logo">
            <img src="./assets/images/image_svg/logo-google.svg" alt="" />
          </li>
          <li class="section-partners__logo">
            <img src="./assets/images/image_svg/logo-microsoft.svg" alt="" />
          </li>
          
        </ul>
        <a href="?controller=animal&action=listOnly">Explorez-moi</a>
      </section>
      <section class="section-two">
        <picture class="section-two__bloc img">
          <source 
            srcset="./assets/images/image_svg/petit_train4bis.svg" alt=" voyage de mon train"
            media="(min-width: 321px)"
          />
          
          <img
            src="./asset/images/image_svg/zoo.svg"
            alt="image du zoo par default"
          />
        </picture>
        <div class="section-two__bloc">
          <h2>Le Zoo</h2>
          <p>
            La visite du Zoo, un passage obligé que petits et grands vont adorer peut se derouler a bord d'un train , avec la presence d'un guide.
            Il est possible de se restaurer avant et apres la visite.
          </p>
        
        </div>
      </section>
  

      <section class="section-habitat">
      <p>
      Pas tres loin de la forêt de Brocéliande , ou residait  au 9e siècle par le roi Salomon, le château de Comper est indissociable d’une balade en foret. Si la légende raconte qu’il fut la résidence de la fée Viviane
      familièrement appelé zoo de Broceliande, est un parc zoologique français de 20 hectares, faisant partie du Muséum national d'histoire naturelle, situé dans l'ouest du bois de Vincennes,
      </p>
      
      <strong>
        Le Zoo acceuil plusieurs occupant au travers differents Habitats.
      </strong>
      

      
      <ul class="section-habitat__cards-container">
        <li class="section-habitat__card">
          
<a href="index.php?controller=image&action=show&image_id=1"><img src="./uploads/habitats/Savanne.jpg" alt="image de la Savanne" />
</a>
          
         <h3><strong>Savanne</strong></h3>
         
          <p>
            Vaste etandu, possedants plusieurs variete  d'animaux
          </p>

        </li>
        <li class="section-habitat__card">
          <a href="index.php?controller=image&action=show&image_id=2"><img src="./uploads/habitats/Jungle.jpg" alt="image de la Jungle" /></a>
          

          <h3><strong>Jungle</strong></h3>
          <p>
            C'est la partie du Zoo, la plus vertes et humides,ou plusieurs especes cohabitent.
          </p>
        </li>

        <li class="section-habitat__card">
          <a href="index.php?controller=image&action=show&image_id=3"><img src="./uploads/habitats/Marais.jpg" alt="image du Marais" /></a>
          

          <h3><strong>Marais</strong></h3>
          <p>
           Etendu Marrecageux,ou les occupants se prelassent
          </p>
        </li>
      </ul>
    </section>


<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>