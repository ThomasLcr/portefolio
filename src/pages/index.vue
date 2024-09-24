<template>
  <div id="home">
    <div class="full-page">
      <h1 style="font-size: 5rem;">Étudiant en cybersécurité</h1>
    </div>
  </div>
  <div id="about" style="text-align: center;min-height: 100vh; margin: 5px;">
    <div id="anim_left_pres" class="hidden">
      <v-card class="mx-auto" width="50%" style="background: rgb(30, 40, 55);">
        <template v-slot:title>
          <span class="pt-8" style="font-weight: bold;font-size: 35px;">Présentation 🙋‍♂️</span>
        </template>
        <v-card-text class="pt-4" style="background: rgba(11, 45, 138, 0.3);font-size: 20px; text-align: left; line-height:50px;">
          <p>Je m'appelle Lacroix Thomas et je suis étudiant en 2ème année d'école d'ingénieur à Télécom Nancy.</p>
          <p>Je suis quelqu'un qui adore faire du sport, entre autre, du tennis, de la course à pieds, du vélo ou encore de la natation.</p>
          <p>Je suis responsable communication de l'association <a style="color:goldenrod;" href="https://www.animest.net/">Anim'Est</a>. 
            Ce poste m'a notamment permis de développer des compétences de travail en équipe et d'expression en public.</p>
          <br />
          <p>Je suis passionné par tout ce qui touche à l'informatique, et je suis toujours à la recherche de nouveaux projets à réaliser.</p>
          <p>Je suis à la recherche d'un stage assistant ingénieur informatique dans le cadre de mon cursus.</p>
        </v-card-text>
      </v-card>

      <div class ="container-cv">
        <form method="get" :action="CV">
          <button type="submit" class="Mybutton" >
            <span style="font-size: 30px;">Mon CV</span>
          </button>
        </form>
      </div>
    </div>
  </div>
  <div id="projects"  class="projets" style="text-align: center;min-height: 100vh; margin: 5px;">
    <div class ="container">
      <div class = "section" id="anim_right_p3">
        <div class="text">
            <h1>Compilateur de langage Ada</h1>
            <p>Ce projet a pour but de réaliser de A à Z un <strong>compilateur</strong> pour une version simplifiée du langage Ada <strong>canAda</strong>.
                Le compilateur est réalisé en <strong>Java</strong> et utilise la librairie <strong>JavaFX</strong> pour l'affichage de l'arbre abstrait.
                Dans un premier temps, le fichier Lexer.java va réaliser <strong>l'analyse lexicale</strong> du code source canAda. Ensuite, le fichier Parser.java va réaliser 
                <strong>l'analyse syntaxique</strong> à partir des tokens générés par le lexer. Pour faciliter le parsing, la grammaire du langage canAda a été modifée pour être
                presque LL(1). A partir des règles de la grammaire utilisée, <strong>l'arbre abstrait</strong> relatif au programme est construit.                    
            </p>
        </div>
        <div class="display-image">
            <div class="image">
                <img style="height: 300px;" :src="compile_prog" alt="Exemple de code Ada du projet">
            </div>
            <div class="image">
                <img style="height: 300px;" :src="compile_arbre" alt="Arbre abstrait du projet">
            </div>
        </div>
      </div>
    </div>
    <div class ="container">
      <div class = "section" id="anim_left_p2">
          <div class="display-image">
              <div class="text" style="width: 60%;">
                  <h1>Application d’économie circulaire en ligne</h1>
                  <p>Cette application permet de mettre en relation des personnes souhaitant <strong>prêter/emprunter du matériel</strong>
                      et/ou de <strong>proposer/recevoir des services</strong> dans une démarche d’économie circulaire. Chaque utilisateur peut 
                      créer un compte et proposer des objets ou des services. Il peut également consulter les objets et services proposés par les 
                      autres utilisateurs puis s'il le souhaite faire une demande de prêt ou de service.
                      Technologies utilisées : <strong>JavaFX</strong> et <strong>FXML</strong>.
                  </p>
              </div>
              <div class="image">
                  <img :src="javaFX" alt="Image du projet">
              </div>
          </div>
      </div>
    </div>
    <div class ="container">
      <div class = "section" id="anim_right_p1">
          <div class="display-image">
              <div class="text">
                  <h1>Application de type wordle et solveur automatique</h1>
                  <p>L’application permet de jouer à <strong>WORDLE</strong>  depuis un navigateur web. Il est possible de jouer sans se connecter.
                      Si le joueur est connecté, il peut accéder à des fonctionnalités avancées comme visionner ses statistiques ainsi que son historique et 
                      ses succès accomplis. Il est également possible de modifier les paramètres du mode jeu (taille du mot à trouver, nombre d'essais).
                      Un mode de jeu survie ainsi qu'un mode contre la montre sont également implémentés dans l'application.
                      Technologies utilisées : <strong>Python</strong>, <strong>Flask</strong>, <strong>MySQL</strong> et <strong>HTML/CSS</strong>.
                  </p>
              </div>
              <div class="image">
                  <img :src="wordle_site" alt="Image du projet">
              </div>
          </div>
          <div class="display-image">
              <div class="image">
                  <img style="min-width: 300px;" :src="wordle_solveur" alt="Image du projet">
              </div>
              <div class="textbis">
                  <p>Le solveur fonctionne sur le principe de la <strong>théorie de l'information</strong>  : il va proposer le mot qui en moyenne va éliminer le plus de mots,
                      c’est à dire celui qui nous rapporte le plus d’information. Pour cela, il va étudier, pour chaque mot, la probabilité que chaque pattern tombe.
                      Un pattern est une combinaison de couleurs, ou informatiquement de 0-1-2, permettant de vérifier certaines règles, définies par le jeu, sur les mots de notre liste.
                      Le solveur a entièrement été réalisé en <strong>C</strong> pour des raisons de performance.
                  </p>
              </div>
          </div>
      </div>
    </div>
  </div>
  <div id="contact">
    <div id="anim_left_form" class="hidden; form">
      <div class="global-contact">
        <h1>Contactez moi</h1>
        <p>Si vous souhaitez me contacter, vous pouvez le faire via ce formulaire</p>
        <v-form v-model="valid" ref="contactForm">
          <v-text-field
            v-model="name"
            label="Nom"
            :rules="[rules.required]"
            required
            name="nom"
          ></v-text-field>

          <v-text-field
            v-model="email"
            label="E-mail"
            :rules="[rules.required, rules.email]"
            required
            name="email"
          ></v-text-field>

          <v-textarea
            v-model="message"
            label="Message"
            :rules="[rules.required]"
            required
            name="message"
          ></v-textarea>

          <button :disabled="!valid"
            @click="submitForm"
            class="Mybutton"
          >
            <span>Envoyer mon message</span>
        </button>
        </v-form>
      </div>
    </div>
  </div>
</template>


<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { onMounted } from 'vue';

onMounted(() => {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        if (entry.target.id.includes("left")){
          entry.target.classList.add('slide-in-left');
        } else {
          entry.target.classList.add('slide-in-right');
        }
        entry.target.classList.remove('hidden');
      }
    });
  });

  const presTarget = document.getElementById('anim_left_pres');
  const p1Target = document.getElementById('anim_right_p1');
  const p2Target = document.getElementById('anim_left_p2');
  const p3Target = document.getElementById('anim_right_p3');
  const formTarget = document.getElementById('anim_left_form');

  observer.observe(presTarget);
  observer.observe(p1Target); 
  observer.observe(p2Target);
  observer.observe(p3Target);
  observer.observe(formTarget);
});

