/**
 * Animations Component
 * 
 * Handles scroll animations and interactive effects.
 */

import { isInViewport, throttle } from '../utils/helpers.js'

class AnimationsComponent {
  constructor() {
    this.animatedElements = document.querySelectorAll('[data-animate]')
    this.init()
  }
  
  init() {
    if (this.animatedElements.length === 0) return
    
    this.setupIntersectionObserver()
    this.bindScrollEvents()
  }
  
  setupIntersectionObserver() {
    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            this.animateElement(entry.target)
            observer.unobserve(entry.target)
          }
        })
      }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      })
      
      this.animatedElements.forEach(element => {
        observer.observe(element)
      })
    } else {
      // Fallback for older browsers
      this.animatedElements.forEach(element => {
        this.animateElement(element)
      })
    }
  }
  
  bindScrollEvents() {
    // Parallax effect for elements with data-parallax
    const parallaxElements = document.querySelectorAll('[data-parallax]')
    
    if (parallaxElements.length > 0) {
      window.addEventListener('scroll', 
        throttle(() => this.handleParallax(parallaxElements), 16)
      )
    }
  }
  
  animateElement(element) {
    const animationType = element.dataset.animate
    const delay = element.dataset.delay || 0
    
    setTimeout(() => {
      element.classList.add('animate-in', `animate-${animationType}`)
    }, delay)
  }
  
  handleParallax(elements) {
    const scrollTop = window.pageYOffset
    
    elements.forEach(element => {
      const speed = element.dataset.parallax || 0.5
      const yPos = -(scrollTop * speed)
      element.style.transform = `translateY(${yPos}px)`
    })
  }
}

// Initialize animations component when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  new AnimationsComponent()
})
