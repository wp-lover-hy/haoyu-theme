/**
 * Forms Component
 * 
 * Enhanced form functionality with validation and UX improvements.
 */

import { showNotification } from '../utils/helpers.js'

class FormsComponent {
  constructor() {
    this.forms = document.querySelectorAll('form')
    this.init()
  }
  
  init() {
    this.forms.forEach(form => {
      this.enhanceForm(form)
    })
  }
  
  enhanceForm(form) {
    // Add form validation
    form.addEventListener('submit', (e) => this.handleSubmit(e))
    
    // Add real-time validation
    const inputs = form.querySelectorAll('input, textarea, select')
    inputs.forEach(input => {
      input.addEventListener('blur', () => this.validateField(input))
      input.addEventListener('input', () => this.clearFieldError(input))
    })
  }
  
  handleSubmit(e) {
    const form = e.target
    const isValid = this.validateForm(form)
    
    if (!isValid) {
      e.preventDefault()
      showNotification('请填写所有必填字段', 'error')
    }
  }
  
  validateForm(form) {
    const requiredFields = form.querySelectorAll('[required]')
    let isValid = true
    
    requiredFields.forEach(field => {
      if (!this.validateField(field)) {
        isValid = false
      }
    })
    
    return isValid
  }
  
  validateField(field) {
    const value = field.value.trim()
    const isRequired = field.hasAttribute('required')
    const type = field.type
    
    // Clear previous errors
    this.clearFieldError(field)
    
    // Required field validation
    if (isRequired && !value) {
      this.showFieldError(field, '此字段为必填项')
      return false
    }
    
    // Email validation
    if (type === 'email' && value) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
      if (!emailRegex.test(value)) {
        this.showFieldError(field, '请输入有效的邮箱地址')
        return false
      }
    }
    
    // URL validation
    if (type === 'url' && value) {
      try {
        new URL(value)
      } catch {
        this.showFieldError(field, '请输入有效的URL')
        return false
      }
    }
    
    return true
  }
  
  showFieldError(field, message) {
    field.classList.add('error')
    
    // Create error message element
    const errorElement = document.createElement('div')
    errorElement.className = 'field-error'
    errorElement.textContent = message
    
    // Insert after field
    field.parentNode.insertBefore(errorElement, field.nextSibling)
  }
  
  clearFieldError(field) {
    field.classList.remove('error')
    
    const errorElement = field.parentNode.querySelector('.field-error')
    if (errorElement) {
      errorElement.remove()
    }
  }
}

// Initialize forms component when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  new FormsComponent()
})
