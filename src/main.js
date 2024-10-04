/**
 * main.js
 *
 * Bootstraps Vuetify and other plugins then mounts the App`
 */

// Plugins
import { registerPlugins } from '@/plugins'

// Components
import App from './App.vue'

// Composables
import { createApp } from 'vue'

// Router
import router from './router'

// Configuration
//Vue.config.productionTip = false;

// Create the app   
const app = createApp(App)
// Register the plugins
registerPlugins(app)
// Mount the app
app.use(router).mount('#app')


