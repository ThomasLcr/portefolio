<template>
  <v-app-bar :elevation="2" style="position: fixed; background: #192636; opacity:0.9;" class="px-12">
    <v-btn style="font-size: 20px;" @click="scroll('home')">
      <img :src="logo" alt="Logo" class="mr-2" style="height: 24px;" />
      LACROIX THOMAS
    </v-btn>
    <v-spacer></v-spacer>
    <!-- Long menu for large screens -->
    <v-btn class="long_menu" text @click="scroll('home')"> Accueil </v-btn>
    <v-btn class="long_menu" text @click="scroll('about')"> À propos </v-btn>
    <v-btn class="long_menu" text @click="scroll('projects')"> Projets </v-btn>
    <v-btn class="long_menu" text @click="scroll('contact')"> Contact </v-btn>
    <v-btn class="long_menu" @click="scroll('home')">
      <img :src="drapeau_fr" alt="france" class="mr-2" style="width: 60%;" />
    </v-btn>
    <v-btn class="long_menu">
      <img :src="drapeau_en" alt="english" class="mr-2" style="width: 60%;" />
    </v-btn>

    <!-- Short menu icon for small screens -->
    <v-app-bar-nav-icon class="short_menu" @click="toggleMenu"></v-app-bar-nav-icon>
  </v-app-bar>

  <!-- Short menu for small screens -->
  <div v-if="isMenuOpen" class="short-menu-items">
    <v-btn
  x-large
>oui</v-btn>
    <v-btn depressed large outlined plain raised text @click="scroll('home')"> Accueil </v-btn>
    <v-btn text @click="scroll('about')"> À propos </v-btn>
    <v-btn text @click="scroll('projects')"> Projets </v-btn>
    <v-btn text @click="scroll('contact')"> Contact </v-btn>
    <v-btn @click="scroll('home')">
      <img :src="drapeau_fr" alt="france" class="mr-2" style="width: 60%;" />
    </v-btn>
    <v-btn>
      <img :src="drapeau_en" alt="english" class="mr-2" style="width: 60%;" />
    </v-btn>
  </div>
</template>


<script>
import logo from "../assets/logo_site.ico";
import drapeau_fr from "../assets/fr.png";
import drapeau_en from "../assets/en.png";

export default {
  data() {
    return {
      logo,
      drapeau_fr,
      drapeau_en,
      isScrolled: false,
      isMenuOpen: false, // Add state to track menu visibility
    };
  },
  methods: {
    scroll(refName) {
      const element = document.getElementById(refName);
      if (element) {
        element.scrollIntoView({ behavior: "smooth" });
      }
    },
    handleScroll() {
      this.isScrolled = window.scrollY > 50;
    },
    updateButtonStyles() {
      const overlays = document.querySelectorAll('.v-btn--variant-text .v-btn__overlay');
      overlays.forEach(overlay => {
        overlay.style.background = 'rgba(200, 200, 200, 0.3)';
      });
    },
    toggleMenu() {
      const overlays = document.querySelectorAll('.v-btn--variant-text .v-btn__overlay');
      overlays.forEach(overlay => {
        overlay.style.background = 'rgba(200, 200, 200, 0.3)';
      });
      this.isMenuOpen = !this.isMenuOpen; // Toggle the visibility of the menu
    },
  },
  mounted() {
    window.addEventListener("scroll", this.handleScroll);
    this.updateButtonStyles(); //Call to update styles
  },
  beforeDestroy() {
    window.removeEventListener("scroll", this.handleScroll);
  },
};
</script>


<style>

/* Styles for large screens */
@media screen and (min-width:1000px) {
  .long_menu {
    display: block !important;
  }
  .short_menu {
    display: none !important;
  }
}

/* Styles for small screens */
@media screen and (max-width:999px) {
  .long_menu {
    display: none !important;
  }
  .short_menu {
    display: block !important;
  }

  /* Short menu item styles */
  .short-menu-items {
    position: fixed;
    top: 64px; /* Positioned just below the v-app-bar */
    right: 0;
    width: 100%;
    height: 100%;
    background-color: red;
    z-index: 10;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 50px;
    gap: 20px;
  }
  
  .short-menu-items .v-btn {
    margin: 5px 0;
    color: white;
  }
}

.langue
{
  margin-left: auto;
  border: none;
}
.langue-hidden
{
  display: flex;
  justify-content: center;
  align-items:center;
  flex-direction: column;
  position: fixed;
  top : 10vh;
  right:1%;
  padding: auto;
  background: #F5F5F5;
  border-radius: 10px;
  z-index: 1;
  opacity: 0;
}

.btn-langue
{
  
  border: none;
  background: none;
  font-size: 2vh;
  cursor: pointer;
}

.langue-hidden form
{
  padding: 2vh 2vh 1vh 2vh;
}


.show-langue .langue-hidden 
{
  opacity: 1;
}
</style>