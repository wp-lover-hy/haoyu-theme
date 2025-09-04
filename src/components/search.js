/**
 * Search Component
 * 
 * Enhanced search functionality with modern features.
 */

import { debounce } from '../utils/helpers.js'

class SearchComponent {
  constructor() {
    this.searchForm = document.querySelector('.search-form')
    this.searchInput = document.querySelector('input[type="search"]')
    this.searchResults = null
    
    this.init()
  }
  
  init() {
    if (!this.searchInput) return
    
    this.createResultsContainer()
    this.bindEvents()
    this.setupAccessibility()
  }
  
  createResultsContainer() {
    // Create search results container
    this.searchResults = document.createElement('div')
    this.searchResults.className = 'search-results'
    this.searchResults.setAttribute('aria-live', 'polite')
    this.searchResults.setAttribute('aria-label', 'Search results')
    
    // Insert after search form
    this.searchForm.parentNode.insertBefore(this.searchResults, this.searchForm.nextSibling)
  }
  
  bindEvents() {
    // Real-time search with debouncing
    this.searchInput.addEventListener('input', 
      debounce((e) => this.handleSearch(e), 300)
    )
    
    // Handle form submission
    this.searchForm.addEventListener('submit', (e) => this.handleSubmit(e))
    
    // Handle focus/blur
    this.searchInput.addEventListener('focus', () => this.handleFocus())
    this.searchInput.addEventListener('blur', () => this.handleBlur())
    
    // Handle keyboard navigation
    this.searchInput.addEventListener('keydown', (e) => this.handleKeydown(e))
  }
  
  setupAccessibility() {
    this.searchInput.setAttribute('autocomplete', 'off')
    this.searchInput.setAttribute('spellcheck', 'false')
  }
  
  async handleSearch(e) {
    const query = e.target.value.trim()
    
    if (query.length < 2) {
      this.hideResults()
      return
    }
    
    try {
      const results = await this.performSearch(query)
      this.displayResults(results, query)
    } catch (error) {
      console.error('Search error:', error)
      this.showError('Search failed. Please try again.')
    }
  }
  
  async performSearch(query) {
    // Use WordPress REST API for search
    const response = await fetch(`/wp-json/wp/v2/search?search=${encodeURIComponent(query)}&per_page=5`)
    
    if (!response.ok) {
      throw new Error('Search request failed')
    }
    
    return await response.json()
  }
  
  displayResults(results, query) {
    if (results.length === 0) {
      this.showNoResults(query)
      return
    }
    
    const html = `
      <div class="search-results-header">
        <h3>Search results for "${query}"</h3>
      </div>
      <ul class="search-results-list">
        ${results.map(result => `
          <li class="search-result-item">
            <a href="${result.url}" class="search-result-link">
              <h4 class="search-result-title">${result.title}</h4>
              <p class="search-result-excerpt">${result.excerpt || ''}</p>
            </a>
          </li>
        `).join('')}
      </ul>
      <div class="search-results-footer">
        <a href="/?s=${encodeURIComponent(query)}" class="search-all-link">
          View all results for "${query}"
        </a>
      </div>
    `
    
    this.searchResults.innerHTML = html
    this.showResults()
  }
  
  showNoResults(query) {
    this.searchResults.innerHTML = `
      <div class="search-no-results">
        <p>No results found for "${query}"</p>
        <p>Try different keywords or check your spelling.</p>
      </div>
    `
    this.showResults()
  }
  
  showError(message) {
    this.searchResults.innerHTML = `
      <div class="search-error">
        <p>${message}</p>
      </div>
    `
    this.showResults()
  }
  
  showResults() {
    this.searchResults.style.display = 'block'
    this.searchResults.classList.add('visible')
  }
  
  hideResults() {
    this.searchResults.style.display = 'none'
    this.searchResults.classList.remove('visible')
  }
  
  handleSubmit(e) {
    const query = this.searchInput.value.trim()
    if (!query) {
      e.preventDefault()
      this.searchInput.focus()
    }
  }
  
  handleFocus() {
    this.searchForm.classList.add('focused')
    if (this.searchInput.value.trim().length >= 2) {
      this.showResults()
    }
  }
  
  handleBlur() {
    this.searchForm.classList.remove('focused')
    // Delay hiding to allow clicking on results
    setTimeout(() => this.hideResults(), 200)
  }
  
  handleKeydown(e) {
    if (e.key === 'Escape') {
      this.hideResults()
      this.searchInput.blur()
    }
  }
}

// Initialize search component when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  new SearchComponent()
})