const name = ref('');
const email = ref('');
const message = ref('');
const valid = ref(false);
const rules = {
  required: value => !!value || 'Champ requis',
  email: value => /.+@.+\..+/.test(value) || 'E-mail invalide',
};

const submitForm = () => {
  if (valid.value) {
    const formData = new FormData();
    formData.append('nom', name.value);
    formData.append('email', email.value);
    formData.append('message', message.value);

    axios
      .post('https://thomas-lacroix-tn.fr/back/contactform.php', formData)
      .then(response => {
        console.log('Message envoyé', response);
        // Rediriger vers une page de succès ou afficher un message de confirmation
      })
      .catch(error => {
        console.error('Erreur lors de l\'envoi du message', error);
      });
  }
};
</script>
<script>
import CV from "../assets/CV_FR.pdf";
import compile_arbre from "../assets/compile_arbre.png";
import compile_prog from "../assets/compile_prog.png";
import javaFX from "../assets/javafx.png";
import wordle_site from "../assets/wordle_site.jpg";
import wordle_solveur from "../assets/wordle_solveur.jpg";

export default {
  data() {
    return {
      name: '',
      email: '',
      message: '',
      valid: false,
      rules: {
        required: value => !!value || 'Champ requis',
        email: value => /.+@.+\..+/.test(value) || 'E-mail invalide',
      },
    };
  },
  methods: {
    submitForm() {
      if (this.$refs.contactForm.validate()) {
        // Logique de soumission, ex : envoyer via API
        console.log({
          name: this.name,
          email: this.email,
          message: this.message,
        });
      }
    },
    updateFieldStyles() {
      const overlays = document.querySelectorAll('.v-field--variant-filled .v-field__overlay');
      overlays.forEach(overlay => {
        overlay.style.backgroundColor = 'rgba(200, 200, 200, 0.3)';
      });
    }
  },
  mounted() {
    this.updateFieldStyles(); // Call to update styles
  },
};
</script>

