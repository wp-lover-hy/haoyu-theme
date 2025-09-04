/**
 * HaoYu AI Child Theme - Main Entry Point
 * 
 * This is the main entry point for the Vite build system.
 * All JavaScript modules and styles are imported here.
 */

// Import styles
import './styles/main.scss'

// Import main JavaScript functionality
import './components/mobile-menu'
import './components/search'
import './components/forms'
import './components/animations'
import './utils/helpers'

// Initialize theme when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  console.log('🚀 HaoYu AI Theme loaded successfully!')
  
  // Initialize all components
  initTheme()
})

/**
 * Initialize theme functionality
 */
function initTheme() {
  // Add theme-specific initialization here
  console.log('Theme initialized with Vite!')
}
