<template>
  <v-app-bar :elevation="2" style="position: fixed; background: #192636; opacity:0.9;" class="px-12" id="2">
    <v-btn style="font-size: 20px;" @click="scroll('home')">
      <img :src="logo" alt="Logo" class="mr-2" style="height: 24px;" />
      {{ buttonTexts.nom }}
    </v-btn>
    <v-spacer></v-spacer>

    <!-- Long menu for large screens -->
    <v-btn class="long_menu" text @click="scroll('home')">{{ buttonTexts.home }}</v-btn>
    <v-btn class="long_menu" text @click="scroll('about')">{{ buttonTexts.about }}</v-btn>
    <v-btn class="long_menu" text @click="scroll('projects')">{{ buttonTexts.projects }}</v-btn>
    <v-btn class="long_menu" text @click="scroll('contact')">{{ buttonTexts.contact }}</v-btn>
    <v-btn class="long_menu" aria-label="Changer en français" @click="changeLanguage('fr')">
      <img :src="drapeau_fr" alt="france" class="mr-2" style="width: 60%;" />
    </v-btn>
    <v-btn class="long_menu" aria-label="Changer en anglais" @click="changeLanguage('en')">
      <img :src="drapeau_en" alt="english" class="mr-2" style="width: 60%;" />
    </v-btn>

    <!-- Short menu icon for small screens -->
    <v-app-bar-nav-icon class="short_menu" @click="toggleMenu"></v-app-bar-nav-icon>
  </v-app-bar>

  <!-- Short menu for small screens -->
  <v-overlay v-if="isMenuOpen" absolute opacity="0.5" color="black" @click="toggleMenu"></v-overlay>
  <div v-if="isMenuOpen" class="short-menu-items" id="1">
    <v-btn :class="{ 'overlay-active': isMenuOpen }" text @click="scrollAndClose('home')">{{ buttonTexts.home }}</v-btn>
    <v-btn :class="{ 'overlay-active': isMenuOpen }" text @click="scrollAndClose('about')">{{ buttonTexts.about }}</v-btn>
    <v-btn :class="{ 'overlay-active': isMenuOpen }" text @click="scrollAndClose('projects')">{{ buttonTexts.projects }}</v-btn>
    <v-btn :class="{ 'overlay-active': isMenuOpen }" text @click="scrollAndClose('contact')">{{ buttonTexts.contact }}</v-btn>
    <v-btn :class="{ 'overlay-active': isMenuOpen }" aria-label="Changer en français" @click="changeLanguage('fr')">
      <img :src="drapeau_fr" alt="france" class="mr-2" style="width: 60%;" />
    </v-btn>
    <v-btn :class="{ 'overlay-active': isMenuOpen }" aria-label="Changer en anglais" @click="changeLanguage('en')">
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
      buttonTexts: {
        nom : 'Lacroix Thomas',
        home: 'Accueil',
        about: 'À propos',
        projects: 'Projets',
        contact: 'Contact',
      },
    };
  },
  computed: {
    isEnglish() {
      return this.$route.path.startsWith('/en');  // Vérifie si l'URL commence par /en
    },
  },
  watch: {
    isEnglish: {
      immediate: true,
      handler(newVal) {
        this.updateButtonTexts(newVal);
      },
    },
  },
  methods: {
    updateButtonTexts(isEnglish) {
      if (isEnglish) {
        this.buttonTexts = {
          nom : 'Thomas Lacroix',
          home: 'Home',
          about: 'About',
          projects: 'Projects',
          contact: 'Contact',
        };
      } else {
        this.buttonTexts = {
          nom : 'Lacroix Thomas',
          home: 'Accueil',
          about: 'À propos',
          projects: 'Projets',
          contact: 'Contact',
        };
      }
    },
    scroll(refName) {
      const element = document.getElementById(refName);
      if (element) {
        element.scrollIntoView({ behavior: "smooth" });
      }
    },
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen; // Toggle the visibility of the menu
    },
    scrollAndClose(refName) {
      this.scroll(refName);  // Scroll to the section
      this.toggleMenu();     // Close the menu after clicking
    },
    changeLanguage(lang) {
      const currentRoute = this.$route.name;  // Obtenir le nom de la route actuelle
      let newRoute;

      if (lang === 'en') {
        newRoute = currentRoute === 'home' ? 'home_en' : currentRoute + '_en';
      } else {
        newRoute = currentRoute.replace('_en', ''); // Retirer le '_en' pour revenir à la version française
      }

      this.$router.push({ name: newRoute });
    },
    updateButtonStyles() {
      const overlays = document.querySelectorAll('.v-btn--variant-text .v-btn__overlay');
      overlays.forEach(overlay => {
        overlay.style.background = 'rgba(200, 200, 200, 0.3)';
      });
    },
  },
  mounted() {
    this.updateButtonTexts(this.isEnglish);
    this.updateButtonStyles();
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
    height: calc(100vh - 64px);
    background-color: #192636;
    z-index: 10;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px;
  }
  
  /* Styling for the buttons */
  .short-menu-items .v-btn {
    font-size: 20px;           /* Larger font size */
    margin: 30px 0;            /* Add spacing between buttons */
    color: white;
    border: none;              /* Remove border */
    justify-content: center;   /* Center the text */
  }
}

.overlay-active .v-btn__overlay {
  background-color: rgba(200, 200, 200, 0.3);
}


.scrolled {
  height: 48px; /* Réduire la hauteur de la barre */
  transition: height 0.3s ease;
}

</style>