<style scoped>
.container-cv{
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 5vh;
}

.projets {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.full-page {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh; 
  text-align: center; 
}

.form{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}



.section
{
  width: 60%;
  padding:40px;
  margin: 0 auto 5% auto;
  background-color: rgba(11, 45, 138, 0.3);
  border-radius: 20px;
}

.text
{
  justify-content: center;
  color: #fff;
  margin: 0 2% 2% 0;
  font-size: 15px;
  line-height: 1.5;
}

.container {
  margin-top: 10vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
.textbis
{
  justify-content: center;
  color: #fff;
  margin: 0 0% 0% 2%;
  font-size: 15px;
  line-height: 1.5;
}

.text h1
{
  color:  goldenrod;
  margin-bottom: 2%;
}

.display-image
{
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 5%;
}

.image
{
  max-width: 100%;
  height: auto;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0 auto;
}

img {
  max-width: 100%;
  height: auto;
}

@media screen and (max-width:800px) 
{
  .display-image
  {
    display: block;
  }

  .textbis
  {
    margin: 2% 0 2% 0;
  }
}

/* Animation CSS */
@keyframes slideInLeft {
  0% {
    transform: translateX(-100%);
    opacity: 0;
  }
  100% {
    transform: translateX(0);
    opacity: 1;
  }
}

@keyframes slideInRight {
  0% {
    transform: translateX(100%);
    opacity: 0;
  }
  100% {
    transform: translateX(0);
    opacity: 1;
  }
}

.slide-in-left {
  animation: slideInLeft 2s ease-out;
}

.slide-in-right {
  animation: slideInRight 2s ease-out;
}

.hidden {
  opacity: 0;
  transform: translateX(-100%);
}

.global-contact 
{
  display: flex;
  flex-direction: column;
  gap: 20px; 
  padding: 20px 50px 20px 50px;
  width: 50%;
  border: black 2px solid;
  border-radius: 8px;
  background-color: rgba(11, 45, 138, 0.3);
}

.Mybutton
{
  background-color: goldenrod;
  color: white;
  border: none;
  border-radius: 5px;
  padding: 10px;
  cursor: pointer;
  transition: 0.3s;
  margin: 5px;
}
</style>


