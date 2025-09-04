/**
 * Mobile Menu Component
 * 
 * Handles mobile navigation menu functionality with modern JavaScript.
 */

class MobileMenu {
  constructor() {
    this.menuToggle = document.querySelector('.menu-toggle')
    this.navigation = document.querySelector('.main-navigation ul')
    this.isOpen = false
    
    this.init()
  }
  
  init() {
    if (!this.menuToggle || !this.navigation) return
    
    this.bindEvents()
    this.setupAccessibility()
  }
  
  bindEvents() {
    // Toggle menu on button click
    this.menuToggle.addEventListener('click', () => this.toggle())
    
    // Close menu when clicking outside
    document.addEventListener('click', (e) => this.handleOutsideClick(e))
    
    // Close menu on escape key
    document.addEventListener('keydown', (e) => this.handleKeydown(e))
    
    // Close menu on window resize (if mobile menu is open)
    window.addEventListener('resize', () => this.handleResize())
  }
  
  setupAccessibility() {
    // Set initial ARIA attributes
    this.menuToggle.setAttribute('aria-expanded', 'false')
    this.menuToggle.setAttribute('aria-controls', 'primary-menu')
    this.navigation.setAttribute('id', 'primary-menu')
  }
  
  toggle() {
    this.isOpen ? this.close() : this.open()
  }
  
  open() {
    this.isOpen = true
    this.navigation.classList.add('toggled')
    this.menuToggle.setAttribute('aria-expanded', 'true')
    this.menuToggle.classList.add('active')
    
    // Prevent body scroll when menu is open
    document.body.style.overflow = 'hidden'
    
    // Focus first menu item
    const firstLink = this.navigation.querySelector('a')
    if (firstLink) firstLink.focus()
  }
  
  close() {
    this.isOpen = false
    this.navigation.classList.remove('toggled')
    this.menuToggle.setAttribute('aria-expanded', 'false')
    this.menuToggle.classList.remove('active')
    
    // Restore body scroll
    document.body.style.overflow = ''
    
    // Return focus to toggle button
    this.menuToggle.focus()
  }
  
  handleOutsideClick(e) {
    if (this.isOpen && 
        !this.menuToggle.contains(e.target) && 
        !this.navigation.contains(e.target)) {
      this.close()
    }
  }
  
  handleKeydown(e) {
    if (e.key === 'Escape' && this.isOpen) {
      this.close()
    }
  }
  
  handleResize() {
    // Close mobile menu if window is resized to desktop size
    if (window.innerWidth >= 768 && this.isOpen) {
      this.close()
    }
  }
}

// Initialize mobile menu when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  new MobileMenu()
})
